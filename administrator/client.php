<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Client | Bahaghari</title>
  <?php 
        include('inc/header.php');
        chkLvl();
  ?>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <?php include('inc/navbar.php');?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include('inc/top-sidebar.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Client Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active">Client</li>
            </ol>
          </div>
        </div>
        <?php include('pages/client.php');?>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
   
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include('inc/footer.php');?>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="plugins/iCheck/icheck.min.js"></script>
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables/dataTables.bootstrap4.js"></script>
<script src="dist/jquery-toast-plugin-master/dist/jquery.toast.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="dist/js/aes.js"></script>
<script src="dist/js/toast.js"></script>
<script src="dist/js/functions.js"></script>
<script src="dist/js/client.js"></script>
<script>
    loadProfile(<?php echo $_SESSION['user_id'];?>);
     getAllClient();
    $(".checkbox-toggle").click(function () {
      var clicks = $(this).data('clicks');
      if (clicks) {
        //Uncheck all checkboxes
        $(".client-all input[type='checkbox']").iCheck("uncheck");
        $(".far", this).removeClass("fa-check-square").addClass('fa-square');
      } else {
        //Check all checkboxes
        $(".client-all input[type='checkbox']").iCheck("check");
        $(".far", this).removeClass("fa-square").addClass('fa-check-square');
      }
      $(this).data("clicks", !clicks);
    });
</script>
</body>
</html>
