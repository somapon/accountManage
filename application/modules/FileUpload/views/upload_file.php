<div class="side-app"> 
	<div class="bg-white p-3 header-secondary row"> 
		<div class="col"></div> 
		 
		 <div class="col col-auto"> 
			<a class="btn btn-outline-success mt-4 mt-sm-0" href="<?= site_url('FileUpload/file_list'); ?>">
			<i class="fa fa-list mr-1 mt-1"></i> List</a>
		 </div>
	 </div> 
	 <!-- page-header --> 
	 <div class="page-header"> 
		<ol class="breadcrumb"></ol>
	 </div> 
 
	<!-- End page-header -->
        <div class="row">
            <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12"> 
                <div class="card">
					<div class="card-header"> 
						<h3 class="card-title"><?php echo $head;?></h3> 
					</div>
					<form action="<?= site_url('FileUpload/upload_file'); ?>" method="post"
                          class="form-horizontal"  novalidate enctype="multipart/form-data">
						  
					<?= form_input(array('type' => 'hidden', 'name' => 'caseTypeUrl', 'id' => 'caseTypeUrl', 'value' => site_url('AjaxController/getCaseSubCat'))); ?>
                    <div class="card-body">
						<div class="row">
							<div class="col-md-8">
								<div class="col-lg-12 col-md-12">
									<div class="row">
										<div class="form-group col-md-4"><label>Case No.:<span
															style="color:red;">*</span></label></div>
										<div class="form-group col-md-6">
											<?= form_input(array('name' => 'case_no', 'value' => set_value('case_no'), 'class' => 'form-control', 'placeholder' => 'Case No', 'tabindex' => '1', 'required' => 'required')); ?>
											<span class="error"> <?php echo form_error('case_no'); ?></span>
										</div>
									</div>
								</div>
								<div class="col-lg-12 col-md-12">
									<div class="row">
										<div class="form-group col-md-4"><label>Case Type:<span
															style="color:red;">*</span></label></div>
										<div class="form-group col-md-6">
											<?= form_dropdown('casetype_id', $casetype, set_value('casetype_id'), array('id' => 'casetypeId', 'class' => 'form-control', 'tabindex' => '1', 'required' => 'required')); ?>
											<span class="error"> <?php echo form_error('casetype_id'); ?></span>
										</div>
										
									</div>
								</div>
								<div class="col-lg-12 col-md-12">
									<div class="row">
										<div class="form-group col-md-4"><label>Case Category:<span
															style="color:red;">*</span></label></div>
										<div class="form-group col-md-6">
											<?= form_dropdown('casesub_subcategory_id', $casecategory, set_value('casesub_subcategory_id'), array('id' => 'casesub_subcategory_id', 'class' => 'form-control', 'tabindex' => '2', 'required' => 'required')); ?>
											<span class="error"> <?php echo form_error('casesub_subcategory_id'); ?></span>
										</div>
										
									</div>
								</div>
								<div class="col-lg-12 col-md-12">
									<div class="row">
										<div class="form-group col-md-4"><label>Court Type:<span
															style="color:red;">*</span></label></div>
										<div class="form-group col-md-6">
											<?= form_dropdown('courttype_id', $courttype, set_value('courttype_id'), array('id' => 'courttype_id', 'class' => 'form-control', 'tabindex' => '1', 'required' => 'required')); ?>
											<span class="error"> <?php echo form_error('courttype_id'); ?></span>
										</div>
										
									</div>
								</div>
								<div class="col-lg-12 col-md-12">
									<div class="row">
										<div class="form-group col-md-4"><label>Date:<span
															style="color:red;">*</span></label></div>
										<div class="form-group col-md-6">
											<input type="text" name="case_date" value="<?php echo set_value('case_date'); ?>" class="form-control date-picker" id="search-start-date" placeholder="Date">
											<span class="error"> <?php echo form_error('file_name'); ?></span>
										</div>
									</div>
								</div>
								<div class="col-lg-12 col-md-12">
									<div class="row">
										<div class="form-group col-md-4"><label>File Name:<span
															style="color:red;">*</span></label></div>
										<div class="form-group col-md-6">
											<?= form_input(array('name' => 'file_name', 'value' => set_value('file_name'), 'class' => 'form-control', 'placeholder' => 'File Name', 'tabindex' => '1', 'required' => 'required')); ?>
											<span class="error"> <?php echo form_error('file_name'); ?></span>
										</div>
									</div>
								</div>
								<div class="col-lg-12 col-md-12">
									<div class="row">
										<div class="form-group col-md-4"><label>Party Name:<span
															style="color:red;">*</span></label></div>
										<div class="form-group col-md-6">
											<?= form_input(array('name' => 'party_name', 'value' => set_value('party_name'), 'class' => 'form-control', 'placeholder' => 'Party Name', 'tabindex' => '1', 'required' => 'required')); ?>
											<span class="error"> <?php echo form_error('party_name'); ?></span>
										</div>
									</div>
								</div>
								<div class="col-lg-12 col-md-12">
									<div class="row">
										<div class="form-group col-md-4"><label>Party District:<span
															style="color:red;">*</span></label></div>
										<div class="form-group col-md-6">
											<?= form_input(array('name' => 'party_district', 'value' => set_value('party_district'), 'class' => 'form-control', 'placeholder' => 'Party District', 'tabindex' => '1', 'required' => 'required')); ?>
											<span class="error"> <?php echo form_error('party_district'); ?></span>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4">
					
								<div class="card shadow"> 
									<div class="card-body"> 

										<input type="file" name="doc_file" class="dropify">

									</div>
								</div>
								<?php if ($this->session->flashdata('err_msg')) { ?>

									  <span style="color:red"><?php echo $this->session->flashdata('err_msg'); ?></span>
								
														
								<?php } ?>
										
							</div>
						</div>
					</div>
					<div class="col-lg-10 col-md-10">
							<div class="card-footer text-right"> 
								<input type="submit" class="btn btn-success mt-1" value="<?php echo $this->lang->line('label_btn_submit'); ?>"> 
								<a href="<?= site_url('PictureQuizzes/questions_answers_list'); ?>" class="btn btn-warning mt-1">Cancel</a> 
							</div>
						</div>
					</form>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
</div>
<!-- /.conainer-fluid -->
<?php //echo validation_errors(); ?>

<script>

  $(document).ready(function() {
	
	$(".date-picker").datepicker({dateFormat: 'yy-mm-dd'});

  });
</script>