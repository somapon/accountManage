<section class="pcoded-main-container">
	<div class="pcoded-wrapper">
		<div class="pcoded-content">
			<div class="pcoded-inner-content">
				<div class="main-body">
					<div class="page-wrapper">
						<div class="row">
							<div class="col-sm-12">
								<div class="alert alert-primary" role="alert">
									<p>Use our extra helper file for quick setup Form Components in your page - <a href="index-form-package.html" target="_blank" class="alert-link">CHECKOUT</a></p>
									<label class="text-muted">Copy/paste source code in your page in just couples of seconds.</label>
								</div>
							</div>
							<div class="container" id="printTable">
								<div>
									<div class="card">
										<div class="card-header">
											<h5><?php echo $head;?></h5>
										</div>
										<div class="card-block">
											<div class="row invoive-info">
												<div class="col-md-3 col-xs-12 invoice-client-info">
													<img src="<?= base_url();?>upload/company_logo.jpg" class="m-b-10" alt="">
												</div>
												<!--<div class="col-md-6 col-sm-6">
													<h6>SURBANA JURONG INFRASTRUCTURE PTE LTD.</h6>
													<table class="table table-responsive invoice-table invoice-order table-borderless">
														<tbody>
															<tr>
																<th>Date :</th>
																<td>November 14</td>
															</tr>
															<tr>
																<th>Status :</th>
																<td>
																	<span class="label label-warning">Pending</span>
																</td>
															</tr>
															<tr>
																<th>Id :</th>
																<td>#146859</td>
															</tr>
														</tbody>
													</table>
												</div>-->
												
												<div class="col-md-6 col-6 text-center m-b-10">
													<h5><b>SURBANA JURONG INFRASTRUCTURE PTE LTD.</b></h5>
													<h5 style="font-size: 17px;"><b>House # 374, Lane # 06</b></h5>
													<h5 style="font-size: 17px;"><b>DOHS, Baridhara, Dhaka.</b></h5>
												</div>
												<div class="col-md-3 col-sm-6 text-right">
													<img src="<?= base_url();?>upload/left_logo.jpg" class="m-b-10" alt="">
												</div>
											</div>
											<div class="row">
												<div class="col-sm-12">
													<form action="<?= site_url('Vendor/add_vendor'); ?>" method="post"
														  class="form-horizontal"  novalidate enctype="multipart/form-data">
													<div class="card-body">
														<div class="row">
															
																<div class="col-lg-12 col-md-12">
																	<div class="row">
																		<div class="form-group col-md-3"><label>Client Name:<span
																							style="color:red;">*</span></label></div>
																		<div class="form-group col-md-9">
																			<?= form_input(array('name' => 'vname', 'value' => set_value('vname'), 'class' => 'form-control', 'placeholder' => 'Vendor Name', 'required' => 'required')); ?>
																			<span class="error"> <?php echo form_error('vname'); ?></span>
																		</div>
																		
																	</div>
																</div>

																<div class="col-lg-12 col-md-12">
																	<div class="row">
																		<div class="form-group col-md-3"><label>Invoice Number:<span
																							style="color:red;">*</span></label></div>
																		<div class="form-group col-md-4">
																			<?= form_input(array('name' => 'vphone', 'value' => set_value('vphone'), 'class' => 'form-control', 'placeholder' => 'Phone', 'required' => 'required')); ?>
																			<span class="error"> <?php echo form_error('vphone'); ?></span>
																		</div>
																	</div>
																</div>
																<div class="col-lg-12 col-md-12">
																	<div class="row">
																		<div class="form-group col-md-3"><label>EBO Vendor Code:</label></div>
																		<div class="form-group col-md-4">
																			<?= form_input(array('name' => 'vemail', 'value' => set_value('vemail'), 'class' => 'form-control', 'placeholder' => 'Email')); ?>
																			<span class="error"> <?php echo form_error('vemail'); ?></span>
																		</div>
																	</div>
																</div>
																<div class="col-lg-12 col-md-12">
																	<div class="row">
																		<div class="form-group col-md-3"><label>Description:</label></div>
																		<div class="form-group col-md-9">
																			<?= form_input(array('name' => 'vemail', 'value' => set_value('vemail'), 'class' => 'form-control', 'placeholder' => 'Email')); ?>
																			<span class="error"> <?php echo form_error('vemail'); ?></span>
																		</div>
																	</div>
																</div>
																<div class="col-lg-12 col-md-12">
																	<div class="row">
																		<div class="form-group col-md-3"><label>Name of Project:</label></div>
																		<div class="form-group col-md-9">
																			<?= form_input(array('name' => 'vemail', 'value' => set_value('vemail'), 'class' => 'form-control', 'placeholder' => 'Email')); ?>
																			<span class="error"> <?php echo form_error('vemail'); ?></span>
																		</div>
																	</div>
																</div>
																
																																												<div class="col-lg-12 col-md-12">
																<div class="form-row">
																	<div class="col-md-6 mb-3">
																		<div class="row">
																			<div class="form-group col-md-3"><label>Bank Name:</label></div>
																			<div class="form-group col-md-9">
																				<?= form_input(array('name' => 'vemail', 'value' => set_value('vemail'), 'class' => 'form-control', 'placeholder' => 'Email')); ?>
																				<span class="error"> <?php echo form_error('vemail'); ?></span>
																			</div>
																		</div>
																	</div>
																	<div class="col-md-3 mb-3">
																		<div class="row">
																			<div class="form-group col-md-3"><label>Name of Project:</label></div>
																			<div class="form-group col-md-9">
																				<?= form_input(array('name' => 'vemail', 'value' => set_value('vemail'), 'class' => 'form-control', 'placeholder' => 'Email')); ?>
																				<span class="error"> <?php echo form_error('vemail'); ?></span>
																			</div>
																		</div>
																	</div>
																	<div class="col-md-3 mb-3">
																		<div class="row">
																			<div class="form-group col-md-3"><label>Name of Project:</label></div>
																			<div class="form-group col-md-9">
																				<?= form_input(array('name' => 'vemail', 'value' => set_value('vemail'), 'class' => 'form-control', 'placeholder' => 'Email')); ?>
																				<span class="error"> <?php echo form_error('vemail'); ?></span>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-lg-12 col-md-12"> 
																<div class="form-group"> 
																	<label for="exampleInputname">Address :</label> 
																	<?= form_textarea(array('name' => 'vaddress', 'value' => set_value('vaddress'), 'placeholder' => 'Enter Address', 'colls' => '9', 'rows' => '4', 'class' => 'form-control')); ?>
																	<span class="error"> <?php echo form_error('vaddress'); ?></span>
																</div> 
															</div>
														</div>
													</div>
													<div class="col-lg-10 col-md-10">
															<div class="card-footer text-right"> 
																<input type="submit" class="btn btn-success mt-1" value="<?php echo $this->lang->line('label_btn_submit'); ?>"> 
																<a href="<?= site_url('Vendor/vendor_list'); ?>" class="btn btn-warning mt-1">Cancel</a> 
															</div>
														</div>
													</form>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-12">
													<table class="table table-responsive invoice-table invoice-total">
														<tbody>
															<tr>
																<th>Sub Total :</th>
																<td>$4725.00</td>
															</tr>
															<tr>
																<th>Taxes (10%) :</th>
																<td>$57.00</td>
															</tr>
															<tr>
																<th>Discount (5%) :</th>
																<td>$45.00</td>
															</tr>
															<tr class="text-info">
																<td>
																<hr>
																<h5 class="text-primary m-r-10">Total :</h5>
															</td>
															<td>
																<hr>
																<h5 class="text-primary">$4827.00</h5>
																</td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-12">
													<h6>Terms And Condition :</h6>
													<p>lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
													laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
													</p>
												</div>
											</div>
										</div>
									</div>
									<div class="row text-center">
										<div class="col-sm-12 invoice-btn-group text-center">
											<button type="button" class="btn btn-primary btn-print-invoice m-b-10">Print</button>
											<button type="button" class="btn btn-secondary m-b-10 ">Cancel</button>
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