<div class="side-app"> 
	<div class="bg-white p-3 header-secondary row"> 
		<div class="col"> 
 
		</div> 
		<div class="col col-auto"> 
			<a class="btn btn-outline-success mt-4 mt-sm-0" href="<?= site_url('Auth/users'); ?>">
			<i class="fa fa-list mr-1 mt-1"></i> List</a> 
		</div> 
	</div> 
	<!-- page-header --> 
	<div class="page-header"> 
	</div>
	<div class="card"> 
		<div class="card-header">
			<div class="col"> 
				<div class="card-title"><?php echo $head;?></div>
			</div> 
			<div class="col col-auto"> 
				<a class="btn btn-outline-success mt-4 mt-sm-0" href="<?= site_url('Auth/user/update/' . $id); ?>">
				<i class="fa fa-pencile mr-1 mt-1"></i> Edit</a> 
			</div> 
			 
		</div>
		<div class="card-body">
			<div class="row">
			  <?php foreach ($details as $key => $val) {
                    if ($key == 0) { ?>
                <div class="col-md-3 col-lg-3 " align="center"> 
				<?php if ($val->image) { ?>
					<img src="<?= base_url() ?>/upload/user/<?= $val->image; ?>">
				<?php } else { ?>
					<img src="<?= base_url() ?>/resources/img/no-image.jpg">
				<?php } ?>
				<div class="col-md-8 text-left">
				<div class="text-left" style="font-size:10px;">
				<?php echo $this->lang->line('label_name'); ?>: <?php echo ucwords(strtolower($val->first_name));?> 
				</div>
				
				</div>
				</div>
			  <?php } }?>
			    <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
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