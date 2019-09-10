<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
				<form class="login100-form validate-form" method="POST" action="<?=site_url('home')?>">
					<span class="login100-form-title p-b-33">
                        <img alt="genta petra" src="<?=base_url()?>public/img/images/gentaLogo.png" height="100" width="300"/>
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: lala@gmail.com">
						<input class="input100" type="text" label="Email" name="email"placeholder="Email">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
						<?=form_error('email','<small class="text-danger pl3">','</small>');?>
					</div>

					<div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
						<input class="input100" type="password" label="Password" name="password" placeholder="Password">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
						<?=form_error('password','<small class="text-danger pl3">','</small>');?>
					</div>

					<div class="container-login100-form-btn m-t-20">
						<button type='submit' class="login100-form-btn" value='signin' id='buttonIn'>
							Sign in
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>

<!--===============================================================================================-->
	<script src="<?=base_url()?>public/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>public/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>public/vendor/bootstrap/js/popper.js"></script>
	<script src="<?=base_url()?>public/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>public/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>public/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?=base_url()?>public/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>public/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>public/js/jsLogin/main.js"></script>
<!--===============================================================================================-->