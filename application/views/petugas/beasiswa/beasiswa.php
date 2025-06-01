<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Beasiswa</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Data Beasiswa</li>
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
              <h3 class="card-title">Daftar Beasiswa</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah">
                  <i class="fas fa-plus"></i> Tambah Beasiswa
                </button>
              </div>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr class="text-center bg-danger">
                    <th>#</th>
                    <th>Nama Beasiswa</th>
                    <th>Penyedia Beasiswa</th>
                    <th>Jenis Beasiswa</th>
                    <th>Jumlah Beasiswa</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $no = 1; 
                  foreach ($beasiswa as $item): ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= htmlspecialchars($item->nama_beasiswa) ?></td>
                      <td><?= htmlspecialchars($item->penyedia_beasiswa) ?></td>
                      <td><?= htmlspecialchars($item->jenis_beasiswa) ?></td>
                      <td><?= htmlspecialchars($item->jumlah_beasiswa) ?></td>
                      <td><?= htmlspecialchars($item->status_beasiswa) ?></td>
                      <td class="text-center">
                        <button class="btn btn-info btn-xs" onclick="showEditModal(<?= $item->id_beasiswa ?>, '<?= htmlspecialchars($item->nama_beasiswa) ?>', '<?= htmlspecialchars($item->penyedia_beasiswa) ?>', '<?= htmlspecialchars($item->jenis_beasiswa) ?>', '<?= htmlspecialchars($item->jumlah_beasiswa) ?>', '<?= htmlspecialchars($item->status_beasiswa) ?>')">
                          <i class="fas fa-edit"></i> Edit
                        </button>
                        <a href="javascript:void(0)" class="btn btn-danger btn-xs" onclick="showDeleteModal(<?= $item->id_beasiswa ?>)">
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

<div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="modal-tambah-label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-tambah-label">Tambah Beasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('beasiswa/tambah') ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label for="nama_beasiswa">Nama Beasiswa</label>
            <input type="text" class="form-control" name="nama_beasiswa" required>
          </div>
          <div class="form-group">
            <label for="penyedia_beasiswa">Penyedia Beasiswa</label>
            <input type="text" class="form-control" name="penyedia_beasiswa" required>
          </div>
          <div class="form-group">
            <label for="jenis_beasiswa">Jenis Beasiswa</label>
            <input type="text" class="form-control" name="jenis_beasiswa" required>
          </div>
          <div class="form-group">
            <label for="jumlah_beasiswa">Jumlah Beasiswa</label>
            <input type="text" class="form-control" name="jumlah_beasiswa" required>
          </div>
          <div class="form-group">
            <label for="status_beasiswa">Status</label>
            <select class="form-control" id="status_beasiswa" name="status_beasiswa" required>
              <option value="Aktif">Aktif</option>
              <option value="Tidak Aktif">Tidak Aktif</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="modal-edit-label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-edit-label">Edit Beasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form-edit" action="" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label for="edit_nama_beasiswa">Nama Beasiswa</label>
            <input type="text" class="form-control" id="edit_nama_beasiswa" name="nama_beasiswa" required>
          </div>
          <div class="form-group">
            <label for="edit_penyedia_beasiswa">Penyedia Beasiswa</label>
            <input type="text" class="form-control" id="edit_penyedia_beasiswa" name="penyedia_beasiswa" required>
          </div>
          <div class="form-group">
            <label for="edit_jenis_beasiswa">Jenis Beasiswa</label>
            <input type="text" class="form-control" id="edit_jenis_beasiswa" name="jenis_beasiswa" required>
          </div>
          <div class="form-group">
            <label for="edit_jumlah_beasiswa">Jumlah Beasiswa</label>
            <input type="text" class="form-control" id="edit_jumlah_beasiswa" name="jumlah_beasiswa" required>
          </div>
          <div class="form-group">
            <label for="edit_status_beasiswa">Status</label>
            <select class="form-control" id="edit_status_beasiswa" name="status_beasiswa" required>
              <option value="Aktif">Aktif</option>
              <option value="Tidak Aktif">Tidak Aktif</option>
            </select>
          </div>
          <input type="hidden" id="edit_id_beasiswa" name="id_beasiswa">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="modal-hapus" tabindex="-1" role="dialog" aria-labelledby="modal-hapus-label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-hapus-label">Hapus Beasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Apakah Anda yakin ingin menghapus beasiswa ini?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <a href="#" id="btn-hapus" class="btn btn-danger">Hapus</a>
      </div>
    </div>
  </div>
</div>

<script>
  function showEditModal(id, nama, penyedia, jenis, jumlah, status) {
      $('#edit_id_beasiswa').val(id);
      $('#edit_nama_beasiswa').val(nama);
      $('#edit_penyedia_beasiswa').val(penyedia);
      $('#edit_jenis_beasiswa').val(jenis);
      $('#edit_jumlah_beasiswa').val(jumlah);
      $('#edit_status_beasiswa').val(status);
      $('#form-edit').attr('action', '<?= base_url('beasiswa/edit/') ?>' + id);
      $('#modal-edit').modal('show');
  }

  function showDeleteModal(id) {
      $('#btn-hapus').attr('href', '<?= base_url('beasiswa/hapus/') ?>' + id);
      $('#modal-hapus').modal('show');
  }
</script>






