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
        .register-box {
            margin-top: 100px;
            animation: fadeIn 0.5s;
            width: 400px; 
            max-width: 100%; 
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .input-group-text {
            background-color: #007bff;
            color: white;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
    </style>
</head>
<body class="hold-transition register-page">
<div class="register-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="<?php echo base_url('backend/index2.html'); ?>" class="h1"><b>Daftar Akun</b></a>
        </div>
        <div class="card-body">
            <form action="<?php echo base_url('auth/register'); ?>" method="post">
                <div class="input-group mb-3">
                    <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap" required oninput="generateUsername()">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="text" name="alamat" class="form-control" placeholder="Alamat" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-address-card"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="text" name="nomor_hp" class="form-control" placeholder="Nomor HP" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-phone"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="text" id="username" name="username" class="form-control" placeholder="Username" required>
                    <div class="input-group-append">
                        <button type="button" class="btn btn-secondary" onclick="generateUsername()">Generate Username</button>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fas fa-eye" id="togglePassword" onclick="togglePasswordVisibility('password')" style="cursor: pointer;"></i>
                        </span>
                        <button type="button" class="btn btn-secondary" onclick="generatePassword()">Generate Password</button>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Daftar</button>
                    </div>
                </div>
            </form>
            <p class="mt-3 mb-1 text-center">
                Sudah punya akun? <a href="<?php echo base_url('auth'); ?>" class="text-center">Masuk</a>
            </p>
        </div>
    </div>
</div>

<script src="<?php echo base_url('backend/plugins/jquery/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('backend/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?php echo base_url('backend/dist/js/adminlte.min.js'); ?>"></script>

<script>
    function generateUsername() {
        var name = $('[name="nama_lengkap"]').val().trim();
        if (name.length > 0) {
            $.ajax({
                url: '<?php echo base_url("auth/generate_username"); ?>',
                type: 'GET',
                data: { name: name },
                success: function (data) {
                    $('#username').val(data);
                }
            });
        }
    }

    function generatePassword() {
        $.ajax({
            url: '<?php echo base_url("auth/generate_password"); ?>',
            type: 'GET',
            success: function (data) {
                $('#password').val(data);
            }
        });
    }

    function togglePasswordVisibility(fieldId) {
        var passwordField = $('#' + fieldId);
        var passwordFieldType = passwordField.attr('type');
        if (passwordFieldType === 'password') {
            passwordField.attr('type', 'text');
            $('#togglePassword').removeClass('fa-eye').addClass('fa-eye-slash');
        } else {
            passwordField.attr('type', 'password');
            $('#togglePassword').removeClass('fa-eye-slash').addClass('fa-eye');
        }
    }
</script>
</body>
</html>
