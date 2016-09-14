<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests;
use App\Meeting;

class AdminController extends Controller
{
	private $id;

    public function showRdv(){
    	$meetings = Meeting::where('validate', 0)->join('users', 'user_id', '=', 'users.id')->get();
    	return view('admin.meetings', ['title' => 'Rendez-vous', 'meetings' => $meetings]);
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

    protected function updateRdv($id){
    	return Meeting::where('id_meeting', $id)->update([
    			'validate' => 1,
    		]);
    }
}
