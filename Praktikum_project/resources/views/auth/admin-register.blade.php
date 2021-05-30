<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin Register</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
<link rel="icon" type="image/png" href="{{ asset('AdminTemplate/images/icons/favicon.ico') }}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('AdminTemplate/vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('AdminTemplate/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('AdminTemplate/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('AdminTemplate/vendor/animate/animate.css') }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('AdminTemplate/vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('AdminTemplate/vendor/animsition/css/animsition.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('AdminTemplate/vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('AdminTemplate/vendor/daterangepicker/daterangepicker.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('AdminTemplate/css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('AdminTemplate/css/main.css') }}">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-30 p-b-30">
				<form class="login100-form" method="POST" action="{{ route('admin.register.submit') }}">
                    @csrf

					<span class="login100-form-title p-b-40">
						Admin Register
					</span>

					<div class="wrap-input100  m-b-16">
						<input class="input100" placeholder="Name" id="name" type="text"
                            class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name') }}" required autocomplete="name" autofocus>
                            
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
					</div>

                    <div class="wrap-input100 m-b-16">
						<input class="input100" placeholder="Email" id="email" type="email"
                            class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email">
                            
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror						
					</div>

                    <div class="wrap-input100 m-b-16">
						<input class="input100" placeholder="Phone (ex: +62xxxxxxx)" id="phone" type="text" class="form-control"
                            name="phone" required autocomplete="phone">

                            @if ($message = Session::get('error'))
                                <span class="text-danger">{{ $message }}</span>
                            @endif
					</div>

					<div class="wrap-input100 validate-input m-b-20">
						<span class="btn-show-pass">
							<i class="fa fa fa-eye"></i>
						</span>

						<input class="input100" placeholder="Password" id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password"
                            required autocomplete="new-password">

                            <div className={(resetpassword.errors && resetpassword.errors.password) ? 
                                'invalid-feedback d-block' : 'invalid-feedback d-none'}>
                            </div>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
					</div>

                    <div class="wrap-input100 validate-input m-b-20">
						<span class="btn-show-pass">
							<i class="fa fa fa-eye"></i>
						</span>

						<input class="input100" placeholder="Confirm Password" id="password-confirm" type="password" class="form-control"
                            name="password_confirmation" required autocomplete="new-password">

                            <div className={(resetpassword.errors && resetpassword.errors.password_confirmation) ? 
                                'invalid-feedback d-block' : 'invalid-feedback d-none'}>
                            </div>                                  
                    </div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Register
						</button>
					</div>
					
					<div class="flex-col-c p-t-50">
						<span class="txt2 p-b-10">
							Already have an account?
						</span>

						<a href="{{ route('admin.login') }}" class="txt3 hov1">
							Sign In
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
<script src="{{ asset('AdminTemplate/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('AdminTemplate/vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('AdminTemplate/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('AdminTemplate/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('AdminTemplate/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('AdminTemplate/vendor/daterangepicker/moment.min.js') }}"></script>
	<script src="{{ asset('AdminTemplate/vendor/daterangepicker/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('AdminTemplate/vendor/countdowntime/countdowntime.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('AdminTemplate/js/main.js') }}"></script>

</body>
</html>