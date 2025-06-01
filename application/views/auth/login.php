<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $title; ?></title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="<?php echo base_url('backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('backend/dist/css/adminlte.min.css'); ?>">
  <style>
    .eye-close {
      animation: close-eye 0.5s forwards;
    }

    @keyframes close-eye {
      0% { transform: scaleY(1); }
      50% { transform: scaleY(0.1); }
      100% { transform: scaleY(1); }
    }
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="<?php echo base_url('backend/index2.html'); ?>" class="h1"><b>Welcome</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Masukkan username dan password Anda</p>
      <form id="loginForm" action="<?php echo base_url('auth'); ?>" method="post">
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="Username" onfocus="this.classList.add('eye-close');" onblur="this.classList.remove('eye-close');">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" onfocus="this.classList.add('eye-close');" onblur="this.classList.remove('eye-close');">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
        </div>
      </form>

      <p class="mt-3 mb-1 text-center">
        Belum punya akun? <a href="<?php echo base_url('auth/register'); ?>" class="text-center">Daftar Akun</a>
      </p>
    </div>
  </div>
</div>

<script src="<?php echo base_url('backend/plugins/jquery/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('backend/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?php echo base_url('backend/dist/js/adminlte.min.js'); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
$(function() {
  let error = '<?php echo $this->session->flashdata('error'); ?>';
  let success = '<?php echo $this->session->flashdata('success'); ?>';

  if (error.trim() !== '') {
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: error,
    });
  }

  if (success.trim() !== '') {
    Swal.fire({
      icon: 'success',
      title: 'Success!',
      text: success,
    });
  }
});
</script>

</body>
</html>
