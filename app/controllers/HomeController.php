<?php

class HomeController extends BaseController {

    /**
	* Génère la vue de l'accueil
	*
	* @param $articles
	* @return View
	*/    
	private function gen_accueil($articles)
    {
    	return View::make('accueil',  array(
	        'categories' => Categorie::all(),
	        'articles' => $articles,
	        'actif' => 0
	    ));
    }

    /**
	* Affiche la page d'accueil
	*
	* @return View
	*/
	public function accueil()
	{
        $articles = Article::select('id', 'title', 'intro_text')
                            ->orderBy('created_at', 'desc')
                            ->paginate(4);
	    return $this->gen_accueil($articles);
	}

    /**
	* Affiche les articles d'une catégorie
	*
	* @param $categorie
	* @return View
	*/
	public function categorie(Categorie $categorie)
	{
		$articles = $categorie->articles()->orderBy('created_at', 'desc')->paginate(4);
    	return View::make('accueil', array('categories' => Categorie::all(), 'articles' => $articles, 'actif' => $categorie->id));
	}

    /**
	* Affiche un article
	*
	* @param $cat_id
	* @param $article
	* @return View
	*/
	public function article($cat_id, Article $article)
	{
	    $comments = $article->comments()->orderBy('comments.created_at', 'desc')
	                                    ->join('users', 'users.id', '=', 'comments.user_id')
	                                    ->select('users.username', 'title', 'text', 'comments.created_at')
	                                    ->get();
	    return View::make('article', array('categories' => Categorie::all(), 'article' => $article, 'actif' => $cat_id, 'comments' => $comments));
	}

    /**
	* Traitement du formulaire de recherche
	*
	* @return View ou Redirect
	*/
	public function find()
	{
		$match = Input::get('find');
	    if($match) {
	        $articles = Article::select('id', 'title', 'intro_text')
			                    ->orderBy('created_at', 'desc')
			                    ->where('intro_text', 'like', '%'.$match.'%')
			                    ->orwhere('full_text', 'like', '%'.$match.'%')
			                    ->get(); 
			Session::flash('flash_notice', 'Résultats pour la recherche du terme '.$match);
			return $this->gen_accueil($articles);
	    } else {
	        return Redirect::to('/')->with('flash_error', 'Il faudrait entrer un terme pour la recherche !');
	    }
	}

    /**
	* Traitement du formulaire d'ajout de commentaires
	*
	* @return Redirect
	*/
	public function comment()
	{
	    Comment::create(array(
            'title' => Input::get('title'),
            'user_id' => Auth::user()->id,
            'article_id' => Input::get('id_art'),
            'text' => Input::get('comment')
        )); 
        return Redirect::to(url('art', array(Input::get('id_cat'), Input::get('id_art'))));
	}

}