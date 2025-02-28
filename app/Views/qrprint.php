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
        <input type="text" id="mid" value="<?php echo $editdata[0]->dl_no;?>" hidden>
        <div class="row">
          <div class='col-sm-3 col-12 details'>
            <div class="left">
              <p><b>DL No :</b></p>
              <p><b>Date :</b></p>
              <p><b>Project Name :</b></p>
              <p><b>Project Code :</b></p>
              <p><b>Driver's Name :</b></p>
            </div>
            <div class="right">
              <p><b style="color: #f00;"><?= !empty($editdata[0]->dl_no) ? $editdata[0]->dl_no : '&nbsp;' ?></b></p>
              <p><?= !empty($editdata[0]->Date) ? $editdata[0]->Date : '&nbsp;' ?></p>
              <p><?= !empty($editdata[0]->ProjectName) ? $editdata[0]->ProjectName : '&nbsp;' ?></p>
              <p><?= !empty($editdata[0]->ProjectCode) ? $editdata[0]->ProjectCode : '&nbsp;' ?></p>
              <p><?= !empty($editdata[0]->DriverName) ? $editdata[0]->DriverName : '&nbsp;' ?></p>
            </div>
          </div>
          <div class='' id='printableArea'>
              <img id="qrCode" src="" alt="">
              <input type="text" id="billno" value="<?= $editdata[0]->dl_no; ?>" hidden>
          </div>
          <div class='col-sm-4 col-12 details'>
            <div class="left">
              <p><b>Driver's Mobile :</b></p>
              <p><b>Vehicle Number :</b></p>
              <p><b>Departure Time :</b></p>
              <p><b>WO Number :</b></p>
              <p><b>Request Number :</b></p>
            </div>
            <div class="right">
              <p><?= !empty($editdata[0]->DriverMobile) ? $editdata[0]->DriverMobile : '&nbsp;' ?></p>
              <p><?= !empty($editdata[0]->VehicleNo) ? $editdata[0]->VehicleNo : '&nbsp;' ?></p>
              <p><?= !empty($editdata[0]->DepartureTime) ? $editdata[0]->DepartureTime : '&nbsp;' ?></p>
              <p><?= !empty($editdata[0]->WONumber) ? $editdata[0]->WONumber : '&nbsp;' ?></p>
              <p><?= !empty($editdata[0]->RequestNumber) ? $editdata[0]->RequestNumber : '&nbsp;' ?></p>
            </div>
          </div>

          <div class="col-sm-2 col-12">
            <?php if($scanresult !== 'scandata'){ ?>
            <div class='row'>
              <div class='ml-3 mr-auto pull-right'>
                <!-- <a href="<?php echo base_url(); ?>/Deliverynote/BillQRPrint/<?php echo $editdata[0]->deliveryNoteMasterId;?>" type='button' class='btn btn-primary'> Print Bill QR Code</a> -->
                <button type='button' class='btn btn-primary' onclick="printBillQr()">Print Bill QR Code</button>
              </div>
              <div class='ml-3 mr-auto'>
                <button type='button' class='btn btn-success' onclick="generateSelectedQRCodes()">Print Item QR Code</button>
              </div>
              <div class='ml-3 mr-auto'>
                <!-- <a href="<?php echo base_url(); ?>/Deliverynote/BillQRPrintAll/<?php echo $editdata[0]->deliveryNoteMasterId;?>" type='button' target="_blank" class='btn btn-warning'> Print Item Details</a> -->
                <button id="printitemDetails" type='button' class='btn btn-warning'>Print Delivery Note</button>
              </div>

              <div class='ml-3 mr-auto'>
                <!-- <a href="<?php echo base_url(); ?>/Deliverynote/BillQRPrintAll/<?php echo $editdata[0]->deliveryNoteMasterId;?>" type='button' target="_blank" class='btn btn-warning'> Print Item Details</a> -->
                <button id="excelexport" type='button' class='btn btn-secondary'>Export Delivery Note</button>
              </div>
            
            </div>
            <?php } ?>
          </div>

        </div>

          </div>

          <hr>
					
          <table id="table-2" class="table table-hover table-responsive mt-2">
            <thead>
              <tr>
                <th width="5%">Sl No</th>
                <th width="12%">Item Code</th>
                <th>Description</th>
                <th width="5%">Unit</th>
                <th width="9%">Width</th>
                <th width="9%">Height</th>
                <th width="8%">Qty</th>
                <th>QR Code</th>
                <th style="display: flex;">Select <span>&nbsp;<input type="checkbox" class="mt-1" id="select-all"></span></th>
              </tr>
            </thead>
            <tbody id="table_body">
              <?php 
              $totalQty = 0;
             for ($i= 0; $i<count($editsplitdata); $i++) { 
              $totalQty += $editsplitdata[$i]->Qty;
              ?>
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

                    <img src="<?= base_url('QrCodeController/generate') ?>?text=<?= urlencode($editdata[0]->dl_no . '-' . $editsplitdata[$i]->LineIndex); ?>" alt="QR Code" style="width: 50px; height: 50px;">

                </td>
                <td>
                  <span>
                    <input type="checkbox"
                     name="selectRow[]"
                     class="selectRow" 
                      data-itemcode="<?= $editdata[0]->dl_no; ?>-<?php echo $editsplitdata[$i]->LineIndex; ?>">
                    </span>
                </td>
              </tr>
            <?php } ?>
            </tbody>
            <tfoot>
              <tr>
                <td colspan="6" style="font-weight: bold;">Total:</td>
                <td style="text-align:center;"><b><?php echo $totalQty; ?></b></td>
                <td></td>
              </tr>
            </tfoot>
          </table>

          <!-- <div id="printableArea"></div> -->

			</div>
		</div>
	</div>
