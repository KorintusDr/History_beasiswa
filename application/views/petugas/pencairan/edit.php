<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Form Edit Pencairan Dana</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item active">Edit Pencairan Dana</li>
                    </ol>
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
                            <h3 class="card-title"><i class="fas fa-info-circle"></i> Isi Formulir untuk Mengedit Pencairan Dana</h3>
                        </div>
                        <form method="POST" action="<?= base_url('pencairan/edit/' . $pencairan['id_pencairan']); ?>" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="id_pengajuan">Pilih Mahasiswa</label>
                                            <select id="id_pengajuan" name="id_pengajuan" class="form-control" onchange="fetchStudentData(this.value)">
                                                <option value="">-- Pilih Mahasiswa --</option>
                                                <?php foreach ($mahasiswa as $mhs): ?>
                                                    <option value="<?= $mhs['id_pengajuan']; ?>" <?= $mhs['id_pengajuan'] == $pencairan['id_pengajuan'] ? 'selected' : ''; ?>>
                                                        <?= $mhs['nama_lengkap'] ?? ''; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <div id="student-info" style="display:none;">
                                            <div class="form-group">
                                                <label>NIM</label>
                                                <input type="text" id="nim" name="nim" class="form-control" value="<?= $pencairan['nim'] ?? ''; ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label>No Telepon</label>
                                                <input type="text" id="no_telepon" name="no_telepon" class="form-control" value="<?= $pencairan['no_telepon'] ?? ''; ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label>Universitas</label>
                                                <input type="text" id="universitas" name="universitas" class="form-control" value="<?= $pencairan['universitas'] ?? ''; ?>" readonly>
                                            </div>
                                            <div id="info_beasiswa" class="form-group" style="display:none;">
                                                <label>Jenis Permintaan Beasiswa</label>
                                                <input type="text" id="beasiswa" name="beasiswa" class="form-control" value="<?= $pencairan['beasiswa'] ?? ''; ?>" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="tanggal_pencairan">Tanggal Pencairan</label>
                                            <input type="date" id="tanggal_pencairan" name="tanggal_pencairan" class="form-control" value="<?= $pencairan['tanggal_pencairan']; ?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="keterangan">Keterangan</label>
                                            <textarea id="keterangan" name="keterangan" class="form-control" rows="3" required><?= $pencairan['keterangan']; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan Data</button>
                                <button type="reset" class="btn btn-warning"><i class="fas fa-undo"></i> Kosongkan</button>
                                <a href="<?= base_url('pencairan'); ?>" class="btn btn-info"><i class="fas fa-arrow-left"></i> Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
function fetchStudentData(id_pengajuan) {
    if (id_pengajuan) {
        $.ajax({
            url: '<?= base_url('pencairan/get_mahasiswa_data'); ?>',
            type: 'POST',
            data: { id_pengajuan: id_pengajuan },
            dataType: 'json',
            success: function(response) {
                if (response) {
                    $('#nim').val(response.nim || '');
                    $('#no_telepon').val(response.no_telepon || '');
                    $('#universitas').val(response.nama_universitas || '');
                    $('#beasiswa').val(response.nama_beasiswa + ' - ' + response.jumlah_beasiswa || '');
                    $('#student-info').show();
                    $('#info_beasiswa').show();
                } else {
                    $('#student-info').hide();
                    $('#info_beasiswa').hide();
                }
            },
            error: function() {
                alert('Gagal mengambil data mahasiswa.');
            }
        });
    } else {
        $('#student-info').hide();
        $('#info_beasiswa').hide();
    }
}
</script>
