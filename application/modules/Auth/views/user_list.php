<div class="side-app"> 
	<div class="bg-white p-3 header-secondary row"> 
		<div class="col"> 
 
		</div> 
		<div class="col col-auto"> 
			<a class="btn btn-outline-success mt-4 mt-sm-0" href="<?= site_url('Auth/create_user'); ?>">
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
				<div id="example3_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
					<div class="row">
						<div class="col-sm-12">
							<table id="example" class="table table-striped table-bordered text-nowrap dataTable no-footer" role="grid" aria-describedby="example3_info" style="width: 854px;"> 
								<thead>
									<tr role="row">
									    										<th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" style="width: 202px;" aria-label="Position: activate to sort column ascending">
											<?php echo $this->lang->line('label_first_name'); ?>
										</th>
										<th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" style="width: 202px;" aria-label="Position: activate to sort column ascending">
											<?php echo $this->lang->line('label_last_name'); ?>
										</th>
										<th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" style="width: 85px;" aria-label="Last name: activate to sort column ascending">
											<?php echo $this->lang->line('label_photo'); ?>
										</th>

										<th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" style="width: 93px;" aria-label="Office: activate to sort column ascending">
											<?php echo $this->lang->line('label_email'); ?>
										</th>
										<th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" style="width: 36px;" aria-label="Age: activate to sort column ascending">
											<?php echo $this->lang->line('label_phone'); ?>
										</th>
										<th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" style="width: 92px;" aria-label="Start date: activate to sort column ascending">
											<?php echo $this->lang->line('label_group'); ?>
										</th>
										<th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" style="width: 0px; display: none;" aria-label="Salary: activate to sort column ascending">
										<?php echo $this->lang->line('label_status'); ?>
										</th>
										<th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" style="width: 0px; display: none;" aria-label="E-mail: activate to sort column ascending">Action</th>
										
									</tr> 
								</thead> 
								<tbody> 
									<?php
									$i=1;
									if ($records) {
										foreach ($records as $key => $user_val) {
									?>
									<tr role="row" class="odd">
										<td><?php echo ucwords(strtolower($user_val->first_name ));?>
										</td>
										<td><?php echo ucwords(strtolower($user_val->last_name ));?>   </td>
										<td>
											<img src="<?=base_url('upload/no_image.png')?>" alt="" style="height:50px;">
										
										</td>

										<td><?php echo strtolower($user_val->email);?></td>
										<td><?php echo $user_val->phone;?></td>
										<td>
											<div class="btn-group">
												<span class="label label-warning"
													  data-toggle="dropdown">
													Groups
												</span>

												<div class="dropdown-menu">
													
													<a class="dropdown-item" href=""> <?= $user_val->name; ?> </a>
										  
												</div>
											</div>
										</td>
										<td style="display: none;">
											<div class="btn-group">
												<span class="label label-warning"
													  data-toggle="dropdown">
												   <?php if ($user_val->active) {
													   echo 'Active';
												   } else {
													   echo 'Inactive';
												   } ?>
												</span>

													<div class="dropdown-menu">
														<a class="dropdown-item"
														   href="<?= site_url('Auth/status/1/' . $user_val->id); ?>"> Active </a>
														<a class="dropdown-item"
														   href="<?= site_url('Auth/status/0/' . $user_val->id); ?>"> Inactive </a>

													</div>
												</div>
										</td>
										<td>
											<div class="btn-group align-top">
											    
											    <a data-placement="top" data-toggle="tooltip" title="View" class="btn btn-primary btn-xs"
												   href="<?= site_url('Auth/user/view/' . $user_val->id); ?>">
												   <i class="fa fa-eye"></i>
												</a>
												
												<a class="btn btn-sm btn-primary badge" title="Edit" href="<?= site_url('Auth/user/edit/' . $user_val->id); ?>" class="btn btn-primary btn-xs">
													Edit
												</a>
												 
												<a href="<?= site_url('Auth/delete_user/' . $user_val->id); ?>" class="btn btn-sm btn-primary badge" onclick="return confirm('Are you sure you want to Remove?');"><i class="fa fa-trash"></i></a> 
											</div> 
										</td>
									</tr>
									<?php }
									} else {
										echo '<tr><td colspan="7">NO DATA AVAILABLE</td></tr>';
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