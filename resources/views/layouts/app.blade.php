<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equic="X"
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>laravel</title>

        <!-- Scripts -->
        <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
        
        <!-- Styles -->
        <!-- <link href="{{ mix('css/app.css') }}" rel="stylesheet"> -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body class="container mx-auto px-6">
        <nav class="p-6 border-b border-gray-200 bg-white flex justify-between mb-6 font-bold">
            <ui class="flex items-center">
                <li class="list-none">
                    <a href="{{route('home')}}" class="p-3">HOME</a>
                    
                </li>
                <!-- <li class="list-none">
                    <a href="{{route('dashboard')}}" class="p-3">DASHBOARD</a>
                </li> -->
                <li class="list-none">
                    <a href="{{route('post')}}" class="p-3">POST</a>
                </li>
                
            </ui>    

            <ui class="flex items-center">

                <!-- 로그인했을 때 -->
                @auth
                    <li class="list-none">
                        <!-- 로그인 했을 때 유저 이름 받아옴 -->
                        <a href="" class="p-3">{{(auth()->user()->name)}} 님 사용 중</a>
                    </li>
                    <li class="list-none">
                        <form action="{{route('logout')}}" method="post">
                            @csrf
                            <button type="submit" class="p-3  text-white font-bold bg-red-500 hover:bg-red-700 rounded-lg">LOGOUT</button>
                        </form>
                    </li>
                @endauth

                <!-- 로그인 안했을 때 -->
                @guest
                    <li class="list-none">
                        <a href="{{route('login')}}" class="p-3 text-white font-bold bg-yellow-400 hover:bg-yellow-500 rounded-lg">LOGIN</a>
                    </li>
                @endguest
            </ui>   
        </nav>
         @yield('content')
    </body>
</html>