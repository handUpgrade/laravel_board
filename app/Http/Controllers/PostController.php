<?php

namespace App\Http\Controllers;


use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index(){
        //게시글 페이지네이션
        $posts = Post::latest()->paginate(5);
   
        // dd($posts);
        return view('posts.index', [
            //게시글 리스트
            'postList' => $posts
        ]);

    }

    public function create(){
        //
        // dd('nice');


        return view('posts.create');
    }

    public function store(){
        //Request $request
        //게시글 유효성 검사 및 저장
        request()->validate([
            'title'=>'required',
            'body'=>'required'
        ]); 

        $values = request(['title','body']);
        $values['user_id']= auth()->id();
  
        $post = Post::create($values);
        return redirect('/posts');
    
    
    }

    public function show(Post $post){
        
        //게시글 보여주기   
        
        return view('posts.show', [
            'post'=> $post
        ]);
    }

    public function edit(Post $post){
        //


        return view('posts.edit', [
            'post' => $post
        ]);
    }


    public function update(Post $post){
        
        //게시글 수정
        //게시글 수정 시 유효성
        request()->validate([
            'title'=>'required',
            'body'=>'required'
        ]); 

        //게시글 수정    
        $post->update([
            'title'=>request('title'),
            'body'=>request('body')
        ]);

        //게시글 id로 리다이렉트
        return redirect('/posts/'.$post->id); 
    }

    public function destroy(Post $post){

         // 게시글 삭제-> db 삭제
        $post->delete();
        return redirect('/posts');
    
    }
}


