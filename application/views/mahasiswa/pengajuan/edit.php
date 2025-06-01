<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Form Edit Pengajuan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item active">Edit Pengajuan</li>
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
                            <h3 class="card-title"><i class="fas fa-info-circle"></i> Edit Formulir Pengajuan</h3>
                        </div>
                        <form method="POST" action="<?= base_url('pengajuan/edit/' . $pengajuan->id_pengajuan); ?>" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                    <br>                              
                                <h4><b>Informasi Pribadi</b></h4>
                                <br> 
                                <div class="form-group row">
                                    <label for="nama_lengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?= $pengajuan->nama_lengkap; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nim" name="nim" value="<?= $pengajuan->nim; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                            <option value="Laki-laki" <?= $pengajuan->jenis_kelamin == 'Laki-laki' ? 'selected' : ''; ?>>Laki-laki</option>
                                            <option value="Perempuan" <?= $pengajuan->jenis_kelamin == 'Perempuan' ? 'selected' : ''; ?>>Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= $pengajuan->tempat_lahir; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= $pengajuan->tanggal_lahir; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="no_ktp" class="col-sm-2 col-form-label">No KTP</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="no_ktp" name="no_ktp" value="<?= $pengajuan->no_ktp; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="id_agama" class="col-sm-2 col-form-label">Agama</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="id_agama" name="id_agama" required>
                                            <option disabled selected>-- Pilih --</option>
                                            <?php foreach ($agama as $item): ?>
                                                <option value="<?= $item->id_agama; ?>" <?= $item->id_agama == $pengajuan->id_agama ? 'selected' : ''; ?>><?= $item->nama_agama; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kode_pos" class="col-sm-2 col-form-label">Kode Pos</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="kode_pos" name="kode_pos" value="<?= $pengajuan->kode_pos; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="no_telepon" class="col-sm-2 col-form-label">No Telepon</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="no_telepon" name="no_telepon" value="<?= $pengajuan->no_telepon; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="email" name="email" value="<?= $pengajuan->email; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="alamat" name="alamat" required><?= $pengajuan->alamat; ?></textarea>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="id_universitas" class="col-sm-2 col-form-label">Universitas</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="id_universitas" name="id_universitas" required>
                                            <option disabled selected>-- Pilih --</option>
                                            <?php foreach ($universitas as $univ): ?>
                                                <option value="<?= $univ->id_universitas; ?>" <?= $univ->id_universitas == $pengajuan->id_universitas ? 'selected' : ''; ?>><?= $univ->nama_universitas; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="id_fakultas" class="col-sm-2 col-form-label">Fakultas</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="id_fakultas" name="id_fakultas" required>
                                            <option disabled selected>-- Pilih --</option>
                                            <?php foreach ($fakultas as $fak): ?>
                                                <option value="<?= $fak->id_fakultas; ?>" <?= $fak->id_fakultas == $pengajuan->id_fakultas ? 'selected' : ''; ?>><?= $fak->nama_fakultas; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="id_program_studi" class="col-sm-2 col-form-label">Program Studi</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="id_program_studi" name="id_program_studi" required>
                                            <option disabled selected>-- Pilih --</option>
                                            <?php foreach ($program_studi as $prodi): ?>
                                                <option value="<?= $prodi->id_program_studi; ?>" <?= $prodi->id_program_studi == $pengajuan->id_program_studi ? 'selected' : ''; ?>><?= $prodi->nama_program_studi; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="id_beasiswa" class="col-sm-2 col-form-label">Bantuan <small>(Silakan pilih jenis permintaan bantuan)</small></label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="id_beasiswa" name="id_beasiswa" required>
                                            <option disabled selected>-- Pilih --</option>
                                            <?php foreach ($beasiswa as $bs): ?>
                                                <option value="<?= $bs->id_beasiswa; ?>" <?= $bs->id_beasiswa == $pengajuan->id_beasiswa ? 'selected' : ''; ?>><?= $bs->nama_beasiswa; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="semester" class="col-sm-2 col-form-label">Semester</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="semester" name="semester" value="<?= $pengajuan->semester; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="ipk" class="col-sm-2 col-form-label">IPK</label>
                                    <div class="col-sm-10">
                                        <input type="number" step="0.01" class="form-control" id="ipk" name="ipk" value="<?= $pengajuan->ipk; ?>" required>
                                    </div>
                                </div>

                                



                                <h4><b>Informasi Orang Tua</b></h4>
                                <br>   
                                <div class="form-group row">
                                    <label for="nama_ayah" class="col-sm-2 col-form-label">Nama Ayah</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" value="<?= $pengajuan->nama_ayah; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama_ibu" class="col-sm-2 col-form-label">Nama Ibu</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" value="<?= $pengajuan->nama_ibu; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="notlp_ortu" class="col-sm-2 col-form-label">No Telepon Orang Tua</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="notlp_ortu" name="notlp_ortu" value="<?= $pengajuan->notlp_ortu; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                <label for="pekerjaan_ayah" class="col-sm-2 col-form-label">Pekerjaan Ayah</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah" required>
                                        <option disabled selected>-- Pilih --</option>
                                        <?php foreach ($pekerjaan as $item): ?>
                                            <option value="<?= $item->id_pekerjaan; ?>" <?= $item->id_pekerjaan == $pengajuan->pekerjaan_ayah ? 'selected' : ''; ?>><?= $item->nama_pekerjaan; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pekerjaan_ibu" class="col-sm-2 col-form-label">Pekerjaan Ibu</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu" required>
                                        <option disabled selected>-- Pilih --</option>
                                        <?php foreach ($pekerjaan as $item): ?>
                                            <option value="<?= $item->id_pekerjaan; ?>" <?= $item->id_pekerjaan == $pengajuan->pekerjaan_ibu ? 'selected' : ''; ?>><?= $item->nama_pekerjaan; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                            <label for="id_penghasilan" class="col-sm-2 col-form-label">Penghasilan Orang Tua</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="id_penghasilan" name="id_penghasilan" required>
                                    <option disabled selected>-- Pilih --</option>
                                    <?php foreach ($penghasilan as $item): ?>
                                        <option value="<?= $item->id_penghasilan; ?>" <?= (isset($pengajuan->id_penghasilan) && $pengajuan->id_penghasilan == $item->id_penghasilan) ? 'selected' : ''; ?>>
                                            <?= $item->rentang_penghasilan; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="alamat" class="col-sm-2 col-form-label">Alamat Orang Tua</label>
                                <div class="col-sm-10">
                                   <textarea class="form-control" id="alamat_ortu" name="alamat_ortu" required><?= $pengajuan->alamat_ortu; ?></textarea>
                                </div>
                         </div>  
                        <br>

                        
                        <h4><b>Dokumen Pendukung</b></h4>
