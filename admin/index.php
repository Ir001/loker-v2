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
  }elseif(isset($_POST['grab'])){
    $id_location = $_POST['location'];
    $grabing = $su->grabing($id_location);
    echo "<script>alert('Sukses Grabing!');</script>";
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
                  <li class="nav-item p-3">
                    <div class="col-12">
                      <p class="text-dark float-left">Grab Loker by Location</p>
                    </div>
                    <div class="clearfix"></div>
                    <form method="POST" action="">
                      <div class="row">
                        <div class="col-8">
                           <select name="location" id="location" class="form-control">
                              <option value="">Semua lokasi</option>
                              <optgroup label="Indonesia"><option value="30100" class="opt-indent">Aceh</option>
                                <option value="30200" class="opt-indent">Bali</option>
                                <option value="32800" class="opt-indent">Bangka Belitung</option>
                                <option value="32900" class="opt-indent">Banten</option>
                                <option value="30300" class="opt-indent">Bengkulu</option>
                                <option value="33000" class="opt-indent">Gorontalo</option>
                                <option value="30500" class="opt-indent">Jakarta Raya</option>
                                <option value="30600" class="opt-indent">Jambi</option>
                                <option value="30700" class="opt-indent">Jawa Barat</option>
                                <option value="30800" class="opt-indent">Jawa Tengah</option>
                                <option value="30900" class="opt-indent">Jawa Timur</option>
                                <option value="31000" class="opt-indent">Kalimantan Barat</option>
                                <option value="31100" class="opt-indent">Kalimantan Selatan</option>
                                <option value="31200" class="opt-indent">Kalimantan Tengah</option>
                                <option value="31300" class="opt-indent">Kalimantan Timur</option>
                                <option value="33500" class="opt-indent">Kalimantan Utara</option>
                                <option value="33200" class="opt-indent">Kepulauan Riau</option>
                                <option value="31400" class="opt-indent">Lampung</option>
                                <option value="31500" class="opt-indent">Maluku</option>
                                <option value="33100" class="opt-indent">Maluku Utara</option>
                                <option value="31600" class="opt-indent">Nusa Tenggara Barat</option>
                                <option value="31700" class="opt-indent">Nusa Tenggara Timur</option>
                                <option value="30400" class="opt-indent">Papua</option>
                                <option value="33300" class="opt-indent">Papua Barat</option>
                                <option value="31800" class="opt-indent">Riau</option>
                                <option value="33400" class="opt-indent">Sulawesi Barat</option>
                                <option value="31900" class="opt-indent">Sulawesi Selatan</option>
                                <option value="32000" class="opt-indent">Sulawesi Tengah</option>
                                <option value="32100" class="opt-indent">Sulawesi Tenggara</option>
                                <option value="32200" selected="selected"  class="opt-indent">Sulawesi Utara</option>
                                <option value="32300" class="opt-indent">Sumatera Barat</option>
                                <option value="32400" class="opt-indent">Sumatera Selatan</option>
                                <option value="32500" class="opt-indent">Sumatera Utara</option>
                                <option value="32700" class="opt-indent">Yogyakarta</option>
                              </optgroup>
                              <optgroup label="Luar Negeri">
                                <option value="60000" class="opt-indent">Filipina</option>
                                <option value="20000" class="opt-indent">Hongkong</option>
                                <option value="40000" class="opt-indent">India</option>
                                <option value="150000" class="opt-indent">Jepang</option>
                                <option value="50000" class="opt-indent">Malaysia</option>
                                <option value="70000" class="opt-indent">Singapura</option>
                                <option value="80000" class="opt-indent">Thailand</option>
                                <option value="100000" class="opt-indent">Tiongkok  </option>
                                <option value="110000" class="opt-indent">Vietnam</option>
                              </optgroup><optgroup label="Lokasi kerja yang lain">
                                <option value="90100" class="opt-indent">Semua lokasi kerja yang lain</option>
                                <option value="90110" class="opt-indent">Afrika</option>
                                <option value="90120" class="opt-indent">Asia – Timur Tengah</option>
                                <option value="90130" class="opt-indent">Asia – lainnya</option>
                                <option value="90140" class="opt-indent">Australia &amp; Selandia Baru</option>
                                <option value="90150" class="opt-indent">Eropa</option>
                                <option value="90160" class="opt-indent">Amerika Utara</option>
                                <option value="90170" class="opt-indent">Amerika Selatan</option>
                              </optgroup>
                            </select>
                        </div>
                        <div class="col-4">
                          <button type="submit" name="grab" class="float-right btn btn-sm btn-primary">Grab Now</button>
                        </div>
                      </div>
                     

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
