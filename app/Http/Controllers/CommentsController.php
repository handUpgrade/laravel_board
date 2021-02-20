<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    //댓글

    public function store(){
        
        //댓글 저장

        $comment = new Comment();
        $comment->body = request('body');

        //로그인 된 유저의 id를 받아옴
        $comment->user_id = auth()->id();
        //게시글 id
        $comment->post_id = request('post_id');
        $comment->parent_id = request('parent_id');
        
        $comment->save();
        
        return redirect('/posts/'. request('post_id'));
    }


    public function destroy(Comment $comment ,Post $post){
        
        //댓글 삭제
        $comment->delete();
        
        return redirect('/posts/'. $post->id);
       
    
    }
}