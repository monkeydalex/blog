<?php

class GuestController extends BaseController {

	public function __construct()
    {
        $this->beforeFilter('guest');
        $this->beforeFilter('csrf', array('on' => 'post'));
    }

    /**
	* Affiche le formulaire de login
	*
	* @return View
	*/
	public function getLogin()
	{
        return View::make('auth.login', array('categories' => Categorie::all(), 'actif' =>-1)); 
	}

    /**
	* Affiche le formulaire d'oubli
	*
	* @return View
	*/
	public function getOubli()
	{
        return View::make('auth.oubli', array('categories' => Categorie::all(), 'actif' =>-1)); 
	}

    /**
	* Affiche le formulaire d'inscription
	*
	* @return View
	*/
	public function getInscription()
	{
        return View::make('auth.inscription', array('categories' => Categorie::all(), 'actif' => -1)); 
	}

    /**
	* Affiche le formulaire de reset
	*
	* @param $token
	* @return View
	*/
	public function getReset($token)
	{
	    return View::make('auth.reset', array(
	        'categories' => Categorie::all(),
	        'actif' => -1,
	        'token' => $token
	    )); 
	}

    /**
	* Traitement du formulaire de login
	*
	* @return Redirect
	*/
	public function postLogin()
	{
        $user = array('username' => Input::get('username'), 'password' => Input::get('password'));
        if (Auth::attempt($user)) {
            return Redirect::route('accueil')
                ->with('flash_notice', 'Vous avez été correctement connecté avec le pseudo ' . Auth::user()->username);
        }
        return Redirect::to('guest/login')->with('flash_error', 'Pseudo ou mot de passe non correct !')->withInput(Input::except('password'));       
	}

    /**
	* Traitement du formulaire d'oubli
	*
	* @return Redirect
	*/
	public function postOubli()
	{
		$v = User::validateMail(Input::all()); 
		if ($v->passes()) {
			return Password::remind(array('email' => Input::get('email')), function($message) {
                $message->subject('Votre nouveau mot de passe');
            })->with('flash_notice', 'Un mail vous a été envoyé, veuillez suivre ses indications pour renouveler votre mot de passe.'); 	
		} else {
			return Redirect::to('guest/oubli')->withErrors($v);
		}     
	}

    /**
	* Traitement du formulaire de reset
	*
	* @return Redirect
	*/
	public function postReset()
	{
	    $credentials = array('email' => Input::get('mail')); 
	    return Password::reset($credentials, function ($user, $password) {
	        $user->password = Hash::make($password); 
	        $user->save(); 
	        return Redirect::route('accueil')
	            ->with('flash_notice', 'Votre nouveau mot de passe à bien été enregistré. Vous pouvez maintenant vous connecter.'); 
	    })->withInput();       
	}

    /**
	* Traitement du formulaire d'inscription
	*
	* @return Redirect
	*/
	public function postInscription()
	{
        $v = User::validate(Input::all()); 
        if ($v->passes()) {
            $user = new User; 
            $user->username = Input::get('username'); 
            $user->email = Input::get('email'); 
            $user->password = Hash::make(Input::get('password')); 
            $user->save(); 
            return Redirect::route('accueil')->with('flash_notice', 'Votre compte a été créé.'); 
        } else {
            return Redirect::to('guest/inscription')->withErrors($v)->withInput(Input::only('username', 'email')); 
        }     
	}
   
}