<!--<div class="app-body">
    <div class="sidebar">
        <nav class="sidebar-nav">
            <?php //echo $this->menu->dynamicMenu(); ?>
        </nav>
    </div>

   <main class="main">-->
   
   
   
   
   
   
 <!-- Sidebar menu-->
 <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
 <aside class="app-sidebar mCustomScrollbar _mCS_1 mCS-autoHide" style="overflow: visible;">
	<div id="mCSB_1" class="mCustomScrollBox mCS-minimal mCSB_vertical mCSB_outside" style="max-height: none;" tabindex="0">
		<?php $user = $this->ion_auth->user()->row();?>
		<div id="mCSB_1_container" class="mCSB_container" style="position:relative; top:0; left:0;" dir="ltr"> 
			<div class="app-sidebar__user pb-0"> 
				<div class="user-body">
				<?php if ($user->image != '' && file_exists('./upload/user/' . $user->image)) { ?>
					<span class="avatar avatar-xxl brround text-center cover-image" data-image-src="<?= base_url() ?>/upload/user/<?= $user->image; ?>" style="background: url(&quot;https://www.spruko.com/demo/hogo/assets/images/users/female/33.png&quot;) center center;"></span> 
				<?php }else{ ?>
					<span class="avatar avatar-xxl brround text-center cover-image" data-image-src="<?= base_url('upload/user/Login_Pic.png'); ?>" style="background: url('../upload/user/Login_Pic.png') center center;"></span>
				<?php } ?>
				</div> 
				<div class="user-info"> 
					<a href="#" class="ml-2">
					<span class="text-dark app-sidebar__user-name font-weight-semibold"><?php echo $user->first_name . ' ' .$user->last_name;?></span><br>
					<span class="text-muted app-sidebar__user-name text-sm"> Web Designer</span> </a> 
				</div> 
			</div> 
			<div class="tab-menu-heading siderbar-tabs border-0 p-0"> 
				<div class="tabs-menu "> 
				<!-- Tabs --> 
					<ul class="nav panel-tabs"> 
						<li class=""><a href="<?= site_url('Home'); ?>" class="active" data-toggle="tab"><i class="fa fa-home fs-17"></i></a></li>
						<li><a href="#index2" data-toggle="tab"><i class="fa fa-envelope fs-17"></i></a></li> 
						<li><a href="#index3" data-toggle="tab"><i class="fa fa-user fs-17"></i></a></li> 
						<li><a href="<?= site_url('Auth/logout'); ?>" title="logout"><i class="fa fa-power-off fs-17"></i></a></li> 
					</ul> 
				</div> 
			</div> 
			<div class="panel-body tabs-menu-body side-tab-body p-0 border-0 ">
				<div class="tab-content">
					<div class="tab-pane active " id="index1">
						<div class="row row-demo-list"> 
							<div id="" class="col-md-12 resp-vtabs hor_1" style="display: block; width: 100%; margin: 0px;"> 
								<!--<ul class="resp-tabs-list hor_1" style="margin-top: 3px;">
									<li class="resp-tab-item hor_1" aria-controls="hor_1_tab_item-0" role="tab" style="background-color: rgb(245, 245, 245);">
										<i class="fa fa-dashboard sidemenu_icons"></i>
									</li> 
									<li class="resp-tab-item hor_1" aria-controls="hor_1_tab_item-1" role="tab" style="background-color: rgb(245, 245, 245);">
										<i class="fa fa-key sidemenu_icons"></i>
									</li>									
									<li class="resp-tab-item hor_1" aria-controls="hor_1_tab_item-2" role="tab" style="background-color: rgb(245, 245, 245);">
										<i class="fa fa-users sidemenu_icons" aria-hidden="true"></i>
									</li>
									<li class="resp-tab-item hor_1" aria-controls="hor_1_tab_item-3" role="tab" style="background-color: rgb(245, 245, 245);">
										<i class="fa fa-question-circle sidemenu_icons" aria-hidden="true"></i>
									</li> 
									<li class="resp-tab-item hor_1" aria-controls="hor_1_tab_item-4" role="tab" style="background-color: rgb(245, 245, 245);">
										<i class="fa fa-money sidemenu_icons" aria-hidden="true"></i>

									</li> 
									<li class="resp-tab-item hor_1" aria-controls="hor_1_tab_item-5" role="tab" style="background-color: rgb(245, 245, 245);">
										<i class="fa fa-info-circle sidemenu_icons"></i>
									</li>
									<li class="resp-tab-item hor_1" aria-controls="hor_1_tab_item-6" role="tab" style="background-color: rgb(245, 245, 245);">
										<i class="fa fa-gear sidemenu_icons"></i>
									</li>
									<li class="resp-tab-item hor_1" aria-controls="hor_1_tab_item-7" role="tab" style="background-color: rgb(245, 245, 245);">
										<i class="side-menu__icon typcn typcn-point-of-interest-outline"></i>
									</li>
									<li class="resp-tab-item hor_1" aria-controls="hor_1_tab_item-8" role="tab" style="background-color: rgb(245, 245, 245);">
										<i class="side-menu__icon typcn typcn-calendar-outline"></i>
									</li>
									<li class="resp-tab-item hor_1" aria-controls="hor_1_tab_item-9" role="tab" style="background-color: rgb(245, 245, 245);">
										<i class="side-menu__icon typcn typcn-clipboard"></i>
									</li> 
									<li class="resp-tab-item hor_1" aria-controls="hor_1_tab_item-10" role="tab" style="background-color: rgb(245, 245, 245);">
										<i class="side-menu__icon typcn typcn-cog-outline"></i>
									</li>
									<li class="resp-tab-item hor_1" aria-controls="hor_1_tab_item-11" role="tab" style="background-color: rgb(245, 245, 245);">
										<i class="side-menu__icon typcn typcn-shopping-cart"></i>
									</li> 
									<li class="resp-tab-item hor_1" aria-controls="hor_1_tab_item-12" role="tab" style="background-color: rgb(245, 245, 245);">
										<i class="side-menu__icon typcn typcn-download-outline"></i>
									</li> 
									<li class="resp-tab-item hor_1" aria-controls="hor_1_tab_item-13" role="tab" style="background-color: rgb(245, 245, 245);">
										<i class="side-menu__icon typcn typcn-info-outline"></i>
									</li>
								</ul>--> 
								<div class="resp-tabs-container hor_1" style="border-color: rgb(193, 193, 193);"> 
									<h2 class="resp-accordion hor_1" role="tab" aria-controls="hor_1_tab_item-0" style="background-color: rgb(245, 245, 245); border-color: rgb(193, 193, 193);">
										<span class="resp-arrow"></span><i class="side-menu__icon typcn typcn-device-desktop"></i>
									</h2>
									<div class="resp-tab-content-active active resp-tab-content hor_1" aria-labelledby="hor_1_tab_item-0" style="border-color: rgb(193, 193, 193);"> 
						
												<!--<h4 class="font-weight-semibold">Home</h4>--> 
									
												<div class="side-menu p-0">
													<?php echo $this->menu->dynamicMenu(); ?>
													<!--<div class="slide submenu">
														<a class="side-menu__item" data-toggle="slide" href="#">
														<span class="side-menu__label">Submenu 1</span>
														<i class="angle fa fa-angle-down"></i></a> 
														<ul class="slide-menu submenu-list"> 
															<li> <a href="#" class="slide-item">Sub menu 1.1</a> </li>
															<li> <a href="#" class="slide-item">Sub menu 1.2</a> </li> 
															<li> <a href="#" class="slide-item">Sub menu 1.3</a> </li>
															<li> <a href="#" class="slide-item">Sub menu 1.4</a> </li>
															<li> <a href="#" class="slide-item">Sub menu 1.5</a> </li>
														</ul> 
													</div>-->
													

												</div> 
							 
									</div> 
									<h2 class="resp-accordion hor_1" role="tab" aria-controls="hor_1_tab_item-1" style="background-color: rgb(245, 245, 245); border-color: rgb(193, 193, 193);">
									<span class="resp-arrow"></span>
									<i class="side-menu__icon typcn typcn-th-large-outline"></i></h2>
									<div class="resp-tab-content hor_1" aria-labelledby="hor_1_tab_item-1" style="border-color: rgb(193, 193, 193);"> 
										<div class="row"> 
											<div class="col-md-12"> 
												<h4 class="font-weight-semibold">Apps</h4>
												<a href="cards.html" class="slide-item">Cards design</a> 
												<a href="cards-image.html" class="slide-item">Image Cards design</a> 
												<a href="chat.html" class="slide-item">Default Chat</a> 
												<a href="notify.html" class="slide-item">Notifications</a> 
												<a href="sweetalert.html" class="slide-item">Sweet alerts</a> 
												<a href="rangeslider.html" class="slide-item">Range slider</a>
												<a href="scroll.html" class="slide-item">Content Scroll bar</a>
												<a href="counters.html" class="slide-item">Counters</a> 
												<a href="loaders.html" class="slide-item">Loaders</a> 
												<a href="time-line.html" class="slide-item">Time Line</a> 
												<a href="rating.html" class="slide-item">Rating </a>
												<a href="#" class="btn btn-primary mt-3 btn-block">
												<i class="fe fe-plus mr-1 mt-1"></i> Add New</a> 
											</div> 
										</div> 
									</div> 
									<h2 class="resp-accordion hor_1" role="tab" aria-controls="hor_1_tab_item-2" style="background-color: rgb(245, 245, 245); border-color: rgb(193, 193, 193);">
									<span class="resp-arrow"></span>
									<i class="side-menu__icon typcn typcn-arrow-move-outline"></i></h2>
									<div class="resp-tab-content hor_1" aria-labelledby="hor_1_tab_item-2" style="border-color: rgb(193, 193, 193);"> 
										<div class="row"> 
											<div class="col-md-12"> 
												<h4 class="font-weight-semibold">Widget</h4> 
												<a href="widgets.html" class="slide-item">Widget</a>
												<a href="maps.html" class="slide-item">Maps</a>
												<a href="#" class="btn btn-primary mt-3 btn-block"><i class="fe fe-plus mr-1 mt-1"></i> Add New</a> 
											</div>
										</div> 
									</div>
									<h2 class="resp-accordion hor_1" role="tab" aria-controls="hor_1_tab_item-3" style="background-color: rgb(245, 245, 245); border-color: rgb(193, 193, 193);">
									<span class="resp-arrow"></span>
									<i class="side-menu__icon typcn typcn-chart-pie-outline"></i></h2>
									<div class="resp-tab-content hor_1" aria-labelledby="hor_1_tab_item-3" style="border-color: rgb(193, 193, 193);"> 
										<div class="row">
											<div class="col-md-12"> 
												<h4 class="font-weight-semibold">Charts</h4> 
												<a href="chart-chartist.html" class="slide-item">Chartist Charts </a>
												<a href="chart-morris.html" class="slide-item">Morris Charts</a>
												<a href="chart-js.html" class="slide-item">Charts js</a> 
												<a href="chart-peity.html" class="slide-item">Pie Charts</a> 
												<a href="chart-echart.html" class="slide-item">Echart Charts</a>
												<a href="chart-flot.html" class="slide-item">Flot Charts</a> 
												<a href="chart-high.html" class="slide-item">High Charts</a> 
												<a href="chart-nvd3.html" class="slide-item">Nvd3 Charts</a> 
												<a href="chart-dygraph.html" class="slide-item">Dygraph Charts</a>
												<a href="#" class="btn btn-primary mt-3 btn-block">
												<i class="fe fe-plus mr-1 mt-1"></i> Add New</a>
											</div> 
										</div> 
									</div> 
									<h2 class="resp-accordion hor_1" role="tab" aria-controls="hor_1_tab_item-4" style="background-color: rgb(245, 245, 245); border-color: rgb(193, 193, 193);">
									<span class="resp-arrow"></span>
									<i class="side-menu__icon typcn typcn-spanner-outline"></i></h2>
									<div class="resp-tab-content hor_1" aria-labelledby="hor_1_tab_item-4" style="border-color: rgb(193, 193, 193);">
										<div class="row">
											<div class="col-md-12">
												<h4 class="font-weight-semibold">Elements</h4> 
												<a href="alerts.html" class="slide-item">Alerts</a>
												<a href="buttons.html" class="slide-item">Buttons</a>
												<a href="colors.html" class="slide-item">Colors</a> 
												<a href="avatars.html" class="slide-item">Avatars</a> 
												<a href="dropdown.html" class="slide-item">Drop downs</a> 
												<a href="thumbnails.html" class="slide-item">Thumbnails</a> 
												<a href="mediaobject.html" class="slide-item">Media Object</a> 
												<a href="list.html" class="slide-item">List</a> 
												<a href="tags.html" class="slide-item">Tags</a> 
												<a href="pagination.html" class="slide-item">Pagination</a> 
												<a href="navigation.html" class="slide-item">Navigation</a> 
												<a href="typography.html" class="slide-item">Typography</a> 
												<a href="breadcrumbs.html" class="slide-item">Breadcrumbs</a> 
												<a href="badge.html" class="slide-item">Badges</a> 
												<a href="jumbotron.html" class="slide-item">Jumbotron</a>
												<a href="panels.html" class="slide-item">Panels</a> 
												<a href="#" class="btn btn-primary mt-3 btn-block">
												<i class="fe fe-plus mr-1 mt-1"></i> Add New</a> 
											</div> 
										</div> 
									</div> 
									<h2 class="resp-accordion hor_1" role="tab" aria-controls="hor_1_tab_item-5" style="background-color: rgb(245, 245, 245); border-color: rgb(193, 193, 193);">
									<span class="resp-arrow"></span>
									<i class="side-menu__icon typcn typcn-briefcase"></i></h2>
									<div class="resp-tab-content hor_1" aria-labelledby="hor_1_tab_item-5" style="border-color: rgb(193, 193, 193);"> 
										<div class="row">
											<div class="col-md-12">
												<h4 class="font-weight-semibold">Advanced UI</h4>
												<a href="modal.html" class="slide-item">Modal</a> 
												<a href="tooltipandpopover.html" class="slide-item">Tooltip and popover</a> 
												<a href="progress.html" class="slide-item">Progress</a>
												<a href="carousel.html" class="slide-item">Carousels</a> 
												<a href="accordion.html" class="slide-item">Accordions</a> 
												<a href="tabs.html" class="slide-item">Tabs</a> 
												<a href="headers.html" class="slide-item">Headers</a> 
												<a href="footers.html" class="slide-item">Footers</a> 
												<a href="crypto-currencies.html" class="slide-item">Crypto-currencies</a> 
												<a href="users-list.html" class="slide-item">User List</a> 
												<a href="search.html" class="slide-item">Search page</a> 
												<a href="#" class="btn btn-primary mt-3 btn-block">
												<i class="fe fe-plus mr-1 mt-1"></i> Add New</a> 
											</div> 
										</div> 
									</div> 
									<h2 class="resp-accordion hor_1" role="tab" aria-controls="hor_1_tab_item-6" style="background-color: rgb(245, 245, 245); border-color: rgb(193, 193, 193);">
									<span class="resp-arrow"></span>
									<i class="side-menu__icon typcn typcn-document"></i></h2>
									<div class="resp-tab-content hor_1" aria-labelledby="hor_1_tab_item-6" style="border-color: rgb(193, 193, 193);"> 
										<div class="row">
											<div class="col-md-12"> 
												<h4 class="font-weight-semibold">Forms</h4> 
												<a href="form-elements.html" class="slide-item">Form Elements</a>
												<a href="form-wizard.html" class="slide-item">Form-wizard</a> 
												<a href="wysiwyag.html" class="slide-item">Text Editor</a> 
												<a href="#" class="btn btn-primary mt-3 btn-block">
												<i class="fe fe-plus mr-1 mt-1"></i> Add New</a> 
											</div> 
										</div> 
									</div> 
									<h2 class="resp-accordion hor_1" role="tab" aria-controls="hor_1_tab_item-7" style="background-color: rgb(245, 245, 245); border-color: rgb(193, 193, 193);">
									<span class="resp-arrow"></span>
									<i class="side-menu__icon typcn typcn-point-of-interest-outline"></i></h2>
									<div class="resp-tab-content hor_1" aria-labelledby="hor_1_tab_item-7" style="border-color: rgb(193, 193, 193);"> 
										<div class="row"> 
											<div class="col-md-12"> 
												<h4 class="font-weight-semibold">Icons</h4> 
												<a href="icons.html" class="slide-item">Font Awesome</a> 
												<a href="icons2.html" class="slide-item">Material Design Icons</a> 
												<a href="icons3.html" class="slide-item">Simple Line Iocns</a> 
												<a href="icons4.html" class="slide-item">Feather Icons</a> 
												<a href="icons5.html" class="slide-item">Ionic Icons</a> 
												<a href="icons6.html" class="slide-item">Flag Icons</a> 
												<a href="icons7.html" class="slide-item">pe7 Icons</a> 
												<a href="icons8.html" class="slide-item">Themify Icons</a> 
												<a href="icons9.html" class="slide-item">Typicons Icons</a> 
												<a href="icons10.html" class="slide-item">Weather Icons</a> 
												<a href="#" class="btn btn-primary mt-3 btn-block">
													<i class="fe fe-plus mr-1 mt-1"></i> Add New</a> 
											</div> 
										</div> 
									</div> 
									<h2 class="resp-accordion hor_1" role="tab" aria-controls="hor_1_tab_item-8" style="background-color: rgb(245, 245, 245); border-color: rgb(193, 193, 193);">
									<span class="resp-arrow"></span>
									<i class="side-menu__icon typcn typcn-calendar-outline"></i></h2>
									<div class="resp-tab-content hor_1" aria-labelledby="hor_1_tab_item-8" style="border-color: rgb(193, 193, 193);"> 
										<div class="row"> 
											<div class="col-md-12"> 
												<h4 class="font-weight-semibold">Calendar</h4> 
												<a href="calendar.html" class="slide-item">Default calendar</a> 
												<a href="calendar2.html" class="slide-item">Full calendar</a> 
												<a href="#" class="btn btn-primary mt-3 btn-block">
												<i class="fe fe-plus mr-1 mt-1"></i> Add New</a>
											</div> 
										</div> 
									</div>
									<h2 class="resp-accordion hor_1" role="tab" aria-controls="hor_1_tab_item-9" style="background-color: rgb(245, 245, 245); border-color: rgb(193, 193, 193);">
									<span class="resp-arrow"></span>
									<i class="side-menu__icon typcn typcn-clipboard"></i></h2>
									<div class="resp-tab-content hor_1" aria-labelledby="hor_1_tab_item-9" style="border-color: rgb(193, 193, 193);"> 
										<div class="row">
											<div class="col-md-12">
												<h4 class="font-weight-semibold">Tables</h4>
												<a href="tables.html" class="slide-item">Default table</a>												
												<a href="datatable.html" class="slide-item">Data Table</a> 
												<a href="#" class="btn btn-primary mt-3 btn-block">
												<i class="fe fe-plus mr-1 mt-1"></i> Add New</a> 
											</div>
										</div> 
									</div> 
									<h2 class="resp-accordion hor_1" role="tab" aria-controls="hor_1_tab_item-10" style="background-color: rgb(245, 245, 245); border-color: rgb(193, 193, 193);"><span class="resp-arrow"></span><i class="side-menu__icon typcn typcn-cog-outline"></i></h2><div class="resp-tab-content hor_1" aria-labelledby="hor_1_tab_item-10" style="border-color: rgb(193, 193, 193);"> <div class="row"> <div class="col-md-12"> <h4 class="font-weight-semibold">Pages</h4> <a href="profile.html" class="slide-item">Profile</a> <a href="editprofile.html" class="slide-item">Edit Profile</a> <a href="email.html" class="slide-item">Email</a> <a href="emailservices.html" class="slide-item">Email Inbox</a> <a href="gallery.html" class="slide-item">Gallery</a> <a href="about.html" class="slide-item">About Company</a> <a href="services.html" class="slide-item">Services</a> <a href="faq.html" class="slide-item">FAQS</a> <a href="terms.html" class="slide-item">Terms and Conditions</a> <a href="empty.html" class="slide-item">Empty Page</a> <a href="construction.html" class="slide-item">Under Construction</a> <a href="blog.html" class="slide-item">Blog</a> <a href="invoice.html" class="slide-item">Invoice</a> <a href="pricing.html" class="slide-item">Pricing Tables</a> <a href="#" class="btn btn-primary mt-3 btn-block"><i class="fe fe-plus mr-1 mt-1"></i> Add New</a> </div> </div> </div> <h2 class="resp-accordion hor_1" role="tab" aria-controls="hor_1_tab_item-11" style="background-color: rgb(245, 245, 245); border-color: rgb(193, 193, 193);"><span class="resp-arrow"></span><i class="side-menu__icon typcn typcn-shopping-cart"></i></h2><div class="resp-tab-content hor_1" aria-labelledby="hor_1_tab_item-11" style="border-color: rgb(193, 193, 193);"> <div class="row"> <div class="col-md-12"> <h4 class="font-weight-semibold">E-commerce</h4> <a href="shop.html" class="slide-item">Products</a> <a href="shop-des.html" class="slide-item">Product Details</a> <a href="cart.html" class="slide-item">Shopping Cart</a> <a href="#" class="btn btn-primary mt-3 btn-block"><i class="fe fe-plus mr-1 mt-1"></i> Add New</a> </div> </div> </div> <h2 class="resp-accordion hor_1" role="tab" aria-controls="hor_1_tab_item-12" style="background-color: rgb(245, 245, 245); border-color: rgb(193, 193, 193);"><span class="resp-arrow"></span><i class="side-menu__icon typcn typcn-download-outline"></i></h2><div class="resp-tab-content hor_1" aria-labelledby="hor_1_tab_item-12" style="border-color: rgb(193, 193, 193);"> <div class="row"> <div class="col-md-12"> <h4 class="font-weight-semibold">Custom</h4> <a href="login.html" class="slide-item">Login</a> <a href="register.html" class="slide-item">Register</a> <a href="forgot-password.html" class="slide-item">Forgot password</a> <a href="lockscreen.html" class="slide-item">Lock screen</a> <a href="#" class="btn btn-primary mt-3 btn-block"><i class="fe fe-plus mr-1 mt-1"></i> Add New</a> </div> </div> </div> <h2 class="resp-accordion hor_1" role="tab" aria-controls="hor_1_tab_item-13" style="background-color: rgb(245, 245, 245); border-color: rgb(193, 193, 193);"><span class="resp-arrow"></span><i class="side-menu__icon typcn typcn-info-outline"></i></h2><div class="resp-tab-content hor_1" aria-labelledby="hor_1_tab_item-13" style="border-color: rgb(193, 193, 193);"> <div class="row"> <div class="col-md-12"> <h4 class="font-weight-semibold">Error pages</h4> <a href="400.html" class="slide-item">400 Error</a> <a href="401.html" class="slide-item">401 Error</a> <a href="403.html" class="slide-item">403 Error</a> <a href="404.html" class="slide-item">404 Error</a> <a href="500.html" class="slide-item">500 Error</a> <a href="503.html" class="slide-item">503 Error</a> <a href="#" class="btn btn-primary mt-3 btn-block"><i class="fe fe-plus mr-1 mt-1"></i> Add New</a> </div> </div> </div> </div> </div> </div><!-- col-4 --> </div> <div class="tab-pane border-top" id="index2"> <div class="list-group list-group-transparent mb-0 mail-inbox"> <div class="mt-3 mb-3 ml-3 mr-3 text-center"> <a href="email.html" class="btn btn-primary btn-block"><i class="typcn typcn-pencil fs-14"></i> <span class="email-text">Compose</span></a> </div> <a href="emailservices.html" class="list-group-item list-group-item-action d-flex align-items-center active"> <span class="icon mr-3"><i class="fe fe-inbox"></i></span><span class="email-text">Inbox</span> <span class="ml-auto badge-pill badge badge-success email-text">05</span> </a> <a href="#" class="list-group-item list-group-item-action d-flex align-items-center"> <span class="icon mr-3"><i class="fe fe-send"></i></span><span class="email-text">Sent Mail</span> </a> <a href="#" class="list-group-item list-group-item-action d-flex align-items-center"> <span class="icon mr-3"><i class="fe fe-alert-circle"></i></span><span class="email-text">Important</span> <span class="ml-auto badge-pill badge badge-danger email-text">01</span> </a> <a href="#" class="list-group-item list-group-item-action d-flex align-items-center"> <span class="icon mr-3"><i class="fe fe-star"></i></span><span class="email-text">Starred</span> </a> <a href="#" class="list-group-item list-group-item-action d-flex align-items-center"> <span class="icon mr-3"><i class="fe fe-file"></i></span><span class="email-text">Drafts</span> </a> <a href="#" class="list-group-item list-group-item-action d-flex align-items-center"> <span class="icon mr-3"><i class="fe fe-tag"></i></span><span class="email-text">Tags</span> </a> <a href="#" class="list-group-item list-group-item-action d-flex align-items-center"> <span class="icon mr-3"><i class="fe fe-trash-2"></i></span><span class="email-text"> Trash</span> </a> </div> </div> <div class="tab-pane border-top" id="index3"> <div class="list-group list-group-flush "> <form class="form-inline p-4 m-0"> <div class="search-element"> <input class="form-control header-search w-100" type="search" placeholder="Search..." aria-label="Search"> <span class="Search-icon"><i class="fa fa-search"></i></span> </div> </form> <div class="list-group-item d-flex  align-items-center"> <div class="mr-2"> <span class="avatar avatar-md brround cover-image" data-image-src="https://www.spruko.com/demo/hogo/assets/images/users/female/12.jpg" style="background: url(&quot;https://www.spruko.com/demo/hogo/assets/images/users/female/12.jpg&quot;) center center;"><span class="avatar-status bg-green"></span></span> </div> <div class="user-name"> <div class="font-weight-semibold">Mozelle Belt</div> </div> </div> <div class="list-group-item d-flex  align-items-center"> <div class="mr-2"> <span class="avatar avatar-md brround cover-image" data-image-src="https://www.spruko.com/demo/hogo/assets/images/users/female/21.jpg" style="background: url(&quot;https://www.spruko.com/demo/hogo/assets/images/users/female/21.jpg&quot;) center center;"></span> </div> <div class="user-name"> <div class="font-weight-semibold">Florinda Carasco</div> </div> </div> <div class="list-group-item d-flex  align-items-center"> <div class="mr-2"> <span class="avatar avatar-md brround cover-image" data-image-src="https://www.spruko.com/demo/hogo/assets/images/users/female/29.jpg" style="background: url(&quot;https://www.spruko.com/demo/hogo/assets/images/users/female/29.jpg&quot;) center center;"><span class="avatar-status bg-green"></span></span> </div> <div class="user-name"> <div class="font-weight-semibold">Alina Bernier</div> </div> </div> <div class="list-group-item d-flex  align-items-center"> <div class="mr-2"> <span class="avatar avatar-md brround cover-image" data-image-src="https://www.spruko.com/demo/hogo/assets/images/users/female/2.jpg" style="background: url(&quot;https://www.spruko.com/demo/hogo/assets/images/users/female/2.jpg&quot;) center center;"><span class="avatar-status bg-green"></span></span> </div> <div class="user-name"> <div class="font-weight-semibold">Zula Mclaughin</div> </div> </div> <div class="list-group-item d-flex  align-items-center"> <div class="mr-2"> <span class="avatar avatar-md brround cover-image" data-image-src="https://www.spruko.com/demo/hogo/assets/images/users/male/34.jpg" style="background: url(&quot;https://www.spruko.com/demo/hogo/assets/images/users/male/34.jpg&quot;) center center;"></span> </div> <div class="user-name"> <div class="font-weight-semibold">Isidro Heide</div> </div> </div> <div class="list-group-item d-flex  align-items-center"> <div class="mr-2"> <span class="avatar avatar-md brround cover-image" data-image-src="https://www.spruko.com/demo/hogo/assets/images/users/male/12.jpg" style="background: url(&quot;https://www.spruko.com/demo/hogo/assets/images/users/male/12.jpg&quot;) center center;"><span class="avatar-status bg-green"></span></span> </div> <div class="user-name"> <div class="font-weight-semibold">Mozelle Belt</div> </div> </div> <div class="list-group-item d-flex  align-items-center"> <div class="mr-2"> <span class="avatar avatar-md brround cover-image" data-image-src="https://www.spruko.com/demo/hogo/assets/images/users/male/21.jpg" style="background: url(&quot;https://www.spruko.com/demo/hogo/assets/images/users/male/21.jpg&quot;) center center;"></span> </div> <div class="user-name"> <div class="font-weight-semibold">Florinda Carasco</div> </div> </div> <div class="list-group-item d-flex  align-items-center"> <div class="mr-2"> <span class="avatar avatar-md brround cover-image" data-image-src="https://www.spruko.com/demo/hogo/assets/images/users/male/29.jpg" style="background: url(&quot;https://www.spruko.com/demo/hogo/assets/images/users/male/29.jpg&quot;) center center;"></span> </div> <div class="user-name"> <div class="font-weight-semibold">Alina Bernier</div> </div> </div> <div class="list-group-item d-flex  align-items-center"> <div class="mr-2"> <span class="avatar avatar-md brround cover-image" data-image-src="https://www.spruko.com/demo/hogo/assets/images/users/male/2.jpg" style="background: url(&quot;https://www.spruko.com/demo/hogo/assets/images/users/male/2.jpg&quot;) center center;"></span> </div> <div class="user-name"> <div class="font-weight-semibold">Zula Mclaughin</div> </div> </div> <div class="list-group-item d-flex  align-items-center"> <div class="mr-2"> <span class="avatar avatar-md brround cover-image" data-image-src="https://www.spruko.com/demo/hogo/assets/images/users/female/14.jpg" style="background: url(&quot;https://www.spruko.com/demo/hogo/assets/images/users/female/14.jpg&quot;) center center;"><span class="avatar-status bg-green"></span></span> </div> <div class="user-name"> <div class="font-weight-semibold">Isidro Heide</div> </div> </div> <div class="list-group-item d-flex  align-items-center"> <div class="mr-2"> <span class="avatar avatar-md brround cover-image" data-image-src="https://www.spruko.com/demo/hogo/assets/images/users/male/11.jpg" style="background: url(&quot;https://www.spruko.com/demo/hogo/assets/images/users/male/11.jpg&quot;) center center;"></span> </div> <div class="user-name"> <div class="font-weight-semibold">Florinda Carasco</div> </div> </div> <div class="list-group-item d-flex  align-items-center"> <div class="mr-2"> <span class="avatar avatar-md brround cover-image" data-image-src="https://www.spruko.com/demo/hogo/assets/images/users/male/9.jpg" style="background: url(&quot;https://www.spruko.com/demo/hogo/assets/images/users/male/9.jpg&quot;) center center;"></span> </div> <div class="user-name"> <div class="font-weight-semibold">Alina Bernier</div> </div> </div> <div class="list-group-item d-flex  align-items-center"> <div class="mr-2"> <span class="avatar avatar-md brround cover-image" data-image-src="https://www.spruko.com/demo/hogo/assets/images/users/male/22.jpg" style="background: url(&quot;https://www.spruko.com/demo/hogo/assets/images/users/male/22.jpg&quot;) center center;"><span class="avatar-status bg-green"></span></span> </div> <div class="user-name"> <div class="font-weight-semibold">Zula Mclaughin</div> </div> </div> <div class="list-group-item d-flex  align-items-center"> <div class="mr-2"> <span class="avatar avatar-md brround cover-image" data-image-src="https://www.spruko.com/demo/hogo/assets/images/users/female/4.jpg" style="background: url(&quot;https://www.spruko.com/demo/hogo/assets/images/users/female/4.jpg&quot;) center center;"></span> </div> <div class="user-name"> <div class="font-weight-semibold">Isidro Heide</div> </div> </div> </div> </div> </div> </div> </div></div><div id="mCSB_1_scrollbar_vertical" class="mCSB_scrollTools mCSB_1_scrollbar mCS-minimal mCSB_scrollTools_vertical" style="display: block;"><div class="mCSB_draggerContainer"><div id="mCSB_1_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 50px; display: block; height: 315px; max-height: 544px; top: 0px;"><div class="mCSB_dragger_bar" style="line-height: 50px;"></div></div><div class="mCSB_draggerRail"></div></div></div>
 </aside>