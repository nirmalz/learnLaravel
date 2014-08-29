@extends('layouts.master')

@section('content')

	<h1>Password Reset Page</h1>

	@if (Session::has('error'))
	    {{ trans(Session::get('reason')) }}
	@endif
	 
	{{ Form::open(array('route' => array('password.update', $token))) }}
	 
	    <p>{{ Form::label('email', 'Email') }}
	    {{ Form::text('email') }}</p>
	   
	    <p>{{ Form::label('password', 'Password') }}
	    {{ Form::text('password') }}</p>
	   
	    <p>{{ Form::label('password_confirmation', 'Password confirm') }}
	    {{ Form::text('password_confirmation') }}</p>
	   
	    {{ Form::hidden('token', $token) }}
	   
	    <p>{{ Form::submit('Submit') }}</p>
	 
	{{ Form::close() }}

@stop


@section('sidebar')
	
	@parent

	<a href="#">Section Specific lInks</a>

@stop