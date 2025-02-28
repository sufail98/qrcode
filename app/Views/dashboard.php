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
      <a class="navbar-brand" href="#pablo">Dashboard</a>
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
  <div class="row">
  <?php if($_SESSION['user_type'] == 'admin') { ?>

    <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats" style="background-color: #C1CFA1; color:#fff;">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-warning">
                <i class="nc-icon nc-layout-11 text-warning" style="color: #ffff !important;"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers-1">
                <p class="card-title"><strong>Delivery Notes</strong>
                </p></div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="row">
              <div class="col-sm-12 my-a-link" style="cursor: pointer;" id="btnaddalbum">
                <a href="<?php echo base_url(); ?>/Deliverynote/DeliverynoteFrm" style="text-decoration: none; color: #ffffffde;"> <i class="fa fa-plus"></i> Add New</a>
              </div>
            </div>
          </div>
        </div>
      </div> 

      <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats" style="background-color: #A5B68D; color:#fff;">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-secondary">
                <i class="nc-icon nc-layout-11 text-secondary" style="color: #ffff !important;"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers-1">
                <p class="card-title"><strong>Delivery Note Report</strong>
                </p></div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="row">
              <div class="col-sm-12 my-a-link" style="cursor: pointer;" id="btnaddalbum">
                <a href="<?php echo base_url(); ?>/Deliverynote/index" style="text-decoration: none; color: #ffffffde;"> <i class="fa fa-eye"></i> Show</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>

      <?php if($_SESSION['user_type'] == 'admin' || 'user') { ?>
      
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats" style="background-color: #8EACCD; color:#fff;">
          <div class="card-body ">
            <div class="row">
              <div class="col-5 col-md-4">
                <div class="icon-big text-center icon-info">
                  <i class="fa fa-qrcode text-success" style="color: #ffff !important;"></i>
                </div>
              </div>
              <div class="col-7 col-md-8">
                <div class="numbers-1">
                  <p class="card-title"><strong>Scan QR</strong>
                    </p></div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="row">
                  <div class="col-sm-12 my-a-link" style="cursor: pointer;" id="btnaddalbum">
                    <a href="<?php echo base_url(); ?>/Deliverynote/Qrscanner" style="text-decoration: none; color: #ffffffde;"> <i class="fa fa-qrcode"></i> Scan</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>


          <?php if($_SESSION['user_type'] == 'admin') { ?>
      
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats" style="background-color: #A888B5; color:#fff;">
                <div class="card-body ">
                  <div class="row">
                    <div class="col-5 col-md-4">
                      <div class="icon-big text-center icon-info">
                        <i class="nc-icon nc-bullet-list-67 text-success" style="color: #ffff !important;"></i>
                      </div>
                    </div>
                    <div class="col-7 col-md-8">
                      <div class="numbers-1">
                        <p class="card-title"><strong>Delivery Note Summary</strong>
                          </p></div>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer ">
                      <hr>
                      <div class="row">
                        <div class="col-sm-12 my-a-link" style="cursor: pointer;" id="btnaddalbum">
                          <a href="<?php echo base_url(); ?>/Deliverynote/DeliverynoteSummary" style="text-decoration: none; color: #ffffffde;"> <i class="fa fa-eye"></i> Show</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            <?php } ?>


          <?php if($_SESSION['user_type'] == 'admin') { ?>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats" style="background-color: #78B3CE; color:#fff;">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-info">
                      <i class="fa fa-android text-success" style="color: #ffff !important;"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers-1">
                      <p class="card-title"><strong>Download APK</strong>
                        </p></div>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer ">
                    <hr>
                    <div class="row">
                      <div class="col-sm-12 my-a-link" style="cursor: pointer;" id="btnaddalbum">
                        <a href="<?php echo base_url(); ?>/images/QrCodeScanner.apk" style="text-decoration: none; color: #ffffffde;" download> <i class="fa fa-download"></i> Download</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php } ?>
          
          <!--
      <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-info">
                <i class="nc-icon nc-album-2 text-primary"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers-1">
                <p class="card-title">Gallery
                </p></div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="row">
              <div class="col-sm-12 my-a-link" style="cursor: pointer;" id="btnaddalbum">
                <a href="<?php echo base_url(); ?>/irsys/Gallery/AllGallery" style="text-decoration: none; color: #66615B;"> <i class="fa fa-refresh"></i> Update Gallery</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-info">
                <i class="fa fa-university text-primary"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers-1">
                <p class="card-title">College Council
                </p></div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="row">
              <div class="col-sm-12 my-a-link" style="cursor: pointer;" id="btnaddalbum">
                <a href="<?php echo base_url(); ?>/irsys/CollegeCouncil/Flashnews" style="text-decoration: none; color: #66615B;"> <i class="fa fa-refresh"></i> Update College Council</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-info">
                <i class="fa fa-users text-success"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers-1">
                <p class="card-title">Admissions
                </p></div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="row">
              <div class="col-sm-12 my-a-link" style="cursor: pointer;" id="btnaddalbum">
                <a href="<?php echo base_url(); ?>/irsys/Department/AllAdmissions" style="text-decoration: none; color: #66615B;"> <i class="fa fa-refresh"></i> Update Admissions</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-info">
                <i class="ti-list text-info"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers-1">
                <p class="card-title">IQAC Feedback
                </p></div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="row">
              <div class="col-sm-12 my-a-link" style="cursor: pointer;" id="btnaddalbum">
                <a href="<?php echo base_url(); ?>/irsys/IQAC/Feedback" style="text-decoration: none; color: #66615B;"> <i class="fa fa-refresh"></i> Update IQAC Feedback</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-danger">
                <i class="nc-icon nc-paper text-danger"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers-1">
                <p class="card-title">Events
                </p></div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="row">
              <div class="col-sm-12 my-a-link" style="cursor: pointer;" id="btnaddalbum">
                <a href="<?php echo base_url(); ?>/irsys/News/AllNews" style="text-decoration: none; color: #66615B;"> <i class="fa fa-refresh"></i> Update Events</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-danger">
                <i class="ti-comment-alt text-success"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers-1">
                <p class="card-title">Notifications
                </p></div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="row">
              <div class="col-sm-12 my-a-link" style="cursor: pointer;" id="btnaddalbum">
                <a href="<?php echo base_url(); ?>/irsys/Notification/Notifications" style="text-decoration: none; color: #66615B;"> <i class="fa fa-refresh"></i> Update Notifications</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-danger">
                <i class="ti-import text-warning"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers-1">
                <p class="card-title">Downloads
                </p></div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="row">
              <div class="col-sm-12 my-a-link" style="cursor: pointer;" id="btnaddalbum">
                <a href="<?php echo base_url(); ?>/irsys/Download/Downloads" style="text-decoration: none; color: #66615B;"> <i class="fa fa-refresh"></i> Update Downloads</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-danger">
                <i class="ti-list text-secondary"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers-1">
                <p class="card-title">Departments
                </p></div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="row">
              <div class="col-sm-12 my-a-link" style="cursor: pointer;" id="btnaddalbum">
                <a href="<?php echo base_url(); ?>/irsys/Department/Departments" style="text-decoration: none; color: #66615B;"> <i class="fa fa-refresh"></i> Update Departments</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-danger">
                <i class="fa fa-book text-danger"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers-1">
                <p class="card-title">Courses
                </p></div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="row">
              <div class="col-sm-12 my-a-link" style="cursor: pointer;" id="btnaddalbum">
                <a href="<?php echo base_url(); ?>/irsys/Course/Courses" style="text-decoration: none; color: #66615B;"> <i class="fa fa-refresh"></i> Update Courses</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-danger">
                <i class="ti-user text-info"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers-1">
                <p class="card-title">Faculty
                </p></div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="row">
              <div class="col-sm-12 my-a-link" style="cursor: pointer;" id="btnaddalbum">
                <a href="<?php echo base_url(); ?>/irsys/Team/Teams" style="text-decoration: none; color: #66615B;"> <i class="fa fa-refresh"></i> Update Faculty</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-warning">
                <i class="ti-user text-warning"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers-1">
                <p class="card-title">Management
                </p></div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="row">
              <div class="col-sm-12 my-a-link" style="cursor: pointer;" id="btnaddalbum">
                <a href="<?php echo base_url(); ?>/irsys/Management/Managements" style="text-decoration: none; color: #66615B;"> <i class="fa fa-refresh"></i> Update Management</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-secondary">
                <i class="ti-files text-secondary"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers-1">
                <p class="card-title">Policy Documents
                </p></div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="row">
              <div class="col-sm-12 my-a-link" style="cursor: pointer;" id="btnaddalbum">
                <a href="<?php echo base_url(); ?>/irsys/PolicyDocument/Documents" style="text-decoration: none; color: #66615B;"> <i class="fa fa-refresh"></i> Update Policy Documents</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-secondary">
                <i class="ti-book text-success"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers-1">
                <p class="card-title">Learning Outcomes
                </p></div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="row">
              <div class="col-sm-12 my-a-link" style="cursor: pointer;" id="btnaddalbum">
                <a href="<?php echo base_url(); ?>/irsys/LearningOutcomes/Outcomes" style="text-decoration: none; color: #66615B;"> <i class="fa fa-refresh"></i> Update Learning Outcomes</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-secondary">
                <i class="ti-star text-danger"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers-1">
                <p class="card-title">Celebrations
                </p></div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="row">
              <div class="col-sm-12 my-a-link" style="cursor: pointer;" id="btnaddalbum">
                <a href="<?php echo base_url(); ?>/irsys/Celebrations/Celebration" style="text-decoration: none; color: #66615B;"> <i class="fa fa-refresh"></i> Update Celebrations</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-secondary">
                <i class="ti-package text-info"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers-1">
                <p class="card-title">Clubs and Cells
                </p></div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="row">
              <div class="col-sm-12 my-a-link" style="cursor: pointer;" id="btnaddalbum">
                <a href="<?php echo base_url(); ?>/irsys/clubsandcells/Showall" style="text-decoration: none; color: #66615B;"> <i class="fa fa-refresh"></i> Update Clubs and Cells</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-secondary">
                <i class="ti-line-double text-success"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers-1">
                <p class="card-title">Enhancement
                </p></div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="row">
              <div class="col-sm-12 my-a-link" style="cursor: pointer;" id="btnaddalbum">
                <a href="<?php echo base_url(); ?>/irsys/enhancement/Showall" style="text-decoration: none; color: #66615B;"> <i class="fa fa-refresh"></i> Update Enhancement</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-secondary">
                <i class="ti-control-stop text-warning"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers-1">
                <p class="card-title">Innovation
                </p></div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="row">
              <div class="col-sm-12 my-a-link" style="cursor: pointer;" id="btnaddalbum">
                <a href="<?php echo base_url(); ?>/irsys/inovation/Showall" style="text-decoration: none; color: #66615B;"> <i class="fa fa-refresh"></i> Update Innovation</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-secondary">
                <i class="ti-reload text-secondary"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers-1">
                <p class="card-title">Skill Development
                </p></div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="row">
              <div class="col-sm-12 my-a-link" style="cursor: pointer;" id="btnaddalbum">
                <a href="<?php echo base_url(); ?>/irsys/skilldevolepment/Showall" style="text-decoration: none; color: #66615B;"> <i class="fa fa-refresh"></i> Update Skill Development</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-secondary">
                <i class="ti-shield text-danger"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers-1">
                <p class="card-title">Career Guidance
                </p></div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="row">
              <div class="col-sm-12 my-a-link" style="cursor: pointer;" id="btnaddalbum">
                <a href="<?php echo base_url(); ?>/irsys/careerguidance/Showall" style="text-decoration: none; color: #66615B;"> <i class="fa fa-refresh"></i> Update Career Guidance</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-secondary">
                <i class="ti-server text-info"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers-1">
                <p class="card-title">Statutory Cells
                </p></div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="row">
              <div class="col-sm-12 my-a-link" style="cursor: pointer;" id="btnaddalbum">
                <a href="<?php echo base_url(); ?>/irsys/statutory/Showall" style="text-decoration: none; color: #66615B;"> <i class="fa fa-refresh"></i> Update Statutory Cells</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-secondary">
                <i class="ti-user text-success"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers-1">
                <p class="card-title">Students Union
                </p></div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="row">
              <div class="col-sm-12 my-a-link" style="cursor: pointer;" id="btnaddalbum">
                <a href="<?php echo base_url(); ?>/irsys/studentsunion/Showall" style="text-decoration: none; color: #66615B;"> <i class="fa fa-refresh"></i> Update Students Union</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-secondary">
                <i class="ti-shield text-warning"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers-1">
                <p class="card-title">Achievements
                </p></div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="row">
              <div class="col-sm-12 my-a-link" style="cursor: pointer;" id="btnaddalbum">
                <a href="<?php echo base_url(); ?>/irsys/achievements/achievements" style="text-decoration: none; color: #66615B;"> <i class="fa fa-refresh"></i> Update Achievements</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-secondary">
                <i class="ti-list text-secondary"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers-1">
                <p class="card-title">Extension Services
                </p></div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="row">
              <div class="col-sm-12 my-a-link" style="cursor: pointer;" id="btnaddalbum">
                <a href="<?php echo base_url(); ?>/irsys/extensionservices/extensionservices" style="text-decoration: none; color: #66615B;"> <i class="fa fa-refresh"></i> Update Extension Services</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-secondary">
                <i class="ti-user text-danger"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers-1">
                <p class="card-title">IQAC
                </p></div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="row">
              <div class="col-sm-12 my-a-link" style="cursor: pointer;" id="btnaddalbum">
                <a href="<?php echo base_url(); ?>/irsys/IQAC/IQAC" style="text-decoration: none; color: #66615B;"> <i class="fa fa-refresh"></i> Update IQAC</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-secondary">
                <i class="ti-alarm-clock text-info"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers-1">
                <p class="card-title">Minutes
                </p></div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="row">
              <div class="col-sm-12 my-a-link" style="cursor: pointer;" id="btnaddalbum">
                <a href="<?php echo base_url(); ?>/irsys/Minutes/Minutes" style="text-decoration: none; color: #66615B;"> <i class="fa fa-refresh"></i> Update Minutes</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-secondary">
                <i class="ti-list text-success"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers-1">
                <p class="card-title">Alumni Committee
                </p></div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="row">
              <div class="col-sm-12 my-a-link" style="cursor: pointer;" id="btnaddalbum">
                <a href="<?php echo base_url(); ?>/irsys/Alumni/Alumni" style="text-decoration: none; color: #66615B;"> <i class="fa fa-refresh"></i> Update Alumni Committee</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-secondary">
                <i class="nc-icon nc-album-2 text-warning"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers-1">
                <p class="card-title">Alumni Gallery
                </p></div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="row">
              <div class="col-sm-12 my-a-link" style="cursor: pointer;" id="btnaddalbum">
                <a href="<?php echo base_url(); ?>/irsys/AlumniGallery/AllGallery" style="text-decoration: none; color: #66615B;"> <i class="fa fa-refresh"></i> Update Alumni Gallery</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    
    <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-secondary">
                <i class="ti-user text-success"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers-1">
                <p class="card-title">Student Support
                </p></div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="row">
              <div class="col-sm-12 my-a-link" style="cursor: pointer;" id="btnaddalbum">
                <a href="<?php echo base_url(); ?>/irsys/StudentSupport/Showall" style="text-decoration: none; color: #66615B;"> <i class="fa fa-refresh"></i> Update Student Support</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-info">
                <i class="fa fa-commenting-o text-danger"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers-1">
                <p class="card-title"> Feedback
                </p></div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="row">
              <div class="col-sm-12 my-a-link" style="cursor: pointer;" id="btnaddalbum">
                <a href="<?php echo base_url(); ?>/irsys/Feedback/Feedbacks" style="text-decoration: none; color: #66615B;"> <i class="fa fa-refresh"></i> Update Feedback</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-info">
                <i class="fa fa-table text-info"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers-1">
                <p class="card-title"> Time Table
                </p></div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="row">
              <div class="col-sm-12 my-a-link" style="cursor: pointer;" id="btnaddalbum">
                <a href="<?php echo base_url(); ?>/irsys/Examination/Examinations" style="text-decoration: none; color: #66615B;"> <i class="fa fa-refresh"></i> Update Time Table</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-info">
                <i class="fa fa-columns text-secondary"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers-1">
                <p class="card-title"> Action Plan
                </p></div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="row">
              <div class="col-sm-12 my-a-link" style="cursor: pointer;" id="btnaddalbum">
                <a href="<?php echo base_url(); ?>/irsys/ActionPlan/ActionPlans" style="text-decoration: none; color: #66615B;"> <i class="fa fa-refresh"></i> Update Action Plan</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-info">
                <i class="fa fa-th-list text-warning"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers-1">
                <p class="card-title"> Annual Report
                </p></div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="row">
              <div class="col-sm-12 my-a-link" style="cursor: pointer;" id="btnaddalbum">
                <a href="<?php echo base_url(); ?>/irsys/AnnualReport/AnnualReports" style="text-decoration: none; color: #66615B;"> <i class="fa fa-refresh"></i> Update Annual Report</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-info">
                <i class="fa fa-th text-success"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers-1">
                <p class="card-title"> Action Taken Report
                </p></div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="row">
              <div class="col-sm-12 my-a-link" style="cursor: pointer;" id="btnaddalbum">
                <a href="<?php echo base_url(); ?>/irsys/ActionTakenRprt/ActionTakenRprts" style="text-decoration: none; color: #66615B;"> <i class="fa fa-refresh"></i>  Action Taken Report</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-info">
                <i class="fa fa-comments text-danger"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers-1">
                <p class="card-title"> Feedback Report
                </p></div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="row">
              <div class="col-sm-12 my-a-link" style="cursor: pointer;" id="btnaddalbum">
                <a href="<?php echo base_url(); ?>/irsys/FeedbackReport/FeedbackReports" style="text-decoration: none; color: #66615B;"> <i class="fa fa-refresh"></i> Update Feedback Report</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-info">
                <i class="fa fa-sitemap text-info"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers-1">
                <p class="card-title"> Seating Arrangements
                </p></div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="row">
              <div class="col-sm-12 my-a-link" style="cursor: pointer;" id="btnaddalbum">
                <a href="<?php echo base_url(); ?>/irsys/Seating/Seatings" style="text-decoration: none; color: #66615B;"> <i class="fa fa-refresh"></i>  Seating Arrangements</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-secondary">
                <i class="nc-icon nc-key-25 text-secondary"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers-1">
                <p class="card-title">Password
                </p></div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="row">
              <div class="col-sm-12 my-a-link" style="cursor: pointer;" id="btnaddalbum">
                <a href="<?php echo base_url(); ?>/irsys/Frontpage/ChangePassword" style="text-decoration: none; color: #66615B;"> <i class="fa fa-refresh"></i> Change Password</a>
              </div>
            </div>
          </div>
        </div>
      </div>-->
  </div> 
</div>


<?php include'footer.php'; ?>