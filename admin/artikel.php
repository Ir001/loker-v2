<?php 
  session_start();
  include 'include/Admin.php';
  if ($loged == 0) {
    header("location:login.php");
  }
  // 
  if (isset($_GET['show']) AND $_GET['show'] == "active") {
    $artikel = $su->getArtikel('active');
  }elseif (isset($_GET['show']) AND $_GET['show'] == "expired") {
    $artikel = $su->getArtikel('expired');
  }else{
    $artikel = $su->getArtikel('all');
  }


  // 


  if (isset($_GET['page']) AND $_GET['page'] == "delete" AND isset($_GET['id'])) {
    $id = $_GET['id'];
    $delete = $su->deleteArtikel($id);
    $msg['status'] ='';
    if ($delete == 1) {
      $msg['status'] = 'success';
      $msg['response'] = 'Success menghapus artikel';
    }else{
      $msg['status'] = 'failed';
      $msg['response'] = 'Gagal menghapus artikel';
    }
  }
  // 
  $menu = "artikel";
  if (isset($_GET['show'])) {
    if ($_GET['show'] == "all") {
      $menuItem = "all";
    }elseif($_GET['show'] == "expired"){
      $menuItem = "expired";
    }elseif ($_GET['show'] == "active") {
      $menuItem = "active";
    }else{
      $menuItem = "all";
    }
  }else{
      $menuItem = "all";
    }
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Lowongankerja.id | Dashboard</title>
  <?php include 'template/meta_head.php'; ?>
  <!-- Toastr -->
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
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
            <h1 class="m-0 text-dark">Dashboard - Artikel</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Artikel</li>
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
                <h3 class="card-title">Artikel</h3>
                <div class="card-tools">
                  <a href="add_iklan.php" class="btn btn-tool btn-sm">
                    <i class="fas fa-plus"></i>
                  </a>
                </div>
              </div>
              <div class="card-body">
                <table id="artikel" class="table table-striped table-bordered">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Deadline</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $i=0;
                      foreach ($artikel as $data) {
                        $date = date('d, F, Y', strtotime($data['date_tutup']));
                        $a = explode("-", $data['judul']);
                        $title = $a[0];
                        $url_title = trim(str_replace(" ", "+", strtolower($title)),' ');
                        $url = $data['id_lowongan']."_lowongan_".$url_title.".html";
                     ?>
                  <tr>
                    <td>
                      <?php echo $i+1; ?>
                    </td>
                    <td>
                      <?php echo substr($data['judul'], 0,30)."..."; ?> 
                    </td>
                    <td>
                      <span class="badge <?php if ($data['status'] == "expired"): ?>
                      bg-danger
                      <?php else: ?>
                      bg-success
                        
                      <?php endif ?>"><?php echo ucwords($data['status']); ?></span>
                    </td>
                    <td> <?php echo @$date; ?></td>
                    <td style=" vertical-align: middle;">
                      <div class="btn-group text-center">
                        <a href="<?=$set['base_url'].$url;?>" target="_blank" class="btn mr-1 btn-sm btn-info"><i class="fas fa-eye" title="View detail"></i></a>
                        <form class="delete_artikel">
                          <input type="hidden" name="delete_artikel" value="1">
                          <input type="hidden" name="id" value="<?php echo $data['id_lowongan']; ?>">
                          <button type="submit" class="btn btn-sm btn-delete btn-danger"><i class="fas fa-trash" title="Delete this"></i></button>
                        </form>
                      </div>
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
<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>
<script type="text/javascript">
  $(function(){
    $('#artikel').DataTable({
      "fnDrawCallback": function( oSettings ) {
        // componentHandler.upgradeDOM();
        $('.btn-delete').click(function(){
          if (confirm("Apakah anda yakin?")) {
            $('.delete_artikel').submit(function(e){
              e.preventDefault();
              $.ajax({
                type : 'POST',
                url : 'include/Event.artikel.php',
                data : $(this).serialize(),
                dataType : 'json',
                success : function(data){
                  if (data.success) {
                    toastr['success'](data.message);
                    setTimeout(function(){window.location.reload();},500)
                  }else{
                    toastr['error'](data.message);
                  }
                }
              })
            })
          }else{
            $('.form-delete').submit(function(e){
              e.preventDefault();
            })
          }
        });

      }

    });
  })
 
</script>
</body>
</html>
