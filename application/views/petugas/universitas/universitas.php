<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Universitas</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Universitas</li>
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
                            <h3 class="card-title">Daftar Universitas</h3>
                            <div class="card-tools">
                                <a href="<?= site_url('universitas/tambah') ?>" class="btn btn-primary">
                                    <i class="fas fa-plus"></i> Tambah Universitas
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr class="text-center bg-danger">
                                        <th>#</th>
                                        <th>Nama Universitas</th>
                                        <th>Alamat</th>
                                        <th>Nomor Telepon</th>
                                        <th>Email</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $no = 1; 
                                    foreach ($universitas as $item): ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $item->nama_universitas ?></td>
                                            <td><?= $item->alamat ?></td>
                                            <td><?= $item->nomor_telepon ?></td>
                                            <td><?= $item->email ?></td>
                                            <td class="text-center">
                                            <a href="<?php echo site_url('universitas/edit/' . $item->id_universitas); ?>" class="btn btn-info btn-xs">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                                <a href="javascript:void(0)" class="btn btn-danger btn-xs" onclick="showDeleteModal(<?= $item->id_universitas ?>)">
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

    <div class="modal fade" id="modal-hapus" tabindex="-1" role="dialog" aria-labelledby="modal-hapus-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-hapus-label">Hapus Universitas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus universitas ini?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <a id="btn-hapus" class="btn btn-danger">Hapus</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function showDeleteModal(id) {
        const deleteUrl = "<?= site_url('universitas/hapus/') ?>" + id;
        $('#btn-hapus').attr('href', deleteUrl);
        $('#modal-hapus').modal('show');
    }
</script>
