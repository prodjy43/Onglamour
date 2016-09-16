<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    $news = App\News::join('users', 'user_id', '=', 'users.id')->orderBy('news.created_at', 'desc')->limit(4)->get();
    return view('welcome' , ['title' => 'Accueil', 'news' => $news]);
});

Route::get('/galerie', function(){
    $files = File::files('images/galerie');
    return view('galerie', ['title' => 'galerie photo', 'files' => $files]);
});


Route::group(['prefix' => 'account'], function() {
    Route::get('{nom}/{prenom}', 'AccountController@show')->middleware('auth');

    Route::post('register','AccountController@store')->middleware('guest');

    Route::get('register', function(){
    	return view('user.register', ['title' => 'inscription']);
    })->middleware('guest');

    Route::post('login','AccountController@login')->middleware('guest');

    Route::get('login', function(){
    	return view('user.login', ['title' => 'connexion']);
    })->middleware('guest');

    Route::get('logout', 'AccountController@deco')->middleware('auth');

    Route::put('edit/{id}','AccountController@edit')->middleware('auth');

    Route::delete('delete/{id}','AccountController@delete')->middleware('auth');
});

Route::group(['prefix' => 'rdv', 'middleware' => 'auth'], function() {
    Route::get('nouveau-rendez-vous', function(){
    	$forfait = [
    		'Adultes' => [
    			'Adultes Pose complete' => 'Pose complète : 70.-',
    			'Adultes Remplissage' => 'Remplissage : 50.-',
    			'Adultes Deco' => 'Déco : 10.-',
    			'Adultes Pieds' => 'Pieds : 30.-',
    			'Adultes Pieds + Mains' => 'Pieds + Mains : rabais 5.-',
    			'Adultes Dépose de gel' => 'Dépose de gel : 10.-',
    		],
    		'Etudiantes' => [
    			'Etudiantes Pose complete' => 'Pose complète : 50.-',
    			'Etudiantes Remplissage' => 'Remplissage : 30.-',
    			'Etudiantes Deco' => 'Déco : 5.-',
    			'Etudiantes Pieds' => 'Pieds : 20.-',
    			'Etudiantes Pieds + Mains' => 'Pieds + Mains : rabais 5.-',
    			'Etudiantes Dépose de gel' => 'Dépose de gel : 10.-',
    		],
    		'Enfants' => [
    			'Enfants Remplissage et deco' => 'Remplissage et déco pour 20.-'
    		]
    	];
    	return view('rdv.new', ['title' => 'Nouveau rendez vous', 'forfait' => $forfait]);
    });

    Route::post('store', 'MeetingController@store');
});

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
    Route::get('rendez-vous', 'AdminController@showRdv');

    Route::get('rendez-vous/accept/{id}', 'AdminController@acceptRdv');

    Route::get('rendez-vous/decline/{id}', 'AdminController@declineRdv');

    Route::get('news', 'AdminController@showNews');

    Route::post('news/add', 'AdminController@storeNews');

    Route::get('news/edit/{slug}', 'AdminController@showUpdateNews');

    Route::put('news/edit/{slug}', 'AdminController@updateNews');

    Route::get('news/delete/{slug}', 'AdminController@deleteNews');

    Route::get('galerie', 'AdminController@ShowGalerie');

    Route::post('galerie/add', 'AdminController@storeGalerie');
});

Route::group(['prefix' => 'blog'], function() {
    Route::get('', 'blogController@showAll');

    Route::get('{slug}', 'blogController@show');

    Route::post('{slug}', 'blogController@postCom')->middleware('auth');

    Route::get('edit/{id}', 'blogController@editForm')->middleware('auth');

    Route::put('edit/{id}', 'blogController@editCom')->middleware('auth');
});