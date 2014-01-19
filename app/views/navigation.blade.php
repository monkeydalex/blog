@section('navigation')
    
  <li>{{ link_to_route('accueil', 'Accueil', null, ($actif == 0)? array('class' => 'actif'): null) }}</li>
  
  @foreach ($categories as $categorie)
    <li>{{ link_to('cat/'.$categorie->id, $categorie->title, ($actif == $categorie->id)? array('class' => 'actif'): null) }}</li>
  @endforeach
  @if (Auth::check())
    <li>{{ link_to('auth/logout', 'Deconnexion') }}</li>
	<li>{{ link_to('profil', 'Mon profil') }}</li>
  @else
    <li>{{ link_to('guest/login', 'Connexion', ($actif == -1)? array('class' => 'actif'): null) }}</li>
  @endif
@stop


