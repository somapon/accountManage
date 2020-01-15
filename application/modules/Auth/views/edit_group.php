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
										<a class="btn btn-outline-success mt-4 mt-sm-0" href="<?= site_url('Auth/group'); ?>">
										<i class="feather icon-list mr-1 mt-1"></i> List</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				 <!-- row --> 
				<div class="row"> 
					<div class="col-sm-12">
						<div class="alert alert-primary" role="alert">
							<p>Use our extra helper file for quick widgets setup in your page - <a href="index-widget-package.html#page-table" target="_blank" class="alert-link">CHECKOUT</a></p>
							<label class="text-muted">Copy/paste source code in your page in just couples of seconds.</label>
						</div>
					</div>
					<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12"> 
						<div class="card">
							<div class="card-header"> 
								<h3 class="card-title"><?php echo $head;?></h3> 
							</div>
									<div class="card-body">
										<?php echo form_open(current_url()); ?>
										<div class="row">

											<div class="col-md-12">
												<div class="form-group">
													<label class="form-control-label" for="firstname"><?php echo $this->lang->line('label_group_name'); ?></label>
													<?php echo form_input($group_name); ?>
													<span class="error"> <?php echo form_error('group_name'); ?></span>
												</div>

												<div class="form-group">
													<label class="form-control-label" for="lastname"><?php echo $this->lang->line('label_description_name'); ?></label>
													<?php echo form_input($group_description); ?>
													<span class="error"> <?php echo form_error('group_name'); ?></span>
												</div>
												
												<div class="form-group">
													<table class="table">
														<thead>
														<tr>
															<th><?php echo $this->lang->line('label_menu'); ?></th>
															<th><?php echo $this->lang->line('label_can_add'); ?></th>
															<th><?php echo $this->lang->line('label_can_edit'); ?></th>
															<th><?php echo $this->lang->line('label_can_view'); ?></th>
															<th><?php echo $this->lang->line('label_can_delete'); ?></th>
														</tr>
														</thead>
														<tbody>
														<?php foreach ($menu_list as $key => $menu) {
															$groups = explode(',', $menu->group_id);

															if (in_array($id, $groups)) {
																$checked = 'checked';
															} else {
																$checked = '0';
															}

															?>
															<tr>
																<?php if ($menu->parent_id == 0) { ?>
																	<td class="left parent" style="text-align: start;">
																		<input type="checkbox" class="class1" name="assign_menu_id[]" value="<?php echo $menu->id;?>" <?php echo $checked;?>>
																		<b><?= $menu->title ?></b>
																		
																		<?= form_hidden('menu_id[]', $menu->id) ?>
																	</td>
																<?php } else{?>
																	<td class="left child" style=" text-align: start; padding-left: 10%;">
																		<input type="checkbox" class="class2" name="assign_menu_id[]" value="<?php echo $menu->id;?>" <?php echo $checked;?>>
																		<?= $menu->title ?>
																		<?= form_hidden('menu_id[]', $menu->id) ?>
																	</td>
																
																<td>
																	<?= form_hidden('can_add_' . $menu->id, '0') ?>
																	<?= form_checkbox('can_add_' . $menu->id, '1', $menu->can_add) ?>
																</td>
																<td>
																	<?= form_hidden('can_edit_' . $menu->id, '0') ?>
																	<?= form_checkbox('can_edit_' . $menu->id, '1', $menu->can_edit) ?>
																</td>
																<td>
																	<?= form_hidden('can_view_' . $menu->id, '0') ?>
																	<?= form_checkbox('can_view_' . $menu->id, '1', $menu->can_view) ?>
																</td>
																<td>
																	<?= form_hidden('can_delete_' . $menu->id, '0') ?>
																	<?= form_checkbox('can_delete_' . $menu->id, '1', $menu->can_delete) ?>
																</td>
																<?php }?>
															</tr>

														<?php } ?>
														</tbody>
													</table>
												</div>
												<div class="form-group">
													<input type="submit" class="btn btn-primary" id="showtoast" name="submit"
															value="<?php echo $this->lang->line('label_btn_update'); ?>">
														
											   
												</div>

											</div>

										</div>
										<?php echo form_close(); ?>
									</div> 
							</div>
						</div>
					<!-- row end-->
				</div>
			</div>
		</div>
	</div>
</div>

<?php //echo validation_errors(); ?>

<script>
$(document).ready(function() {
    $('.class1').click(function(event) {
        if(this.checked) { 
		
			$(this).closest('tr').find('td input:checkbox').attr("checked",true); 
             
        }else{
           $(this).closest('tr').find('td input:checkbox').attr("checked",false); 

        }
    });


});

</script>

<script>
$(document).ready(function() {
    $('.class2').click(function(event) {
        if(this.checked) { 
		
			$(this).closest('tr').find('td input:checkbox').attr("checked",true); 
             
        }else{
           $(this).closest('tr').find('td input:checkbox').attr("checked",false); 

        }
    });


});

</script>


<script>
	$(document).ready(function() { 

			$(".select2-1").select2();
	
	});
</script>