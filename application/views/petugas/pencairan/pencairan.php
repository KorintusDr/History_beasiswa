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
                                <a href="<?= site_url('pencairan/tambah') ?>" class="btn btn-primary">
                                    <i class="fas fa-plus"></i> Tambah Pencairan
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
                                        <th>No Telepon</th>
                                        <th>Universitas</th>
                                        <th>Bantuan</th>
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
                                            <td class="text-center"><?= $item['no_telepon'] ?></td>
                                            <td class="text-center"><?= $item['nama_universitas'] ?></td>
                                            <td class="text-center"><?= $item['nama_beasiswa'] ?></td>
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
                                                <?php if ($item['status'] == 'Menunggu Konfirmasi'): ?>
                                                    <a href="<?= site_url('pencairan/edit/'.$item['id_pencairan']) ?>" class="btn btn-info btn-xs">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                <?php endif; ?>
                                                <a href="<?= site_url('pencairan/hapus/'.$item['id_pencairan']) ?>" class="btn btn-danger btn-xs">
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
