@extends('template_blog')

@include('navigation')

@section('content')
<div class="col-md-12">
    @if (Session::has('flash_notice'))
        <div class="alert alert-success">
            {{ Session::get('flash_notice') }}
        </div>
    @endif
    
    @if (Session::has('flash_error'))
        <div class="alert alert-danger">
            {{ Session::get('flash_error') }}
        </div>
    @endif

    @for ($i = 0; $i < count($articles); $i++)
        <div class="col-md-4">
            <h3>{{$articles[$i]->title}}</h3>
            <p>{{$articles[$i]->intro_text}}</p>
            <a class="btn btn-default" href="{{ url('art/'.$actif.'/'.$articles[$i]->id) }}">Lire la suite <span class="glyphicon glyphicon-play"></span></a>
        </div>
    @endfor
    
    @if (method_exists($articles,'links'))
   		{{$articles->links()}}
    @endif
</div> 
@stop

