@extends('main')
@section('content')
	<form role="form" method="POST" action="/auth/login">
		{!! csrf_field() !!}
		<div class="form-group">
		  	<label for="email">Email</label>
		   	<input type="email" class="form-control" name="email" value="{{ old('email') }}">
		</div>
		<div class="form-group">
		  	<label for="password">Password</label>
		   	<input type="password" class="form-control" name="password" id="password">
		</div>
		<div class="form-group">
		  	<label for="remember_me">Remember me</label>
		   	<input type="checkbox" name="remember">
		</div>
		<div class="form-group">
		  	<button type="submit" class="btn btn-success" >Login</button>
		</div>
	</form>
@endsection