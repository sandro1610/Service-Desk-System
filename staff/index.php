<?php
    include '../includes/conn.php';
     session_start();
 if (empty($_SESSION['email']) && empty($_SESSION['password']) && empty($_SESSION['id_user'])){
    header("Location:../index.php");
  }elseif ($_SESSION['level'] != 'staff') {
    header("Location:../index.php");
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>INSERDES</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Favicon -->
  <link rel="icon" href="../assets/img/icons/favicon.ico" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="../assets/nucleo/css/nucleo.css" type="text/css">
  <!-- Page plugins -->
  <link rel="stylesheet" type="text/css" href="../assets/DataTables/datatables.min.css"/>
  <!-- Argon CSS -->
  <link rel="stylesheet" href="../assets/css/argon-dashboard.css?v=1.1.0" type="text/css">
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <link rel="stylesheet" href="../assets/css/all.css">
  <script src="../assets/js/all.js"></script>
  <script src="../assets/js/Chart.js"></script>
</head>


<body>
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="#">
        <img src="../assets/img/icons/logo.png" class="navbar-brand-img">
      </a>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ni ni-bell-55"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
            <a class="dropdown-item" href="include/logout.php">Logout</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <a href="include/logout.php" class="dropdown-item">
              <i class="ni ni-user-run"></i>
              <span>Logout</span>
            </a>
          </div>
        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="">
                <img src="../assets/img/icons/logo.png">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
              </button>
            </div>
          </div>
        </div>
        <!-- Navigation -->
        <ul class="navbar-nav">
          <li class="nav-item  class=" active=" ">
          <a class=" nav-link active " href="?p=dashboard"> <i class="ni ni-tv-2 text-primary"></i> Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="?p=profile">
              <i class="ni ni-single-02 text-yellow"></i> User profile
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?p=problem">
              <i class="ni ni-planet text-info"></i>Add Problem
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?p=request">
              <i class="ni ni-mobile-button text-success "></i>Add Request
            </a>
          </li>
        </ul>
        <ul class="navbar-nav mb-md-3">
          <li class="nav-item">
            <a class="nav-link " href="?p=history_problem">
              <i class="ni ni-hat-3 text-red"></i> History Problem
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="?p=history_request">
              <i class="ni ni-hat-3 text-red"></i> History Request
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- User -->
        <?php
            $email = $_SESSION['email'];
            $query = mysqli_query($link,"SELECT * FROM tb_user WHERE email = '$email' ");
            while($hasil=mysqli_fetch_array($query)) :
        ?>
        <ul class="navbar-nav align-items-center d-none d-md-flex ml-auto">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown">
              <div class="media align-items-center">
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold"><?php echo $hasil['nama']; ?></span>
                </div>
              </div>
            </a>
            <?php endwhile ?>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <a href="include/logout.php" class="dropdown-item">
                <i class="ni ni-user-run"></i>
                <span>Logout</span>
              </a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- End Navbar -->
    <!-- Header -->
    <div class="header bg-gradient-primary pb-4 pt-md-5"></div>
    <div class="container-fluid mt-3">
      <div class="row mt-3">
        <div class="col-md-12 mb-5 mb-xl-0">
          
                  <?php
                  include 'include/controller-page.php';
                  ?>

        </div>
      </div>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="../assets/jquery/jquery.min.js"></script>
  <script src="../assets/js/bootstrap.bundle.min.js"></script>
  <!-- Optional JS -->
  <script type="text/javascript" src="../assets/DataTables/datatables.min.js"></script>
  <!-- Argon JS -->
  <script src="../assets/js/argon.min.js?v=1.1.0"></script>
  <script type="text/javascript">
      $(document).ready( function(){
          $('#data-problem').DataTable();
      } );
  </script>
  <script type="text/javascript">
      $(document).ready( function(){
          $('#data-request').DataTable();
      } );
  </script>
  <script language="JavaScript" type="text/javascript">
      function hapusData_problem(no_ticket){
        if (confirm("Apakah anda yakin akan menghapus data ini?")){
          window.location.href = 'index.php?p=delete_problem&no_ticket=' + no_ticket;
        }
      }
      function send_problem(v_key){
        if (confirm("Apakah anda yakin akan MENGIRIM data ini?")){
          window.location.href = 'index.php?p=approve_problem&v_key=' + v_key;
        }
      }
      function approve_problem(v_key){
        if (confirm("Apakah anda yakin akan MENYETUJUI data ini?")){
          window.location.href = 'index.php?p=approve_problem&v_key=' + v_key;
        }
      }
      function proccess_problem(v_key){
        if (confirm("Apakah anda yakin akan MEMPROSES data ini?")){
          window.location.href = 'index.php?p=approve_problem&v_key=' + v_key;
        }
      }
      function finish_problem(v_key){
        if (confirm("Apakah anda yakin akan MENYELESAIKAN data ini?")){
          window.location.href = 'index.php?p=approve_problem&v_key=' + v_key;
        }
      }function reject_problem(v_key){
        if (confirm("Apakah anda yakin akan MENOLAK data ini?")){
          window.location.href = 'index.php?p=reject_problem&v_key=' + v_key;
        }
      }
    </script>
    <script language="JavaScript" type="text/javascript">
      function hapusData_request(no_ticket){
        if (confirm("Apakah anda yakin akan menghapus data ini?")){
          window.location.href = 'index.php?p=delete_request&no_ticket=' + no_ticket;
        }
      }
      function send_request(v_key){
        if (confirm("Apakah anda yakin akan MENGIRIM data ini?")){
          window.location.href = 'index.php?p=approve_request&v_key=' + v_key;
        }
      }
      function approve_request(v_key){
        if (confirm("Apakah anda yakin akan MENYETUJUI data ini?")){
          window.location.href = 'index.php?p=approve_request&v_key=' + v_key;
        }
      }
      function proccess_request(v_key){
        if (confirm("Apakah anda yakin akan MEMPROSES data ini?")){
          window.location.href = 'index.php?p=approve_request&v_key=' + v_key;
        }
      }
      function finish_request(v_key){
        if (confirm("Apakah anda yakin akan MENYELESAIKAN data ini?")){
          window.location.href = 'index.php?p=approve_request&v_key=' + v_key;
        }
      }function reject_request(v_key){
        if (confirm("Apakah anda yakin akan MENOLAK data ini?")){
          window.location.href = 'index.php?p=reject_request&v_key=' + v_key;
        }
      }
    </script>
</body>

</html>