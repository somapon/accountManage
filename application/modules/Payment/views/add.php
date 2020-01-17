<style>
	.datepicker>.datepicker-days {
		display: block;
	}

	ol.linenums {
		margin: 0 0 0 -8px;
	}
	#tableReceived{
		padding: 3.05rem .75rem
	}
	
</style>


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
																	<div class="form-group col-md-3"><label>Vendor Name:<span
																						style="color:red;">*</span></label></div>
																	<div class="form-group col-md-9">
																		<?= form_input(array('name' => 'vname', 'value' => set_value('vname'), 'class' => 'form-control', 'placeholder' => 'Vendor Name', 'required' => 'required')); ?>
																		<span class="error"> <?php echo form_error('vname'); ?></span>
																	</div>
																	
																</div>
															</div>

															<div class="col-lg-12 col-md-12">
																<div class="row">
																	<div class="form-group col-md-3"><label>Address:<span
																						style="color:red;">*</span></label></div>
																	<div class="form-group col-md-4">
																		<?= form_textarea(array('name' => 'caddress', 'value' => set_value('caddress'), 'placeholder' => 'Enter Address', 'colls' => '9', 'rows' => '4', 'class' => 'form-control')); ?>
																		<span class="error"> <?php echo form_error('caddress'); ?></span>
																	</div>
																</div>
															</div>
															<div class="col-lg-12 col-md-12">
																<div class="row">
																	<div class="form-group col-md-3"><label>EBO Vendor Code:</label></div>
																	<div class="form-group col-md-4">
																		<?= form_input(array('name' => 'vemail', 'value' => set_value('vemail'), 'class' => 'form-control', 'placeholder' => 'EBO Vendor Code')); ?>
																		<span class="error"> <?php echo form_error('vemail'); ?></span>
																	</div>
																</div>
																																													<div class="form-row">
																	<div class="col-md-6 mb-3">
																	<div class="col-md-12">
																		<div class="row">
																			<div class="form-group col-md-6"><label>EBO Vendor Code:</label></div>
																			<div class="form-group col-md-6">
																				<?= form_input(array('name' => 'vemail', 'value' => set_value('vemail'), 'class' => 'form-control', 'placeholder' => 'EBO Vendor Code')); ?>
																				<span class="error"> <?php echo form_error('vemail'); ?></span>
																			</div>
																		</div></div>
																	</div>
																	<div class="col-md-6 mb-3">
																		<div class="row">
																			<div class="form-group col-md-5"><label>Regisration Number:</label></div>
																			<div class="form-group col-md-7">
																				<?= form_input(array('name' => 'vemail', 'value' => set_value('vemail'), 'class' => 'form-control', 'placeholder' => 'Vendor registration Number')); ?>
																				<span class="error"> <?php echo form_error('vemail'); ?></span>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															
															<div class="col-lg-12 col-md-12">
																<div class="row">
																	<div class="form-group col-md-3"><label>Description:</label></div>
																	<div class="form-group col-md-9">
																		<?= form_input(array('name' => 'vemail', 'value' => set_value('vemail'), 'class' => 'form-control', 'placeholder' => 'Description')); ?>
																		<span class="error"> <?php echo form_error('vemail'); ?></span>
																	</div>
																</div>
															</div>
															<div class="col-lg-12 col-md-12">
																<div class="row">
																	<div class="form-group col-md-3"><label>Name of Project:</label></div>
																	<div class="form-group col-md-9">
																		<?= form_input(array('name' => 'vemail', 'value' => set_value('vemail'), 'class' => 'form-control', 'placeholder' => 'Project name')); ?>
																		<span class="error"> <?php echo form_error('vemail'); ?></span>
																	</div>
																</div>
															</div>
																																												<div class="col-lg-12 col-md-12">
																<div class="row">
																	<div class="form-group col-md-3"><label>Vendor Bank Name:</label></div>
																	<div class="form-group col-md-9">
																		<?= form_input(array('name' => 'vemail', 'value' => set_value('vemail'), 'class' => 'form-control', 'placeholder' => 'bank Name')); ?>
																		<span class="error"> <?php echo form_error('vemail'); ?></span>
																	</div>
																</div>
															</div>
																																												<div class="col-lg-12 col-md-12">
																<div class="form-row">
																	<div class="col-md-6 mb-3">
																	<div class="col-md-12">
																		<div class="row">
																			<div class="form-group col-md-6"><label>Bank Account Number:</label></div>
																			<div class="form-group col-md-6">
																				<?= form_input(array('name' => 'vemail', 'value' => set_value('vemail'), 'class' => 'form-control', 'placeholder' => 'Bank Account Number')); ?>
																				<span class="error"> <?php echo form_error('vemail'); ?></span>
																			</div>
																		</div></div>
																	</div>
																	<div class="col-md-6 mb-3">
																		<div class="row">
																			<div class="form-group col-md-4"><label>Routing Number:</label></div>
																			<div class="form-group col-md-8">
																				<?= form_input(array('name' => 'vemail', 'value' => set_value('vemail'), 'class' => 'form-control', 'placeholder' => 'Routing Number')); ?>
																				<span class="error"> <?php echo form_error('vemail'); ?></span>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															<div class="col-lg-12 col-md-12">
																<div class="form-row">
																	<div class="col-md-6 mb-3">
																		<div class="row">
																			<div class="form-group col-md-6"><label>Payment Bank Name:</label></div>
																			<div class="form-group col-md-6">
																				<?= form_input(array('name' => 'vemail', 'value' => set_value('vemail'), 'class' => 'form-control', 'placeholder' => 'Bank Name')); ?>
																				<span class="error"> <?php echo form_error('vemail'); ?></span>
																			</div>
																		</div>
																	</div>
																	<div class="col-md-6 mb-3">
																		<div class="row">
																			<div class="form-group col-md-4"><label>Cheque Number:</label></div>
																			<div class="form-group col-md-8">
																				<?= form_input(array('name' => 'vemail', 'value' => set_value('vemail'), 'class' => 'form-control', 'placeholder' => 'Email')); ?>
																				<span class="error"> <?php echo form_error('vemail'); ?></span>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															<div class="col-lg-12 col-md-12">
																																													<div class="form-row">
																	<div class="col-md-6 mb-3">
																		<div class="row">
																			<div class="form-group col-md-6"><label>Account Type:</label></div>
																			<div class="form-group col-md-6">
																				<?= form_input(array('name' => 'vemail', 'value' => set_value('vemail'), 'class' => 'form-control', 'placeholder' => 'Account Type')); ?>
																				<span class="error"> <?php echo form_error('vemail'); ?></span>
																			</div>
																		</div>
																	</div>
																	<div class="col-md-6 mb-3">
																		<div class="row">
																			<div class="form-group col-md-4"><label>Date:</label></div>
																			<div class="form-group col-md-6">
																				<input type="text" class="form-control" id="d_auto">
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															<div class="col-lg-12 col-md-12">
																<div class="table-responsive">
																	<table class="table table-bordered">
																	
																
																	<tbody>
																		<tr align="center">
																			<th rowspan="2" id="tableReceived">SL.</th>
																			<th rowspan="2" id="tableReceived">Invoice Name</th>
																			<th rowspan="2" id="tableReceived">Invoice Date</th>
																			<th rowspan="2" id="tableReceived">Document Descriptions</th>
																			<th colspan="2">CHARGE CODE NO</th>
																			<th colspan="1">Bill Amount</th>
																			<th colspan="2"></th>
																			<th colspan="1">TOTAL Expenses</th>
																			<th colspan="4">LESS</th>
																			<th colspan="2">Deducted</th>
																			<th rowspan="2">NET  Payable</th>
																			<th rowspan="6">Remarks</th>
																		</tr>
																		<tr>
																			<th>PROJECT</th>
																			<th>EXP. CODE</th>
																			<th>IN TAKA</th>
																			<th></th>
																			<th></th>
																			<th>IN TAKA</th>
																			<th>VAT Rate</th>
																			<th>VAT Amount</th>
																			<th>Tax Rate</th>
																			<th>TAX Amount</th>
																			<th>VAT</th>
																			<th>TAX</th>
																		</tr>
																		<tr align="center" >
																			<th></th>
																			<th></th>
																			<th></th>
																			<th></th>
																			<th></th>
																			<th></th>
																			<th></th>
																			<th></th>
																			<th></th>
																			<th></th>
																			<th></th>
																			<th></th>
																			<th></th>
																			<th></th>
																			<th></th>
																			<th></th>
																			<th></th>
																		</tr>
																		<tr align="center" >
																			<th></th>
																			<th></th>
																			<th></th>
																			<th></th>
																			<th></th>
																			<th></th>
																			<th></th>
																			<th></th>
																			<th></th>
																			<th></th>
																			<th></th>
																			<th></th>
																			<th></th>
																			<th></th>
																			<th></th>
																			<th></th>
																			<th></th>
																		</tr>
																		<tr align="center" >
																			<th></th>
																			<th></th>
																			<th></th>
																			<th></th>
																			<th></th>
																			<th></th>
																			<th></th>
																			<th></th>
																			<th></th>
																			<th></th>
																			<th></th>
																			<th></th>
																			<th></th>
																			<th></th>
																			<th></th>
																			<th></th>
																			<th></th>
																		</tr>
																		<tr>
																		<td colspan="6" class="text-center">TOTAL</td>
																			<td>100</td>
																			<td></td>
																			<td></td>
																			<td>100</td>
																			<td></td>
																			<td>5</td>
																			<td></td>
																			<td>3</td>
																			<td></td>
																			<td></td>
																			<td>92</td>
																			
																		</tr>											
																	</tbody>

																	
																	
																	 </table>


																</div>
															</div>													
														</div>
													</div>
													</form>
												</div>
											</div>
											<div class="col-lg-12 col-md-12">
												<div class="row">
													<div class="form-group col-md-5"><label>In Word:</label></div>
													<div class="form-group col-md-7">
														
													</div>
												</div>
											</div>
											<div class="col-lg-12 col-md-12">
												<div class="row">
												<div class="col-md-6">
													<div class="col-lg-12 col-md-12">
														<div class="row">
															<div class="form-group col-md-5"><label>  AP/PJ Number:<span
																				style="color:red;">*</span></label></div>
															<div class="form-group col-md-7">
																<?= form_input(array('name' => 'cname', 'value' => set_value('cname'), 'class' => 'form-control', 'placeholder' => '', 'required' => 'required')); ?>
																<span class="error"> <?php echo form_error('cname'); ?></span>
															</div>
															
														</div>
													</div>

													<div class="col-lg-12 col-md-12">
														<div class="row">
															<div class="form-group col-md-5"><label>Date:</label></div>
															<div class="form-group col-md-7">
																<input type="text" class="form-control" id="d_auto1">
															</div>
														</div>
													</div>

												</div>
												<div class="col-md-6">
													<div class="col-lg-12 col-md-12">
														<div class="row">
															<table class="table table-bordered">
															  <tbody>
																<tr>
																  <td>Expenses</td>
																  <td>
																	<?= form_input(array('name' => 'cemail', 'value' => set_value('cemail'), 'class' => 'form-control', 'placeholder' => '')); ?>
																	<span class="error"> <?php echo form_error('cemail'); ?></span></td>
																  <td rowspan="5">All Parts</td>
																</tr>
																<tr>
																  <td>Tax Deduction</td>
																  <td>
																	<?= form_input(array('name' => 'cemail', 'value' => set_value('cemail'), 'class' => 'form-control', 'placeholder' => '')); ?>
																	<span class="error"> <?php echo form_error('cemail'); ?></span></td>
																</tr>
																<tr>
																	<td>VAT Deduction</td>
																	<td>
																		<?= form_input(array('name' => 'cemail', 'value' => set_value('cemail'), 'class' => 'form-control', 'placeholder' => '')); ?>
																		<span class="error"> <?php echo form_error('cemail'); ?></span>
																														
																	</td>
																</tr>
																<tr>
																	<td>Adjustment</td>
																	<td>
																														
																		<?= form_input(array('name' => 'cemail', 'value' => set_value('cemail'), 'class' => 'form-control', 'placeholder' => '')); ?>
																		<span class="error"> <?php echo form_error('cemail'); ?></span>
																														
																														
																	</td>
																</tr>
																<tr>
																	<td>Diff</td>
																	<td>													
																		<?= form_input(array('name' => 'cemail', 'value' => set_value('cemail'), 'class' => 'form-control', 'placeholder' => '')); ?>
																		<span class="error"> <?php echo form_error('cemail'); ?></span>
																																										
																	</td>
																</tr>
															  </tbody>
															</table>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-12 col-md-12 mt-5">
											<div class="row">
												<div class="col-md-3">Prepared By:</div>
												<div class="col-md-3">Checked By</div>
												<div class="col-md-3">Approved By</div>
												<div class="col-md-3">Approved By</div>
											</div>
										</div>
										<div class="col-lg-8 col-md-7 offset-5 text-center mt-5">
											
												Received By<br/>
												Date
											
										
										</div>
										<div class="row text-center">
											<div class="col-lg-12 col-md-12">
												<div class="card-footer text-right"> 
													<input type="submit" class="btn btn-success mt-1" value="Submit"> 
													<a href="<?= site_url('Vendor/vendor_list'); ?>" class="btn btn-warning mt-1">Cancel</a> 
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