<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    //
    public function store(){
        
        //로그아웃 시 메인으로
        auth()->logout();

        return redirect()->route('home');
    }
}

