
<?php include'header.php'; ?>
 <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo">Front Page</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          
        </div>
      </nav>
      <!-- End Navbar -->
<div class="content">
	<!-- <h4 class="text-center">Home Page Settings</h4> -->
	<div class='row justify-content-between'>
		<div class='col align-self-start'>
			  <!-- <button id='btnadd' class='btn btn-primary' onclick="javascript:location.href='<?php echo base_url(); ?>/irsys/Frontpage/AddForm'"><span class='nc-icon nc-simple-add'></span></button>  -->
		</div>
		<div class='col-sm-3 align-self-center'>
			<select name='sel_data' id='sel_data' onchange='sel_box()' class='form-control'>
				<option disabled selected style='display: none;'>Select the section</option>
				<option value='profile'>Profile</option>
				<option value='profilebg'>Home Profile Image 2</option>
				<option value='innerbg'>Inner page head image</option>
				<option value='infrastructure'>Infrastructure</option>
				<option value='vision'>Vision</option>
				<option value='mission'>Mission</option>
				<option value='video'>Featured Video</option>
				<option value='welcome'>Welcome to EASE</option>
				<option value='whychoose'>Why Choose Eram</option>
				<option value='whychooseimg'>Why Choose Eram Image 2</option>
				<option value='chairman'>Chairman's Messege</option>
				<option value='chairmanbg'>Chairman Background Image</option>
				<option value='manager'>Manager’s Message</option>
				<option value='managerbg'>Manager Background Image</option>
				<option value='principal'>Principal’s Message</option>
				<option value='principalbg'>Principal Background Image</option>
				<option value='trust'>The Trust</option>
				<option value='management'>The Management</option>
				<option value='schoolimprovement'>School Improvement Plan</option>
				<option value='admpolicy'>Admission Policy</option>
				<option value='admprocedure'>Admission Procedure</option>
				<option value='admproceduresteps'>Admission Procedure Steps</option>
				<option value='agelimit'>Age Limit</option>
				<option value='generalguidelines'>General Guidelines</option>
				<option value='tutionfee'>Tuition Fee Structure</option>
				<option value='easeacccouncil'>Ease Academic Council (EAC)</option>
				<option value='easestaffcouncil'>Ease Staff Council (ESC)</option>
				<option value='ashc'>Anti Sexual Harassment Committee (ASHC)/ Internal Complaints Committee (ICC)</option>
				<option value='sclsafetycmty'>School Safety Committee (SSC)</option>
				<option value='sclpgmcmty'>School Programme Committee (SPC)</option>
				<option value='hygenecmty'>Hygiene and Sanitation Committee (HSC)</option>
				<option value='easeevltncmty'>EASE Evaluation Committee (EEC)</option>
				<option value='childparentteachercmty'>Child-Parent-Teacher Committee [CPT]</option>
				<option value='sclprtciongrp'>School Protection Group (SPG)</option>
				<option value='internaldsplncmty'>Internal Discipline Committee (IDC)</option>
				<option value='grievance'>Grievance Redressal Committee (GRC)</option>
				<option value='address'>Address</option>
				<option value='phone'>Phone</option>
				<option value='mail'>Mail</option>
				<option value='location'>Location</option>
				<option value='socialmedia'>Social Media</option>
				<option value='shortdesc'>Short Description</option>
				<option value='career'>EASE Career</option>

			</select>
			<script>
				$(document).ready(function(){
					$('#sel_data').on('change',function(){
						$('#forTdata').hide();
					// $('#filterData').show();
					var sel_data = $(this).val();
					// var sel_data=document.getElementById('sel_data').value;
					if(sel_data){
						$.ajax({
							type:'POST',
							url:'<?php echo base_url(); ?>/irsys/Frontpage/selBox',
							data:'sel_data='+sel_data,
							success:function(html){
								$('#selBoxTable').html(html);
										// $('#selcat').html('<option value="">Select state first</option>'); 
									}
								}); 
					}else{
						$('#selBoxTable').html('<option value="">Select country first</option>');
					}
				});
				});
			</script>
		</div>
		<div class='col-sm-3'></div>
		<div class='col-sm-2'>
			<!-- <select name='limitdata' id='limitdata' onchange='sel_limit()'class='form-control'>					
				<option value='1'>1</option>
				<option value='2'>2</option>
				<option value=''>30</option>
				<option value=''>50</option>
				<option value=''>100</option>
			</select> -->
		</div>
	</div>
	<div id="selBoxTable"></div>
	<div class='f-table' id='forTdata'>
		<div class='card'>
			<div class="card-body">
				<div class='table-responsive'>
					<table class='table'>
						<thead class='text-primary'>
							<tr>
								<th>No</th>
								<th>Name</th>
								<th>Image</th>
								<th>SEO</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $n=1;
							foreach ($frontdata as $value){ ?>
								<tr>
									<td><?php echo $n++;?></td>
									<td><?php echo $value->names;?></td>
									<td><?php echo $value->image;?></td>
									<td><?php echo $value->seo;?></td>
									<td>
										<a href="<?php echo base_url(); ?>/irsys/Frontpage/EditContent/<?php echo $value->site_id;?>" class='ti-myedit'><span class='ti-pencil-alt'></span></a>
										<a href="<?php echo base_url(); ?>/irsys/Frontpage/ViewContent/<?php echo $value->site_id;?>" class='ti-myview'><span class='ti-search'></span></a>
										<!-- <a href="<?php echo base_url(); ?>/irsys/Frontpage/ContentDelete/<?php echo $value->site_id;?>" class='ti-mydelete' onclick="return confirm('Are you sure to Delete?')"><span class='ti-trash'></span></a> -->
									</td>
									</tr><?php }?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<?php include'footer.php'; ?>