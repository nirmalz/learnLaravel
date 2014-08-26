@extends('layouts.master')

@section('content')

	<h1>Login</h1>

	@if (Session::has('login_errors'))
	    <span class="error">Username or password incorrect.</span>
	@endif
	 
	{{ Form::open(array('route' => 'session.store')) }}
	 
	    <p>{{ Form::label('email', 'Email') }}
	    {{ Form::text('email') }}</p>
	   
	    <p>{{ Form::label('password', 'Password') }}
	    {{ Form::password('password') }}</p>
	   
	    <p>{{ Form::submit('Login') }}</p>
	 
	{{ Form::close() }}

@stop


@section('sidebar')
	
	@parent

	<a href="#">Section Specific lInks</a>

@stop