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
            <a class="navbar-brand" href="#pablo">Delivery Note</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="nc-icon nc-zoom-split"></i>
                  </div>
                </div>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link btn-magnify" href="#pablo">
                  <i class="nc-icon nc-layout-11"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Stats</span>
                  </p>
                </a>
              </li>
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-bell-55"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link btn-rotate" href="#pablo">
                  <i class="nc-icon nc-settings-gear-65"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
<div class="content">
	
	<div id="newsAddForm">
		<div class="card">

			<div class='card-body'>
				<form method='post' action='<?php echo base_url();?>/Deliverynote/UpdateDeliverynote'>
          <input type="text" name="did" value="<?php echo $editdata[0]->deliveryNoteMasterId; ?>" hidden>

          <div class='row'>
            <div class='col-sm-6'>
              <label>DL No: </label>
							<input type='text' name='dlno' id='dlno' class='form-control' value="<?php echo $editdata[0]->dl_no; ?>" readonly>

            </div>
            <div class='col-sm-6'>
              <label>Project Name <span style="color: #f00; font-size: 15px;">*</span></label>
              <input type='text' name='pname' id='pname' class='form-control' value="<?php echo $editdata[0]->ProjectName; ?>" required>
            </div>
          </div>
					<div class='row'>
					
            <div class='col-sm-6'>
              <label>Project Code <span style="color: #f00; font-size: 15px;">*</span></label>
              <input type='text' name='pcode' id='pcode' class='form-control' value="<?php echo $editdata[0]->ProjectCode; ?>" required>
            </div>
            <div class='col-sm-6'>
              <label>Date </label>
              <input type='date' name='date' id='date' class='form-control' value="<?php echo $editdata[0]->Date; ?>">
            </div>
          </div>
					<div class='row'>
						<div class='col-sm-6'>
							<label>Driver's Name</label>
							<input type='text' name='dname' id='dname' class='form-control' value="<?php echo $editdata[0]->DriverName; ?>">
						</div>
					
						<div class='col-sm-6'>
							<label>Driver's Mobile</label>
							<input type='number' name='dmobile' id='dmobile' class='form-control' value="<?php echo $editdata[0]->DriverMobile; ?>">
						</div>
					</div>
          <div class='row'>
            <div class='col-sm-6'>
              <label>Vehicle Number</label>
              <input type='text' name='vehicleno' id='vehicleno' class='form-control' value="<?php echo $editdata[0]->VehicleNo; ?>">
            </div>
          
            <div class='col-sm-6'>
              <label>Departure Time</label>
              <input type='datetime-local' name='deptime' id='deptime' class='form-control' value="<?php echo $editdata[0]->DepartureTime; ?>">
            </div>
          </div>
          <div class='row'>
            <div class='col-sm-6'>
              <label>WO Number</label>
              <input type='text' name='wonumber' id='wonumber' class='form-control' value="<?php echo $editdata[0]->WONumber; ?>" >
            </div>
          
            <div class='col-sm-6'>
              <label>Request Number</label>
              <input type='text' name='requestnumber' id='requestnumber' class='form-control' value="<?php echo $editdata[0]->RequestNumber; ?>" >
            </div>
          </div>

          <div class='row'>
            <div class='col-sm-6'>
              <label>Type</label>
              <select class="form-control" name="type" id="type">
                  <option selected="">Select Type</option>
                  <option value="INDENTS" <?php if($editdata[0]->type == 'INDENTS'){echo 'selected=""';}?>>INDENTS</option>
                  <option value="FINISH PRODUCTS" <?php if($editdata[0]->type == 'FINISH PRODUCTS'){echo 'selected=""';}?>>FINISH PRODUCTS</option>
                  <option value="GALVANIZING" <?php if($editdata[0]->type == 'GALVANIZING'){echo 'selected=""';}?>>GALVANIZING</option>
                  <option value="POWDER COATING" <?php if($editdata[0]->type == 'POWDER COATING'){echo 'selected=""';}?>>POWDER COATING</option>
                  <option value="GLASS ORDER" <?php if($editdata[0]->type == 'GLASS ORDER'){echo 'selected=""';}?>>GLASS ORDER</option>
              </select>
            </div>
          </div>

					
          <table id="table-2" class="table table-hover mt-2">
            <thead>
              <tr>
                <th width="5%">Sl No</th>
                <th width="12%">Item Code</th>
                <th>Description</th>
                <th width="9%">Unit</th>
                <th width="9%">Width</th>
                <th width="9%">Height</th>
                <th width="8%">Qty</th>
                <th width="15%">Notes</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody id="table_body">
              <?php 
              $slno=1;

             for ($i= 0; $i<count($editsplitdata); $i++) { ?>
              <tr class="tabRow">
                <td class="sno">
                  <input type="text" readonly name="slno[]" class="form-control" value="<?php echo $editsplitdata[$i]->LineIndex;?>">
                </td>
                <td>
                  <input placeholder="Item Code" type="text" name="itemcode[]" class="form-control" value="<?php echo $editsplitdata[$i]->ItemCode;?>" >
                </td>
                <td>
                  <input placeholder="Description" type="text" name="desc[]" class="form-control" value="<?php echo $editsplitdata[$i]->Description;?>">
                </td>
                <td>
                  <input placeholder="Unit" type="text" name="unit[]" class="form-control" value="<?php echo $editsplitdata[$i]->Unit;?>">
                </td>
                <td>
                  <input placeholder="Width" type="number" name="width[]" class="form-control" value="<?php echo $editsplitdata[$i]->Width;?>">
                </td>
                <td>
                  <input placeholder="Height" type="number" name="height[]" class="form-control" value="<?php echo $editsplitdata[$i]->Height;?>">
                </td>
                <td>
                  <input placeholder="Qty" type="number" name="qty[]" class="form-control" value="<?php echo $editsplitdata[$i]->Qty;?>">
                </td>
                <td>
                  <input placeholder="Notes" type="text" name="notes[]" class="form-control" value="<?php echo $editsplitdata[$i]->Notes;?>">
                </td>
                <td>
                  <a id="btnremove" class="btn-sm btn-outline-danger"><span class="fa fa-close"></span></a>
                </td>
              </tr>
            <?php } ?>
            </tbody>
          </table>
          <a class="btn btn-sm btn-outline-primary" id="butVal"><span class="fa fa-plus"></span></a>
					
					
					<div class='row'>
						<div class='update ml-3 mr-auto'>
							<button type='submit' class='btn btn-success'>Save</button>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>



<script>
  $(document).ready(function () {
  // Function to add a new row
  $('#butVal').click(function () {
    // Clone the first row and append it to the tbody
    const newRow = $('tr.tabRow:first').clone(true).appendTo('#table-2>tbody');

    // Clear the input fields in the newly added row
    newRow.find('input').val('');

    // Update the serial numbers
    updateRowNumbers();
  });

  // Function to remove a row
  $(document).on('click', '#btnremove', function () {
    // Ensure at least one row remains
    if ($('#table-2 tbody tr').length > 1) {
      $(this).closest('tr.tabRow').remove();
      updateRowNumbers();
    } else {
      $(this).closest('tr.tabRow').find('input').val(''); // Clear the fields if it's the last row
    }
  });

  // Function to update row numbers after adding/removing
  function updateRowNumbers() {
    $('#table-2 tbody tr.tabRow').each(function (index, element) {
      $(element).find('td.sno input').val(index + 1); // Update serial number
    });
  }
});

</script>

<?php include'footer.php'; ?>