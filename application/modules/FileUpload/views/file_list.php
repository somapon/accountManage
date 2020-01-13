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
			<div class="table-responsive"> 
				<div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

					<div class="row">
						<div class="col-sm-12">
							<table id="example" class="table table-striped table-bordered text-nowrap dataTable" role="grid" aria-describedby="example3_info" style="width: 854px;"> 
								<thead>
									<tr role="row">
										<th class="sorting_asc" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" style="width: 88px;" aria-sort="ascending" aria-label="First name: activate to sort column descending">
											<?php echo $this->lang->line('label_sl_no'); ?>
										</th>
										<th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" style="width: 85px;" aria-label="Last name: activate to sort column ascending">
											Case No
										</th>
										<th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" style="width: 85px;" aria-label="Last name: activate to sort column ascending">
											Case Type
										</th>
										<th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" style="width: 85px;" aria-label="Last name: activate to sort column ascending">
											Case Type Category
										</th>
										<th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" style="width: 85px;" aria-label="Last name: activate to sort column ascending">
											Court Type
										</th>
										<th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" style="width: 85px;" aria-label="Last name: activate to sort column ascending">
											File Name
										</th>
										<th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" style="width: 93px;" aria-label="Office: activate to sort column ascending">
											Party Name
										</th>
										<th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" style="width: 93px;" aria-label="Office: activate to sort column ascending">
											Party District
										</th>
										<th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" style="width: 36px;" aria-label="Age: activate to sort column ascending">
											<?php echo $this->lang->line('label_action'); ?>
										</th>
									</tr>
								</thead> 
								<tbody> 
									<?php 
									$i = 1;
									if ($records) {
										foreach ($records as $key => $val) { ?>
									<tr>
										
										<td class="sorting_1" tabindex="0"><?= $this->uri->segment(3) + $i; ?></td>
										<td><?= $val->case_no; ?></td>
										<td><?= $val->subcat_name; ?></td>
										<td><?= $val->subsubcat_name; ?></td>
										<td><?= $val->court_name; ?></td>
										<td><?= $val->file_name; ?></td>
										<td><?= $val->party_name; ?></td>
										<td><?= $val->party_district; ?></td>
										<td>
											<div class="btn-group align-top">
												<a class="btn btn-sm btn-primary badge" title="Edit" href="<?= site_url('FileUpload/file_upload_edit/' . $val->id); ?>" class="btn btn-primary btn-xs">
													<i class="fa fa-edit"></i>
												</a>
												<a class="btn btn-sm btn-primary badge" title="Edit" href="<?= site_url('FileUpload/file_view/' . $val->id); ?>" class="btn btn-primary btn-xs">
													<i class="fa fa-eye"></i>
												</a>
												<a href="<?= site_url('FileUpload/delete_upload_file/' . $val->id); ?>" class="btn btn-sm btn-primary badge" onclick="return confirm('Are you sure you want to Remove?');"><i class="fa fa-trash"></i></a> 
												<a class="btn btn-sm btn-primary badge" title="Edit" href="<?= site_url('AjaxSearch/download_file/' . $val->id); ?>" class="btn btn-primary btn-xs">
													<i class="fa fa-download"></i>
												</a>
											</div>
											
										</td>
									</tr>
									<?php $i++;  }
									} else {
										echo '<tr><td colspan="9">NO DATA</td></tr>';
									} ?>
								</tbody>
							</table>
						</div>
					</div>
				</div> 
			</div> 
		</div> 
	</div> 
</div>