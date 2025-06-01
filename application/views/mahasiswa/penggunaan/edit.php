<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Form Edit Penggunaan Dana</h1>
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
                            <h3 class="card-title">Isi Formulir untuk Mengedit Penggunaan Dana</h3>
                        </div>
                        <form method="POST" action="<?= base_url('penggunaan/edit/' . $penggunaan['id_penggunaan']); ?>" enctype="multipart/form-data">
                        <input type="hidden" id="id_penggunaan" name="id_penggunaan" value="<?= $penggunaan['id_penggunaan']; ?>">
                        <input type="hidden" id="id_pengajuan" name="id_pengajuan" value="<?= $penggunaan['id_pengajuan']; ?>">
                        <input type="hidden" name="file_lama" value="<?= $penggunaan['bukti_penggunaan']; ?>">

                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control" value="<?= $penggunaan['nama_lengkap'] ?>" readonly>
                                </div>
                                
                                <div class="form-group">
                                    <label>NIM</label>
                                    <input type="text" id="nim" name="nim" class="form-control" value="<?= $penggunaan['nim'] ?>" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="tanggal_penggunaan">Tanggal Penggunaan</label>
                                    <input type="date" id="tanggal_penggunaan" name="tanggal_penggunaan" class="form-control" value="<?= $penggunaan['tanggal_penggunaan']; ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="bukti_penggunaan">Bukti Penggunaan</label>
                                    <input type="file" id="bukti_penggunaan" name="bukti_penggunaan" class="form-control">
                                    <small class="form-text text-muted">Kosongkan jika tidak ingin mengganti file.</small>
                                    <?php if (!empty($penggunaan['bukti_penggunaan'])) : ?>
                                        <p>File Sebelumnya: <a href="<?= base_url('uploads/bukti/' . $penggunaan['bukti_penggunaan']); ?>" target="_blank"><?= $penggunaan['bukti_penggunaan']; ?></a></p>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label for="keterangan_penggunaan">Keterangan Penggunaan</label>
                                    <textarea id="keterangan_penggunaan" name="keterangan_penggunaan" class="form-control" rows="3" required><?= $penggunaan['keterangan_penggunaan']; ?></textarea>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                <a href="<?= base_url('penggunaan'); ?>" class="btn btn-info">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
