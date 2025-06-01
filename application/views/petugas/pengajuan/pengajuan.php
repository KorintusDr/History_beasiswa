<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Pengajuan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Pengajuan</li>
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
                            <h3 class="card-title">Daftar Pengajuan</h3>
                            <div class="card-tools">
                                <a href="<?= site_url('pengajuan/export_excel') ?>" class="btn btn-success">
                                    <i class="fas fa-file-excel"></i> Export Excel
                                </a>
                                <a href="<?= site_url('pengajuan/export_pdf') ?>" class="btn btn-danger">
                                    <i class="fas fa-file-pdf"></i> Export PDF
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr class="text-center bg-danger">
                                        <th>#</th>
                                        <th>Foto Mahasiswa</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>Nomor Induk Mahasiswa</th>
                                        <th>Nomor Telepon</th>
                                        <th>Status Pengajuan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $no = 1; 
                                    foreach ($pengajuan as $item): ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?></td>
                                            <td class="text-center">
                                                <img src="<?= base_url('uploads/foto/' . $item->foto) ?>" alt="Foto Mahasiswa" style="width: 80px; height: auto;">
                                            </td>
                                            <td><?= $item->nama_lengkap ?></td>
                                            <td class="text-center"><?= $item->nim ?></td>
                                            <td class="text-center"><?= $item->no_telepon ?></td>
                                            <td class="text-center">
                                                <?php if (isset($item->status_pendaftaran)): ?>
                                                    <?php if ($item->status_pendaftaran == 'Menunggu Konfirmasi'): ?>
                                                        <span class="badge bg-warning"><?= $item->status_pendaftaran ?></span>
                                                    <?php elseif ($item->status_pendaftaran == 'Diterima'): ?>
                                                        <span class="badge bg-success"><?= $item->status_pendaftaran ?></span>
                                                    <?php elseif ($item->status_pendaftaran == 'Ditolak'): ?>
                                                        <span class="badge bg-danger"><?= $item->status_pendaftaran ?></span>
                                                    <?php else: ?>
                                                        <span class="badge bg-secondary">Status Tidak Valid</span>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <span class="badge bg-secondary">Status Tidak Tersedia</span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center">
                                                <a href="<?= site_url('pengajuan/detail/' . $item->id_pengajuan); ?>" class="btn btn-secondary btn-xs">
                                                    <i class="fas fa-eye"></i> Detail
                                                </a>
                                                <?php if ($item->status_pendaftaran == 'Menunggu Konfirmasi'): ?>
                                                    <a href="javascript:void(0)" class="btn btn-warning btn-xs" onclick="showVerifikasiModal(<?= $item->id_pengajuan ?>, '<?= $item->status_pendaftaran ?>')">
                                                        <i class="fas fa-check"></i> Verifikasi
                                                    </a>
                                                <?php endif; ?>
                                                <a href="#" class="btn btn-danger btn-xs" onclick="confirmDelete('<?= site_url('pengajuan/hapus/' . $item->id_pengajuan) ?>'); return false;">
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

    <!-- Modal Verifikasi -->
    <div class="modal fade" id="modal-verifikasi" tabindex="-1" role="dialog" aria-labelledby="modal-verifikasi-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-verifikasi-label">Verifikasi Pengajuan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= site_url('pengajuan/verifikasi') ?>" method="post">
                    <div class="modal-body">
                        <input type="hidden" id="pengajuan-id" name="id_pengajuan">
                        <div class="form-group">
                            <label for="status">Pilih Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="Menunggu Konfirmasi">Menunggu Konfirmasi</option>
                                <option value="Diterima">Diterima</option>
                                <option value="Ditolak">Ditolak</option>
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
</div>

<script>
    function showVerifikasiModal(id, status_pendaftaran) {
        $('#pengajuan-id').val(id);
        $('#status_pendaftaran').val(status_pendaftaran);
        $('#modal-verifikasi').modal('show');
    }
</script>
