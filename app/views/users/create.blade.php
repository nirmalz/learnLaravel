@extends('layouts.master')

@section('content')

	<h1>Register User</h1>

	{{ Form::open(array('url' => 'users')) }}

	{{ Form::close() }}

@stop


@section('sidebar')
	
	@parent

	<a href="#">Section Specific lInks</a>

@stop