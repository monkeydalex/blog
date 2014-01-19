<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>
			Mon joli blog
		</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		{{ HTML::style('//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css') }}
		{{ HTML::style('//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap-theme.min.css') }}
		{{ HTML::style('assets/css/main.css') }}
		{{ HTML::style('http://fonts.googleapis.com/css?family=Imprima') }}
	</head>

	<body>
		<div class="container">

		<div class="jumbotron">
			<h1>Hello, world!</h1>
			<p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
			<p><a href="#" class="btn btn-primary btn-lg" role="button">Learn more »</a></p>
		 </div>

		  <nav class="navbar navbar-default">
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="#">Mon joli blog</a>
		    </div>
		    <div class="collapse navbar-collapse">
		      <ul class="nav navbar-nav">
		        @yield('navigation')
		      </ul>
		      {{ Form::open(array('url' => 'find', 'method' => 'POST', 'class' => 'navbar-form navbar-left pull-right')) }}
					{{ Form::text('find', '', array('class' => 'form-group form-control', 'placeholder' => 'Recherche')) }}
					{{ Form::close() }}
		    </div>
		  </nav>

			<div class="row">
				@yield('content')
			</div>

		  <footer>
		    <em>© 2013</em>
		  </footer>

		</div>
		{{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'); }}
		{{ HTML::script('//netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js'); }}
	</body>
</html>