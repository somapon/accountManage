<?php
foreach($menu_access as $ma){

	if($ma->menu_id == 39 ){
		$can_add = $ma->can_add;
		$can_edit = $ma->can_edit;
		$can_delete = $ma->can_delete;
		$can_view = $ma->can_view;
	}
	
}
	
?>
<div class="side-app"> 
	<div class="bg-white p-3 header-secondary row"> 
		<div class="col"> 
 
		</div> 
		<div class="col col-auto"> 
			<a class="btn btn-outline-success mt-4 mt-sm-0" href="<?= site_url('Auth/group/add'); ?>">
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
							<table id="example3" class="table table-striped table-bordered text-nowrap dataTable no-footer dtr-inline collapsed" role="grid" aria-describedby="example3_info" style="width: 854px;"> 
								<thead>
									<tr>
										<th><?php echo $this->lang->line('label_sl_no'); ?></th>
										<th><?php echo $this->lang->line('label_user_name'); ?></th>
										<th><?php echo $this->lang->line('label_user_description'); ?></th>
										<th><?php echo $this->lang->line('label_action'); ?></th>
									</tr>
								</thead> 
								<tbody> 
									<?php 
									$i = 1;
									if ($groups) {
										foreach ($groups as $key => $val) { ?>
									<tr>
										
										<td class="sorting_1" tabindex="0"><?= $this->uri->segment(3) + $i; ?></td>
										<td><?= $val['name']; ?></td>
										<td><?= $val['description']; ?></td>
										
										<td>
											<?php if($this->ion_auth->is_admin()){?>
											<div class="btn-group align-top">
												<a class="btn btn-sm btn-primary badge" title="Edit" href="<?= site_url('Auth/group/edit/' . $val['id']); ?>" class="btn btn-primary btn-xs">
													Edit
												</a>
												<!--<button class="btn btn-sm btn-primary badge" type="button"><a href="<?//= site_url('Auth/user/edit/' . $user_val->id); ?>">Edit</a></button>--> 
												<a href="<?= site_url('Auth/group/delete/' . $val['id']); ?>" class="btn btn-sm btn-primary badge" onclick="return confirm('Are you sure you want to Remove?');"><i class="fa fa-trash"></i></a> 
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