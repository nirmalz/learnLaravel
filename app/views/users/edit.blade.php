<!DOCTYPE html>
<html>
	<head>
		<title>Edit User</title>
	</head>

	<body>
		
		<h1>Edit User</h1>

		{{ Form::model($user, array('action' => array('UserController@update', $user->id))) }}
			
			{{ Form::label('username', 'Username:') }}
            {{ Form::text('username') }}
			<br>
            {{ Form::label('email', 'Email Address:') }}
            {{ Form::text('email') }}
			<br>
			{{ Form::label('password', 'Password:') }}
            {{ Form::password('password') }}

		{{ Form::close() }}

	</body>

</html>