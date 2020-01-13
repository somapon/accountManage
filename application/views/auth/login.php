<!DOCTYPE html>
<html lang="en">
<head>
<title>Datta Able - Signin</title>


<!--[if lt IE 10]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="author" content="CodedThemes" />

<link rel="icon" href="<?= base_url() ?>resources/bootstrap/assets/images/favicon.ico" type="image/x-icon">

<link rel="stylesheet" href="<?= base_url() ?>resources/bootstrap/assets/fonts/fontawesome/css/fontawesome-all.min.css">

<link rel="stylesheet" href="<?= base_url() ?>resources/bootstrap/assets/plugins/animation/css/animate.min.css">

<link rel="stylesheet" href="<?= base_url() ?>resources/bootstrap/assets/css/style.css">
<link rel="stylesheet" href="<?= base_url() ?>resources/bootstrap/assets/css/layouts/dark.css">
</head>
<body>									

	<div class="auth-wrapper aut-bg-img" style="background-image: url('<?= base_url() ?>resources/bootstrap/assets/images/bg3.jpg');">
		<div class="auth-content">
			<div class="text-white">
				<div class="card-body text-center">
					<div class="mb-4"><i class="feather icon-unlock auth-icon"></i></div>
					<h3 class="mb-4 text-white">Login</h3>
					<?php echo form_open("Auth/login", array("class" => "form-signin"));?>
					<div class="input-group mb-3">
						<input type="email" name="identity" class="form-control" placeholder="Email">
					</div>
					<div class="input-group mb-4">
						<input type="password" name="password" class="form-control" placeholder="password">
					</div>
					<div class="form-group text-left">
						<div class="checkbox checkbox-fill d-inline">
							<input type="checkbox" name="checkbox-fill-1" id="checkbox-fill-a1" checked="">
							<label for="checkbox-fill-a1" class="cr"> Save credentials</label>
						</div>
					</div>
					<button type="submit" class="btn btn-primary shadow-2 mb-4">Login</button>
					<?php echo form_close();?>
					<p class="mb-2 text-muted">Forgot password? <a class="text-white" href="auth-reset-password-v3.html">Reset</a></p>
					<p class="mb-0 text-muted">Don’t have an account? <a class="text-white" href="auth-signup-v3.html">Signup</a></p>
				</div>
			</div>
		</div>
	</div>

<script src="<?= base_url() ?>resources/bootstrap/assets/js/vendor-all.min.js"></script>
<script src="<?= base_url() ?>resources/bootstrap/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>resources/bootstrap/assets/js/pcoded.min.js"></script>
</body>
</html>
