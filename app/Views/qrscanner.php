<?php include'header.php'; ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.2.1/html5-qrcode.min.js"></script>
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
            <a class="navbar-brand" href="#pablo">QR Code Scanner</a>
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
               
                <!-- <h1>QR Code Scanner Using Camera</h1> -->

                <div style="width: 100%;" id="qr-reader"></div>
                <div>
                    <p class="mt-2">Scanned QR Code: <span id="qr-result"></span></p>
                </div>
             
            </div>
        </div>
    </div>
</div>

<div class="card" id="dl-card">
  <div class='card-body'>

    <div class='row'>
      <div class='col-sm-6'>
        <p title="DL No"><b>DL No :</b>&nbsp; <b style="color: #f00;"></b></p>
      </div>
    </div>

    <div class='row'>
      <div class='col-sm-6'>
        <p title="Project"><b>Project Name :</b></p>
      </div>
      <div class='col-sm-6'>
        <p title="Project Code"><b>Project Code :</b></p>
      </div>
    </div>

    <div class='row'>
      <div class='col-sm-6'>
        <p title="Driver Name"><b>Driver's Name :</b></p>
      </div>
      <div class='col-sm-6'>
        <p title="Driver Mobile"><b>Driver's Mobile :</b></p>
      </div>
    </div>

    <div class='row'>
      <div class='col-sm-6'>
        <p title="Vehicle Number"><b>Vehicle Number :</b></p>
      </div>
      <div class='col-sm-6'>
        <p title="Departure Time"><b>Departure Time :</b></p>
      </div>
    </div>

    <div class='row'>
      <div class='col-sm-6'>
        <p title="WO Number"><b>WO Number :</b></p>
      </div>
      <div class='col-sm-6'>
        <p title="Request Number"><b>Request Number :</b></p>
      </div>
    </div>
  </div>
</div>


<div class="card" id="item-card">
  <div class='card-body'>
    
    <div class='row'>
      <div class='col-sm-6'>
        <p title="Item Code"><b>Item Code:</b>&nbsp; <b style="color: #f00;"></b></p>
      </div>
      <div class='col-sm-6'>
        <p title="Project Name"><b>Project Name :</b></p>
      </div>
    </div>

    <div class='row'>
      <div class='col-sm-6'>
        <p title="Description"><b>Description :</b></p>
      </div>
      <div class='col-sm-6'>
        <p title="Unit"><b>Unit :</b></p>
      </div>
    </div>

    <div class='row'>
      <div class='col-sm-6'>
        <p title="Width"><b>Width :</b></p>
      </div>
      <div class='col-sm-6'>
        <p title="Height"><b>Height :</b></p>
      </div>
    </div>

    <div class='row'>
      <div class='col-sm-6'>
        <p title="Qty"><b>Qty :</b></p>
      </div>
      <div class='col-sm-6'>
        <p title="Notes"><b>Notes :</b></p>
      </div>
    </div>

  </div>
</div>



<script>
      document.addEventListener('DOMContentLoaded', (event) => {
          // Hide specific cards on page load
          document.querySelectorAll('.card').forEach(card => {
              const title = card.querySelector('p').getAttribute('title');
              if (title === 'DL No' || title === 'Item Code') {
                  card.style.display = 'none';
              }
          });
      });


     function onScanSuccess(decodedText, decodedResult) {

        // Handle the decoded QR code text (for example, display it on the page)
        document.getElementById('qr-result').innerHTML = decodedText;

         // Make an AJAX request to fetch details based on the QR code
        fetchDetails(decodedText);
    }

    function fetchDetails(qrCodeData) {
      fetch('<?php echo base_url(); ?>/Deliverynote/getDetails', {
          method: 'POST',
          headers: {
              'Content-Type': 'application/json'
          },
          body: JSON.stringify({ id: qrCodeData })
      })
      .then(response => {
          // Check if response is okay
          if (!response.ok) {
              throw new Error(`HTTP error! status: ${response.status}`);
          }
          // Try to parse the JSON response
          return response.text(); // Get raw text first
      })
      .then(text => {
          // Attempt to parse the text as JSON
        const data = JSON.parse(text);
        updatePageWithDetails(data);
          
      })
      .catch(error => {
          console.error('Error fetching details:', error);
      });
  }


    function updatePageWithDetails(data) {
      // console.log("Updating page with data:", data);
      let elements = {};
      let cardToShow = '';
      if (data.dl_no) {
        elements = {
          'DL No': `${data.dl_no}`,
          'Project': data.ProjectName,
          'Project Code': data.ProjectCode,
          'Driver Name': data.DriverName,
          'Driver Mobile': data.DriverMobile,
          'Vehicle Number': data.VehicleNo,
          'Departure Time': data.DepartureTime,
          'WO Number': data.WONumber,
          'Request Number': data.RequestNumber
        };
        cardToShow = 'Project Details'; 
        let redirectUrl = `<?php echo base_url(); ?>/Deliverynote/QRPrint/${data.deliveryNoteMasterId}/scandata`;
        window.location.href = redirectUrl;
      } else {
        elements = {
          'Item Code': data.ItemCode,
          'Project Name': data.ProjectName,
          'Description': data.Description,
          'Unit': data.Unit,
          'Width': data.Width,
          'Height': data.Height,
          'Qty': data.Qty,
          'Notes': data.Notes
        };
        cardToShow = 'Item Details';
      }

      // Hide all cards initially
      document.querySelectorAll('.card').forEach(card => card.style.display = 'none');

      Object.keys(elements).forEach(title => {
          const element = document.querySelector(`p[title='${title}']`);
          if (element) {
              // console.log(`Updating element with title '${title}'`);
              element.innerHTML = `<b>${title} :</b> ${elements[title]}`;

            // Show the card containing this element
            if (title === 'DL No') {
                document.querySelector('#dl-card').style.display = 'block';
            } else if (title === 'Item Code') {
                document.querySelector('#item-card').style.display = 'block';
            }
          } else {
              console.error(`Element with title '${title}' not found.`);
          }
      });

    }

    function onScanFailure(error) {
        // Handle scan failure, usually by logging or displaying a warning to the user
        console.warn(`QR code scan error: ${error}`);
    }

    // Initialize the QR code scanner with camera
    let html5QrcodeScanner = new Html5QrcodeScanner(
        "qr-reader", { fps: 10, qrbox: 250 });
    html5QrcodeScanner.render(onScanSuccess, onScanFailure);
</script>

<style>
    #qr-result{
        color: #7c3ce5;
        font-size: 16px;
        font-weight: 600;
        margin-left: 2px;
    }
    .main-panel>.content {
      min-height: calc(15vh - 123px)!important;
    }
</style>


<?php include'footer.php'; ?>