<?php

//To Handle Session Variables on This Page
session_start();

//If user Not logged in then redirect them back to homepage. 
if (empty($_SESSION['id_user'])) {
  header("Location: ../index.php");
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
    include 'header.php'
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="margin-left: 0px;">

      <section id="candidates" class="content-header">
        <div class="container">
          <div class="row">
            <div class="col-md-3">
              <div id="star" class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Welcome <b><?php echo $_SESSION['name']; ?></b></h3>
                </div>
                <div class="box-body no-padding">
                  <ul class="nav nav-pills nav-stacked">
                    <li><a href="edit-profile.php"><i class="fa fa-user"></i> Edit Profile</a></li>
                    <li><a href="index.php"><i class="fa fa-address-card-o"></i> My Applications</a></li>
                    <li><a href="placement-records.php"><i class="fa fa-address-card-o"></i> Placement Records</a></li>
                    <!-- <li><a href="../jobs.php"><i class="fa fa-list-ul"></i> Active Drives</a></li> -->
                    <li><a href="settings.php"><i class="fa fa-gear"></i> Settings</a></li>
                    <li><a href="../logout.php"><i class="fa fa-arrow-circle-o-right"></i> Logout</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <style>
                table, th, td {
  
					border: 8px solid black;
					border-collapse: collapse;
					border-color: pink;
					border-width: 10px;
				}
            </style>
            <div class="col-md-9 bg-white padding-2">

              <h2>Placement Records</h2>
              <p>Below you will find the history of placed students with their respective placed companies and offered salary packages</p>
              <table style="width:100%" class="center">
            <tr>
              <th width="10%">ROLL NO</th>
              <th width="20%">NAME</th>
              <th width="20%">COMPANY</th>
              <th width="20%">ROLE</th>
              <th width="10%">SALARY PACKAGE</th>
            </tr>
            <?php
              $sql = "SELECT * FROM alumni";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
              ?>
              <tr>
              <td><?php echo $row['rollno']; ?></td>
              <td><?php echo $row['name']; ?></td>
              <td><?php echo $row['company']; ?></td>
              <td><?php echo $row['designation']; ?></td>
              <td><?php echo $row['salary']; ?> LPA</td>
              </tr>
              <?php } } ?>


          </table>
             
               

            </div>
          </div>
        </div>
      </section>



    </div>
    <!-- /.content-wrapper -->

  <?php include '../copyright.php';  ?>
  
  
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
  <!-- AdminLTE App -->
  <script src="../js/adminlte.min.js"></script>
</body>

</html>

<style>
  /* my css  */

  .box {

    font-size: medium;
    font-family: sans-serif;
  }


  li {
    color: aqua;
  }


  @media only screen and (max-width: 989px) {
    .box {
      margin: auto;
      text-align: center;
    }
  }
</style>


<script src="../js/sweetalert.js"></script>

<?php
if (isset($_SESSION['status1'])  && $_SESSION['status1'] != '') {

?>

  <script>
    swal({
      title: "<?php echo $_SESSION['status1']; ?>",
      text: " You have successfully applied for the drive.",
      icon: "<?php echo $_SESSION['status_code1']; ?>",
      button: "Okay",
    });
  </script>

<?php

  unset($_SESSION['status1']);
}

?>