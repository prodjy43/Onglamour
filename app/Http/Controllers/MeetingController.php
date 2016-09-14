<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Meeting;
use Validator;

class MeetingController extends Controller
{
	public function store(Request $request){
		$this->validator($request->all())->validate();
    	$this->create($request->all());
    	return redirect('/');
	}

	protected function validator(array $data){
    	return Validator::make($data, [
    		'forfait' => 'required',
    		'date' => 'required|date_format:"d/m/Y"',
    		'heure' => 'required|date_format:"H/i"',
    	]);
    }
	protected function create(array $data){
    	return Meeting::create([
    		'forfait' => $data['forfait'],
    		'date' => $data['date'],
    		'heure' => $data['heure'],
    		'user_id' => Auth::user()->id,
    	]);
    }
}
