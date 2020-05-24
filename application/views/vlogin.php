<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Aplikasi Pendaftaran dan Monitoring User Inet">
  <meta name="author" content="Rizki Muliono">
  <link rel="shortcut icon" type="image/x-icon" href="<?=base_url()?>images/favicon.png"/>

  <title>Aplikasi Inet-RLU | Login</title>

  <!-- Custom fonts for this template-->
  <link href="<?=base_url()?>SB-ADMIN-2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?=base_url()?>SB-ADMIN-2/css/sb-admin-2.min.css" rel="stylesheet">
  <style media="screen">
  .login-image{
    background: url(<?=base_url()?>images/land.jpg);
    background-position: center;
    background-size: cover;
  }
  .img{
    box-shadow: 0px 0px 25px #fff;
    background-color: #ffffff8c;
  }
</style>
</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block login-image p-5">
                <img src="<?=base_url()?>images/RLU-logo.png" alt="Logo Royal Lestari Utama" height="60" class="img">
              </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                    <p>Aplikasi Monitoring Daftar User Inet</p>
                    <?php if($this->session->flashdata('msg')): ?>
                      <div class="alert alert-danger"><?=$this->session->flashdata('msg'); ?></div>
                    <?php endif; ?>
                  </div>
                  <form class="user" action="<?=site_url('login/login_act')?>" method="POST">
                    <div class="form-group">
                      <input type="text" name="ak_username" class="form-control form-control-user" aria-describedby="userHelp" placeholder="Enter Username...">
                    </div>
                    <div class="form-group">
                      <input type="password" name="ak_password" class="form-control form-control-user" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.html">Create an Account!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?=base_url()?>SB-ADMIN-2/vendor/jquery/jquery.min.js"></script>
  <script src="<?=base_url()?>SB-ADMIN-2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?=base_url()?>SB-ADMIN-2/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?=base_url()?>SB-ADMIN-2/js/sb-admin-2.min.js"></script>

</body>

</html>
