<section class="pcoded-main-container">
	<div class="pcoded-wrapper">
		<div class="pcoded-content">
			<div class="pcoded-inner-content">

				<div class="page-header">
					<div class="page-block">
						<div class="row align-items-center">
							<div class="col-md-12">
								<ul class="breadcrumb">
									<li class="breadcrumb-item">
										<a class="btn btn-outline-success mt-4 mt-sm-0" href="<?= site_url('Vendor/add_vendor'); ?>">
										<i class="feather icon-plus-square mr-1 mt-1"></i> Add</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div> 
 
				 <!-- row --> 
				<div class="row"> 
					<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12"> 
						<div class="card">
							<div class="card-header"> 
								<h4 class="card-title"><?php echo $head;?></h4> 
							</div>
							<form id="signupForm" method="post" action="<?= site_url('Auth/user/add'); ?>">
								<div class="card-body"> 
									<div class="row"> 
										<div class="col-lg-12 col-md-12"> 
											<div class="form-group">
												<?php echo $this->lang->line('label_first_name'); ?>:<span
															style="color:red;">*</span><br />
												<?php echo form_input($first_name); ?>
												<span class="error"> <?php echo form_error('first_name'); ?></span>

											</div>
										</div>
										<div class="col-lg-12 col-md-12">
											<div class="form-group">
												<?php echo $this->lang->line('label_last_name'); ?>:<span
															style="color:red;">*</span> <br/>
												<?php echo form_input($last_name); ?>
												<span class="error"> <?php echo form_error('last_name'); ?></span>

											</div>
										</div>
										<div class="col-lg-12 col-md-12">
											<div class="form-group">
												<?php
												if ($identity_column !== 'email') {
													echo '<p>';
													echo lang('create_user_identity_label', 'identity');
													echo '<br />';
													echo form_error('identity');
													echo form_input($identity);
													echo '</p>';
												}
												?>
											</div>
										</div>
										<div class="col-lg-12 col-md-12">
											<div class="form-group">
												<?php echo $this->lang->line('label_email'); ?>:<span
															style="color:red;">*</span><br/>
												<?php echo form_input($email); ?>
												<span class="error"> <?php echo form_error('email'); ?></span>

											</div>
										</div>
										<div class="col-lg-12 col-md-12">
											<div class="form-group">
												<?php echo $this->lang->line('label_phone'); ?>:<span
															style="color:red;">*</span> <br/>
												<?php echo form_input($phone); ?>
												<span class="error"> <?php echo form_error('phone'); ?></span>

											</div>
										</div>
										<div class="col-lg-12 col-md-12">
											<div class="row">
												<div class="form-group col-md-6">
													<?php echo $this->lang->line('label_password'); ?>:<span
															style="color:red;">*</span> <br/>
													<?php echo form_input($password); ?>
													<span class="error"> <?php echo form_error('password'); ?></span>

												</div>

												<div class="form-group col-md-6">
													<?php echo $this->lang->line('label_confirm_password'); ?>:<span
															style="color:red;">*</span>
													<br/>
													<?php echo form_input($password_confirm); ?>
													<span class="error"> <?php echo form_error('password_confirm'); ?></span>

												</div>

											</div>
										</div>
										<div class="col-lg-12 col-md-12">
											<div class="form-group">
											<?php echo $this->lang->line('label_user_group'); ?>:<span
														style="color:red;">*</span>
											
											<?= form_dropdown('group_id', $group_options, set_value('group_id'), array('id' => 'group_id', 'class' => 'form-control', 'tabindex' => '7', 'required' => 'required')); ?>
												<span class="error"> <?php echo form_error('group_id'); ?></span>

											</div>
										</div>
									</div>
								</div> 
								<div class="card-footer text-right"> 
									<input type="submit" class="btn btn-success mt-1"value="Submit">
									<a href="<?= site_url('Auth/users'); ?>" class="btn btn-warning mt-1">Cancel</a> 
								</div>
											
							</form>
						</div>
					</div>
					<!-- row end-->
				</div>
			</div>
		</div>
	</div>
</section>