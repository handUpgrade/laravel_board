@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg flex justify-center border-2">
            <div>
                <form action="/posts/{{$post->id}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="mb-4">
                    <h1 class="font-sans font-bold text-3xl py-6">수정하기</h1>
                        <label for="title">제목</label>
                        <input name="title" id="title" value="{{old('title')? old('title') : $post->title}}" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('title') border-red-500 @enderror"
                        placeholder="제목" required></input>
                        @error('title')
                            <div class="text-red-500" mt-2 text-sm">
                                {{ $message}}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4">    
                        <label for="body">내용</label>
                        <textarea name="body" id="body" cols='80' rows="10" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror"
                        placeholder="내용" required>{{old('body')? old('body') : $post->body}}</textarea>    

                        @error('body')
                            <div class="text-red-500" mt-2 text-sm">
                                {{ $message}}
                            </div>
                        @enderror
                    </div>                
                        <button type="submit" class="bg-blue-400 text-white px-4 py-3 rounded font-semibold text-xl w-full">수정</button>
                </form>
                <br>
                <div>    
                    <form action="/posts/{{$post->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-400 text-white px-4 py-3 rounded font-semibold text-xl w-full">삭제</button>
                    </form>
                </div>      
            </div> 
        </div>
        
    </div>
@endsection