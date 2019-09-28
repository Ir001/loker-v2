<?php 
  session_start();
  include 'include/Admin.php';
  if ($loged == 0) {
    header("location:login.php");
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
            <h1 class="m-0 text-dark">Dashboard - Tambah Iklan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Tambah Iklan</li>
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
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Iklan - Tambah Iklan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="settingForm">
                <input type="hidden"  name="form" value="setting">
                <div class="card-body">
                  <div class="form-group">
                    <label for="">Nama Iklan</label>
                    <input type="text" name="name" class="form-control" placeholder="Nama Iklan" required>
                  </div>
                  <div class="form-group">
                    <label for="">Source Code</label>
                    <textarea name="code" class="form-control" placeholder="Script Iklan" required></textarea>
                  </div>
                  <div class="form-group">
                    <label for="">Deskripsi Tentang Iklan</label>
                    <textarea  class="form-control" name="description" placeholder="Description"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="">Ditayangkan Pada</label>
                      <div class="form-group">
                        <label>Pilih</label>
                        <select name="show" class="form-control" required>
                          <option value="content" disabled selected>Pilih</option>
                          <option value="front">Halaman Utama</option>
                          <option value="sidebar">Sidebar Job</option>
                          <option value="content">Detail Page</option>
                          <option value="bottom">Detail Page (Bawah)</option>
                        </select>
                      </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="saveBtn" class="btn btn-primary">Simpan Pengaturan</button>
                </div>
              </form>
              <div id="load" class="overlay d-none"><i class="fas fa-2x fa-sync-alt fa-spin"></i></div>

            </div>
            
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
<script type="text/javascript">
$(document).ready(function(){
  $('#settingForm').submit(function(e){
    e.preventDefault();
    $('#load').removeClass('d-none');
    setTimeout(function(){
      $.ajax({
        type : 'POST',
        url : 'include/Save.php',
        data : $('#settingForm').serialize(),
        success : function(data){
          $('#load').addClass('d-none');
          alert(data);
        }
      })}, 8000)
  })
})

</script>
</body>
</html>
