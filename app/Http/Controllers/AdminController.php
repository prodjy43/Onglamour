<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Meeting;

class AdminController extends Controller
{
    public function showRdv(){
    	$meetings = Meeting::where('validate', 0)->join('users', 'user_id', '=', 'users.id')->get();
    	return view('admin.meetings', ['title' => 'Rendez-vous', 'meetings' => $meetings]);
    }

    public function accpetRdv($id){
    	
    }
}
