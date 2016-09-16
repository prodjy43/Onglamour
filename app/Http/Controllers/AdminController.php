<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Meeting;
use App\News;
use App\Comment;

class AdminController extends Controller
{
	private $id;

    public function showRdv(){
    	$meetings = Meeting::where('validate', 0)->join('users', 'user_id', '=', 'users.id')->get();
    	return view('admin.meetings', ['title' => 'Rendez-vous', 'meetings' => $meetings]);
    }

    public function showNews(){
        $news = News::join('users', 'user_id', '=', 'users.id')->orderBy('news.created_at', 'desc')->get();
        return view('admin.news', ['title' => 'Gestion news',  'news' => $news]);
    }

    public function storeNews(Request $request){
        $name = sha1(uniqid()).'.'.$request->all()['image']->extension();
        if (move_uploaded_file($request->all()['image']->path(), public_path('images/upload/'.$name))) {
            $this->createNews($request->all(), $name);
            return redirect('/admin/news');
        }else{
            return redirect('/');
        }
    }

    public function acceptRdv($id){
    	$this->id = $id;
    	$meeting = Meeting::where('id_meeting', $id)->join('users', 'user_id', '=', 'users.id')->first();
    	$this->updateRdv($id);
    	Mail::send('emails.accept', ['meeting' => $meeting], function($message){
    		$meeting = Meeting::where('id_meeting', $this->id)->join('users', 'user_id', '=', 'users.id')->first();
    		$message->from('sdbiedermann@bluewin.ch', 'Daniela Biedermann');

    		$message->to($meeting->email);
    	});

    	return redirect('/admin/rendez-vous');
    }

    public function declineRdv($id){
    	$this->id = $id;
    	$meeting = Meeting::where('id_meeting', $id)->join('users', 'user_id', '=', 'users.id')->first();
    	$this->updateRdv($id);
    	Mail::send('emails.decline', ['meeting' => $meeting], function($message){
    		$meeting = Meeting::where('id_meeting', $this->id)->join('users', 'user_id', '=', 'users.id')->first();
    		$message->from('sdbiedermann@bluewin.ch', 'Daniela Biedermann');

    		$message->to($meeting->email);
    	});

    	return redirect('/admin/rendez-vous');
    }

    public function showUpdateNews($slug){
        $news = News::where('slug', $slug)->join('users', 'user_id', '=', 'users.id')->first();
        return view('admin.editNews', ['title' => 'Edition news', 'news' => $news]);
    }

    public function updateNews(Request $request, $slug){
        $this->updateStoredNews($request->all(), $slug);
        return redirect('/admin/news');
    }

    public function deleteNews($slug){
        News::where('slug', $slug)->delete();
        Comment::where('news_slug', $slug)->delete();
        return redirect('/admin/news');
    }

    protected function updateRdv($id){
    	return Meeting::where('id_meeting', $id)->update([
    			'validate' => 1,
    		]);
    }

    protected function createNews(array $data, $name){
        return News::create([
            'title' => $data['title'],
            'content' => $data['content'],
            'image' => $name,
            'slug' => str_slug($data['title']),
            'user_id' => Auth::user()->id,
        ]);
    }

    protected function updateStoredNews(array $data, $slug){
        return News::where('slug', $slug)->update([
            'title' => $data['title'],
            'content' => $data['content'],
            'slug' => str_slug($data['title']),
        ]);
    }
}
