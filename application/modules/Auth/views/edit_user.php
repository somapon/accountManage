<div class="side-app"> 
	<div class="bg-white p-3 header-secondary row"> 
		<div class="col"></div> 
		 
		 <div class="col col-auto"> 
			<a class="btn btn-outline-success mt-4 mt-sm-0" href="<?= site_url('Auth/users'); ?>">
			<i class="fa fa-list mr-1 mt-1"></i> List</a>
		 </div>
	 </div> 
	 <!-- page-header --> 
	 <div class="page-header"> 
		<ol class="breadcrumb"></ol>
	 </div>
	<!-- End page-header --> 
 
	 <!-- row --> 
	<div class="row"> 
		<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12"> 
			<div class="card">
				<div class="card-header"> 
					<h3 class="card-title"><?php echo $head;?></h3> 
				</div>
				<form id="signupForm" method="post" action="<?= site_url('Auth/user/edit/'.$user->id); ?>">
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
									<?php echo $this->lang->line('label_email'); ?>:<span
												style="color:red;">*</span><br/>
									<?php echo form_input($email); ?>
									<span class="error"> <?php echo form_error('email'); ?></span>

								</div>
							</div>
							<div class="col-lg-12 col-md-12">
								<div class="form-group">
									<?php echo $this->lang->line('label_phone'); ?>:<span
												style="color:red;">*</span><br/>
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
								<div class="row">
									<div class="form-group col-md-12">
									<?php echo $this->lang->line('label_user_group'); ?>:<span
												style="color:red;">*</span>

									<?= form_dropdown('group_id', $group_options, set_value('group_id', $user->group_id), array('id' => 'group_id', 'class' => 'form-control', 'tabindex' => '7', 'required' => 'required')); ?>
									<span class="error"> <?php echo form_error('group_id'); ?></span>

									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="card-footer text-right"> 
						<input type="submit" class="btn btn-success mt-1" value="<?php echo $this->lang->line('label_btn_update'); ?>">
						<a href="<?= site_url('Auth/users'); ?>" class="btn btn-warning mt-1">Cancel</a> 
					</div>
                </form>
            </div>
		</div>
		<!-- row end-->
	</div>
</div>