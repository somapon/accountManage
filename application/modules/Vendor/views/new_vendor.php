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
										<a class="btn btn-outline-success mt-4 mt-sm-0" href="<?= site_url('Vendor/vendor_list'); ?>">
										<i class="feather icon-plus-square mr-1 mt-1"></i> Add</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
 
	<!-- End page-header -->
        <div class="row">
            <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12"> 
                <div class="card">
					<div class="card-header"> 
						<h3 class="card-title"><?php echo $head;?></h3> 
					</div>
					<form action="<?= site_url('Vendor/add_vendor'); ?>" method="post"
                          class="form-horizontal"  novalidate enctype="multipart/form-data">
                    <div class="card-body">
						<div class="row">
							<div class="col-md-8">
								<div class="col-lg-12 col-md-12">
									<div class="row">
										<div class="form-group col-md-4"><label>Code:<span
															style="color:red;">*</span></label></div>
										<div class="form-group col-md-6">
											<?= form_input(array('name' => 'vcodeNo', 'value' => set_value('vcodeNo'), 'class' => 'form-control')); ?>
											<span class="error"> <?php echo form_error('vcodeNo'); ?></span>
										</div>
									</div>
								</div>
								<div class="col-lg-12 col-md-12">
									<div class="row">
										<div class="form-group col-md-4"><label>Name:<span
															style="color:red;">*</span></label></div>
										<div class="form-group col-md-6">
											<?= form_input(array('name' => 'vname', 'value' => set_value('vname'), 'class' => 'form-control', 'placeholder' => 'Vendor Name', 'required' => 'required')); ?>
											<span class="error"> <?php echo form_error('vname'); ?></span>
										</div>
										
									</div>
								</div>

								<div class="col-lg-12 col-md-12">
									<div class="row">
										<div class="form-group col-md-4"><label>Phone:<span
															style="color:red;">*</span></label></div>
										<div class="form-group col-md-6">
											<?= form_input(array('name' => 'vphone', 'value' => set_value('vphone'), 'class' => 'form-control', 'placeholder' => 'Phone', 'required' => 'required')); ?>
											<span class="error"> <?php echo form_error('vphone'); ?></span>
										</div>
									</div>
								</div>
								<div class="col-lg-12 col-md-12">
									<div class="row">
										<div class="form-group col-md-4"><label>Email:</label></div>
										<div class="form-group col-md-6">
											<?= form_input(array('name' => 'vemail', 'value' => set_value('vemail'), 'class' => 'form-control', 'placeholder' => 'Email')); ?>
											<span class="error"> <?php echo form_error('vemail'); ?></span>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4">
					
								<div class="card shadow"> 
									<div class="card-body"> 

										<input type="file" name="vendor_img" class="dropify">

									</div>
								</div>
								<?php if ($this->session->flashdata('err_msg')) { ?>

									  <span style="color:red"><?php echo $this->session->flashdata('err_msg'); ?></span>
								
														
								<?php } ?>
										
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-md-12"> 
								<div class="form-group"> 
									<label for="exampleInputname">Address :</label> 
									<?= form_textarea(array('name' => 'vaddress', 'value' => set_value('vaddress'), 'placeholder' => 'Enter Address', 'colls' => '9', 'rows' => '4', 'class' => 'form-control')); ?>
									<span class="error"> <?php echo form_error('vaddress'); ?></span>
								</div> 
							</div>
						</div>
					</div>
					<div class="col-lg-10 col-md-10">
							<div class="card-footer text-right"> 
								<input type="submit" class="btn btn-success mt-1" value="<?php echo $this->lang->line('label_btn_submit'); ?>"> 
								<a href="<?= site_url('Vendor/vendor_list'); ?>" class="btn btn-warning mt-1">Cancel</a> 
							</div>
						</div>
					</form>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
</div>
</div>
</div>
</section>
<!-- /.conainer-fluid -->
<?php //echo validation_errors(); ?>

<script>

  $(document).ready(function() {
	
	$(".date-picker").datepicker({dateFormat: 'yy-mm-dd'});

  });
</script>