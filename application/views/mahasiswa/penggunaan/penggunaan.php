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
                        <li class="breadcrumb-item active">Penggunaan Dana</li>
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
                            <a href="<?= site_url('penggunaan/tambah') ?>" class="btn btn-primary float-right">
                                <i class="fas fa-plus"></i> Tambah Penggunaan
                            </a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr class="text-center bg-danger">
                                        <th>#</th>
                                        <th>Nama Pengguna</th>
                                        <th>Tanggal Penggunaan</th>
                                        <th>Bukti Penggunaan</th>
                                        <th>Status</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; foreach ($penggunaan as $item): ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
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
                                        <td>
                                        <?php if ($item['status'] == 'Menunggu Konfirmasi'): ?>
                                            <a href="<?= site_url('penggunaan/edit/'.$item['id_penggunaan']) ?>" class="btn btn-info btn-xs">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                                <?php endif; ?>
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
