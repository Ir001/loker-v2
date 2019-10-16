<?php 
  session_start();
  include 'include/Admin.php';
  if ($loged == 0) {
    header("location:login.php");
  }
  $iklan = $su->showAds();
  if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $code = $_POST['code'];
    $edit = $su->editAds($id, $code);
    if ($edit == 1) {
      echo "<script>window.location='iklan.php'</script>";
    }
  }
 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Lowongan-Kerja.id | Dashboard</title>
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
            <h1 class="m-0 text-dark">Dashboard - Iklan</h1>
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
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Iklan</h3>
                <div class="card-tools">
                  <a href="add_iklan.php" class="btn btn-tool btn-sm">
                    <i class="fas fa-plus"></i>
                  </a>
                </div>
              </div>
              <div class="card-body">
                <table id="iklan" class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Iklan</th>
                    <th>Deskripsi Iklan</th>
                    <th>Ditayangkan pada</th>
                    <th>Code</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $i=0;
                      foreach ($iklan as $data) {
                        $show = $iklan[$i]['show_in'];
                        if ($show == "front") {
                          $showin = "Halaman Utama";
                        }elseif ($show == "sidebar") {
                          $showin = "Sidebar Halaman";
                        }elseif ($show == "content") {
                          $showin = "Halaman Detail";
                        }elseif ($show == "bottom") {
                          $showin = "Dibawah Halaman";
                        }else{
                          $showin = "Semua";

                        }
                     ?>
                  <tr>
                    <td>
                      <?php echo $i+1; ?>
                    </td>
                    <td>
                      <?php echo $iklan[$i]['name']; ?>
                    </td>
                    <td>
                      <?php echo $iklan[$i]['description']; ?>
                    </td>
                    <td>
                      <?php echo $showin; ?>
                    </td>
                    <td>
                      <button type="button" class="btn btn-default" data-toggle="modal" data-target="#show-ads-<?=$i;?>">
                            Show
                      </button>
                      
                      <!-- Modal -->
                      <div class="modal fade" id="show-ads-<?=$i;?>">
                        <div class="modal-dialog modal-md">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Ads Source Code</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form method="POST" action="">
                            <div class="modal-body">
                              <div class="form-group">
                                <input type="hidden" name="id" value="<?php echo $iklan[$i]['ads_id']; ?>">
                                <textarea name="code" class="form-control" required><?php echo $iklan[$i]['source_code']; ?></textarea>
                              </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                              <button type="submit" name="edit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                            </form>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                      <!-- End modal -->
                    </td>
                  </tr>
                  <?php $i++; } ?>
                  </tbody>
                </table>
              </div>
            </div>
            
            
            <!-- /.card -->
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
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script type="text/javascript">
  $(function(){
    $('#iklan').DataTable();
  })
</script>
</body>
</html>
