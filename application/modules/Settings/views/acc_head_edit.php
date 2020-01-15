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
										<a class="btn btn-outline-success mt-4 mt-sm-0" href="<?= site_url('Settings/account_head_list'); ?>">
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
					<form action="<?= site_url('Settings/account_head_edit/' .$id); ?>" method="post"
                          class="form-horizontal"  novalidate enctype="multipart/form-data">
                    <div class="card-body">
						<div class="row">
							<div class="col-md-8">
								<div class="col-lg-12 col-md-12">
									<div class="row">
										<div class="form-group col-md-4"><label>Head Name:<span
															style="color:red;">*</span></label></div>
										<div class="form-group col-md-6">
											<?= form_input(array('name' => 'head_title', 'value' => set_value('head_title', $ahinfo->head_title), 'class' => 'form-control', 'placeholder' => 'Vendor Name', 'required' => 'required')); ?>
											<span class="error"> <?php echo form_error('head_title'); ?></span>
										</div>
										
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-10 col-md-10">
							<div class="card-footer text-center"> 
								<input type="submit" class="btn btn-success mt-1" value="Update"> 
								<a href="<?= site_url('Settings/account_head_list'); ?>" class="btn btn-warning mt-1">Cancel</a> 
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

