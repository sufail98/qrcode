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
            <a class="navbar-brand" href="#pablo">Delivery Notes</a>
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
			<div class='col align-self-start'>
        <a href="<?php echo base_url(); ?>/Deliverynote/DeliverynoteFrm" class='btn btn-primary'><span class='nc-icon nc-simple-add'> Add New</span></a>

			</div>
		</div>
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table">
						<thead class="text-primary">
							<tr>
								<th>Slno</th>
                <th>Dl no</th>
								<th>Project Name</th>
								<th>Project Code</th>
                <th>Date</th>
								<th>W.O Number</th>
                <th>Req Number</th>
                <th>Action</th>
							</tr>
						</thead>
						<tbody id="myTable">
							<?php 
              $n=1;
              foreach ($notes as $value) {
               ?>
              <tr>
                <td><?= $n++; ?></td>
                <td><?= $value->dl_no; ?></td>
                <td><?= $value->ProjectName; ?></td>
                <td><?= $value->ProjectCode; ?></td>
                <td><?= $value->Date; ?></td>
                <td><?= $value->WONumber; ?></td>
                <td><?= $value->RequestNumber; ?></td>
                <td>
                  <a href="<?php echo base_url(); ?>/Deliverynote/DeliverynoteEdit/<?php echo $value->deliveryNoteMasterId;?>" class='ti-myedit' title="Edit"><span class='ti-pencil-alt btn btn-sm btn-outline-warning'></span></a>
                  <a href="<?php echo base_url(); ?>/Deliverynote/DeliverynoteDelete/<?php echo $value->deliveryNoteMasterId;?>" class='ti-mydelete btn btn-sm btn-outline-danger' title="Delete" onclick="return confirm('Are you sure to Delete?')"><span class='ti-trash'></span></a>
                  <a href="<?php echo base_url(); ?>/Deliverynote/QRPrint/<?php echo $value->deliveryNoteMasterId;?>" class="btn btn-sm btn-outline-success"><span class='fa fa-eye'> View</span></a>

                  
                </td>
              </tr>
            <?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	
</div>

<?php include'footer.php'; ?>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>