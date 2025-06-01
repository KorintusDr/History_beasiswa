<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Pengguna</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">DataTables</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Daftar Pengguna</h3>
              <div class="card-tools">
                <a href="<?= base_url('petugas/user/tambah') ?>" class="btn btn-primary">
                  <i class="fas fa-plus"></i> Tambah Pengguna
                </a>
              </div>
            </div>
            <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr class="text-center bg-danger">
                    <th>#</th>
                    <th>Username</th>
                    <th>Nama Lengkap</th>
                    <th>Alamat</th>
                    <th>Nomor HP</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $no = 1; 
                  foreach ($users as $user): ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= isset($user['username']) ? $user['username'] : 'Data Tidak Tersedia' ?></td>
                      <td><?= isset($user['nama_lengkap']) ? $user['nama_lengkap'] : 'Data Tidak Tersedia' ?></td>
                      <td><?= isset($user['alamat']) ? $user['alamat'] : 'Data Tidak Tersedia' ?></td>
                      <td><?= isset($user['nomor_hp']) ? $user['nomor_hp'] : 'Data Tidak Tersedia' ?></td>
                      <td><?= isset($user['email']) ? $user['email'] : 'Data Tidak Tersedia' ?></td>
                      <td><?= isset($user['role']) ? $user['role'] : 'Data Tidak Tersedia' ?></td>
                      <td class="text-center">
                        <a href="<?= base_url('petugas/user/edit/' . $user['id_user']) ?>" class="btn btn-info btn-xs">
                          <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="<?= base_url('petugas/user/delete/' . $user['id_user']) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">
                          <i class="fas fa-trash"></i> Hapus
                        </a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<div class="modal fade" id="modal-hapus" tabindex="-1" role="dialog" aria-labelledby="modal-hapus-label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-hapus-label">Konfirmasi Hapus Pengguna</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah Anda yakin ingin menghapus pengguna ini?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <a id="delete-user-link" href="#" class="btn btn-danger">Hapus</a>
      </div>
    </div>
  </div>
</div>

<script>
  function showDeleteModal(userId) {
    var deleteUrl = '<?= base_url('petugas/user/delete/') ?>' + userId;
    document.getElementById('delete-user-link').setAttribute('href', deleteUrl);
    $('#modal-hapus').modal('show');
  }
</script>
