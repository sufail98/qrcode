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

  <div class="card">
    <div class='card-body'>
      <form method='post' action='<?php echo base_url();?>/Deliverynote/ExcelUpload' enctype="multipart/form-data">
        <div class='row'>

          <div class='col-sm-6'>
            <label>File to Upload: </label>
            <input type='file' name='excelfile' class='form-control'>
          </div>
          <div class='col-sm-6'>
							<button type='submit' class='btn btn-success mt-4'>Upload</button>
          </div>

        </div>
      </form>
    </div>
  </div>
	
	<div id="newsAddForm">
		<div class="card">

			<div class='card-body'>
				<form method='post' action='<?php echo base_url();?>/Deliverynote/AddDeliverynote'>
          <input type='text' name='excelfilename' id='excelfilename' class='form-control' hidden>

          <div class='row'>
            <div class='col-sm-6'>
              <label>DL No: </label>
              <input type='text' name='dlno' id='dlno' class='form-control' value="<?= $maxdlno; ?>" onkeypress="return isNumberKey(event)">
            </div>
            <div class='col-sm-6'>
              <label>Project Name <span style="color: #f00; font-size: 15px;">*</span></label>
              <input type='text' name='pname' id='pname' class='form-control' required>
            </div>
          </div>
					<div class='row'>
					
            <div class='col-sm-6'>
              <label>Project Code <span style="color: #f00; font-size: 15px;">*</span></label>
              <input type='text' name='pcode' id='pcode' class='form-control' required>
            </div>
            <div class='col-sm-6'>
              <label>Date </label>
              <input type='date' name='date' id='date' class='form-control'>
            </div>
          </div>
					<div class='row'>
						<div class='col-sm-6'>
							<label>Driver's Name</label>
							<input type='text' name='dname' id='dname' class='form-control'>
						</div>
					
						<div class='col-sm-6'>
							<label>Driver's Mobile</label>
							<input type='number' name='dmobile' id='dmobile' class='form-control'>
						</div>
					</div>
          <div class='row'>
            <div class='col-sm-6'>
              <label>Vehicle Number</label>
              <input type='text' name='vehicleno' id='vehicleno' class='form-control'>
            </div>
          
            <div class='col-sm-6'>
              <label>Departure Time</label>
              <input type='datetime-local' name='deptime' id='deptime' class='form-control'>
            </div>
          </div>
          <div class='row'>
            <div class='col-sm-6'>
              <label>WO Number</label>
              <input type='text' name='wonumber' id='wonumber' class='form-control' >
            </div>
          
            <div class='col-sm-6'>
              <label>Request Number</label>
              <input type='text' name='requestnumber' id='requestnumber' class='form-control' >
            </div>
          </div>

          <div class='row'>
            <div class='col-sm-6'>
              <label>Type</label>
              <select class="form-control" name="type" id="type">
                  <option selected="">Select Type</option>
                  <option value="INDENTS">INDENTS</option>
                  <option value="FINISH PRODUCTS">FINISH PRODUCTS</option>
                  <option value="GALVANIZING">GALVANIZING</option>
                  <option value="POWDER COATING">POWDER COATING</option>
                  <option value="GLASS ORDER">GLASS ORDER</option>
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
              <tr class="tabRow">
                <td class="sno">
                  <input type="text" readonly name="slno[]" class="form-control" value="1">
                </td>
                <td>
                  <input placeholder="Item Code" type="text" name="itemcode[]" class="form-control" >
                </td>
                <td>
                  <input placeholder="Description" type="text" name="desc[]" class="form-control">
                </td>
                <td>
                  <input placeholder="Unit" type="text" name="unit[]" class="form-control">
                </td>
                <td>
                  <input placeholder="Width" type="number" name="width[]" class="form-control">
                </td>
                <td>
                  <input placeholder="Height" type="number" name="height[]" class="form-control">
                </td>
                <td>
                  <input placeholder="Qty" type="number" name="qty[]" class="form-control">
                </td>
                <td>
                  <input placeholder="Notes" type="text" name="notes[]" class="form-control">
                </td>
                <td>
                  <a id="btnremove" class="btn-sm btn-outline-danger"><span class="fa fa-close"></span></a>
                </td>
              </tr>
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

  const today = new Date();
  const formattedToday = today.toISOString().split('T')[0];
  $('#date').val(formattedToday);
  $('#deptime').val(`${formattedToday}T00:00`);
  
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




  // Handle the form submission for Excel upload
  $("form[action*='/Deliverynote/ExcelUpload']").on('submit', function(e) {
    e.preventDefault(); // Prevent default form submission

    var formData = new FormData(this);

    $.ajax({
        url: $(this).attr('action'), // The form action URL
        type: 'POST',
        data: formData,
        processData: false, // Prevent jQuery from processing the data
        contentType: false, // Prevent jQuery from setting contentType
        success: function(response) {

            var data = JSON.parse(response);

            if (data.error) {
                alert(data.error);
                return; 
            }
            $('#excelfilename').val(data.file_name);
            
            if (data.project_data) {
                $('#pname').val(data.project_data.project_name);
                $('#pcode').val(data.project_data.project_code);
                $('#date').val(convertExcelDateToJSDate(data.project_data.date)); // Convert Excel date to JS date
                $('#dname').val(data.project_data.driver_name);
                $('#dmobile').val(data.project_data.driver_mobile);
                $('#vehicleno').val(data.project_data.vehicle_number);
                $('#deptime').val(convertExcelDateToJSTime(data.project_data.departure_time)); // Convert time
                $('#wonumber').val(data.project_data.wo_number);
                $('#requestnumber').val(data.project_data.request_number);
            }

            if (data.item_data && data.item_data.length > 0) {
                // Clear the existing table rows, except the first template row
                $('#table_body').empty();

                // Loop through the item data and append rows to the table
                data.item_data.forEach(function(item, index) {
                    var newRow = `
                        <tr class="tabRow">
                            <td class="sno">
                                <input type="text" readonly name="slno[]" class="form-control" value="${index + 1}">
                            </td>
                            <td>
                                <input placeholder="Item Code" type="text" name="itemcode[]" class="form-control" value="${item.item_code}">
                            </td>
                            <td>
                                <input placeholder="Description" type="text" name="desc[]" class="form-control" value="${item.description}">
                            </td>
                            <td>
                                <input placeholder="Unit" type="text" name="unit[]" class="form-control" value="${item.unit}">
                            </td>
                            <td>
                                <input placeholder="Width" type="number" name="width[]" class="form-control" value="${item.width}">
                            </td>
                            <td>
                                <input placeholder="Height" type="number" name="height[]" class="form-control" value="${item.height}">
                            </td>
                            <td>
                                <input placeholder="Qty" type="number" name="qty[]" class="form-control" value="${item.quantity}">
                            </td>
                            <td>
                                <input placeholder="Notes" type="text" name="notes[]" class="form-control" value="${item.notes}">
                            </td>
                            <td>
                                <a id="btnremove" class="btn-sm btn-outline-danger"><span class="fa fa-close"></span></a>
                            </td>
                        </tr>
                    `;

                    $('#table_body').append(newRow);
                });
            }
        },
        error: function(error) {
            console.log("Error during file upload", error);
        }
    });
});