</div>

<script>
  $(document).ready(function() {

  const qrText = document.getElementById('mid').value;
  const qrCodeImg = document.getElementById('qrCode');

  qrCodeImg.src = `<?= base_url('QrCodeController/generate') ?>?text=${encodeURIComponent(qrText)}`;

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

<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/exceljs/4.3.0/exceljs.min.js"></script>

<script>
    document.getElementById('printitemDetails').addEventListener('click', function (event) {
    const pageUrl = "<?php echo base_url(); ?>/Deliverynote/BillQRPrintAll/<?php echo $editdata[0]->deliveryNoteMasterId; ?>";

    fetch(pageUrl)
        .then(response => response.text())
        .then(data => {
          
            let printWindow = window.open('', '', 'width=1200');
            let styles = `
              <style>
                  @page {
                      size: A4;
                      // margin-top: -180px !important;
                      }
                  body {
                      margin: 0;
                      padding: 0;
                  }
                  .print-container {
                      width: 100%;
                      // overflow: hidden;
                  }
                  
              </style>
            `;

            // Write the fetched content and styles to the print window
            printWindow.document.open();
            printWindow.document.write(`
              <html>
              <head>
                  <title>Print Preview</title>
                  ${styles}
              </head>
              <body>
                  <div class="print-container">
                      ${data} <!-- Insert external page content here -->
                  </div>
              </body>
              </html>
            `);
            printWindow.document.close();

            printWindow.onload = function() {
              setTimeout(function() {
                    printWindow.print();
                    printWindow.onafterprint = function() {
                        printWindow.close(); 

                    };
                }, 500);
            };
            
        })
        .catch(error => {
            console.error('Error fetching the page content:', error);
        });
});


document.getElementById("excelexport").addEventListener("click", function () {
    const pageUrl = "<?php echo base_url(); ?>/Deliverynote/BillQRPrintAll/<?php echo $editdata[0]->deliveryNoteMasterId; ?>";
    fetch(pageUrl)
        .then(response => response.text())
        .then(data => {
            
        // Convert the printed data into Excel
        convertHTMLToExcel(data);
        })
        .catch(error => {
            console.error('Error fetching the page content:', error);
        });
});

function convertHTMLToExcel(htmlContent) {
    // console.log('htmlContent: ', htmlContent);

    const parser = new DOMParser();
    const doc = parser.parseFromString(htmlContent, 'text/html');

    const workbook = new ExcelJS.Workbook();
    const worksheet = workbook.addWorksheet('Delivery Note');

    const excelData = [];
    const images = [];

    // Include header image
    const headerImg = doc.querySelector('.header-sec img');
    if (headerImg) {
        fetch(headerImg.src)
            .then(res => {
                if (!res.ok) {
                    throw new Error(`Failed to fetch header image: ${headerImg.src}`);
                }
                return res.blob();
            })
            .then(blob => {
                const reader = new FileReader();
                reader.onload = function () {
                    const imageId = workbook.addImage({
                        base64: reader.result.split(',')[1],
                        extension: 'jpg', // Adjust if it's 'png'
                    });

                    // Add image at the top of the worksheet
                    worksheet.addImage(imageId, {
                        tl: { col: 0, row: 0 },
                        ext: {
                            width: 600, // Adjust width as needed
                            height: 100, // Adjust height as needed
                        },
                    });

                    // Adjust row height for the header image
                    worksheet.getRow(1).height = 100;
                };
                reader.readAsDataURL(blob);
            })
            .catch(error => console.error('Error fetching header image:', error));
    }

    // Add QR Code (Only Once)
    const qrText = doc.querySelector('#mid')?.value || 'Default QR Code Text'; // Get QR text
    const qrCodeImg = doc.querySelector('#qrCode');

    if (qrCodeImg) {
        const qrCodeSrc = `<?= base_url('QrCodeController/generate') ?>?text=${encodeURIComponent(qrText)}`;

        fetch(qrCodeSrc)
            .then(res => {
                if (!res.ok) {
                    throw new Error(`Failed to fetch QR Code image: ${qrCodeSrc}`);
                }
                return res.blob();
            })
            .then(blob => {
                const reader = new FileReader();
                reader.onload = function () {
                    const imageId = workbook.addImage({
                        base64: reader.result.split(',')[1],
                        extension: 'png',
                    });

                    const qrColumn = 3; // Column C (1-based index)
                    const qrRow = 5;    // Row 5

                    // Step 1: Identify the last column used in the row
                    const lastCol = worksheet.getRow(qrRow).cellCount;

                    // Step 2: Shift Columns Right from C to last column
                    for (let col = lastCol; col >= qrColumn; col--) {
                        const prevValue = worksheet.getCell(qrRow, col).value;
                        worksheet.getCell(qrRow, col + 1).value = prevValue; // Move right
                        worksheet.getCell(qrRow, col).value = null; // Clear old cell
                    }

                    // Step 3: Set fixed column width & row height
                    worksheet.getColumn(qrColumn).width = 15; // Adjust column C width
                    worksheet.getRow(qrRow).height = 100; // Increase row height

                    // Step 4: Insert QR Code into C5
                    worksheet.addImage(imageId, {
                        tl: { col: qrColumn - 1, row: qrRow - 1 }, // Place in C5 (ExcelJS uses 0-based index)
                        ext: { width: 100, height: 100 }, // Set QR Code size
                    });

                };
                reader.readAsDataURL(blob);
            })
            .catch(error => console.error('Error fetching QR Code image:', error));
    }

    // Process table data and images
    const rows = doc.querySelectorAll('table tr');
    rows.forEach((row, rowIndex) => {
        const rowData = [];
        row.querySelectorAll('td, th').forEach((cell, colIndex) => {
            const img = cell.querySelector('img');

            if (img && img.src) {
              // console.log('img: ', img)
                // Handle images inside cells
              if (img.src.includes('QrCodeController/generate')) {
                rowData.push('');
                images.push({
                    src: img.src,
                    row: rowIndex ,
                    col: colIndex + 1,
                    width: img.width || 50,
                    height: img.height || 50,
                    rowspan: cell.getAttribute('rowspan') || 1,
                });
              }
            } else {
                rowData.push(cell.textContent.trim());
            }
        });
        excelData.push(rowData);
    });

    // Remove the second row (index 1) from excelData
    if (excelData.length > 1) {
        excelData.splice(1, 1);
    }

    // Add table data to worksheet
    excelData.forEach((rowData, index) => {
        worksheet.addRow(rowData);
    });

    // Adjust column widths and row heights for images
    images.forEach(img => {
        const col = worksheet.getColumn(img.col);
        col.width = Math.max(col.width || 10, img.width / 7.5);
        worksheet.getRow(img.row).height = Math.max(worksheet.getRow(img.row).height || 15, img.height * 0.75);

        // Handle rowspan by merging cells
        if (img.rowspan > 1) {
            worksheet.mergeCells(
                img.row,
                img.col,
                img.row + parseInt(img.rowspan) - 1,
                img.col
            );
        }
    });

    // Fetch and embed images in the Excel file
    const promises = images.map(img =>
        fetch(img.src)
            .then(res => {
                if (!res.ok) {
                    throw new Error(`Failed to fetch image: ${img.src}`);
                }
                return res.blob();
            })
            .then(blob => {
                return new Promise(resolve => {
                    const reader = new FileReader();
                    reader.onload = function () {
                        resolve({ base64: reader.result.split(',')[1], ...img });
                    };
                    reader.readAsDataURL(blob);
                });
            })
    );

    Promise.all(promises)
        .then(results => {
            results.forEach(img => {
                const imageId = workbook.addImage({
                    base64: img.base64,
                    extension: 'png', // Adjust based on your image format
                });

                // Embed image in the correct cell
                worksheet.addImage(imageId, {
                    tl: { col: img.col - 1, row: img.row - 1 },
                    ext: { width: img.width, height: img.height },
                });
            });

            // Download the Excel file
            workbook.xlsx.writeBuffer().then(buffer => {
                const blob = new Blob([buffer], {
                    type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                });
                const url = URL.createObjectURL(blob);
                const a = document.createElement('a');
                a.href = url;
                a.download = 'DeliveryNoteDetails.xlsx';
                a.click();
                URL.revokeObjectURL(url);
            });
        })
        .catch(error => console.error('Error embedding images:', error));
}



</script>

<script>
  function printBillQr() {

    let printWindow = window.open('', '', 'height=600,width=600');
    let content = document.getElementById('printableArea').outerHTML;
    let billno = document.getElementById('billno').value;
    let styles = `
        <style>
            @page {
              margin: 10px 0px 0px 0px;
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
                width: 65px;
                height: 65px;
            }
            .qc-info {
                position: absolute;
                top: 20px;
                left: 80px;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: flex-start;
                margin-left: 10px;
            }
            .qc-badge {
                display: inline-flex;
                align-items: center;
                border: 2px solid #000; 
                border-radius: 5px;
                overflow: hidden;
                padding: 0;
            }
            .checkmark {
                background-color: #000; 
                color: #fff; 
                padding: 5px;
                font-size: 16px;
                display: inline-block;
                border-top-left-radius: 5px;
                border-bottom-left-radius: 5px;
            }
            .qc-text {
                background-color: #fff; /* White background for QC PASSED */
                color: #000; /* Black text */
                padding: 5px 10px;
                font-size: 14px;
                font-weight: bold;
                border-left: 0; /* Remove border between checkmark and QC text */
            }
            .qc-info p.code-label {
                font-size: 14px;
                font-weight: bold;
                margin: 2px 0 0 33px;
                text-align: center;
            }
            @media print {
                .qc-badge {
                    -webkit-print-color-adjust: exact; 
                    print-color-adjust: exact; 
                }
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
                <div class="qc-info">
                  <div class="qc-badge">
                      <span class="checkmark">✔</span>
                      <span class="qc-text">QC PASSED</span>
                  </div>
                  <p class="code-label">${billno}</p>

              </div>
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
  }
</script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Select the "Select All" checkbox
    var selectAllCheckbox = document.getElementById('select-all');
    
    // Select all checkboxes in the table
    var checkboxes = document.querySelectorAll('#table_body .selectRow');
    
    // Function to update checkboxes based on the "Select All" checkbox
    selectAllCheckbox.addEventListener('change', function() {
      checkboxes.forEach(function(checkbox) {
        checkbox.checked = selectAllCheckbox.checked;
      });
    });

    // Optionally, you can also handle the individual checkboxes change
    checkboxes.forEach(function(checkbox) {
      checkbox.addEventListener('change', function() {
        // If any checkbox is unchecked, uncheck the "Select All" checkbox
        if (!checkbox.checked) {
          selectAllCheckbox.checked = false;
        } else {
          // If all checkboxes are checked, check the "Select All" checkbox
          var allChecked = Array.from(checkboxes).every(function(cb) {
            return cb.checked;
          });
          selectAllCheckbox.checked = allChecked;
        }
      });
    });
  });
</script>

  <script>
    function generateSelectedQRCodes() {
        // Get all selected checkboxes
        const selectedRows = document.querySelectorAll('.selectRow:checked');
        const selectedItemCodes = [];
        // const desc = [];

        // Collect the item codes of selected rows
        selectedRows.forEach(function(row) {
            selectedItemCodes.push(row.getAttribute('data-itemcode'));
            // desc.push(row.getAttribute('data-desc'));
        });

        // If no rows selected, show an alert
        if (selectedItemCodes.length === 0) {
            alert('Please select at least one item.');
            return;
        }

        // Generate QR codes for the selected item codes
        generateQRCodes(selectedItemCodes);
    }


    function generateQRCodes(itemCodes) {
    // Create a new print window
    let printWindow = window.open('', '', 'height=500,width=500');

    // Define the styles for the print window
    let styles = `
        <style>
            @page {
              margin: 10px 0px 0px -110px;
            }
            .print-container {
                width: 100%;
                overflow: hidden;
            }
            .qr-code-item {
                page-break-after: always; /* Ensure each QR code appears on a new page */
                width: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
                text-align: left;
            }
            .qr-code-item img.qr-code {
                width: 65px;
                height: 65px;
            }
            .qr-code-item .qc-info {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: flex-start;
                margin-left: 10px;
            }
            .qc-info .qc-badge {
                display: inline-flex;
                align-items: center;
                border: 2px solid #000; 
                border-radius: 5px;
                overflow: hidden;
                padding: 0;
            }
            .qc-badge .checkmark {
                background-color: #000; 
                color: #fff; 
                padding: 5px;
                font-size: 16px;
                display: inline-block;
                border-top-left-radius: 5px;
                border-bottom-left-radius: 5px;
            }
            .qc-badge .qc-text {
                background-color: #fff; /* White background for QC PASSED */
                color: #000; /* Black text */
                padding: 5px 10px;
                font-size: 14px;
                font-weight: bold;
                border-left: 0; /* Remove border between checkmark and QC text */
            }
            .qc-info p.code-label {
                font-size: 14px;
                font-weight: bold;
                margin: 2px 0 0 33px;
                text-align: center;
            }
            .qc-info p.pname{
                font-size: 12px;
                margin: 0;
                text-align: center;
            }
            @media print {
            .qc-badge {
                -webkit-print-color-adjust: exact; 
                print-color-adjust: exact; 
                }
            }
        </style>
    `;

    // Generate QR code content
    let content = itemCodes.map(code => `

        <div class="qr-code-item">
          <img class="qr-code" src="<?= base_url('QrCodeController/generate') ?>?text=${encodeURIComponent(code)}" alt="QR Code for ${code}">
          <div class="qc-info">
              <div class="qc-badge">
                  <span class="checkmark">✔</span>
                  <span class="qc-text">QC PASSED</span>
              </div>
              <p class="code-label">${code}</p>
          </div>
      </div>
    `).join('');

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
}
</script>

<style>
  .details{
    display: flex;
    flex-direction: row;
    justify-content: space-between;
  }
  .left, .right{
    display: flex;
    flex-direction: column;
  }
#printableArea img {
    width: 180px;
    height: 180px;
    margin-right: 10px;
}
</style>

<?php include'footer.php'; ?>