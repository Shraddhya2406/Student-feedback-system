@extends('layouts.app')

@section('content')
<div class="text">
		<h1>Student Feedback System</h1>
</div>
	<div class="main-body">
		<div class="img_3">
			<img style="height: 100%; width: 100%; 	padding-top: 50px;" src="{{ asset('images/img_3.jpg') }}">
		</div>
		<div class="sign-up-form">
			<form method="POST" action="/signin">
          	 @csrf
				<div class="pid"></div>
				<select>
					<option>Student</option>
					<option>Faculty</option>
					<option>Admin</option>
				</select>
				<input type="email" class="input1-box" placeholder="Enter Your Email"></br>
				<input type="password" class="input-box" placeholder="Enter Your Password"></br>
				<button type="button" class="signup-btn">Login</button>
				<hr>
				<p><a href="#">Not an User ?</a><a href="#">Register</a></p>
				<div class="pic"><img src="{{ asset('images/img_2.jpg') }}"></div>
			</form>
		</div>
	</div>

@endsection
