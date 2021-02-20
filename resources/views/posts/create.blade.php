@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
       
        <div class="w-8/12 bg-white p-6 rounded-lg flex justify-center">
        
            <form action="{{route('post')}}" method="POST">
                @csrf
                <div class="mb-4">
                <h1 class="font-sans font-bold text-3xl py-6">작성하기</h1>
                    <label for="title">제목</label>
                    <input name="title" id="title" cols='80' rows="1" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('title') border-red-500 @enderror"
                    placeholder="제목을 적어주세요" required value="{{old('title') ? old('title'):''}}"></input>
                    @error('title')
                        <div class="text-red-500" mt-2 text-sm">
                            {{ $message}}
                        </div>
                    @enderror
                </div>
                <br>
                <div class="mb-4">    
                    <label for="body">내용</label>
                    <textarea name="body" id="body" cols='80' rows="10" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror"
                    placeholder="내용을 적어주세요" required value="{{old('body') ? old('body'):''}}"></textarea>    

                    @error('body')
                        <div class="text-red-500" mt-2 text-sm">
                            {{ $message}}
                        </div>
                    @enderror
                </div>
                <br>
                <div>
                    <button type="submit" class="bg-pink-400 hover:bg-pink-500 text-white p-3 px-4 py-2 rounded font font-bold float-right">작성</button>
                </div>
            </form>
        </div>
    </div>
@endsection