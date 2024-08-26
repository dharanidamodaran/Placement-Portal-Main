<?php

session_start();

if (empty($_SESSION['id_admin'])) {
  header("Location: index.php");
  exit();
}

require_once("../db.php");
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Placement Portal</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../css/AdminLTE.min.css">
  <link rel="stylesheet" href="../css/_all-skins.min.css">
  <!-- Custom -->
  <link rel="stylesheet" href="../css/custom.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-green sidebar-mini">
  <div class="wrapper">

    <?php

    include 'header.php';

    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="margin-left: 0px;">

      <section id="candidates" class="content-header">
        <div class="container">
          <div class="row">
            <div class="col-md-3">
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Welcome <b>Admin</b></h3>
                </div>
                <div class="box-body no-padding">
                  <ul class="nav nav-pills nav-stacked">
                    <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li><a href="add-companies.php"><i class="fa fa-briefcase"></i> Add Companies</a></li>
					<li><a href="add-placement.php"><i class="fa fa-briefcase"></i> Add Placement Records</a></li>
                    <li><a href="active-jobs.php"><i class="fa fa-briefcase"></i> Active Drives</a></li>
                    <li><a href="applications.php"><i class="fa fa-address-card-o"></i> Students Profile</a></li>
                    <!-- <li><a href="companies.php"><i class="fa fa-building"></i> Companies</a></li> -->
                    <li><a href="companies.php"><i class="fa fa-arrow-circle-o-right"></i> Co - Ordinators</a></li>
                    <li><a href="../logout.php"><i class="fa fa-arrow-circle-o-right"></i> Logout</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-9 bg-white padding-2">

            <div class="row latest-job margin-top-50 margin-bottom-20 bg-white">
            <h3 class="text-center margin-bottom-20">Add Placement Records</h3>
            <form method="post" id="registerCandidates" action="adding-placement.php" enctype="multipart/form-data">
              <div class="col-md-6 latest-job ">
                <div class="form-group">
                  <input class="form-control input-lg" type="text" id="studentname" name="studentname" placeholder="Student Name *" required>
                </div>
                
                <div class="form-group">
                  <!-- <input class="form-control input-lg" type="text" id="qualification" name="qualification" placeholder="Highest Qualification *"> -->
                  <select name="companyname" id="companyname" class="form-control input-lg">
                    <option value="nil">---Select company---</option>
                    <option value="DELOITTE">DELOITTE</option>
                    <option value="IBM">IBM</option>
                    <option value="KGISL">KGISL</option>
                    <option value="NITROWARE">NITROWARE</option>
                    <option value="JARO">JARO</option>
                    <option value="OM INNOVATIONS">OM INNOVATIONS</option>
                    <option value="CSS CORPS">CSS CORPS</option>
                    <option value="CAPEGEMNI">CAPEGEMNI</option>
                    <option value="CHEGG INDIA">CHEGG INDIA</option>
                    <option value="INFOSYS">INFOSYS</option>
                    <option value="24[7]">24[7]</option>
                    <option value="ATOS SYNTEL">ATOS SYNTEL</option>
                    <option value="TCS IT">TCS IT</option>
                    <option value="VIRTUSA">VIRTUSA</option>
                    <option value="FOCUS EDUMATICS">FOCUS EDUMATICS</option>
                    <option value="ACCENTA">ACCENTA</option>
                    <option value="VSERVE">VSERVE</option>
                    <option value="CTS">CTS</option>
                    <option value="HRH NEXT">HRH NEXT</option>
                    <option value="VINAYAK INFOTECH">VINAYAK INFOTECH</option>
                    <option value="WIPRO">WIPRO</option>
                    <option value="BNY MELLON">BNY MELLON</option>
                    <option value="TCS NQT">TCS NQT</option>
                    <option value="SURETI NQT">SURETI NQT</option>
                    <option value="G CODE">G CODE</option>
                    <option value="SMART RESOURCE">SMART RESOURCE</option>

                  </select>
                </div>
                <div class="form-group checkbox">
                  <label><input type="checkbox"> I accept terms & conditions</label>
                </div>
                <div class="form-group">
                  <button class="btn btn-flat btn-success">Add</button>
                </div>
                <?php
                //If User already registered with this email then show error message.
                if (isset($_SESSION['registerError'])) {
                ?>
                  <div class="form-group">
                    <label style="color: red;">Email Already Exists! Choose A Different Email!</label>
                  </div>
                <?php
                  unset($_SESSION['registerError']);
                }
                ?>

                <?php if (isset($_SESSION['uploadError'])) { ?>
                  <div class="form-group">
                    <label style="color: red;"><?php echo $_SESSION['uploadError']; ?></label>
                  </div>
                <?php unset($_SESSION['uploadError']);
                } ?>

              </div>
              <div class="col-md-6 latest-job ">
                
                <div class="form-group">
                  <input class="form-control input-lg" type="text" id="rollno" name="rollno" minlength="10" maxlength="10"  placeholder="Roll Number *">
                </div>
                <div class="form-group">
                  <input class="form-control input-lg" type="text" id="salarypackage" name="salarypackage" placeholder="Salary Package*">
                </div>
                <div class="form-group">
                  <input class="form-control input-lg" type="text" id="designation" name="designation" placeholder="Designation *">
                </div>

                <!-- <div class="form-group">
                  <label style="color: red;">File Format PDF Only!</label>
                  <input type="file" name="resume" class="btn btn-flat btn-danger" required>
                </div> -->
              </div>
            </form>

          </div>     
  </div>

          </div>
        </div>
      </section>

      <div class="modal modal-success fade" id="modal-success">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Job Title</h4>
            </div>
            <div class="modal-body">
              <h3><b>Created On</b></h3>
              <p>24/04/2017</p>
              <br>
              <h3><b>Company Name</b></h3>
              <p>XYX Private Limited</p>
              <br>
              <h3><b>Company Email</b></h3>
              <p>test@test.com</p>
              <br>
              <h3><b>Location</b></h3>
              <p>India</p>
              <br>
              <h3><b>Application Message</b></h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->


    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer" style="margin-left: 0px;">
      <div class="text-center">
        <strong>Placement Portal.</strong>
      </div>
    </footer>

    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>

  </div>
  <!-- ./wrapper -->

  <!-- jQuery 3 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- DataTables -->
  <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../js/adminlte.min.js"></script>

  <script>
    $(function() {
      $('#example2').DataTable({
        'paging': true,
        'lengthChange': false,
        'searching': false,
        'ordering': true,
        'info': true,
        'autoWidth': false
      });
    });
  </script>
</body>

</html>