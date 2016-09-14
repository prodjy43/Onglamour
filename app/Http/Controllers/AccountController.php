<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use Validator;
use App\User;

class AccountController extends Controller
{
	/**
	 * [show user if exist in database]
	 * @param  [string] $nom    [familly name of the user]
	 * @param  [string] $prenom [name of the user]
	 * @return [view]         [return view of the user account]
	 */
    public function show($nom,$prenom)
    {
    	$user = User::where('nom', $nom)->where('prenom', $prenom)->join('grades', 'grade_id', '=', 'grades.id_grade')->first();
    	if ($user === null) {
    		return redirect('/');
    	}else{
    		return view('user.profil', ['user' => $user, 'title' => $nom.' '.$prenom]);
    	}	
    }

    /**
     * [deco deconnect the user actually connected]
     * @return [redirect] [return to home page]
     */
    public function deco(){
        Auth::logout();
        return redirect('/');
    }

    /**
     * [store description]
     * @param  [Request] $request [Sended value from form]
     * @return [redirect]           [redirection on the user account page]
     */
    public function store(Request $request){
    	$this->validator($request->all())->validate();
    	$this->guard()->login($this->create($request->all()));
    	return redirect('/account/'.Auth::user()->nom.'/'.Auth::user()->prenom);
    }

    /**
     * [edit user information]
     * @param  [Request] $request [Sended value from form]
     * @param  [int] $id          [id user edit]
     * @return [redirect]         [redirection on the user account page]
     */
    public function edit(Request $request, $id){
    	$this->validatorEdit($request->all())->validate();
    	$this->update($request->all(), $id);
    	return redirect('/account/'.Auth::user()->nom.'/'.Auth::user()->prenom);
    }

    /**
     * [login an user if the mail and the passord is correct]
     * @param  {Request} $request [Sended value from form]
     * @return [redirect]           [redirect to user account page if the password and email is correct]
     */
    public function login(Request $request){
        if (Auth::attempt(['email' => $request->all()['email'], 'password' => $request->all()['password']])) {
            return redirect('/account/'.Auth::user()->nom.'/'.Auth::user()->prenom);
        }else{
            return redirect('account/login');
        }
    }

     /**
      * [delete user from database]
      * @param  [int] $id [id user to delete in database]
      * @return [redirect]     [redirect to home page]
      */
    public function delete($id){
    	$user = User::findOrFail($id);
    	$user->forceDelete();
    	return redirect('/');
    }

    /**
     * [validator validate information from form]
     * @param  [array]  $data [sended value from form]
     * @return [boolean]       [true if informations are correct false if not]
     */
    protected function validator(array $data){
    	return Validator::make($data, [
    		'nom' => 'required|max:255',
    		'prenom' => 'required|max:255',
    		'pseudo' => 'required|max:255',
    		'email' => 'required|max:255|email',
    		'password' => 'required|min:6',
    		'confirm' => 'required|min:6|same:password',
    	]);
    }

    /**
     * [validator validate information from form]
     * @param  [array]  $data [sended value from form]
     * @return [boolean]       [true if informations are correct false if not]
     */
    protected function validatorEdit(array $data){
        return Validator::make($data, [
            'nom' => 'required|max:255',
            'prenom' => 'required|max:255',
            'pseudo' => 'required|max:255',
            'email' => 'required|max:255|email',
        ]);
    }

    /**
     * [guard stock in session the user]
     * @return [array] [array of information about user]
     */
    protected function guard(){
    	return Auth::guard();
    }

    /**
     * [create user in database]
     * @param  [array]  $data [Sended information from form]
     * @return [boolean]       [true if query pass false if not]
     */
    protected function create(array $data){
    	return User::create([
    		'nom' => $data['nom'],
    		'prenom' => $data['prenom'],
    		'pseudo' => $data['pseudo'],
    		'email' => $data['email'],
    		'password' => bcrypt($data['password']),
    	]);
    }

    /**
     * [update user in database]
     * @param  [array]  $data [Sende information from form]
     * @param  [int] $id   [id user on database]
     * @return [boolean]       [true if query pass false if not]
     */
    protected function update(array $data, $id){
    	return User::where('id', $id)->update([
    		'nom' => $data['nom'],
    		'prenom' => $data['prenom'],
    		'pseudo' => $data['pseudo'],
    		'email' => $data['email'],
    	]);
    }
}