<br>  
<div class="form-group row">
    <label for="ktp" class="col-sm-2 col-form-label">Foto KTP</label>
    <div class="col-sm-10">
        <input type="file" class="form-control" id="ktp" name="ktp" accept="image/*" onchange="previewImage(event, 'ktp-preview')">
        <img id="ktp-preview" class="img-preview" src="<?= base_url('uploads/ktp/' . $pengajuan->ktp); ?>" alt="Preview KTP" style="<?= !empty($pengajuan->ktp) ? 'display:block;' : 'display:none;'; ?> margin-top:10px; max-width: 100%; height: auto;">
    </div>
</div>
<div class="form-group row">
    <label for="kk" class="col-sm-2 col-form-label">Foto Kartu Keluarga</label>
    <div class="col-sm-10">
        <input type="file" class="form-control" id="kk" name="kk" accept="image/*" onchange="previewImage(event, 'kk-preview')">
        <img id="kk-preview" class="img-preview" src="<?= base_url('uploads/kk/' . $pengajuan->kk); ?>" alt="Preview Kartu Keluarga" style="<?= !empty($pengajuan->kk) ? 'display:block;' : 'display:none;'; ?> margin-top:10px; max-width: 100%; height: auto;">
    </div>
</div>
<div class="form-group row">
    <label for="kpm" class="col-sm-2 col-form-label">Foto KPM</label>
    <div class="col-sm-10">
        <input type="file" class="form-control" id="kpm" name="kpm" accept="image/*" onchange="previewImage(event, 'kpm-preview')">
        <img id="kpm-preview" class="img-preview" src="<?= base_url('uploads/kpm/' . $pengajuan->kpm); ?>" alt="Preview KPM" style="<?= !empty($pengajuan->kpm) ? 'display:block;' : 'display:none;'; ?> margin-top:10px; max-width: 100%; height: auto;">
    </div>
