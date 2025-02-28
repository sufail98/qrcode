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
            <a class="navbar-brand" href="#pablo">Delivery Note Print</a>
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

          <input type="text" id="mid" value="<?php echo $editdata[0]->deliveryNoteMasterId;?>" hidden>
            <div class='row'>
              <div class='col-sm-3 col-12'>
                  <p><b>DL No :</b>&nbsp; <b style="color: #f00;">M<?php echo $editdata[0]->dl_no; ?></b></p>
                  <p><b>Date :</b>&nbsp; <?php echo $editdata[0]->Date; ?></p>
                  <p><b>Project Name :</b>&nbsp; <?php echo $editdata[0]->ProjectName; ?></p>
                  <p><b>Project Code :</b>&nbsp; <?php echo $editdata[0]->ProjectCode; ?></p>
                  <p><b>Driver's Name :</b>&nbsp; <?php echo $editdata[0]->DriverName; ?></p>
              </div>
              <div class='' id='printableArea'>
                  <img id="qrCode" src="" alt="">
              </div>
              <div class='col-sm-3 col-12'>
                  <p><b>Driver's Mobile :</b>&nbsp; <?php echo $editdata[0]->DriverMobile; ?></p>
                  <p><b>Vehicle Number :</b>&nbsp; <?php echo $editdata[0]->VehicleNo; ?></p>
                  <p><b>Departure Time :</b>&nbsp; <?php echo $editdata[0]->DepartureTime; ?></p>
                  <p><b>WO Number :</b>&nbsp;  <?php echo $editdata[0]->WONumber; ?></p>
                  <p><b>Request Number :</b>&nbsp; <?php echo $editdata[0]->RequestNumber; ?></p>
              </div>
              <div class="col-sm-3 col-12">
                <!-- <button type='button' class='btn btn-primary' onclick="PrintAll()">Print </button> -->
                <a href="<?php echo base_url(); ?>/Deliverynote/BillQRPrintAll/<?php echo $editdata[0]->deliveryNoteMasterId;?>" type='button' target="_blank" class='btn btn-primary'> Print</a>
              </div>
           </div>

        </div>

          <hr>

					
          <table id="table-2" class="table table-hover table-responsive mt-2">
            <thead>
              <tr>
                <th>Sl No</th>
                <th>Item Code</th>
                <th>Description</th>
                <th>Unit</th>
                <th>Width</th>
                <th>Height</th>
                <th>Qty</th>
                <th>QR Code</th>
              </tr>
            </thead>
            <tbody id="table_body">
              <?php 

             for ($i= 0; $i<count($editsplitdata); $i++) { ?>
              <tr class="tabRow">
                <td class="sno">
                  <input type="text" readonly name="slno[]" class="form-control" value="<?php echo $editsplitdata[$i]->LineIndex;?>">
                </td>
                <td>
                  <input placeholder="Item Code" type="text" name="itemcode[]" class="form-control" value="<?php echo $editsplitdata[$i]->ItemCode;?>" required>
                </td>
                <td>
                  <input required placeholder="Description" type="text" name="desc[]" class="form-control" value="<?php echo $editsplitdata[$i]->Description;?>">
                </td>
                <td>
                  <input placeholder="Unit" type="text" name="unit[]" class="form-control" value="<?php echo $editsplitdata[$i]->Unit;?>">
                </td>
                <td>
                  <input placeholder="Width" required type="number" name="width[]" class="form-control" value="<?php echo $editsplitdata[$i]->Width;?>">
                </td>
                <td>
                  <input placeholder="Height" required type="number" name="height[]" class="form-control" value="<?php echo $editsplitdata[$i]->Height;?>">
                </td>
                <td>
                  <input placeholder="Qty" required type="number" name="qty[]" class="form-control" value="<?php echo $editsplitdata[$i]->Qty;?>">
                </td>
                <td>
                  <input  type="text" name="did[]" value="<?php echo $editsplitdata[$i]->DeliveryNoteDetailsId;?>" hidden>

                    <img src="<?= base_url('QrCodeController/generate') ?>?text=D<?php echo urlencode($editsplitdata[$i]->DeliveryNoteDetailsId); ?>" alt="QR Code" style="width: 50px; height: 50px;">
                </td>
                
              </tr>
            <?php } ?>
            </tbody>
          </table>

			</div>
		</div>
	</div>
</div>

<script>
    $(document).ready(function() {

        const qrText = document.getElementById('mid').value;
        const qrCodeImg = document.getElementById('qrCode');
       
        qrCodeImg.src = `<?= base_url('QrCodeController/generate') ?>?text=M${encodeURIComponent(qrText)}`;

        // qrCodeImg.onload = function() { // Automatically opens the print dialog when the QR code is loaded
        //   setTimeout(function() {
        //       window.print(); 
        //   }, 1000);
             
        // };

        // on load print
        let printWindow = window.open('', '', 'height=600,width=600');
        let content = document.getElementById('printableArea').outerHTML;
        let styles = `
            <style>
                @page {
                    size: A4;
                    margin: 10mm;
                }
                body {
                    margin: 0;
                    padding: 0;
                }
                .print-container {
                    width: 100%;
                    overflow: hidden;
                }
                #printableArea {
                    width: 100%;
                    page-break-inside: avoid;
                }
                #printableArea img {
                    width: 100%;
                    height: auto;
                }
                
            </style>
        `;
        
        // Write the content to the new window
        printWindow.document.open();
        printWindow.document.write(`
            <html>
            <head>
                <title>Print Preview</title>
                ${styles}
            </head>
            <body>
                <div class="print-container">
                    ${content}
                </div>
            </body>
            </html>
        `);
        printWindow.document.close();
        
        // Wait for the content to be fully loaded before printing
        printWindow.onload = function() {
            printWindow.print();
            printWindow.close();
        };


      // Generate QR codes for each row
      $('#table_body .tabRow').each(function() {
          var itemCode = $(this).find('input[name="did[]"]').val();
          var qrCodeCell = $(this).find('td:last-child');
          
          // Create a canvas element to hold the QR code
          // var canvas = $('<canvas></canvas>').appendTo(qrCodeCell);
          
          // Generate QR code and draw it on the canvas
          $(canvas).qrcode({
          text: itemCode,
          width: 200,
          height: 200
          });
      });
      
    });


</script>


<style>

#printableArea img {
    width: 200px;
    height: 200px;
    margin-right: 10px;
}

@page {
    size: A4;
    margin: 20mm;
}
</style>

<?php include'footer.php'; ?>