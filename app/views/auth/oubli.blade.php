@extends('template_blog')

@include('navigation')

@section('content')
<div class="col-md-12">
	<div class="page-header">
	  <h1>Oublie du mot de passe <!--<small>Subtext for header</small>--></h1>
	</div>
    <div class="col-md-6">
		<h3>
			Nouveau mot de passe
		</h3>
		@if (!Session::has('flash_notice'))
			<p>
				Il semblerait que vous ayez oublié votre mot de passe. Ne vous affolez pas, nous allons vous donner la possibilité d'en créer un nouveau. Veuillez entrer dans ce formulaire l'adresse mail que vous avez utilisée pour votre inscription :
			</p>
		@endif
	</div>
	<div class="col-md-6">
		@if ($errors->has('email'))
			{{ $errors->first('email', '<div class="alert alert-danger">:message</div>') }}
		@endif
		@if (Session::has('flash_notice'))
			<div class="alert alert-success">
				{{ Session::get('flash_notice') }}
			</div>
		@else
        	{{ Form::open(array('url' => 'guest/oubli', 'method' => 'POST')) }}
			<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
				{{ Form::label('email', 'Mail :', array('class' => 'control-label')) }}
				{{ Form::text('email', 'Email', array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
			{{ Form::submit('Envoyer', array('class' => 'btn btn-default')) }}
			</div>
			{{ Form::close()}}
		@endif
	</div>
</div>
@stop

