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
										<a class="btn btn-outline-success mt-4 mt-sm-0" href="<?= site_url('Clients/client_list'); ?>">
										<i class="feather icon-list mr-1 mt-1"></i> List</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>  

				<div class="card"> 
					<div class="card-header">
						<div class="card-title"><?php echo $head;?></div> 
					</div> 
					<div class="card-body">
						<div class="row">
							<div class="col-md-3">
								<div class="list-group">
									
									<div class="list-group-item">
										<img src="<?= base_url();?>upload/clients/<?php echo $cInfo->image;?>" class="img-fluid">
									</div>
								</div>
							</div>
							<div class="col-md-9">
								<div class="list-group">
									
									<div class="list-group-item">
										<div class="table-responsive"> 
											<table class="table table-striped table-bordered" role="grid">  
												<tbody> 
													<tr>
														<td><b>Code:</b></td>
														<td><?php echo $cInfo->ccodeNo;?></td>
													</tr>
													<tr>
														<td><b>Name:</b></td>
														<td><?php echo $cInfo->cname;?></td>
													</tr>
													<tr>
														<td><b>Phone:</b></td>
														<td><?php echo $cInfo->cphone;?></td>
													</tr>
													<tr>
														<td><b>Email:</b></td>
														<td><?php echo $cInfo->cemail;?></td>
													</tr>
													<tr>
														<td><b>Address:</b></td>
														<td><?php echo $cInfo->caddress;?></td>
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
</section>