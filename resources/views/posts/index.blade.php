@extends('layouts.app')

@section('content')
    <div class="fh-screen overflow-hidden flex items-center justify-center">
        <h1 class = "font-extrabold text-3xl py-4">게시판 리스트</h1>
    </div>
    <small class="float-right font-mono font-bold text-red-700"> 로그인 시 작성 가능</small>
   
    <br>
    <div id="android">    
        <table class="min-w-full table-fixed">
            <thead class="justify-between">
                <tr class="bg-gray-800">
                    <th class="px-4 py-2 border-2">
                        <span class="text-gray-200">번호</span>
                    </th>
                    <th class="px-96 py-2 border-2">
                        <span class="text-gray-200 ">제목</span>
                    </th>
                    <th class="px-4 py-2 border-2">
                        <span class="text-gray-200">작성자</span>
                    </th>
                    <th class="px-4 py-2 border-2">
                        <span class="text-gray-200 ">작성일</span>
                    </th>
                </tr>
            </thead>
            <!-- 게시글 가져올 때 마다 제목 작성자 작성일수를 가져옴 -->
            @foreach($postList as $post_number => $post)
                <tbody class="text-center font-sans font-bold">
                    <tr class="border-2 border-gray-300">
                        <td class="px-16 py-2 border-2"> 
                            <a href="/posts/{{ $post->id}}" class="my-3 p-3">
                                <p>{{$post_number->currentPage() + 1}}</p>
                            </a>    
                        </td>
                        <td class="px-16 py-2 border-2"> 
                            <a href="/posts/{{ $post->id}}" class="my-3 p-3">
                                <p>{{$post->title}}</p>
                            </a>  
                            <!-- <span>{{$post->title}}</span> -->
                        </td> 
                        <td class="px-16 py-2 border-2">
                            <span>{{$post->user->name}}</span>
                        </td>
                        <td class="px-4 py-2 border-2">
                            <span>{{$post->created_at}}</span>
                            
                        </td>         
                    </tr>
                </tbody>
                    
            @endforeach
            <span class="font-mono font-bold">총 글 갯수: {{$post->count()}}</span>
        </table>
    </div>
         <!-- 로그인 했을 때만 작성가능    -->
        @auth 
            <form method="get" action="/posts/create">
            <br>
                <button type="submit" class=" text-xl p-2 text-white font-bold bg-green-500 hover:bg-green-700 rounded-lg float-right">작성하기</button>
            </form> 
        @endauth   
        <div class="flex justify-center">   
            <!-- 페이지네이션 -->
            {{ $postList->links()}}
        </div>
@endsection
