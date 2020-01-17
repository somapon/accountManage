<style>
	.datepicker>.datepicker-days {
		display: block;
	}
</style>

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
										<a class="btn btn-outline-success mt-4 mt-sm-0" href="<?= site_url('Project/project_list'); ?>">
										<i class="feather icon-list mr-1 mt-1"></i> List</a>
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
								<h4 class="card-title"><?php echo $head;?></h4> 
							</div>
							<form action="<?= site_url('Project/new_project'); ?>" method="post"
								  class="form-horizontal"  novalidate enctype="multipart/form-data">
							<div class="card-body">
								<div class="row">
									<div class="col-md-8">
										<div class="col-lg-12 col-md-12">
											<div class="row">
												<div class="form-group col-md-4"><label>Project Name:<span
																	style="color:red;">*</span></label></div>
												<div class="form-group col-md-8">
													<?= form_input(array('name' => 'project_name', 'value' => set_value('project_name'), 'class' => 'form-control', 'placeholder' => 'Project Name', 'required' => 'required')); ?>
													<span class="error"> <?php echo form_error('project_name'); ?></span>
												</div>
												
											</div>
										</div>
										<div class="col-lg-12 col-md-12"> 
											<div class="row">
												
												<div class="form-group col-md-4"><label>Description:<span
																style="color:red;">*</span></label></div>
												<div class="form-group col-md-8">
												<?= form_textarea(array('name' => 'description', 'value' => set_value('description'), 'placeholder' => 'Project Description', 'colls' => '9', 'rows' => '4', 'class' => 'form-control')); ?>
												<span class="error"> <?php echo form_error('description'); ?></span>
												</div>
												
											</div> 
										</div>
										<div class="col-lg-12 col-md-12"> 
											<div class="row">
												
												<div class="form-group col-md-4"><label>Start & End Date:<span
																style="color:red;">*</span></label></div>
												<div class="form-group col-md-8">
													<div class="input-daterange input-group" id="datepicker_range">
														<input type="text" name="start_date" class="form-control text-left" placeholder="Start date">
														<input type="text" name="end_date" class="form-control text-right" placeholder="End date">
													</div>
													<span class="error"> <?php echo form_error('start_date'); ?></span>
													<span class="error"> <?php echo form_error('end_date'); ?></span>
												</div>
												
											</div> 
										</div>
									</div>

								</div>
							</div>
							<div class="col-lg-8 col-md-8">
									<div class="card-footer text-right"> 
										<input type="submit" class="btn btn-success mt-1" value="Submit"> 
										<a href="<?= site_url('Project/project_list'); ?>" class="btn btn-warning mt-1">Cancel</a> 
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