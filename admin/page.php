<?php 
session_start();
include 'include/Admin.php';
if ($loged == 0) {
  header("location:login.php");
}
$data = $su->getSetting();
$menu = "halaman";
if (isset($_GET['url'])) {
  $url = trim(htmlspecialchars($_GET['url']));
  $data = $su->getContent($url);
  $menuItem = $url;
}else{
  header('location: page.php?url=about');
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Lowongankerja.id | Halamam</title>
  <?php include 'template/meta_head.php'; ?>
  <!-- summernote -->
  <link rel="stylesheet" href="./plugins/summernote/summernote-bs4.css">
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
              <h1 class="m-0 text-dark">Dashboard - Page</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Page</li>
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
                  <h3 class="card-title">Halaman - <?=ucwords($url)?></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="contentForm">
                  <input type="hidden" name="setContent" value="1">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="">Judul Halaman</label>
                      <input type="text" name="judul" class="form-control" value="<?=$data['title']?>" placeholder="Judul Halaman">
                    </div>
                    <div class="form-group">
                      <textarea name="content" id="content" class="textarea" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" placeholder="Content..."><?=$data['content']?></textarea>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="hidden" name="type" value="<?=$url;?>">
                  <button type="submit" class="btn btn-success">Simpan</button>
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
  $('#content').summernote();
  $('#contentForm').submit(function(e){
    e.preventDefault();
    $.ajax({
      type : 'POST',
      url : 'include/Save.php',
      data : $(this).serialize(),
      dataType : 'json',
      success : function(data){
        if (data.success) {
          toastr['success'](data.message);
          setTimeout(function(){window.location.reload()},800)
        } else {
          toastr['error'](data.message);
        }
      }
    });
  });
</script>
</body>
</html>
