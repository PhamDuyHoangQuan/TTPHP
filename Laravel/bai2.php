<?php

namespace App\Models;
 use Session;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
     protected $fillable = [
        'mail_address',
        'password',
        'name',
        'address',
        'phone'
    ];

    public function checkregister($request)
    {

     try{
      User::create([
      'mail_address'=> (string) $request->input('mail_address'),
      'password'=> (string)bcrypt( $request->input('password')),
      'name'=> (string)$request->input('name'),
      'address'=> (string) $request->input('address'),
      'phone'=> (string) $request->input('phone')

      ]);

      Session::flash('success','tạo thành công tài khoản');

     } catch(\Exception $err){

      Session::flash('error',$err->getMessage());
      return false;

      }
     return true;
    }
    public function listAll(){
      return User::orderBy('id','asc')->paginate(20);
    }


}
