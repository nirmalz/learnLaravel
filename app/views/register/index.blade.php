@extends('layouts.master')

@section('content')

	<h1>Register User</h1>

	{{ Form::open(array('route' => 'register.store')) }}

	    <p>{{ Form::label('username', 'Username') }}
	    {{ Form::text('username') }}</p>
	   
	    <p>{{ Form::label('email', 'Email') }}
	    {{ Form::text('email') }}</p>
	   
	    <p>{{ Form::label('password', 'Password') }}
	    {{ Form::text('password') }}</p>
	   
	    <p>{{ Form::label('password_confirmation', 'Password confirm') }}
	    {{ Form::text('password_confirmation') }}</p>
	   
	    <p>{{ Form::submit('Submit') }}</p>		

    {{ Form::close() }}

		@foreach ($errors->all() as $error) {
			<div>{{ $error }}</div>
		@endforeach

@stop


@section('sidebar')
	
	@parent

	<a href="#">Section Specific lInks</a>

@stop