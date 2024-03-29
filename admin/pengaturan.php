<?php 
session_start();
include 'include/Admin.php';
if ($loged == 0) {
  header("location:login.php");
}
$data = $su->getSetting();
$menu = "pengaturan";
$menuItem = "";
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
            <div class="col-lg-8">
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
                      <label for="">URL</label>
                      <div class="radio">
                        <label><input type="radio" class="radio-control" name="ssl" value="http"> HTTP</label>
                        <label><input type="radio" class="radio-control" name="ssl" value="https"> HTTPS</label>
                      </div>
                      <input type="text" name="base_url" id="url" class="form-control" value="<?php echo $_SERVER['HTTP_HOST']."/" ?>" readonly>
                    </div>
                    <div class="form-group">
                      <label for="">Tag Line</label>
                      <input type="text" name="tag_line" class="form-control" value="<?php echo $data['tag_line'] ?>" placeholder="Tag Line">
                    </div>
                    <div class="form-group">
                      <label for="">Auto Grab Konten</label>
                      <div class="radio">
                        <label><input type="radio" name="auto_grab" <?php if ($data['auto_grab'] == "on"): ?>
                        checked
                        <?php endif ?> value="on">ON</label>
                        <label><input type="radio" name="auto_grab" <?php if ($data['auto_grab'] == "off"): ?>
                        checked
                        <?php endif ?> value="off">OFF</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="">Grabing Konten by Location</label>
                      <select class="form-control" name="kd_location">
                        <option value="" selected>Default</option>
                        <?php 
                        $get_kode = $su->get_kode_location();
                        foreach ($get_kode as $get_kode) {
                         ?>
                         <option value="<?=$get_kode['kode'];?>" <?php if ($get_kode['kode'] == $data['kd_location']): ?>
                         selected
                         <?php endif ?>> <?=$get_kode['name'];?></option>

                       <?php } ?>
                     </select>
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
          <div class="col-md-4">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Akun</h3>
              </div>
              <?php 
                $akun = $su->getAkun();
               ?>
              <div class="card-body">
                <form id="formAkun">
                  <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="hidden" name="changeName" value="1">
                    <input type="hidden" name="admin_id" value="<?=$akun['admin_id']?>">
                    <input type="text" name="username" class="form-control" value="<?=$akun['fullname'];?>" placeholder="Nama Lengkap" required>
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="<?=$akun['email'];?>" placeholder="Email" disabled>
                  </div>
                  <div class="form-group">
                    <a href="#changePw" class="btn btn-danger float-left" id="btn_change_pw">Ganti Sandi</a>
                    <button type="submit" class="btn btn-success float-right">Simpan</button>
                  </div>
                </form>
              </div>
            </div>
            <div class="card card-danger" id="changePw" style="display: none;">
              <div class="card-header">
                <h3 class="card-title">Ganti Kata Sandi</h3>
              </div>
              <div class="card-body">
                <form id="formPwd">
                  <div class="form-group">
                    <label>Kata Sandi Sekarang</label>
                    <input type="hidden" name="changePwd" value="1">
                    <input type="hidden" name="admin_id" value="<?=$akun['admin_id']?>">
                    <input type="password" name="password" class="form-control" placeholder="Password Now" required>
                  </div>
                  <div class="form-group">
                    <label>Kata Sandi Baru</label>
                    <input type="password" name="new_password" class="form-control" placeholder="New Password" required>
                  </div>
                  <div class="form-group">
                    <label>Konfirmasi Kata Sandi</label>
                    <input type="password" name="repassword" class="form-control" placeholder="Confirm Password" required>
                  </div>
                  <div class="form-group">
                    <a href="#formAkun" id="btn_close_pw" class="btn btn-danger float-left">Tutup</a>
                    <button class="btn btn-success float-right">Simpan</button>
                  </div>
                </form>
              </div>
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
      $.ajax({
        type : 'POST',
        url : 'include/Save.php',
        data : $('#settingForm').serialize(),
        dataType : 'json',
        success : function(data){
          if (data.success) {
            $('#load').addClass('d-none');
            toastr['success'](data.message);
          } else {
            toastr['error'](data.message);
          }
        }
      });
    });
    $('#formAkun').submit(function(e){
      e.preventDefault();
      $.ajax({
        type : 'POST',
        url : 'include/Save.php',
        data : $(this).serialize(),
        dataType : 'json',
        success : function(data){
          if (data.status) {
            toastr['success'](data.message);
            setTimeout(function(){window.location.replace('pengaturan.php');}, 700);
          } else {
            toastr['error'](data.message);
          }
        }
      })
    });
    $('#formPwd').submit(function(e){
      e.preventDefault();
      $.ajax({
        type : 'POST',
        url : 'include/Save.php',
        data : $(this).serialize(),
        dataType : 'json',
        success : function(data){
          if (data.status) {
            toastr['success'](data.message);
            setTimeout(function(){window.location.replace('pengaturan.php');}, 700);
          }else {
            toastr['error'](data.message);
          }
        }
      })
    })
    /*SSL*/
    $('.radio-control').click(function(){
      var ssl = $(this).val()+'://';
      var url = $('#url');
      var domain = '<?=$_SERVER['HTTP_HOST']."/"?>';
      url.val(ssl+domain);
    });
    $('#btn_change_pw').click(function(){
      // e.preventDefault();
      $('#changePw').show();
    });
    $('#btn_close_pw').click(function(){
      $('#changePw').hide();
    });
  })

</script>
</body>
</html>