// Convert Excel date to JavaScript date (for 'date' field)
function convertExcelDateToJSDate(excelDate) {
    var date = new Date((excelDate - (25567 + 1)) * 86400 * 1000);
    return date.toISOString().split('T')[0]; // Returns 'YYYY-MM-DD' format
}

// Convert Excel time to JavaScript datetime-local format
function convertExcelDateToJSTime(excelTime) {
    var date = new Date((excelTime - (25567 + 1)) * 86400 * 1000);
    return date.toISOString().slice(0, 16); // Returns 'YYYY-MM-DDTHH:MM' format
}
});


function isNumberKey(evt) {
    // Allow: backspace, delete, tab, escape, enter and .
    if ($.inArray(evt.keyCode, [46, 8, 9, 27, 13]) !== -1 ||
        // Allow: Ctrl+A
        (evt.keyCode === 65 && evt.ctrlKey === true) ||
        // Allow: Ctrl+C
        (evt.keyCode === 67 && evt.ctrlKey === true) ||
        // Allow: Ctrl+V
        (evt.keyCode === 86 && evt.ctrlKey === true) ||
        // Allow: Ctrl+X
        (evt.keyCode === 88 && evt.ctrlKey === true) ||
        // Allow: home, end, left, right
        (evt.keyCode >= 35 && evt.keyCode <= 39)) {
        return;
    }
    // Ensure that it is a number and stop the keypress
    if (evt.shiftKey || (evt.keyCode < 48 || evt.keyCode > 57)) {
        evt.preventDefault();
    }
}


</script>



<?php include'footer.php'; ?>


