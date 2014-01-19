@extends('template_blog')

@include('navigation')

@section('content')
<div class="col-md-12">
    <h3>
		Les utilisateurs
    </h3>
</div>
	<div class="col-md-12">
	
<table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Status</th>
			<th>Email</th>
          </tr>
        </thead>
        <tbody>
		@foreach ($users as $user)
          <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->username}}</td>
            <td>{{$user->statut}}</td>
            <td>{{$user->email}}</td>
          </tr>
		@endforeach
        </tbody>
</table>
@stop