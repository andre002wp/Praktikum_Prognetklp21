<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?php echo e(asset('UserTemplate/images/icons/favicon.ico')); ?>"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('UserTemplate/vendor/bootstrap/css/bootstrap.min.css')); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('UserTemplate/fonts/font-awesome-4.7.0/css/font-awesome.min.css')); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('UserTemplate/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('UserTemplate/vendor/animate/animate.css')); ?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('UserTemplate/vendor/css-hamburgers/hamburgers.min.css')); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('UserTemplate/vendor/animsition/css/animsition.min.css')); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('UserTemplate/vendor/select2/select2.min.css')); ?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('UserTemplate/vendor/daterangepicker/daterangepicker.css')); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('UserTemplate/css/util.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('UserTemplate/css/main.css')); ?>">
<!--===============================================================================================-->
<?php echo NoCaptcha::renderJs(); ?>


</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-85 p-r-85 p-t-40 p-b-55">
				<form class="login100-form validate-form flex-sb flex-w" method="POST" action="<?php echo e(route('register')); ?>">
                    <?php echo csrf_field(); ?>

					<span class="login100-form-title p-b-32">
						Register Form
					</span>

                    <span class="txt1 p-b-11">
						Name
					</span>

					<div class="wrap-input100 validate-input m-b-12">
						<input class="input100" id="name" type="text"
                            class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name"
                            value="<?php echo e(old('name')); ?>" required autocomplete="name" autofocus>

                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
					</div>

					<span class="txt1 p-b-11">
						Email
					</span>

					<div class="wrap-input100 validate-input m-b-12">
						<input class="input100" id="email" type="email"
                            class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email"
                            value="<?php echo e(old('email')); ?>" required autocomplete="email">

						<?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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

                        <?php if($message = Session::get('error')): ?>
                            <span class="text-danger"><?php echo e($message); ?></span>
                        <?php endif; ?>
					</div>
					
					<span class="txt1 p-b-11">
						Password
					</span>

					<div class="wrap-input100 validate-input m-b-12">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>

						<input class="input100" id="password" type="password"
                            class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password"
                            required autocomplete="new-password" >
                        
                        <div className={(resetpassword.errors && resetpassword.errors.password) ? 
                            'invalid-feedback d-block' : 'invalid-feedback d-none'}>
                        </div>

						<?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
                    <div class="flex-sb-m w-full p-b-48 <?php echo e($errors->has('g-recaptcha-response') ? ' has-error' : ''); ?>">
                        <div class="col-md-20" style="margin-left:auto;margin-right:auto">
                            <?php echo app('captcha')->display(); ?>

                            <?php if($errors->has('g-recaptcha-response')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('g-recaptcha-response')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" style="margin-left:auto;margin-right:auto">
                        <?php echo e(__('Register')); ?>

						</button>
					</div>
                   
                    <div class="flex-col-c p-t-20" style="margin-left:auto;margin-right:auto">
						<span class="txt2 p-b-10">
                            <p >
							    Already have an account?
                            </p>
						</span>

						<a href="<?php echo e(route('login')); ?>" class="txt3 hov1">
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
	<script src="<?php echo e(asset('UserTemplate/vendor/jquery/jquery-3.2.1.min.js')); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo e(asset('UserTemplate/vendor/animsition/js/animsition.min.js')); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo e(asset('UserTemplate/vendor/bootstrap/js/popper.js')); ?>"></script>
	<script src="<?php echo e(asset('UserTemplate/vendor/bootstrap/js/bootstrap.min.js')); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo e(asset('UserTemplate/vendor/select2/select2.min.js')); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo e(asset('UserTemplate/vendor/daterangepicker/moment.min.js')); ?>"></script>
	<script src="<?php echo e(asset('UserTemplate/vendor/daterangepicker/daterangepicker.js')); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo e(asset('UserTemplate/vendor/countdowntime/countdowntime.js')); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo e(asset('UserTemplate/js/main.js')); ?>"></script>

</body>
</html><?php /**PATH C:\Users\asus\OneDrive\Dokumen\GitHub\Praktikum_Prognetklp21\Praktikum_project\resources\views/auth/register.blade.php ENDPATH**/ ?>