</div>
<div class="form-group row">
    <label for="foto" class="col-sm-2 col-form-label">Foto</label>
    <div class="col-sm-10">
        <input type="file" class="form-control" id="foto" name="foto" accept="image/*" onchange="previewImage(event, 'foto-preview')">
        <img id="foto-preview" class="img-preview" src="<?= base_url('uploads/foto/' . $pengajuan->foto); ?>" alt="Preview Foto" style="<?= !empty($pengajuan->foto) ? 'display:block;' : 'display:none;'; ?> margin-top:10px; max-width: 100%; height: auto;">
    </div>
</div>
<div class="form-group row">
    <label for="krs" class="col-sm-2 col-form-label">KRS</label>
    <div class="col-sm-10">
        <input type="file" class="form-control" id="krs" name="krs" accept=".pdf">
        <?php if (!empty($pengajuan->krs)): ?>
            <small class="form-text text-muted">Dokumen sebelumnya: <a href="<?= base_url('uploads/krs/' . $pengajuan->krs); ?>" target="_blank">Lihat KRS</a></small>
        <?php endif; ?>
    </div>
</div>
<div class="form-group row">
    <label for="transkip_nilai" class="col-sm-2 col-form-label">Transkip Nilai</label>
    <div class="col-sm-10">
        <input type="file" class="form-control" id="transkip_nilai" name="transkip_nilai" accept=".pdf">
        <?php if (!empty($pengajuan->transkip_nilai)): ?>
            <small class="form-text text-muted">Dokumen sebelumnya: <a href="<?= base_url('uploads/transkip_nilai/' . $pengajuan->transkip_nilai); ?>" target="_blank">Lihat Transkip Nilai</a></small>
        <?php endif; ?>
    </div>
</div>
<div class="form-group row">
    <label for="surat_aktif_kuliah" class="col-sm-2 col-form-label">Surat Aktif Kuliah</label>
    <div class="col-sm-10">
        <input type="file" class="form-control" id="surat_aktif_kuliah" name="surat_aktif_kuliah" accept=".pdf">
        <?php if (!empty($pengajuan->surat_aktif_kuliah)): ?>
            <small class="form-text text-muted">Dokumen sebelumnya: <a href="<?= base_url('uploads/surat_aktif_kuliah/' . $pengajuan->surat_aktif_kuliah); ?>" target="_blank">Lihat Surat Aktif Kuliah</a></small>
        <?php endif; ?>
    </div>
</div>
<div class="form-group row">
    <label for="surat_rekomendasi" class="col-sm-2 col-form-label">Surat Rekomendasi</label>
    <div class="col-sm-10">
        <input type="file" class="form-control" id="surat_rekomendasi" name="surat_rekomendasi" accept=".pdf">
        <?php if (!empty($pengajuan->surat_rekomendasi)): ?>
            <small class="form-text text-muted">Dokumen sebelumnya: <a href="<?= base_url('uploads/surat_rekomendasi/' . $pengajuan->surat_rekomendasi); ?>" target="_blank">Lihat Surat Rekomendasi</a></small>
        <?php endif; ?>
    </div>
</div>
<div class="form-group row">
    <label for="surat_pernyataan" class="col-sm-2 col-form-label">Surat Pernyataan</label>
    <div class="col-sm-10">
        <input type="file" class="form-control" id="surat_pernyataan" name="surat_pernyataan" accept=".pdf">
        <?php if (!empty($pengajuan->surat_pernyataan)): ?>
            <small class="form-text text-muted">Dokumen sebelumnya: <a href="<?= base_url('uploads/surat_pernyataan/' . $pengajuan->surat_pernyataan); ?>" target="_blank">Lihat Surat Pernyataan</a></small>
        <?php endif; ?>
    </div>
</div>








                            </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                <a href="<?= base_url('pengajuan'); ?>" class="btn btn-secondary">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
