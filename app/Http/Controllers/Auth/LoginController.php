<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //

    public function __construct(){
        $this->middleware(['guest']);
    }
    
    public function index(Request $req){

        return view('auth.login');
        
    }

    public function store(Request $request){
       
        //유효성 검사

        $this->validate($request, [
            // 'name'=>'required|max:255',
            'username'=>'required|',
            // 'email'=>'required|email|max:255',
            'password'=>'required',
        ]);
        
        //로그인 안 되면 username 이랑 password를 받아서 기억하고 Invalid login details라고 나오게 함 
        if(!auth()->attempt($request->only('username','password'), $request->remember)){
            return back()->with('status', 'Invalid login details');
        };

        return redirect()->route('post');
    }

    public function show(Request $request, $id)
    {
        $value = $request->session()->get('key');
        
    }
}
