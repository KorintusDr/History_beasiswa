<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Form Tambah Pengguna</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item active">Form Tambah Pengguna</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Isi Formulir untuk Menambahkan Pengguna Baru</h3>
                        </div>
                        
                        <form method="POST" action="<?= base_url('user/tambah'); ?>" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nama_lengkap">Nama Lengkap</label>
                                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan nama lengkap" required oninput="generateUsername()">
                                            <?= form_error('nama_lengkap', '<small class="text-danger">', '</small>'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="username">Username:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="username" name="username" value="<?= set_value('username'); ?>" required>
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-secondary" onclick="generateUsername()">Generate Username</button>
                                                </div>
                                            </div>
                                            <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="password">Password:</label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-eye" id="togglePassword" onclick="togglePasswordVisibility('password')" style="cursor: pointer;"></i>
                                                    </span>
                                                </div>
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-secondary" onclick="generatePassword()">Generate Password</button>
                                                </div>
                                            </div>
                                            <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="role">Role</label>
                                            <select class="form-control" id="role" name="role" required>
                                                <option value="">--Pilih Role--</option>
                                                <?php foreach ($roles as $role): ?>
                                                    <option value="<?= $role->role; ?>"><?= ucfirst($role->role); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?= form_error('role', '<small class="text-danger">', '</small>'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email" required>
                                            <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="nomor_hp">Nomor HP</label>
                                            <input type="number" class="form-control" id="nomor_hp" name="nomor_hp" placeholder="Masukkan nomor HP" required>
                                            <?= form_error('nomor_hp', '<small class="text-danger">', '</small>'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <textarea class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat" required></textarea>
                                            <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan Data</button>
                                <button type="reset" class="btn btn-secondary">Batal</button>
                                <a href="<?= base_url('user'); ?>" class="btn btn-warning"><i class="fas fa-arrow-left"></i> Kembali</a>
                            </div>
                        </form>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Catatan</h3>
                        </div>
                        <div class="card-body">
                            <ul>
                                <li>Username akan dihasilkan secara otomatis berdasarkan nama lengkap.</li>
                                <li>Password yang dihasilkan akan berupa kombinasi acak, pastikan untuk menyimpannya dengan aman.</li>
                                <li>Jika username dan password yang dihasilkan terlalu sulit untuk diingat, Anda dapat mengisi username dan password secara manual.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>

    function generateUsername() {
        var name = document.getElementById('nama_lengkap').value;
        if (name.length > 0) {
            fetch('<?= base_url("user/generate_username") ?>?name=' + name)
                .then(response => response.text())
                .then(data => {
                    document.getElementById('username').value = data;
                });
        }
    }

    function generatePassword() {
        fetch('<?= base_url("user/generate_password") ?>')
            .then(response => response.text())
            .then(data => {
                document.getElementById('password').value = data;
            });
    }

    function togglePasswordVisibility(id) {
        var passwordInput = document.getElementById(id);
        var icon = document.getElementById('togglePassword');
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = "password";
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }
</script>
