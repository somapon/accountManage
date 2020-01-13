<div class="side-app"> 
	<div class="bg-white p-3 header-secondary row"> 
		<div class="col"> 
 
		</div> 
		<div class="col col-auto"> 
			<a class="btn btn-outline-success mt-4 mt-sm-0" href="<?= site_url('FileUpload/upload_file'); ?>">
			<i class="fa fa-plus mr-1 mt-1"></i> Add</a> 
		</div> 
	</div> 
	<!-- page-header --> 
	<div class="page-header"> 
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
		<?php if ($this->session->flashdata('message')) { ?>
			
			  <?php echo $this->session->flashdata('message'); ?>
			
								
		<?php } ?>
		</div> 
	</div> 
	<!-- End page-header -->  

	<div class="card"> 
		<div class="card-header">
			<div class="card-title"><?php echo $head;?></div> 
		</div> 
		<div class="card-body">
			<div class="row">
				<div class="col-md-3">
					<div class="list-group">
						
						<div class="list-group-item">
							<img src="<?= base_url();?>upload/file-png-image-59234.png">
							<?php echo $fileInfo->image;?>
						</div>
						<div class="list-group-item">
							<b>Download File</b> <a class="btn btn-sm btn-primary badge" title="Edit" href="<?= site_url('AjaxSearch/download_file/' . $fileInfo->id); ?>" class="btn btn-primary btn-xs">
								<i class="fa fa-download"></i>
							</a>
						</div>
					</div>
				</div>
				<div class="col-md-9">
					<div class="list-group">
						
						<div class="list-group-item">
							<div class="table-responsive"> 
				
								<div class="row">
									<div class="col-sm-12">
										<table class="table table-striped table-bordered" role="grid">  
											<tbody> 
												<tr>
													<td><b>Case No:</b></td>
													<td><?php echo $fileInfo->case_no;?></td>
												</tr>
												<tr>
													<td><b>File Name:</b></td>
													<td><?php echo $fileInfo->file_name;?></td>
												</tr>
												<tr>
													<td><b>Case Date:</b></td>
													<td><?php echo $fileInfo->case_date;?></td>
												</tr>
												<tr>
													<td><b>Case Type:</b></td>
													<td><?php echo $fileInfo->subcat_name;?></td>
												</tr>
												<tr>
													<td><b>Case Category:</b></td>
													<td><?php echo $fileInfo->subsubcat_name;?></td>
												</tr>
												<tr>
													<td><b>Court Type:</b></td>
													<td><?php echo $fileInfo->court_name;?></td>
												</tr>
												<tr>
													<td><b>Party Name:</b></td>
													<td><?php echo $fileInfo->party_name;?></td>
												</tr>
												<tr>
													<td><b>Party District:</b></td>
													<td><?php echo $fileInfo->party_district;?></td>
												</tr>
		
											</tbody>
										</table>
									</div>
								</div>
				
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>