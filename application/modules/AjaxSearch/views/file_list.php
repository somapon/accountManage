<div class="side-app"> 
	<div class="bg-white p-3 header-secondary row"> 
		<div class="col"> 
 
		</div> 
		<div class="col col-auto"> 
			<a class="btn btn-outline-success mt-4 mt-sm-0" href="<?= site_url('FileUpload/upload_file'); ?>">
			<i class="fa fa-plus mr-1 mt-1"></i> Add</a> 
		</div> 
	</div> 
	<!-- page-header --> 
	<div class="page-header">  
	</div> 
	<!-- End page-header -->  

	<div class="card"> 
		<div class="card-header">
			<div class="card-title"><?php echo $head;?></div> 
		</div> 
		<div class="card-body">
			<div class="row">
				<div class="col-md-3">
					<div class="list-group">
						<h5>Case No</h5>
						<div class="list-group-item">
							<input type="text" class="form-control common_input caseNo" />
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="list-group">
						<h5>File Name</h5>
						<div class="list-group-item">
							<input id="text" class="form-control common_input fileName" />
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="list-group">
						<h5>Party Name</h5>
						<div class="list-group-item">
							<input id="text" class="form-control common_input partyName" />
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="list-group">
						<h5>Case Date</h5>
						<div class="brandSection">
							
							<div class="list-group-item checkbox">
								<label><input type="text" class="form-control date-picker common_date caseDate" id="search-start-date" ></label>
							</div>
							
						</div>
					</div>
				</div>
			</div>
			<hr/>
			<div class="row">
				<div class="col-md-4">
					<div class="list-group">
						<h5>Case Type</h5>
						<div class="brandSection scroll">
							<?php foreach($casetype as $key => $ct){ ?>
							<div class="list-group-item checkbox">
								<label><input type="checkbox" id="casetypeId" class="common_selector caseType" value="<?php echo $key; ?>" > <?php echo $ct; ?></label>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="list-group scroll">
						
				<?php


					$previous_category = "";
					foreach($casecategory as $key => $cct){
							
						$category = $cct->subcat_name;
						$name = $cct->subsubcat_name;
				?>

						
	
						<?php if ($previous_category !== $category) {?>
							<h5><?php echo $category;?></h5>
						<?php $previous_category = $category;
						}?>
						<div class="brandSection">
							
							<div class="list-group-item checkbox">
								<label><input type="checkbox" class="common_selector caseCategory" value="<?php echo $cct->id; ?>" > <?php echo $name; ?></label>
							</div>
							
						</div>

					
				<?php
					}							
				?>
					</div>
				</div>
				<div class="col-md-4">
					<div class="list-group">
						<h5>Court Type</h5>
						<div class="brandSection scroll">
							<?php foreach($courttype as $key => $court){ ?>
							<div class="list-group-item checkbox">
								<label><input type="checkbox" class="common_selector courtType" value="<?php echo $key; ?>" > <?php echo $court; ?></label>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
			<hr />
			<div class="row">
				<div class="table-responsive"> 
				
						<div class="row">
							<div class="col-sm-12">
								<table class="table table-striped table-bordered text-nowrap dataTable" role="grid" aria-describedby="" style="width: 854px;"> 
									<thead>
										<tr>
											<th>Sl No.</th>
											<th>Case No</th>
											<th>Case Type</th>
											<th>Case Category</th>
											<th>Court Type</th>
											<th>File Name</th>
											<th>Party Name</th>
											<th>Party District</th>
											<th>Action</th>
										</tr>
									</thead> 
									<tbody class="filter_data"> 

									</tbody>
								</table>
							</div>
						</div>
				
				</div>
			</div>
		</div>
	</div>
</div>


<script>

  $(document).ready(function() {
	
	$(".date-picker").datepicker({dateFormat: 'yy-mm-dd'});

  });
 </script>
<script>
$(document).ready(function(){

    filter_data();

    function filter_data()
    {
        $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data';
        var caseNo = $('.caseNo').val();
		var fileName = $('.fileName').val();
		var partyName = $('.partyName').val();
		var caseDate = $('.caseDate').val();
        var caseType = get_filter('caseType');
		var caseCategory = get_filter('caseCategory');
		var courtType = get_filter('courtType');
		
        $.ajax({
            url: "<?=site_url('AjaxSearch/search_result');?>",
            method:"POST",
            data:{'action':action, 'caseType':caseType, 'caseNo':caseNo, 'fileName':fileName, 'partyName':partyName, 'caseDate':caseDate, 'caseCategory':caseCategory, 'courtType':courtType},
            success:function(data){
				
				console.log(data);
                $('.filter_data').html(data);
            }
        });
    }

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    $('.common_selector').click(function(){
        filter_data();
    });
	
	$('.common_input').on('keyup', function(){
        filter_data();
    });
	
	$('.common_date').on('change', function(){
        filter_data();
    });

});
</script>