 <!--<div class="side-app"> 
	<div class="bg-white p-3 header-secondary row"> 
		<div class="col"> 
 
		</div> 
		<div class="col col-auto"> 
			<a class="btn btn-outline-success mt-4 mt-sm-0" href="<?= site_url('Auth/users'); ?>">
			<i class="fa fa-list mr-1 mt-1"></i> List</a> 
		</div> 
	</div>-->
 <div class="pcoded-main-container">
	<div class="pcoded-wrapper">
		<div class="pcoded-content">
			<div class="pcoded-inner-content"> 

				 <!-- row --> 
				<div class="row"> 
					<div class="col-sm-12">
						<div class="alert alert-primary" role="alert">
							<p>Your can show short description about</p>
							<label class="text-muted">this module</label>
						</div>
					</div>
					<div class="col-xl-12 col-md-12">
						<div class="card"> 
							<div class="card-header">
								<div class="col"> 
									<div class="card-title"><h5><?php echo $head;?></h5></div>
								</div> 
								<div class="col col-auto text-right"> 
									<a class="btn btn-outline-success mt-4 mt-sm-0" href="<?= site_url('Auth/user/update/' . $id); ?>">
									<i class="feather icon-edit mr-1 mt-1"></i> Edit</a> 
								</div> 
								 
							</div>
							<div class="card-body">
								<div class="row">
								  <?php foreach ($details as $key => $val) {
										if ($key == 0) { ?>
									<div class="col-md-3 col-lg-3 " align="center"> 
									<?php if ($val->image) { ?>
										<img src="<?= base_url() ?>/upload/user/<?= $val->image; ?>" class="img-fluid">
									<?php } else { ?>
										<img src="<?= base_url() ?>/resources/img/no-image.jpg" class="img-fluid>
									<?php } ?>
									<div class="col-md-12">
									<div class="text-left" style="font-size:14px;">
									<?php echo $this->lang->line('label_name'); ?>: <?php echo ucwords(strtolower($val->first_name));?> <?php echo ucwords(strtolower($val->last_name));?> 
									</div>
									
									</div>
									</div>
								  <?php } }?>
									<div class=" col-md-9 col-lg-9 "> 
									  <table class="table table-bordered table-user-information">
										<tbody>
										<fieldset class="well">
											<legend class="well-legend"><?php echo $this->lang->line('label_personal_information'); ?></legend>
										  <tr>
												<th><?php echo $this->lang->line('label_user_name'); ?>:</th>
												<td><?= $val->username; ?></td>
											</tr>
											
											<tr>
												<th><?php echo $this->lang->line('label_email'); ?>:</th>
												<td><?= $val->email; ?></td>
											</tr>
											
											<tr>
												<th><?php echo $this->lang->line('label_phone'); ?>:</th>
												<td><?= $val->phone; ?></td>
											</tr>
							
										</fieldset>
										</tbody>
									  </table>
									  
									  <?php foreach ($details as $key => $val) {
											if ($key == 0) { ?>
									   <table class="table table-user-information">
										<tbody>
										<fieldset class="well">
											<legend class="well-legend"><?php echo $this->lang->line('label_user_role'); ?></legend>
										  <tr>
												<th><?php echo $this->lang->line('label_group'); ?>:</th>
												<td><?= implode(", ", $groups); ?></td>
											</tr>
										</fieldset>
										</tbody>
									  </table>
									  <?php } } ?>
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
        