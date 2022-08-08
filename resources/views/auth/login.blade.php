<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login Sistem SMI Almajara</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="{{ asset('uilogin/css/style.css') }}">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<img class="wave" src="{{asset('uilogin/img/wave.png')}}">
	<div class="container">
		<div class="img">
			<img src="{{ asset('uilogin/img/login1.svg') }}">
		</div>
		<div class="login-content">

			<form method="POST" action="{{ route('login') }}">
				@csrf
                <img src="{{ asset('alma1.png') }}">
				<h2 class="title">PT Almajara Indo Tama</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
					  </div>
					  
           		   <div class="div form-group has-feedback">
           		   		<h5>Email</h5>
							  <input type="text" class="input form-control" name="email" value="{{ old('email') }}">
           		  		 </div>
				   </div>
				   @if ($errors->has('email'))
					<span class="help-block">
						<strong style="color:red;">{{ $errors->first('email') }}</strong>
					</span>
				   @endif

           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
					  </div>
					  
           		   <div class="div form-group has-feedback">
           		    	<h5>Password</h5>
						   <input type="password" class="input form-control" name="password">
					   </div>
					   @if ($errors->has('password'))
						   <span class="help-block">
							   <strong>{{ $errors->first('password') }}</strong>
						   </span>
						@endif   
				</div>
                <a href="{{ url('register') }}">Register</a>
                
                <input type="submit" class="btn">
                
            </form>
        </div>
    </div>
	<!-- <script type="text/javascript" src="js/main.js"></script> -->
	<script src="{{ asset('uilogin/js/main.js') }}"></script>
    <!-- jQuery 3 -->
    <script src="{{asset('adminlte/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{asset('adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- iCheck -->
    <script src="{{asset('adminlte/plugins/iCheck/icheck.min.js')}}"></script>
    <script>	
</body>
</html>
