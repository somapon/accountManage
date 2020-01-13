<div class="side-app"> 
	<div class="bg-white p-3 header-secondary row"> 
		<div class="col"></div> 
		 
		 <div class="col col-auto"> 
			<a class="btn btn-outline-success mt-4 mt-sm-0" href="<?= site_url('Auth/user'); ?>">
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
            <?php echo form_open_multipart(uri_string()); ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12"> 
							<div class="form-group"> 
                                <?php echo lang('edit_user_fname_label', 'first_name'); ?> <br/>
                                <?php echo form_input($first_name); ?>
                                <span class="error"> <?php echo form_error('first_name'); ?></span>
                            </div>
						</div>

                        <div class="col-lg-12 col-md-12"> 
							<div class="form-group">
                                <?php echo lang('edit_user_lname_label', 'last_name'); ?> <br/>
                                <?php echo form_input($last_name); ?>
                                <span class="error"> <?php echo form_error('last_name'); ?></span>
                            </div>
						</div>

						<div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <label class="form-control-label" for="email">Email</label>
                                <?php echo form_input($email); ?>
                                <span class="error"> <?php echo form_error('email'); ?></span>
                            </div>
						</div>
						
						<div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <?php echo lang('edit_user_phone_label', 'phone'); ?> <br/>
                                <?php echo form_input($phone); ?>
                                <span class="error"> <?php echo form_error('phone'); ?></span>
                            </div>
						</div>

						<div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <?php echo 'Image'; ?> <br/>
                                <?php echo form_input($image); ?>
                                <span class="error"> <?php echo form_error('image'); ?></span>
                            </div>
						</div>
                        <?php echo form_hidden('id', $user->id); ?>
                        <?php echo form_hidden($csrf); ?>
				    </div>
				</div>
							<div class="card-footer text-right"> 
								<input type="submit" class="btn btn-success mt-1" value="<?php echo $this->lang->line('label_btn_update'); ?>"> 
							
							</div>
                        </div>
 
                    </div>
        </form>
    </div>
    <!-- /.col -->
</div>
 


<?php //echo validation_errors(); ?>