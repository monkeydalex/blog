@extends('template_blog')

@include('navigation')

@section('content')
<div class="col-md-12">
	<div class="page-header">
	  <h1>Connexion <!--<small>Subtext for header</small>--></h1>
	</div>
    <p>
        Pour vous connecter au site veuillez entrer votre pseudo et votre mot de passe dans le formulaire ci-dessous :
    </p>
            @if (Session::has('flash_error'))
                <div class="alert alert-danger">
                    {{ Session::get('flash_error') }}
                </div>
            @endif
            {{ Form::open(array('url' => 'guest/login', 'method' => 'POST')) }}
            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                {{ Form::label('username', 'Pseudo :', array('class' => 'control-label')) }}
                {{ Form::text('username', 'Pseudo',  array('class' => 'form-control')) }}
            </div>
            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                {{ Form::label('password', 'Mot de passe :', array('class' => 'control-label')) }}
                {{ Form::password('password',  array('class' => 'form-control')) }}
            </div>
            {{ Form::submit('Envoyer', array('class' => 'btn btn-success pull-right')) }}
            {{ Form::close()}}
            <p>
                {{ link_to('guest/oubli', 'J\'ai oublié mon mot de passe...', array('class' => 'btn btn-success')) }}
            </p>
    <p>
        Si vous n'avez pas encore de compte vous pouvez en créer un en cliquant sur ce bouton :
        {{ link_to('guest/inscription', 'Je m\'inscris !', array('class' => 'btn btn-info')) }}
    </p>
</div>  
@stop

