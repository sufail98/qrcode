<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Delivery Note
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

  <link href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>/assets/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>/assets/css/mystyle.css" rel="stylesheet" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- <script src="https://unpkg.com/pagedjs/dist/paged.polyfill.js"></script> -->
</head>

<body>

  <div class="header-sec">
    <img src="<?php echo base_url(); ?>/images/header.jpg" alt="" >
    <span class="top_dl">
      <?= $editdata[0]->dl_no; ?>
    </span>
  </div>
  
  <table>
  <thead>
      <tr>
        <td>
          <div class="header-space"></div>
        </td>
      </tr>
    </thead>
    <!-- <div class="header-space"></div> -->

    <tbody>
      <tr>
        <td>

    <div class="wrapper print-page">
      <div class="content container">
        <div id="newsAddForm">
          <div class="card">

    
          <!--*** CONTENT GOES HERE ***-->
            <div class="page">
              <input type="text" id="mid" value="<?php echo $editdata[0]->dl_no;?>" hidden>

                <table class="table table-bordered table-hover">
                  <tbody>
                    <tr>
                      <th colspan="5" class="hsec" style="text-align: center;">
                        <!-- <span style="color: #f00; font-size: 25px; font-weight: 800; float: left;">
                          <?= $editdata[0]->dl_no; ?>
                        </span> -->
                        <span style="font-weight: 800; font-size: 25px; margin-left: 20px;">
                          DELIVERY NOTE
                        </span>
                      </th>
                    </tr>
                    <tr>
                      <td colspan="5" style="text-align: end;"><?= $editdata[0]->type; ?></td>
                    </tr>
                  
                    <tr>
                      <th>Project Name</th>
                      <td><?= $editdata[0]->ProjectName; ?></td>
                      <td rowspan="6">
                        <div class='' id='printableArea'>
                            <img id="qrCode" src="" alt="">
                        </div>
                      </td>
                      <th>Date</th>
                      <td><?= $editdata[0]->Date; ?></td>

                    </tr>
                    <tr>
                      <th>Project Code</th>
                      <td><?= $editdata[0]->ProjectCode; ?></td>
                      <th>WO. NO.</th>
                      <td><?= $editdata[0]->WONumber; ?></td>
                    </tr>
                    <tr>
                      <th>Driver's Name</th>
                      <td><?= $editdata[0]->DriverName; ?></td>
                      <th>REQ</th>
                      <td><?= $editdata[0]->RequestNumber; ?></td>
                    </tr>
                    <tr>
                      <th>Driver's Mobile #</th>
                      <td><?= $editdata[0]->DriverMobile; ?></td>
                    </tr>
                    <tr>
                      <th>Vehicle #</th>
                      <td><?= $editdata[0]->VehicleNo; ?></td>
                    </tr>
                    <tr>
                      <th>Departure Time</th>
                      <td><?= $editdata[0]->DepartureTime; ?></td>
                    </tr>
                  </tbody>
                </table>

                <table id="table-2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                    <th width="5%">SN</th>
                      <th width="12%">Item Code</th>
                      <th>Description</th>
                      <th width="7%">Unit</th>
                      <th width="9%">Width</th>
                      <th width="9%">Height</th>
                      <th width="8%">Qty</th>
                      <th>QR Code</th>
                    </tr>
                  </thead>
                  <tbody id="table_body">
                    <?php 
                    $totalQty = 0;
                    $firstPageRows = 13; // Rows for the first page
                    $subsequentPageRows = 23; // Rows for subsequent pages

                  $currentPage = 1;
                  $pageRowCount = 0;

                  for ($i= 0; $i<count($editsplitdata); $i++) { 
                    $totalQty += $editsplitdata[$i]->Qty;

                    if ($i < $firstPageRows) {
                      $rowClass = ''; // No page-break for first 14 rows
                      $pageRowCount++;
                    }
                    // For subsequent pages, add page-break after 23 rows
                    else {
                        // Insert page-break after the first 14 rows
                        if (($i - $firstPageRows) % $subsequentPageRows == 0) {
                            $rowClass = 'page-break'; // Page break after 23 rows
                            $currentPage++;
                            $pageRowCount = 0; // Reset row count for the new page
                        } else {
                            $rowClass = ''; // No page-break until after 23 rows
                            $pageRowCount++;
                        }
                    }

                    ?>
                    <tr class="tabRow <?= $rowClass; ?>"> 
                      <td class="sno"><?php echo $editsplitdata[$i]->LineIndex;?></td>
                      <td><?php echo $editsplitdata[$i]->ItemCode;?></td>
                      <td><?php echo $editsplitdata[$i]->Description;?></td>
                      <td><?php echo $editsplitdata[$i]->Unit;?></td>
                      <td><?php echo $editsplitdata[$i]->Width;?></td>
                      <td><?php echo $editsplitdata[$i]->Height;?></td>
                      <td><?php echo $editsplitdata[$i]->Qty;?></td>
                      <td>
                        <input  type="text" name="did[]" value="<?php echo $editsplitdata[$i]->DeliveryNoteDetailsId;?>" hidden>

                          <img src="<?= base_url('QrCodeController/generate') ?>?text=<?= urlencode($editdata[0]->dl_no . '-' . $editsplitdata[$i]->LineIndex); ?>" alt="QR Code" style="width: 50px; height: 50px;">
                      </td>
                      
                    </tr>
                  <?php } ?>
                  
                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan="6"></td>
                      <td><?php echo $totalQty; ?></td>
                      <td></td>
                    </tr>
                  </tfoot>
                </table>
                <p class="footer-text">All Material Received in Good Order and Condition</p>
                <table class="table table-bordered table-hover ftable">
                  <tbody>
                    <tr>
                      <th colspan="3" class="hsec" style="text-align: center;">RECEIVED BY:</th>
                    </tr>
                    <tr>
                      <th>Name & Signature </th>
                      <th>Mobile No</th>
                      <th>Date</th>
                    </tr>
                    <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>
                    
                  </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>
    </div>
        
        </td>
      </tr>
    </tbody>

    <tfoot>
      <tr>
        <td>
          <!--place holder for the fixed-position footer-->
          <div class="footer-space"></div>
        </td>
      </tr>
    </tfoot>

  </table>

    <!-- <div class="footer-space"></div> -->
    <div class="footer-sec">
      <img src="<?php echo base_url(); ?>/images/footer.jpg" alt="" >
    </div>

