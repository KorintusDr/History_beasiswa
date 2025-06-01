<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Form Tambah Penggunaan Dana</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Isi Formulir untuk Menambahkan Penggunaan Dana Baru</h3>
                        </div>
                        <form method="POST" action="<?= base_url('penggunaan/tambah'); ?>" enctype="multipart/form-data">
                        <input type="hidden" id="id_pengajuan" name="id_pengajuan" value="<?= $id_pengajuan; ?>">

                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control" value="<?= $nama_lengkap ?>" readonly>
                                </div>
                                
                                <div class="form-group">
                                    <label>NIM</label>
                                    <input type="text" id="nim" name="nim" class="form-control" value="<?= $nim ?>" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="tanggal_penggunaan">Tanggal Penggunaan</label>
                                    <input type="date" id="tanggal_penggunaan" name="tanggal_penggunaan" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="bukti_penggunaan">Bukti Penggunaan</label>
                                    <input type="file" id="bukti_penggunaan" name="bukti_penggunaan" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="keterangan_penggunaan">Keterangan Penggunaan</label>
                                    <textarea id="keterangan_penggunaan" name="keterangan_penggunaan" class="form-control" rows="3" required></textarea>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan Data</button>
                                <button type="reset" class="btn btn-warning">Kosongkan</button>
                                <a href="<?= base_url('pengajuan'); ?>" class="btn btn-info">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
