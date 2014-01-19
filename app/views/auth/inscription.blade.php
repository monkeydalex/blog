@extends('template_blog')

@include('navigation')

@section('content')
<div class="col-md-12">
	<div class="page-header">
	  <h1>Inscription au site <!--<small>Subtext for header</small>--></h1>
	</div>
    <div class="col-md-6">
            @if ($errors->count() > 0)
                <div class="alert alert-danger">
                @foreach($errors->all() as $message)
                    {{ $message }}<br />
                @endforeach           
                </div>
			@else
	<p>Pour vous inscrire veuillez remplir ce formulaire :</p>
            @endif
	</div>
    <div class="col-md-6">
            {{ Form::open(array('url' => 'guest/inscription', 'method' => 'POST')) }}
    		<div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
    			{{ Form::label('username', 'Pseudo :', array('class' => 'control-label')) }}
    			{{ Form::text('username', 'Username', array('class' => 'form-control')) }}
    		</div>
    		<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
    			{{ Form::label('email', 'Mail :', array('class' => 'control-label')) }}
    			{{ Form::text('email', 'Email', array('class' => 'form-control')) }}
    		</div>
    		<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
    			{{ Form::label('password', 'Mot de passe :', array('class' => 'control-label')) }}
    			{{ Form::password('password',  array('class' => 'form-control')) }}
    		</div>
    		<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
    			{{ Form::label('password_confirmation', 'Confirmation passe :', array('class' => 'control-label')) }}
    			{{ Form::password('password_confirmation',  array('class' => 'form-control')) }}
    		</div>
    		{{ Form::submit('Envoyer', array('class' => 'btn btn-success pull-right')) }}
    		{{ Form::close()}}
    	</div>
    </div>
</div>
@stop