@extends('layouts.app')

@section('content')
    <div class="flex justify-center ">
        <div class="w-4/12 bg-white p-8 rounded-lg my-32 border-4 ">
            @if (session('status'))
                <div class="bg-red-500 p-4 rounded-lg mb-6 text-white text-center ">
                    {{session('status')}}
                </div>
            @endif     
            <form action="{{route('login')}}" method="POST"> 
                <h1 class= "text-center text-black text-xl font-mono font-semibold" >Sign in</h1>
                <br>
                @csrf
                <div class="mb-4">
                    <label for="username" class="block text-xs font-semibold text-gray-600 uppercase">아이디</label>
                    <input type="text" name="username" id="username" placeholder="ID" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="">
                </div>           

                <div class="mb-4">
                    <label for="password" class="block text-xs font-semibold text-gray-600 uppercase">비밀번호</label>
                    <input type="password" name="password" id="password" placeholder="YourPW" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="">
                </div>

                <div class="mb-4">
                    <label class="inline-flex items-center mt-3">
                        <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600" name="remember" id="remember"><span class="ml-2 text-gray-700">Remember Me</span>
                    </label>
                </div>  
                <div>
                    <button type="submit" class="bg-blue-400 text-white px-4 py-3 rounded font-semibold w-full">Sign in</button>     
                </div>
            </form>
            <br>
            <div>
                <button type="button" onclick="location.href='{{route('register')}}'" class="bg-red-400 text-white px-4 py-3 rounded font-semibold w-full">Register</button>     
            </div>
        </div>
    </div>
@endsection
