<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Program Studi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Program Studi</li>
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
                            <h3 class="card-title">Daftar Program Studi</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah">
                                    <i class="fas fa-plus"></i> Tambah Program Studi
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr class="text-center bg-danger">
                                        <th>#</th>
                                        <th>Nama Program Studi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $no = 1; 
                                    foreach ($programstudi as $item): ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $item->nama_program_studi ?></td>
                                            <td class="text-center">
                                                <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal-edit" onclick="setEditData(<?= $item->id_program_studi ?>, '<?= addslashes(htmlspecialchars($item->nama_program_studi)) ?>')">
                                                    <i class="fas fa-edit"></i> Edit
                                                </button>
                                                <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-hapus" onclick="setDeleteData(<?= $item->id_program_studi ?>, '<?= addslashes(htmlspecialchars($item->nama_program_studi)) ?>')">
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
                <h5 class="modal-title" id="modal-tambah-label">Tambah Program Studi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('programstudi/tambah') ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_programstudi">Nama Program Studi</label>
                        <input type="text" class="form-control" name="nama_program_studi" id="nama_program_studi" required>
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
                <h5 class="modal-title" id="modal-edit-label">Edit Program Studi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('programstudi/edit') ?>" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="id_programstudi" id="edit-id_programstudi">
                    <div class="form-group">
                        <label for="edit-nama_programstudi">Nama Program Studi</label>
                        <input type="text" class="form-control" name="nama_program_studi" id="edit-nama_programstudi" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-hapus" tabindex="-1" role="dialog" aria-labelledby="modal-hapus-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-hapus-label">Hapus Program Studi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('programstudi/hapus') ?>" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="id" id="hapus-id_programstudi">
                    <p>Apakah Anda yakin ingin menghapus <strong id="hapus-nama_programstudi"></strong>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function setEditData(id, nama) {
        document.getElementById('edit-id_programstudi').value = id;
        document.getElementById('edit-nama_programstudi').value = nama;
    }

    function setDeleteData(id, nama) {
        document.getElementById('hapus-nama_programstudi').innerText = nama;
        document.getElementById('hapus-id_programstudi').value = id; 
    }
</script>
