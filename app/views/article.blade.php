@extends('template_blog')

@include('navigation')

@section('content')

	<div class="col-md-12">
		<div class="well">
			<em class="pull-right">
				Ecrit le {{date('d-m-Y',strtotime($article->created_at))}}
			</em>
			<h3>
				{{$article->title}}
			</h3>
			<p>
				{{$article->full_text}}
			</p>
		</div>
	</div>

@foreach ($comments as $comment)
	<div class="col-md-12">
		<div class="comment">
			<em class="pull-right">
				Ecrit par {{$comment->username}} le {{date('d-m-Y',strtotime($comment->created_at))}}
			</em>
			<h5>
				{{$comment->title}}
			</h5>
			<p>
				{{$comment->text}}
			</p>
		</div>
	</div>
@endforeach

@if ($article->allow_comment and Auth::check())
<hr />
	<div class="col-md-12">
		<div class="well">
      {{ Form::open(array('url' => 'comment')) }}
			{{ Form::hidden('id_art', $article->id) }}
			{{ Form::hidden('id_cat', $actif) }}
			{{ Form::label('title', 'Titre de votre commentaire :') }}
			{{ Form::text('title', '', $attributes = array('class' => 'form-control')) }}
			{{ Form::label('comment', 'Votre commentaire :') }}
			{{ Form::textarea('comment', '', $attributes = array('class' => 'form-control')) }}
			{{ Form::submit('Envoyer', array('class' => 'btn btn-default')) }}
			{{ Form::close() }}
		</div>
	</div>
@endif

@stop