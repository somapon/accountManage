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
										<a class="btn btn-outline-success mt-4 mt-sm-0" href="<?= site_url('Auth/group'); ?>">
										<i class="feather icon-plus-square mr-1 mt-1"></i> List</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				 <!-- row --> 
				<div class="row"> 
					<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12"> 
						<div class="card">
							<div class="card-header"> 
								<h4 class="card-title"><?php echo $head;?></h4> 
							</div>
							<form id="groupForm" method="post" action="<?= site_url('Auth/group/add'); ?>">
								<div class="card-body">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label class="form-control-label" for="firstname"><?php echo $this->lang->line('label_group_name'); ?></label>
												<?php echo form_input($group_name); ?>
												<span class="error"> <?php echo form_error('group_name'); ?></span>
											</div>

											<div class="form-group">
												<label class="form-control-label" for="lastname"><?php echo $this->lang->line('label_description_name'); ?></label>
												<?php echo form_input($description); ?>
												<span class="error"> <?php echo form_error('group_name'); ?></span>
											</div>

											<div class="form-group">
												<table class="table">
													<thead>
													<tr>
														<th>Menu</th>
														<th>Can Add</th>
														<th>Can Edit</th>
														<th>Can View</th>
														<th>Can Delete</th>
													</tr>
													</thead>
													<tbody>
													<?php foreach ($menu_list as $menu) { ?>
														<tr>
															<td class="left"><?= $menu->title; ?>
																<?= form_hidden('menu_id[]', $menu->id) ?>
															</td>
															<td>
																<?= form_hidden('can_add_' . $menu->id, '0') ?>
																<?= form_checkbox('can_add_' . $menu->id, '1') ?>
															</td>
															<td>
																<?= form_hidden('can_edit_' . $menu->id, '0') ?>
																<?= form_checkbox('can_edit_' . $menu->id, '1') ?>
															</td>
															<td>
																<?= form_hidden('can_view_' . $menu->id, '0') ?>
																<?= form_checkbox('can_view_' . $menu->id, '1') ?>
															</td>
															<td>
																<?= form_hidden('can_delete_' . $menu->id, '0') ?>
																<?= form_checkbox('can_delete_' . $menu->id, '1') ?>
															</td>
														</tr>

													<?php } ?>
													</tbody>


												</table>


											</div>



										</div>

									</div>
								</div>
								<div class="card-footer">
									<input type="submit" class="btn btn-primary" id="showtoast" name="submit"
											value="<?php echo $this->lang->line('label_btn_save'); ?>">
								</div>
							</form>

							<?php echo form_close(); ?>

						</div> 
					</div>
				</div>
				<!-- row end-->
			</div>
		</div>
	</div>
</section>

<?php //echo validation_errors(); ?>