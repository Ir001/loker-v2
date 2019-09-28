<?php 
  session_start();
  include 'include/Admin.php';
  if ($loged == 0) {
    header("location:login.php");
  }
  $data = $su->getSetting();
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
            <h1 class="m-0 text-dark">Dashboard - Pengaturan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Pengaturan</li>
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
                <h3 class="card-title">Pengaturan - Configurasi Situs</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="settingForm">
                <input type="hidden"  name="form" value="setting">
                <div class="card-body">
                  <div class="form-group">
                    <label for="">Judul Situs</label>
                    <input type="text" name="judul" class="form-control" value="<?php echo $data['title'] ?>" placeholder="Judul Situs">
                  </div>
                  <div class="form-group">
                    <label for="">Tag Line</label>
                    <input type="text" name="tag_line" class="form-control" value="<?php echo $data['tag_line'] ?>" placeholder="Tag Line">
                  </div>
                  <div class="form-group">
                    <label for="">Meta Keywords</label>
                    <textarea  class="form-control" name="keyword" placeholder="Meta Keywords"><?php echo $data['keywords'] ?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="">Meta Deskripsi</label>
                    <textarea  class="form-control" name="deskripsi"placeholder="Meta Deskripsi"><?php echo $data['description'] ?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="">Google Tag Manager</label>
                    <textarea  class="form-control" name="tag_manager" placeholder="Tempelkan skrip tag manager disini"><?php echo $data['tag_manager'] ?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="">Google Adsense</label>
                    <textarea  class="form-control" name="adsense" placeholder="Tempelkan skrip Adsense disini"><?php echo $data['adsense'] ?></textarea>
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
