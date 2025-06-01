<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Agama</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Agama</li>
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
                            <h3 class="card-title">Daftar Agama</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah">
                                    <i class="fas fa-plus"></i> Tambah Agama
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr class="text-center bg-danger">
                                        <th>#</th>
                                        <th>Nama Agama</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $no = 1; 
                                    foreach ($agama as $item): ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= htmlspecialchars($item->nama_agama) ?></td>
                                            <td class="text-center">
                                                <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal-edit" onclick="setEditData(<?= $item->id_agama ?>, '<?= htmlspecialchars($item->nama_agama) ?>')">
                                                    <i class="fas fa-edit"></i> Edit
                                                </button>
                                                <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-hapus" onclick="setDeleteData(<?= $item->id_agama ?>, '<?= htmlspecialchars($item->nama_agama) ?>')">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </button>
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
                <h5 class="modal-title" id="modal-tambah-label">Tambah Agama</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('agama/tambah') ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_agama">Nama Agama</label>
                        <input type="text" class="form-control" name="nama_agama" id="nama_agama" required>
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
                <h5 class="modal-title" id="modal-edit-label">Edit Agama</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('agama/edit') ?>" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="id_agama" id="edit-id_agama">
                    <div class="form-group">
                        <label for="edit_nama_agama">Nama Agama</label>
                        <input type="text" class="form-control" name="nama_agama" id="edit_nama_agama" required>
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

<div class="modal fade" id="modal-hapus" tabindex="-1" role="dialog" aria-labelledby="modal-hapus-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-hapus-label">Konfirmasi Hapus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus agama <strong id="hapus-nama-agama"></strong>?</p>
            </div>
            <div class="modal-footer">
                <form action="" method="POST" id="form-hapus">
                    <input type="hidden" name="id_agama" id="hapus-id_agama">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function setEditData(id, nama) {
        $('#edit-id_agama').val(id);
        $('#edit_nama_agama').val(nama);
    }

    function setDeleteData(id, nama) {
        $('#hapus-id_agama').val(id);
        $('#hapus-nama-agama').text(nama);
        $('#form-hapus').attr('action', '<?= base_url('agama/hapus/') ?>' + id);
    }
</script>