</body>

</html>

<script>
    $(document).ready(function() {

        const qrText = document.getElementById('mid').value;
        const qrCodeImg = document.getElementById('qrCode');
       
        qrCodeImg.src = `<?= base_url('QrCodeController/generate') ?>?text=${encodeURIComponent(qrText)}`;

        // qrCodeImg.onload = function() { // Automatically opens the print dialog when the QR code is loaded
        //   setTimeout(function() {
        //       window.print(); 
        //   }, 1000);
             
        // };

      // Generate QR codes for each row
      $('#table_body .tabRow').each(function() {
          var itemCode = $(this).find('input[name="did[]"]').val();
          var qrCodeCell = $(this).find('td:last-child');
          
          // Create a canvas element to hold the QR code
          // var canvas = $('<canvas></canvas>').appendTo(qrCodeCell);
          
          // Generate QR code and draw it on the canvas
          $(canvas).qrcode({
          text: itemCode,
          width: 180,
          height: 180
          });
      });

      setTimeout(function () {
        window.print(); 
      }, 500);

    });

</script>

<style>
.top_dl{
  color: #f00; 
  font-size: 25px; 
  font-weight: 800; 
  position: absolute;
  bottom: 0;
  left: 25px;
}
.footer-text{
  text-align: center;
  margin-bottom: 2px;
}
.header-sec img, .footer-sec img {
  width: 100%;
}
.footer-sec, .footer-space  {
  position: fixed;
  bottom: 0;
  width: 100%;
  height: 102px;
  z-index: 9999;
}
.header-space{
  height: 140px;
}
.header-sec  {
  position: fixed;
  top: 0;
  width: 100%;
  /* height: 150px; */
  z-index: 9999;
}
.page {
  page-break-after: always;
  margin: 40px 0px 93px 0px;
}
.page-break {
    page-break-after: always;
  }
.table>thead>tr>th,
  .table>tbody>tr>td{
    padding: 1px !important;
  }
 
#printableArea img {
    width: 200px;
    height: 200px;
    margin-right: 20px;
}

@page {
  margin: 10mm;
}

@media print {
  .page{
    page-break-after: always;
    margin: 40px 0px 0px 0px !important;
    padding: 0;
    counter-increment: page;
  }
  .footer-sec {
    height: 102px !important;
  }
  .page-break {
    page-break-after: always;
  }
  .header-space {
    height: 140px;
    margin-bottom: 0;
  }
  .footer-space {
    height: 93px;
    margin-top: 0;
  }
  .header-sec {
    height: 140px;
  }
  .header-sec img, .footer-sec img {
    width: 100%;
    height: auto;
  }
  @page {
    margin: 5mm;
    @bottom-right{
      content: 'Page ' counter(page) ' of ' counter(pages);
    }
  }

}
</style>