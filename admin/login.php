<?php 
  session_start();
  include 'include/Admin.php';
  if ($loged == 1) {
    header("location:index.php");
  }elseif (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    //
    $login = $su->getLogin($email,$password);
    if ($login['success'] == 'yes') {
      header("location:index.php?welcome");
    }else{
      echo "<script>alert('".$login['msg']."');</script>";
    }
  }
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Lowongan-kerja.id | Log in</title>
  <?php include 'template/meta_head.php'; ?>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index.php"><b>Lowongan-kerja.id</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <!-- /.social-auth-links -->

      <p class="mb-0">
        <a href="../index.php" class="text-center"><< Go Back</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
