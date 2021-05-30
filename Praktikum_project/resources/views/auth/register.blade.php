<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{ asset('UserTemplate/images/icons/favicon.ico') }}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('UserTemplate/vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('UserTemplate/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('UserTemplate/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('UserTemplate/vendor/animate/animate.css') }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('UserTemplate/vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('UserTemplate/vendor/animsition/css/animsition.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('UserTemplate/vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('UserTemplate/vendor/daterangepicker/daterangepicker.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('UserTemplate/css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('UserTemplate/css/main.css') }}">
<!--===============================================================================================-->
{!! NoCaptcha::renderJs() !!}

</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-85 p-r-85 p-t-40 p-b-55">
				<form class="login100-form validate-form flex-sb flex-w" method="POST" action="{{ route('register') }}">
                    @csrf

					<span class="login100-form-title p-b-32">
						Register Form
					</span>

                    <span class="txt1 p-b-11">
						Name
					</span>

					<div class="wrap-input100 validate-input m-b-12">
						<input class="input100" id="name" type="text"
                            class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>

					<span class="txt1 p-b-11">
						Email
					</span>

					<div class="wrap-input100 validate-input m-b-12">
						<input class="input100" id="email" type="email"
                            class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email">

						@error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>

                    <span class="txt1 p-b-11">
						Address
					</span>

					<div class="wrap-input100 validate-input m-b-12">
						<input class="input100" id="address" type="text" class="form-control"
                            name="address" required autocomplete="address">
					</div>

                    <span class="txt1 p-b-11">
						Phone Number
					</span>

					<div class="wrap-input100 validate-input m-b-12">
						<input class="input100" id="phone" type="text" class="form-control" 
                            name="phone" required autocomplete="phone" placeholder="ex: +62xxxxx">

                        @if ($message = Session::get('error'))
                            <span class="text-danger">{{ $message }}</span>
                        @endif
					</div>
					
					<span class="txt1 p-b-11">
						Password
					</span>

					<div class="wrap-input100 validate-input m-b-12">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>

						<input class="input100" id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password"
                            required autocomplete="new-password" >
                        
                        <div className={(resetpassword.errors && resetpassword.errors.password) ? 
                            'invalid-feedback d-block' : 'invalid-feedback d-none'}>
                        </div>

						@error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>

                    <span class="txt1 p-b-11">
						Confirm Password
					</span>

					<div class="wrap-input100 validate-input m-b-20">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>

						<input class="input100" id="password-confirm" type="password" class="form-control"
                            name="password_confirmation" required autocomplete="new-password" >
                        
                        <div className={(resetpassword.errors && resetpassword.errors.password_confirmation) ? 
                            'invalid-feedback d-block' : 'invalid-feedback d-none'}>
                        </div>
					</div>
   
                    <!-- google recaptcha -->
                    <div class="flex-sb-m w-full p-b-48 {{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                        <div class="col-md-20" style="margin-left:auto;margin-right:auto">
                            {!! app('captcha')->display() !!}
                            @if ($errors->has('g-recaptcha-response'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" style="margin-left:auto;margin-right:auto">
                        {{ __('Register') }}
						</button>
					</div>
                   
                    <div class="flex-col-c p-t-20" style="margin-left:auto;margin-right:auto">
						<span class="txt2 p-b-10">
                            <p >
							    Already have an account?
                            </p>
						</span>

						<a href="{{ route('login') }}" class="txt3 hov1">
                            <p>
							    Sign in
                            </p>
						</a>
                    </div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="{{ asset('UserTemplate/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('UserTemplate/vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('UserTemplate/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('UserTemplate/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('UserTemplate/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('UserTemplate/vendor/daterangepicker/moment.min.js') }}"></script>
	<script src="{{ asset('UserTemplate/vendor/daterangepicker/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('UserTemplate/vendor/countdowntime/countdowntime.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('UserTemplate/js/main.js') }}"></script>

</body>
</html>