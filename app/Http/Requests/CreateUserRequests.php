<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class CreateUserRequest extends FormRequest
{    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'mail_address' => 'required|max:255',
            'password'=>'required|min:3|max:20',
            'mail_address' => 'required|max:255|unique:users,mail_address',
            'password'=>'required|min:3|max:255',
            'passwordconfirm'=>'required|same:password',
            'name'=>'required|min:3|max:255',
            'address'=>'max:255',
            'phone'=>'max:15'
         ];
    }
}