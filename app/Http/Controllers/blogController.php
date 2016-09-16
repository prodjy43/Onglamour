<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\News;
use App\Comment;

class blogController extends Controller
{
    public function showAll(){
    	$news = News::join('users', 'user_id', '=', 'users.id')->orderBy('news.created_at', 'desc')->get();
    	return view('blog.news', ['title' => 'blog', 'news' => $news]);
    }

    public function show($slug){
    	$news = News::where('slug' ,$slug)->join('users', 'user_id', '=', 'users.id')->first();
    	$comments = Comment::where('news_slug', $slug)->join('users', 'user_id', '=', 'users.id')->orderBy('comments.created_at', 'desc')->get();
    	return view('blog.comment', ['title' => 'blog', 'news' => $news, 'comments' => $comments]);
    }

    public function postCom(Request $request, $slug){
    	$this->create($request->all(), $slug);
    	return redirect('/blog/'.$slug);
    }

    public function editForm($id){
    	$comment = Comment::where('id_comment', $id)->join('users', 'user_id', '=', 'users.id')->first();
    	if (Auth::user()->id !== $comment->id) {
    		return redirect('/');
    	}
    	return view('blog.edit', ['title' => 'blog', 'comment' => $comment]);
    }

    public function editCom(Request $request, $id){
    	$this->update($request->all(), $id);
    	return redirect('/blog');
    }

    protected function update(array $data, $id){
    	return Comment::where('id_comment', $id)->update([
    		'title' => $data['title'],
    		'content' => $data['content'],
    	]);
    }

    protected function Create(array $data, $slug){
    	return Comment::create([
    		'title' => $data['title'],
    		'content' => $data['content'],
    		'user_id' => Auth::user()->id,
    		'news_slug' => $slug,
    	]);
    }
}
