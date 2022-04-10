 
<?php 
session_start(); 
$page = 'index';
//unset($_SESSION["status"]);

?> 
<?php 
include "header.php";
include  "fucntion_query.php";
?>

<body>

  <!-- Navigation -->
  <?php include "navbar.php"; ?>
  <!-- Page Content -->

  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        
      </div>
    </div>

    <div class="jumbotron">
      <div style="text-align:center;width:100%;">
      <h1><font color="blue">ยินดีต้อนรับสู่ระบบยืม-คืนอุปกรณ์กีฬา</font></h1>
      </div>
      
    </div>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/popper/popper.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>
