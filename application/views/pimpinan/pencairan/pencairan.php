<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Pencairan Dana</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Pencairan Dana</li>
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
                            <h3 class="card-title">Daftar Pencairan Dana</h3>
                            <div class="card-tools">
                                <a href="<?= site_url('pencairan/export_excel') ?>" class="btn btn-success">
                                    <i class="fas fa-file-excel"></i> Export Excel
                                </a>
                                <a href="<?= site_url('pencairan/export_pdf') ?>" class="btn btn-danger">
                                    <i class="fas fa-file-pdf"></i> Export PDF
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr class="text-center bg-danger">
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>NIM</th>
                                        <th>Jumlah</th>
                                        <th>Tanggal</th>
                                        <th>Status Pencairan</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $no = 1; 
                                    foreach ($pencairan as $item): 
                                    ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?></td>
                                            <td class="text-center"><?= $item['nama_lengkap'] ?></td> 
                                            <td class="text-center"><?= $item['nim'] ?></td>
                                            <td class="text-center"><?= $item['jumlah_beasiswa'] ?></td>
                                            <td class="text-center"><?= date('d-m-Y', strtotime($item['tanggal_pencairan'])) ?></td> 
                                            <td class="text-center">
                                                <?php if (isset($item['status'])): ?> 
                                                    <?php if ($item['status'] == 'Menunggu Konfirmasi'): ?>
                                                        <span class="badge bg-warning"><?= $item['status'] ?></span>
                                                    <?php elseif ($item['status'] == 'Disetujui'): ?>
                                                        <span class="badge bg-success"><?= $item['status'] ?></span>
                                                    <?php elseif ($item['status'] == 'Ditolak'): ?>
                                                        <span class="badge bg-danger"><?= $item['status'] ?></span>
                                                    <?php elseif ($item['status'] == 'Diberhentikan'): ?>
                                                        <span class="badge bg-danger"><?= $item['status'] ?></span>
                                                    <?php else: ?>
                                                        <span class="badge bg-secondary">Status Tidak Valid</span>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <span class="badge bg-secondary">Status Tidak Tersedia</span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center"><?= $item['keterangan'] ?></td>
                                            <td class="text-center">
                                                <a href="#" class="btn btn-secondary btn-xs" data-toggle="modal" data-target="#detailModal<?= $item['id_pencairan'] ?>">
                                                    <i class="fas fa-eye"></i> Detail
                                                </a>
                                                <?php if ($item['status'] == 'Menunggu Konfirmasi'): ?>
                                                    <a href="#" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#verifikasiModal<?= $item['id_pencairan'] ?>">
                                                        <i class="fas fa-check"></i> Verifikasi
                                                    </a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>

                                    <div class="modal fade" id="detailModal<?= $item['id_pencairan'] ?>" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="detailModalLabel">Detail Pencairan Dana</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row mb-2">
                                                        <div class="col-4"><strong>Nama</strong></div>
                                                        <div class="col-8">: <?= $item['nama_lengkap'] ?></div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-4"><strong>NIM</strong></div>
                                                        <div class="col-8">: <?= $item['nim'] ?></div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-4"><strong>No Telepon</strong></div>
                                                        <div class="col-8">: <?= $item['no_telepon'] ?></div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-4"><strong>Universitas</strong></div>
                                                        <div class="col-8">: <?= $item['nama_universitas'] ?></div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-4"><strong>Bantuan</strong></div>
                                                        <div class="col-8">: <?= $item['nama_beasiswa'] ?></div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-4"><strong>Jumlah</strong></div>
                                                        <div class="col-8">: <?= $item['jumlah_beasiswa'] ?></div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-4"><strong>Tanggal</strong></div>
                                                        <div class="col-8">: <?= date('d-m-Y', strtotime($item['tanggal_pencairan'])) ?></div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-4"><strong>Status</strong></div>
                                                        <div class="col-8">: <?= $item['status'] ?></div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-4"><strong>Keterangan</strong></div>
                                                        <div class="col-8">: <?= $item['keterangan'] ?></div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
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

<!-- Modal Verifikasi -->
<div class="modal fade" id="verifikasiModal<?= $item['id_pencairan'] ?>" tabindex="-1" role="dialog" aria-labelledby="verifikasiModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?= site_url('pencairan/verifikasi/' . $item['id_pencairan']) ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="verifikasiModalLabel">Verifikasi Pencairan Dana</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin memverifikasi pencairan dana ini?</p>
                    <div class="form-group">
                        <label for="status">Pilih Status</label>
                        <select class="form-control" name="status" required>
                            <option value="Disetujui">Disetujui</option>
                            <option value="Ditolak">Ditolak</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan </label>
                        <textarea class="form-control" name="keterangan" id="keterangan" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Verifikasi</button>
                </div>
            </form>
        </div>
    </div>
</div>
