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
            <a class="navbar-brand" href="#pablo">Delivery Notes Summary</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search..." id="myInput">
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
	<div id="newsall">
		<div class='row justify-content-between'>
            <div class="col-md-2">
                <label>Project Code:</label>
                <input type="text" id="projectcode" class="form-control">
            </div>
            <div class="col-md-2">
                <label>Project Name:</label>
                <input type="text" id="projectname" class="form-control">
            </div>
            <div class="col-md-2">
                <label>Request No:</label>
                <input type="text" id="requestno" class="form-control">
            </div>
            <div class="col-md-2">
                <label>W.O No:</label>
                <input type="text" id="wono" class="form-control">
            </div>
            <div class="col-md-3">
                <label>Description:</label>
                <input type="text" id="desc" class="form-control">
            </div>
            <div class="col-md-1">
                <button id="filterBtn" class="btn btn-primary mt-4">Filter</button>
            </div>
		</div>
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table" id="myDataTable">
						<thead class="text-primary">
							<tr>
								<th>Slno</th>
                                <th>Date</th>
                                <th>Request Number</th>
								<th>W.O No.</th>
								<th>Project Code</th>
								<th>Project Name</th>
                                <th>Item Code</th>
                                <th>Item Description</th>
                                <th>Unit</th>
                                <th>Width</th>
                                <th>Height</th>
                                <th>QTY/PCs</th>
                                <th>DN#</th>
							</tr>
						</thead>
						<tbody id="myTable">
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	
</div>

<?php include'footer.php'; ?>

<script>
$(document).ready(function() {


    function initializeDataTable() {
        $('#myDataTable').DataTable({
            dom: 'Bfrtip', // Adds buttons to the DataTable
            buttons: [
                {
                    extend: 'excelHtml5',
                    text: 'Excel Export', // Custom button name
                    title: 'Delivery Notes Summary',
                    exportOptions: {
                        columns: ':visible' // Exports only visible columns
                    }
                },
                // {
                //     extend: 'print',
                //     title: 'Delivery Notes Summary'
                // },
                // {
                //     extend: 'pdfHtml5',
                //     title: 'Delivery Notes Summary',
                //     exportOptions: {
                //         columns: ':visible' // Exports only visible columns
                //     }
                // }
            ],
            pageLength: 10, // Default items per page
            lengthMenu: [[10, 20, 50, -1], [10, 20, 50, "All"]], // Custom items per page options
            order: [[12, 'asc']], // Default ordering by the first column (Slno)
            columnDefs: [
            {
                targets: 0, // The column index for Serial Number (Slno)
                orderable: false, // Make the Serial Number column unsortable
                render: function (data, type, row, meta) {
                    return meta.row + 1; // Serial number based on row index
                }
            }
        ]
        });
    }

    // Initialize DataTable on page load
    initializeDataTable();

    const projectcode = $('#projectcode').val();
    const projectname = $('#projectname').val();
    const requestno = $('#requestno').val();
    const wono = $('#wono').val();
    const desc = $('#desc').val();

    // Load today's data on page load
    // loadSummaryReport(projectcode, projectname, requestno, wono, desc);

    // Function to load the sales report by date
    function loadSummaryReport(projectcode, projectname, requestno, wono, desc) {
        $.ajax({
            url: '<?php echo base_url(); ?>/Deliverynote/DeliverynoteSummaryByfiltered',
            type: 'POST',
            data: { projectcode: projectcode, projectname: projectname, requestno: requestno, wono: wono, desc: desc },
            success: function(response) {
                let rows = '';

                // Loop through the filtered report and create table rows
                response.forEach((value, index) => {
                    rows += `
                        <tr>
                            <td>#${index + 1}</td>
                            <td>
                            ${new Date(value.Date).toLocaleDateString('en-GB', {
                                day: '2-digit',
                                month: 'short',
                                year: 'numeric',
                            })}
                            </td>
                            <td>${value.RequestNumber}</td>
                            <td>${value.WONumber}</td>
                            <td>${value.ProjectCode}</td>
                            <td>${value.ProjectName}</td>
                            <td>${value.ItemCode}</td>
                            <td>${value.Description}</td>
                            <td>${value.Unit}</td>
                            <td>${value.Width}</td>
                            <td>${value.Height}</td>
                            <td>${value.Qty}</td>
                            <td>${value.dl_no}</td>
                        </tr>
                    `;

                });

                // Clear and destroy the existing DataTable instance
                const table = $('#myDataTable').DataTable();
                table.clear().destroy();

                // Update the table body with new rows
                $('#myTable').html(rows);

                // Reinitialize the DataTable
                initializeDataTable();
                
            },
            error: function(xhr, status, error) {
                console.log("An error occurred while fetching the data.");
            }
        });
    }

    $('#filterBtn').on('click', function(e) {
        e.preventDefault();

        const projectcode = $('#projectcode').val();
        const projectname = $('#projectname').val();
        const requestno = $('#requestno').val();
        const wono = $('#wono').val();
        const desc = $('#desc').val();

        // Load the sales report based on selected dates
        loadSummaryReport(projectcode, projectname, requestno, wono, desc);
    });
});


</script>


<!-- DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<!-- DataTables Buttons -->
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

<!-- pdfmake (required for PDF export) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>