<?php

	$details = $this->ion_auth_model->user_details($this->session->userdata('user_id'));
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Voucher</title>


		<!--[if lt IE 11]>
				<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
				<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
				<![endif]-->

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="description" content="Datta Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
		<meta name="keywords" content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, datta able, datta able bootstrap admin template">
		<meta name="author" content="Codedthemes" />

		<link rel="icon" href="<?= base_url() ?>resources/bootstrap/assets/images/favicon.ico" type="image/x-icon">

		<link rel="stylesheet" href="<?= base_url() ?>resources/bootstrap/assets/fonts/fontawesome/css/fontawesome-all.min.css">

		<link rel="stylesheet" href="<?= base_url() ?>resources/bootstrap/assets/plugins/animation/css/animate.min.css">

		<link rel="stylesheet" href="<?= base_url() ?>resources/bootstrap/assets/css/style.css">
		<link rel="stylesheet" href="<?= base_url() ?>resources/bootstrap/assets/plugins/data-tables/css/datatables.min.css">
		<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">-->
		<link rel="stylesheet" href="<?= base_url() ?>resources/bootstrap/assets/css/dropify.css">
		<link rel="stylesheet" href="<?= base_url() ?>resources/bootstrap/assets/plugins/bootstrap-datetimepicker/css/bootstrap-datepicker3.min.css">

	</head>
	<body>
		<div class="loader-bg">
			<div class="loader-track">
				<div class="loader-fill"></div>
			</div>
		</div>

		<header class="navbar pcoded-header navbar-expand-lg navbar-light header-dark">
			<div class="m-header">
				<a class="mobile-menu" id="mobile-collapse1" href="#!"><span></span></a>
				<a href="<?= site_url('Home'); ?>" class="b-brand">
					<div class="b-bg">
					<i class="feather icon-trending-up"></i>
					</div>
					<span class="b-title">Voucher</span>
				</a>
			</div>
			<a class="mobile-menu" id="mobile-header" href="#!">
				<i class="feather icon-more-horizontal"></i>
			</a>
			<div class="collapse navbar-collapse">
				<!--<ul class="navbar-nav mr-auto">
					<li><a href="#!" class="full-screen" onclick="javascript:toggleFullScreen()"><i class="feather icon-maximize"></i></a></li>
					<li class="nav-item dropdown">
						<a class="dropdown-toggle" href="#" data-toggle="dropdown">Dropdown</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="#!">Action</a></li>
							<li><a class="dropdown-item" href="#!">Another action</a></li>
							<li><a class="dropdown-item" href="#!">Something else here</a></li>
						</ul>
					</li>
					<li class="nav-item">
						<div class="main-search">
							<div class="input-group">
								<input type="text" id="m-search" class="form-control" placeholder="Search . . .">
								<a href="#!" class="input-group-append search-close">
									<i class="feather icon-x input-group-text"></i>
								</a>
								<span class="input-group-append search-btn btn btn-primary">
									<i class="feather icon-search input-group-text"></i>
								</span>
							</div>
						</div>
					</li>
				</ul>-->
				<ul class="navbar-nav ml-auto">
					<!--<li>
						<div class="dropdown">
							<a class="dropdown-toggle" href="#" data-toggle="dropdown"><i class="icon feather icon-bell"></i></a>
							<div class="dropdown-menu dropdown-menu-right notification">
								<div class="noti-head">
									<h6 class="d-inline-block m-b-0">Notifications</h6>
									<div class="float-right">
										<a href="#!" class="m-r-10">mark as read</a>
										<a href="#!">clear all</a>
									</div>
								</div>
								<ul class="noti-body">
									<li class="n-title">
										<p class="m-b-0">NEW</p>
									</li>
									<li class="notification">
										<div class="media">
											<img class="img-radius" src="../assets/images/user/avatar-1.jpg" alt="Generic placeholder image">
											<div class="media-body">
												<p><strong>John Doe</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>30 min</span></p>
												<p>New ticket Added</p>
											</div>
										</div>
									</li>
									<li class="n-title">
										<p class="m-b-0">EARLIER</p>
									</li>
									<li class="notification">
										<div class="media">
											<img class="img-radius" src="../assets/images/user/avatar-2.jpg" alt="Generic placeholder image">
											<div class="media-body">
												<p><strong>Joseph William</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>30 min</span></p>
												<p>Prchace New Theme and make payment</p>
											</div>
										</div>
									</li>
									<li class="notification">
										<div class="media">
											<img class="img-radius" src="../assets/images/user/avatar-3.jpg" alt="Generic placeholder image">
											<div class="media-body">
												<p><strong>Sara Soudein</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>30 min</span></p>
												<p>currently login</p>
											</div>
										</div>
									</li>
								</ul>
								<div class="noti-footer">
									<a href="#!">show all</a>
								</div>
							</div>
						</div>
					</li>-->
					<li><a href="#!" class="displayChatbox"><i class="icon feather icon-mail"></i></a></li>
					<li>
						<div class="dropdown drp-user">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="icon feather icon-settings"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-right profile-notification">
								<div class="pro-head">
								<?php
									if($details[0]->image){ ?>
										<img src="<?php echo base_url();?>upload/user/<?php echo $details[0]->image;?>" class="img-radius" alt="User-Profile-Image">
								<?php }else{ ?>
									
										<img src="<?php echo base_url();?>upload/user/Login_Pic.png" class="img-radius" alt="User-Profile-Image">
									
								<?php }
								?>
									<span><?php echo $this->session->userdata('full_name');?></span>
									<a href="<?= site_url('Auth/logout'); ?>" class="dud-logout" title="Logout">
									<i class="feather icon-log-out"></i>
									</a>
								</div>
								<!--<ul class="pro-body">
									<li><a href="#!" class="dropdown-item"><i class="feather icon-settings"></i> Settings</a></li>
									<li><a href="<?= site_url('Auth/user_profile'); ?>" class="dropdown-item"><i class="feather icon-user"></i> Profile</a></li>
									<li><a href="message.html" class="dropdown-item"><i class="feather icon-mail"></i> My Messages</a></li>
									<li><a href="auth-signin.html" class="dropdown-item"><i class="feather icon-lock"></i> Lock Screen</a></li>
								</ul>-->
							</div>
						</div>
					</li>
				</ul>
			</div>
		</header>
