<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function store(Request $request){

        $this->validate($request,[
            'password'=>'required'
        ]);

        if(Auth::attempt([
            'email'=>$request->input('email'),
            'password' => $request->input('password')
        ], $request->input('remember'))) {
            $request->session()->regenerate();
            $user = Auth::user();
            if($user->lock==1){
                if($user->level== 1 || $user->level == 0)
                {
                    return redirect()->route('admin');
                } else {
                    return redirect()->route('member');
                }

            } else {
                Session::flash('error','Tài khoản đã bị khóa');
                return redirect()->back();
            }
        }else{
            Session::flash('error','Email hoặc Password không đúng');
            return redirect()->back();
        }
    }
}
