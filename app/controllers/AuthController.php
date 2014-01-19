<?php

class AuthController extends BaseController {

	public function __construct()
    {
        $this->beforeFilter('auth');
    }
   
    /**
	* Effectue le logout
	*
	* @return Redirect
	*/
	public function getLogout()
	{
        Auth::logout(); 
   		return Redirect::route('accueil')->with('flash_notice', 'Vous avez été correctement déconnecté.');
	}

}