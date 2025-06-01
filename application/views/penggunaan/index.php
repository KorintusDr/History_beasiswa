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
                                        <td><?= $item['tanggal_penggunaan'] ?></td>
                                        <td><?= $item['bukti_penggunaan'] ?></td>
                                        <td><?= $item['status'] ?></td>
                                        <td><?= $item['keterangan_penggunaan'] ?></td>
                                        <td>
                                            <a href="<?= site_url('penggunaan/edit/'.$item['id_penggunaan']) ?>" class="btn btn-info btn-xs">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <a href="<?= site_url('penggunaan/hapus/'.$item['id_penggunaan']) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus data?')">
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
