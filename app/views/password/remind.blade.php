@extends('layouts.master')

@section('content')

	<h1>Request for Forgotton password</h1>

	@if (Session::has('error'))
	  {{ trans(Session::get('reason')) }}
	@elseif (Session::has('success'))
	  An email with the password reset has been sent.
	@endif
	 
	{{ Form::open(array('route' => 'password.request')) }}
	 
	    <p>{{ Form::label('email', 'Email') }}
	    {{ Form::text('email') }}</p>
	   
	    <p>{{ Form::submit('Send Email') }}</p>
	 
	{{ Form::close() }}	


@stop


@section('sidebar')
	
	@parent

	<a href="#">Section Specific lInks</a>

@stop