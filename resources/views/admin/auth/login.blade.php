<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login Page in HTML with CSS Code Example</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"><link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
<div class="box-form">
	<div class="left">
		<div class="overlay">
		<h1>Hello World.</h1>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
		Curabitur et est sed felis aliquet sollicitudin</p>
		<span>
			<p>login with social media</p>
			<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
			<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i> Login with Twitter</a>
		</span>
		</div>
	</div>
		<div class="right">
		<h5>Login</h5>
	      <form method="POST" action="{{ route('admincustomlogin') }}">
                @csrf
                <div class="inputs">
                <div class="form-floating mb-3">

                    <input class="form-control" id="inputEmail" type="email" name="email"
                        value="{{ old('email') }}" placeholder="name@example.com" required />

                    @error('email')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" id="inputPassword" type="password" name="password"
                    placeholder="Password" required />

                    @error('password')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror

                </div>
                <br>
                <div class="remember-me--forget-password">
                    <!-- Angular -->
        <label>
            <input type="checkbox" name="item" checked/>

        </label>
            </div>
<br>
<br>
                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                    <a class="small" class="text-checkbox " href="{{ route('forgetpassword') }}" style="color:rgb(255, 255, 255)">Forgot Password?</a>
                    <button type="submit" class="btn btn-primary">Login</a>
                </div>
            </div>
            </form>
	</div>
</div>
</div>
</div>
@include('admin.layouts.login.scripts')
<!-- partial -->
</body>
</html>








