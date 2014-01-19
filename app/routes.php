<?php

# Gestion des articles
Route::get('/', array('uses' => 'HomeController@accueil', 'as' => 'accueil'));
Route::model('cat', 'Categorie');
Route::get('cat/{cat}', 'HomeController@categorie');
Route::model('art', 'Article');
Route::get('art/{cat_id}/{art}', 'HomeController@article');
Route::post('find', 'HomeController@find');
Route::post('comment', 'HomeController@comment');

//Route::get('profil', array('uses' => 'ProfilController@index', 'as' => 'myprofil'));



Route::get('profil', array('before' => 'auth', function()
{
    echo 'Vous avez bien été identifié '.Auth::user()->username;
}));
Route::get('profil', 'ProfilController@index');

# Gestion des connexions
Route::controller('auth', 'AuthController');
Route::controller('guest', 'GuestController');
//Route::controller('profil', 'ProfilController');



App::missing(function()
{
    return 'Cette page n\'existe pas !';
});