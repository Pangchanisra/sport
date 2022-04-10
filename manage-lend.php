<?php
session_start();
$page = 'lend'; ?>
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

    <nav aria-label="breadcrumb" role="navigation">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page"><?= "ยินดีต้อนรับ" . $user->name . " " . $user->lastname ?></li>
      </ol>
    </nav>

    <div class="jumbotron">
      <div class="row">
        <div class="col-lg-12 ">
          <h2 class="display-5 text-center">อุปกรณ์กีฬาทั้งหมด</h2>
          <br>

          <form action="save_history.php" method="post">
            <div class="container">
              <?php


              $name = $_GET["dat"]; // 

              $sqlll = "SELECT * FROM tb_book WHERE book_id LIKE '%$name%' ORDER BY book_id ASC";
              $resulttt = mysqli_query($conn, $sqlll);
              $counnn = mysqli_num_rows($resulttt);
              $order = 1;
              ?>
              <?php if ($counnn > 0) { ?>
                <table id="example" class="table table-hover table-bordered table-dark" cellspacing="0" width="100%">
                  <thead>
                    <tr class="table-active">
                      <th width="5%">ลำดับ</th>
                      <th width="30%">ชื่ออุปกรณ์กีฬา</th>
                      <th width="20%">รหัสอุปกรณ์กีฬา</th>
                      <th width="5%">สถานะ</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php
                    $book = GetDataBooks();
                    for ($i = 0; $i < count($book); $i++) {
                      $disabled = '';
                      if ($book[$i]->book_status == 'ปกติ') {
                        $status = 'info';
                      } elseif ($book[$i]->book_status == 'ถูกยืม') {
                        $status = 'warning';
                        $disabled = 'disabled';
                      } elseif ($book[$i]->book_status == 'หาย') {
                        $status = 'danger';
                        $disabled = 'disabled';
                      } else {
                        $status = 'secondary';
                        $disabled = 'disabled';
                      }
                      $checked = '';
                      if ($_SESSION["book_id"] == $book[$i]->book_id) {
                        $checked = 'checked';
                      }
                    ?>
                      <tr>
                        <td><?= $i + 1; ?></td>
                        <td>
                          <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" value="<?= $book[$i]->book_id ?>" name="book_id[]" <?= $disabled ?> <?= $checked ?>>
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description"><?= $book[$i]->book_name ?></span>

                          </label>
                        </td>
                       
                        <td><?= $book[$i]->book_code ?></td>
                        
                       
                        <td>
                          <h5><span class="badge badge-<?= $status ?>"><?= $book[$i]->book_status ?></span></h5>
                        </td>
                      </tr>
                    <?php } ?>

                  </tbody>
                </table>
              <?php } else { ?>
                <div class="alert alert-danger">
                  <b>ไม่พบข้อมูลที่ค้นหา !!!<b>
                </div>
              <?php } ?>
            </div>

            <div class="row">
              <div class="col-lg-5"></div>
              <div class="col-lg-7">
                <input type="submit" class="btn btn-success " name="submit" id="submit" value="ยืม">
              </div>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/popper/popper.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.0.0-beta/dt-1.10.16/datatables.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#example').DataTable({
        paging: false
      });

      $("form").submit(function() {

        var checked = []
        $("input[name='book_id[]']:checked").each(function() {
          checked.push(parseInt($(this).val()));
        });

        if (checked.length == 0) {
          alert("กรุณาเลือกอุปกรณ์กีฬาที่ต้องการยืม !");
          return false;
        } else {
          alert("ทำการยืมเรียบร้อย !");
          return true;
        }

      });
    });
  </script>
</body>

</html>