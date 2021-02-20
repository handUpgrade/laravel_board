@extends('layouts.app')

@section('content')
<div class= "border-2">
    <div class="p-6 flex justify-center ">
        <div class="w-8/12 bg-white p-6 rounded-lg border-b">
            <div class="mb-4"">
                <div class="border-b">
                    <label class="font-bold">제목:</label>
                    <h1 class="font-bold text-2xl  py-2 ">{{$post ->title}}</h1>
                </div>
                <br>
                <label class="font-bold">내용:</label>
                <div class =" py-10" >    
                    <h1 class="font-bold text-xl text-left" >{{$post->body}}</h1>
                </div>   
                    <!-- <h1 class="text-green-200 ">작성자</h1>
                    <p>{{$post->user->name}}</p>
                    <p>{{$post->created_at}}</p> -->
                    <!-- <a href="/posts/{{ $post->id }}/edit">수정하기</a> -->
                <br>
                        
                @if(auth()->id() ==$post->user_id)
                    <form method="GET" action="/posts/{{ $post->id }}/edit" class="w-1/2">
                        <button type= "submit" value="수정하기" class="float-left bg-blue-400 text-white px-3 py-1 rounded font-semibold text-xl ">수정하기</button>
                    </form>
                    <form action="/posts/{{$post->id}}" method="POST" >
                        @method('DELETE')
                        @csrf
                        <button type= "submit" value="삭제하기" class="mx-4 float-left bg-red-400 text-white px-3 py-1 rounded font-semibold text-xl">삭제하기</button>
                    </form>
                @endif
                    
            </div>    
        </div>
    </div> 
    <div class="p-6 flex justify-center">   
        <div class="w-8/12 bg-white p-6 rounded-lg border-b">   
        <h5 class= "font-bold">댓글 목록</h5>
        <br>
            <div class="card-body">
                @foreach($post->comments as $commentItem)    
                    <p class="border-2 px-2 py-2 ">{{$commentItem->body}}</p>
                    @if(auth()->id() ==$post->user_id)
                        <form action="/comment/{{$commentItem->id}}" method="post">    
                            @method('DELETE')
                            @csrf
                            <button type= "submit" value="삭제하기" class="bg-red-400">삭제하기</button>
                        </form>
                    @endif
                    <br>    
                @endforeach              
            </div>
        </div>    
    </div>
    @auth
    <div class="p-6 flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg ">
           
                <div class="card-body ">          
                                    <!-- <form method="post" action="/comment"> -->
                    <form method="post" action="{{ route('comment.add') }}">
                        @csrf
                        <!-- <div class="d-flex bd-highlight"> -->
                            <!-- <div class="form-group p-2 w-100 bd-highlight"> -->
                                <h5>댓글:</h5>
                                <input type="text" name="body" class="bg-gray-100 border-2 w-full p-2 rounded-lg" />
                                <input type="hidden" name="post_id" value="{{ $post->id }}" />
                                <input type="hidden" name="parent_id" value="0" />
                            </div>
                            <div class="form-group py-2 flex-shrink-1 bd-highlight">
                                <button type="submit" class="bg-red-400 text-white px-4 py-1 rounded font-semibold" >남기기</button>
                            </div>
                        </div>
                    </form>
                </div>  
            </div>     
        </div>    
    </div>
    @endauth      
</div>
@endsection
