<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard');

        $value = $request->session()->get('key', 'default');

        $value = $request->session()->get('key', function () {
        return $value;
});
    }
    
    public function __construct(){
        $this->middleware(['auth']);
    }



}
