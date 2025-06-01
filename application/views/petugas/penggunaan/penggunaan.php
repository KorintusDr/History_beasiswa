<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Penggunaan Dana</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Penggunaan Dana</li>
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
                            <h3 class="card-title">Daftar Penggunaan Dana</h3>
                            <!-- <div class="card-tools">
                                <a href="<?= site_url('penggunaan/export_excel') ?>" class="btn btn-success">
                                    <i class="fas fa-file-excel"></i> Export Excel
                                </a>
                                <a href="<?= site_url('penggunaan/export_pdf') ?>" class="btn btn-danger">
                                    <i class="fas fa-file-pdf"></i> Export PDF
                                </a>
                            </div> -->
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr class="text-center bg-danger">
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Tanggal Penggunaan</th>
                                        <th>Bukti Penggunaan</th>
                                        <th>Status Penggunaan</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $no = 1;
                                    foreach ($penggunaan as $item): 
                                    ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?></td>
                                            <td><?= $item['nama_lengkap'] ?></td>
                                            <td class="text-center"><?= date('d-m-Y', strtotime($item['tanggal_penggunaan'])) ?></td>
                                            <td class="text-center">
                                                <?php 
                                                $ext = pathinfo($item['bukti_penggunaan'], PATHINFO_EXTENSION);
                                                $img_ext = ['jpg', 'jpeg', 'png', 'gif'];                                              
                                                if (in_array($ext, $img_ext)): ?>
                                                    <a href="<?= base_url('uploads/bukti/' . $item['bukti_penggunaan']) ?>" data-toggle="lightbox" data-gallery="gallery">
                                                        <img src="<?= base_url('uploads/bukti/' . $item['bukti_penggunaan']) ?>" alt="Bukti Penggunaan" style="width: 50px; height: auto; cursor: pointer;" />
                                                    </a>
                                                <?php else: ?>
                                                    <a href="<?= base_url('uploads/bukti/' . $item['bukti_penggunaan']) ?>" target="_blank">Lihat Bukti</a>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if (isset($item['status'])): ?>
                                                    <?php if ($item['status'] == 'Menunggu Konfirmasi'): ?>
                                                        <span class="badge bg-warning"><?= $item['status'] ?></span>
                                                    <?php elseif ($item['status'] == 'Disetujui'): ?>
                                                        <span class="badge bg-success"><?= $item['status'] ?></span>
                                                    <?php elseif ($item['status'] == 'Ditolak'): ?>
                                                        <span class="badge bg-danger"><?= $item['status'] ?></span>
                                                    <?php else: ?>
                                                        <span class="badge bg-secondary">Status Tidak Valid</span>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <span class="badge bg-secondary">Status Tidak Tersedia</span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?= $item['keterangan_penggunaan'] ?></td>
                                            <td class="text-center">
                                            <a href="#" class="btn btn-danger btn-xs" onclick="confirmDelete('<?= site_url('penggunaan/hapus/'.$item['id_penggunaan']) ?>'); return false;">
                                                        <i class="fas fa-trash"></i> Hapus
                                            </a>
                                                <?php if ($item['status'] == 'Menunggu Konfirmasi'): ?>
                                                    <a href="#" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#verifikasiModal<?= $item['id_penggunaan'] ?>">
                                                        <i class="fas fa-check"></i> Verifikasi
                                                    </a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>

                                        <!-- Modal Verifikasi -->
                                        <div class="modal fade" id="verifikasiModal<?= $item['id_penggunaan'] ?>" tabindex="-1" role="dialog" aria-labelledby="verifikasiModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="verifikasiModalLabel">Verifikasi Penggunaan Dana</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post" action="<?= site_url('penggunaan/verifikasi/'.$item['id_penggunaan']) ?>">
                                                            <p>Apakah Anda yakin ingin memverifikasi penggunaan dana untuk <strong><?= $item['nama_lengkap'] ?></strong>?</p>
                                                            <div class="form-group">
                                                                <label for="status">Ubah Status:</label>
                                                                <select name="status" class="form-control" required>
                                                                    <option value="">Pilih Status</option>
                                                                    <option value="Disetujui">Disetujui</option>
                                                                    <option value="Ditolak">Ditolak</option>
                                                                </select>
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-primary">Verifikasi</button>
                                                        </form>
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
