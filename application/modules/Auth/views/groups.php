<div class="pcoded-main-container">
	<div class="pcoded-wrapper">
		<div class="pcoded-content">
			<div class="pcoded-inner-content">
				<div class="page-header">
					<div class="page-block">
						<div class="row align-items-center">
							<div class="col-md-12">
								<ul class="breadcrumb">
									<li class="breadcrumb-item">
										<a class="btn btn-outline-success mt-4" href="<?= site_url('Auth/group/add'); ?>">
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
								<div class="alert alert-primary" role="alert">
									<p>Use our extra helper file for quick widgets setup in your page - <a href="index-widget-package.html#page-table" target="_blank" class="alert-link">CHECKOUT</a></p>
									<label class="text-muted">Copy/paste source code in your page in just couples of seconds.</label>
								</div>
							</div>
							<div class="page-header"> 
								<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
								<?php if ($this->session->flashdata('message')) { ?>
									
									  <?php echo $this->session->flashdata('message'); ?>
									
														
								<?php } ?>
								</div> 
							</div> 
							<div class="col-xl-12 col-md-12">
								<div class="card code-table">
									<div class="card-header">
										<h4><?php echo $head;?></h4>
									</div>
									<div class="card-block pb-0">
										<div class="table-responsive">
											<table class="table table-hover">
												<thead>
													<th>#SL</th>
													<th>Name</th>
													<th>Description</th>
													<th>Action</th>
												</thead>
												<tbody>
												<?php 
													$i = 1;
													if ($groups) {
													foreach ($groups as $key => $val) { ?>
													<tr>
														<td><?= $this->uri->segment(3) + $i; ?></td>
														<td><h6 class="mb-1"><?= $val['name']; ?></h6></td>
														<td><h6 class="mb-1"><?= $val['description']; ?></h6></td>
														<td>
															<?php if($this->ion_auth->is_admin()){?>
															<div class="btn-group align-top">
																<a class="btn btn-sm btn-primary badge" title="Edit" href="<?= site_url('Auth/group/edit/' . $val['id']); ?>" class="btn btn-primary btn-xs">
																	Edit
																</a>
			
																<a href="<?= site_url('Auth/group/delete/' . $val['id']); ?>" class="btn btn-sm btn-primary badge" onclick="return confirm('Are you sure you want to Remove?');"><i class="feather icon-trash-2"></i></a> 
															</div>
															<?php }else{?>
																Only Administrator access
															<?php }?>
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
			</div>
		</div>
	</div>
</div>