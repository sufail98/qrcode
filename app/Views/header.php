
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?php echo base_url(); ?>/assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Delivery Note
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>/assets/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>/assets/css/mystyle.css" rel="stylesheet" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/js/ckeditor/ckeditor.js"></script>
  <!-- themify -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/themify-icons/0.1.2/css/themify-icons.css">
  <!-- ///////////////// themify -->


</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
      -->
      <div class="logo">
        <a href="" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="<?php echo base_url(); ?>/assets/img/logo-small.png">
          </div>
        </a>
        <a href="" class="simple-text logo-normal">
         Delivery Note
          <!-- <div class="logo-image-big">
            <img src="<?php echo base_url(); ?>assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="">
            <a href="<?php echo base_url(); ?>/Frontpage/Dashboard">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>
          
          <?php if($_SESSION['user_type'] == 'admin') { ?>

          <li>
            <a href="<?php echo base_url(); ?>/Deliverynote/DeliverynoteFrm">
              <i class="fa fa-plus-square-o"></i>
              <p>Create Delivery Note</p>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url(); ?>/Deliverynote/index">
              <i class="nc-icon nc-layout-11"></i>
              <p>Delivery Note Report</p>
            </a>
          </li>

          <li>
            <a href="<?php echo base_url(); ?>/Deliverynote/DeliverynoteSummary">
              <i class="nc-icon nc-bullet-list-67"></i>
              <p>Delivery Note Summary</p>
            </a>
          </li>
        <?php } ?>
          
          <?php if($_SESSION['user_type'] == 'admin' || 'user') { ?>
          <li>
            <a href="<?php echo base_url(); ?>/Deliverynote/Qrscanner">
              <i class="fa fa-qrcode"></i>
              <p>Scan QR </p>
            </a>
          </li>        
          <?php } ?>  
          
          <li class="active-pro">
            <a href="<?php echo base_url(); ?>/Frontpage/AdminLogout">
              <i class="nc-icon nc-user-run"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <script>
        function logoutbtn() {
          $.post("<?php echo base_url(); ?>/Frontpage/AdminLogout")
          .done(function(data){
          });
        }
        function dashboardBtn() {
          $.post("<?php echo base_url(); ?>/index.php/Apifrontpage/DashboardView")
          .done(function(data){
          });
        }
      </script>