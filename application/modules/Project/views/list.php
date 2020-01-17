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
										<a class="btn btn-outline-success mt-4 mt-sm-0" href="<?= site_url('Project/new_project'); ?>">
										<i class="feather icon-plus-square mr-1 mt-1"></i> Add</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<div class="main-body">
					<div class="page-wrapper">
						<div class="row">
							<div class="col-sm-12">
								<div class="card">
									<div class="card-header">
									<h5><?php echo $head;?></h5>
									</div>
									<div class="card-block">
										<div class="table-responsive">
									
											<div class="row">
												<div class="col-sm-12">
													<table id="zero-configuration" class="display table nowrap table-striped table-hover dataTable" style="width: 100%;" role="grid" aria-describedby="zero-configuration_info">
														<thead>
															<tr role="row">
																<th class="sorting_asc" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 137px;">#SL</th>
																<th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 209px;">Project Name</th>
																<th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 209px;">Description</th>
																<th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 209px;">Start Date</th>
																<th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 209px;">End Date</th>
																<th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 62px;">Action</th>
															</tr>
														</thead>
														<tbody>
														<?php 
															$i = 1;
															if ($records) {
																																												foreach ($records as $key => $val) { ?>
																															
															<tr role="row" class="odd">
																<td class="sorting_1"><?= $i;?></td>
																<td><?= $val->project_name;?></td>
																<td><?= $val->description;?></td>
																<td><?= $val->start_date;?></td>
																<td><?= $val->end_date;?></td>
																<td>
																																														<div class="btn-group align-top">
																																															<a class="btn btn-sm btn-primary" title="Edit" href="<?= site_url('Project/edit_project/' . $val->id); ?>">
																																																<i class="feather icon-edit-1"></i>
																																															</a>
																																															<a href="<?= site_url('Project/delete_project/' . $val->id); ?>" class="btn btn-sm btn-primary" onclick="return confirm('Are you sure you want to Remove?');">
																																																<i class="feather icon-trash-2"></i>
																																															</a>
																																														</div>																	   </td>
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
					</div>
				</div>
			</div>
		</div>
	</div>
</section>