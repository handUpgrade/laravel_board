@extends('layouts.app')

@section('content')
    <div class="flex justify-center">

        <div class="w-4/12 bg-white p-6 rounded-lg flex justify-center border-2">

            <!-- post방식 -->
            <!-- 해당조건이 안되면 에러 메시지 나오게했음 -->
            <form action="{{route('register')}}" method="POST" class="mt-6"> 
                @csrf
                <h1 class="font-bold text-3xl text-center">REGISTER</h1>
                <br>
                <br>
                <div class="mb-4">
                    <label for="name" class="block text-xs font-semibold text-gray-600 uppercase">이름</label>
                    <input type="text" name="name" id="name" placeholder="YourName" class="bg-gray-100 border-2 w-full p-4 rounded-lg 
                    @error('name') border-red-500 @enderror" value="{{ old('name') }}">
                    
                    <!-- 에러 났을 때 알림 (id)-->
                    @error('name')
                        <div class="text-red-300 mt-02 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>           
                
                <div class="mb-4">
                    <label for="username" class="block text-xs font-semibold text-gray-600 uppercase">아이디</label>
                    <input type="text" name="username" id="username" placeholder="UserName" class="bg-gray-100 border-2 w-full p-4 rounded-lg 
                    @error('name') border-red-500 @enderror" value="{{ old('username') }}">

                    @error('username')
                        <div class="text-red-300 mt-02 text-sm">
                            {{ $message }}
                        </div>
                    @enderror     
                </div>      
        
                <div class="mb-4">
                    <label for="email" class="block text-xs font-semibold text-gray-600 uppercase">이메일</label>
                    <input type="text" name="email" id="email" placeholder="Youremail" class="bg-gray-100 border-2 w-full p-4 rounded-lg
                    @error('email') border-red-500 @enderror" value="{{ old('email') }}">
                    @error('email')
                        <div class="text-red-300 mt-02 text-sm">
                            {{ $message }}
                        </div>
                    @enderror   
                
                
                </div>      
                <!-- 에러 났을 때 알림 (이메일)-->    
                <div class="mb-4">
                    <label for="password" class="block text-xs font-semibold text-gray-600 uppercase">비밀번호</label>
                    <input type="password" name="password" id="password" placeholder="YourPW" class="bg-gray-100 border-2 w-full p-4 rounded-lg
                    @error('password') border-red-500 @enderror" value="">
                    @error('password')
                        <div class="text-red-300 mt-02 text-sm">
                            {{ $message }}
                        </div>
                    @enderror       
                
                
                </div>   
                <!-- 에러 났을 때 알림(비번) -->
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-xs font-semibold text-gray-600 uppercase">비밀번호확인</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="YourPWConfirm" class="bg-gray-100 border-2 w-full p-4 rounded-lg
                    @error('passwordConfirm') border-red-500 @enderror" value="">
                    @error('password_confirmation')
                        <div class="text-red-300 mt-02 text-sm">
                            {{ $message }}
                        </div>
                    @enderror       
                </div>   
    
                <button type="submit" class="bg-blue-400 text-white px-4 py-3 rounded font-medium w-full">등록</button>     
                <!-- <button type="submit" class="bg-red-500 text-white px-4 py-3 rounded font-medium w-full">뒤로가기</button> -->
            </form>
        </div>
    </div>
@endsection
