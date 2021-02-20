<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //회원가입
   
    public function index(){
        
        //회원 가입 페이지 보여줌
        return view('auth.register');
    }


    public function store(Request $request){
        
        //회원정보 저장 및 유효성 검사
        $this->validate($request, [
            'name'=>'required|max:255',
            'username'=>'required|max:255',
            'email'=>'required|email|max:255',
            'password'=>'required|confirmed',
        ]);

        User::create([
            'name'=> $request ->name,
            'username'=>$request->username,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),

        ]);       
        //로그인 페이지로 감        
        return redirect()->route('login');
    }
}
