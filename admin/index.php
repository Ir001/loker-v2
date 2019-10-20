<?php 
  session_start();
  include 'include/Admin.php';
  if ($loged == 0) {
    header("location:login.php");
  }
  if (isset($_POST['update'])) {
    $su->updateDate();
    $su->checkExpired();
    echo "<script>alert('Sukses Update!');</script>";
  }
 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Lowongankerja.id | Dashboard</title>
  <?php include 'template/meta_head.php'; ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<?php include 'template/navbar.php'; ?>
<?php include 'template/side_navbar.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Iklan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <!-- Widget: user widget style 2 -->
            <div class="card card-widget">
              <div class="card-header">
                <h3 class="m-0 text-dark">Postingan Loker</h3>
              </div>
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="card-body p-0">
                <ul class="nav flex-column">
                  <?php 
                  $jumlah_act = $su->countLoker("active");
                   ?>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      Loker Active <span class="float-right badge bg-success"><?php echo $jumlah_act; ?></span>
                    </a>
                  </li>
                  <?php 
                  $jumlah_exp = $su->countLoker("expired");
                   ?>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      Loker Expired <span class="float-right badge bg-danger"><?php echo $jumlah_exp; ?></span>
                    </a>
                  </li>
                  <!-- <li class="nav-item">
                    <a href="#" class="nav-link">
                      Loker Terbaru <span class="float-right badge bg-info">12</span>
                    </a>
                  </li> -->
                  <?php 
                  $jumlah = $su->countLoker();
                   ?>
                  <li class="nav-item">
                    <a class="nav-link">Total Postingan: <span class="float-right badge bg-primary"><?php echo $jumlah; ?></span></a>
                  </li>
                  <li class="nav-item p-3">
                    <p class="text-dark float-left">Update & Check Expired</p>
                    <form method="POST" action="">
                      <button type="submit" name="update" class="float-right btn btn-sm btn-primary">Update All</button>
                    </form>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /.widget-user -->
          </div>
          <div class="col-md-6">
            <!-- Widget: user widget style 2 -->
            <div class="card card-widget">
              <div class="card-header">
                <h3 class="m-0 text-dark">Loker berdasarkan kota</h3>
              </div>
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="card-body p-0">
                <ul class="nav flex-column">
                  <?php 
                    $kota = $su->orderBy("kota");
                    $i=1;
                    foreach ($kota as $data) {
                      $kota_fix = $data['kota'];
                      $jumlah_kota = $su->jumlahData("kota", $kota_fix);
                   ?>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <?php echo ucwords($kota_fix); ?> <span class="float-right badge bg-success"><?php echo $jumlah_kota; ?></span>
                    </a>
                  </li>
                  <?php $i++;} ?>
                </ul>
              </div>
            </div>
            <!-- /.widget-user -->
          </div>
          <div class="col-md-6">
            <!-- Widget: user widget style 2 -->
            <div class="card card-widget">
              <div class="card-header">
                <h3 class="m-0 text-dark">Loker berdasarkan kategori</h3>
              </div>
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="card-body p-0">
                <ul class="nav flex-column">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      Loker Active <span class="float-right badge bg-success">31</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      Loker Expired <span class="float-right badge bg-danger">5</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      Loker Terbaru <span class="float-right badge bg-info">12</span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /.widget-user -->
          </div>
          <div class="col-md-6">
            <!-- Widget: user widget style 2 -->
            <div class="card card-widget">
              <div class="card-header">
                <h3 class="m-0 text-dark">Loker berdasarkan industri</h3>
              </div>
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="card-body p-0">
                <ul class="nav flex-column">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      Loker Active <span class="float-right badge bg-success">31</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      Loker Expired <span class="float-right badge bg-danger">5</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      Loker Terbaru <span class="float-right badge bg-info">12</span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /.widget-user -->
          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 <?php include 'template/footer.php'; ?>
</div>
<!-- ./wrapper -->

<?php include 'template/meta_footer.php'; ?>
</body>
</html>
