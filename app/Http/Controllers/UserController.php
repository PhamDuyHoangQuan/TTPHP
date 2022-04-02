<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoyalCustomer;
use Auth; 
class UserController extends Controller
{
    public function getLogin()
    {
        return view('login');//return ra trang login để đăng nhập
    }

    public function postLogin(Request $request)
    {
        $arr = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if ($request->remember == trans('remember.Remember Me')) {
            $remember = true;
        } else {
            $remember = false;
        }
        
        if (Auth::guard('loyal_customer')->attempt($arr)) {

            dd('đăng nhập thành công');
        } else {

            dd('tài khoản và mật khẩu chưa chính xác');
        }
    }
}