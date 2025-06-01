<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Data Mahasiswa</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= site_url('home') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Detail Data Mahasiswa</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header bg-info">
                    <h3 class="card-title">Informasi Mahasiswa</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Nama Lengkap</th>
                            <td><?= isset($nama_lengkap) ? $nama_lengkap : 'Data tidak tersedia' ?></td>
                        </tr>
                        <tr>
                            <th>NIM</th>
                            <td><?= isset($nim) ? $nim : 'Data tidak tersedia' ?></td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <td><?= isset($jenis_kelamin) ? $jenis_kelamin : 'Data tidak tersedia' ?></td>
                        </tr>
                        <tr>
                            <th>Tempat Lahir</th>
                            <td><?= isset($tempat_lahir) ? $tempat_lahir : 'Data tidak tersedia' ?></td>
                        </tr>
                        <tr>
                            <th>Tanggal Lahir</th>
                            <td><?= isset($tanggal_lahir) ? date('d F Y', strtotime($tanggal_lahir)) : 'Data tidak tersedia' ?></td>
                        </tr>
                        <tr>
                            <th>No KTP</th>
                            <td><?= isset($no_ktp) ? $no_ktp : 'Data tidak tersedia' ?></td>
                        </tr>
                        <tr>
                            <th>Agama</th>
                            <td>
                                <?php 
                                $nama_agama = 'Data tidak tersedia'; 
                                if (isset($agama) && is_array($agama)) {
                                    foreach ($agama as $item) {
                                        if ($item->id_agama == $id_agama) {
                                            $nama_agama = $item->nama_agama; 
                                            break; 
                                        }
                                    }
                                }
                                ?>
                                <?= $nama_agama; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Kode Pos</th>
                            <td><?= isset($kode_pos) ? $kode_pos : 'Data tidak tersedia' ?></td>
                        </tr>
                        <tr>
                            <th>No Telepon</th>
                            <td><?= isset($no_telepon) ? $no_telepon : 'Data tidak tersedia' ?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><?= isset($email) ? $email : 'Data tidak tersedia' ?></td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td><?= isset($alamat) ? $alamat : 'Data tidak tersedia' ?></td>
                        </tr>
                        <tr>
                            <th>Universitas</th>
                            <td>
                                <?php 
                                $nama_universitas = 'Data tidak tersedia'; 
                                if (isset($universitas) && is_array($universitas)) {
                                    foreach ($universitas as $item) {
                                        if ($item->id_universitas == $id_universitas) {
                                            $nama_universitas = $item->nama_universitas; 
                                            break;
                                        }
                                    }
                                }
                                ?>
                                <?= $nama_universitas; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Fakultas</th>
                            <td>
                                <?php 
                                $nama_fakultas = 'Data tidak tersedia'; 
                                if (isset($fakultas) && is_array($fakultas)) {
                                    foreach ($fakultas as $item) {
                                        if ($item->id_fakultas == $id_fakultas) {
                                            $nama_fakultas = $item->nama_fakultas; 
                                            break;
                                        }
                                    }
                                }
                                ?>
                                <?= $nama_fakultas; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Program Studi</th>
                            <td>
                                <?php 
                                $nama_program_studi = 'Data tidak tersedia'; 
                                if (isset($program_studi) && is_array($program_studi)) {
                                    foreach ($program_studi as $item) {
                                        if ($item->id_program_studi == $id_program_studi) {
                                            $nama_program_studi = $item->nama_program_studi; 
                                            break;
                                        }
                                    }
                                }
                                ?>
                                <?= $nama_program_studi; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Jenis Permintaan Bantuan</th>
                            <td>
                                <?php 
                                $nama_beasiswa = 'Data tidak tersedia'; 
                                if (isset($beasiswa) && is_array($beasiswa)) {
                                    foreach ($beasiswa as $item) {
                                        if ($item->id_beasiswa == $id_beasiswa) {
                                            $nama_beasiswa = $item->nama_beasiswa; 
                                            break;
                                        }
                                    }
                                }
                                ?>
                                <?= $nama_beasiswa; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Semester</th>
                            <td><?= isset($semester) ? $semester : 'Data tidak tersedia' ?></td>
                        </tr>
                        <tr>
                            <th>IPK</th>
                            <td><?= isset($ipk) ? $ipk : 'Data tidak tersedia' ?></td>
                        </tr>
                        <tr>
                            <th>Nama Ayah</th>
                            <td><?= isset($nama_ayah) ? $nama_ayah : 'Data tidak tersedia' ?></td>
                        </tr>
                        <tr>
                            <th>Nama Ibu</th>
                            <td><?= isset($nama_ibu) ? $nama_ibu : 'Data tidak tersedia' ?></td>
                        </tr>
                        <tr>
                            <th>No Telepon Orang Tua</th>
                            <td><?= isset($notlp_ortu) ? $notlp_ortu : 'Data tidak tersedia' ?></td>
                        </tr>
                        <tr>
                        <th>Pekerjaan Ayah</th>
                        <td>
                            <?php
                            // Mencari pekerjaan ayah berdasarkan ID
                            $pekerjaan_ayah_nama = '';
                            foreach ($pekerjaan as $item) {
                                if ($item->id_pekerjaan == $pekerjaan_ayah) {
                                    $pekerjaan_ayah_nama = $item->nama_pekerjaan;
                                    break;
                                }
                            }
                            echo !empty($pekerjaan_ayah_nama) ? $pekerjaan_ayah_nama : 'Data tidak tersedia';
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Pekerjaan Ibu</th>
                        <td>
                            <?php
                            // Mencari pekerjaan ibu berdasarkan ID
                            $pekerjaan_ibu_nama = '';
                            foreach ($pekerjaan as $item) {
                                if ($item->id_pekerjaan == $pekerjaan_ibu) {
                                    $pekerjaan_ibu_nama = $item->nama_pekerjaan;
                                    break;
                                }
                            }
                            echo !empty($pekerjaan_ibu_nama) ? $pekerjaan_ibu_nama : 'Data tidak tersedia';
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Penghasilan Orang Tua</th>
                        <td>
                            <?php
                            // Mencari rentang penghasilan berdasarkan ID
                            $penghasilan_nama = '';
                            foreach ($penghasilan as $item) {
                                if ($item->id_penghasilan == $id_penghasilan) {
                                    $penghasilan_nama = $item->rentang_penghasilan;
                                    break;
                                }
                            }
                            echo !empty($penghasilan_nama) ? $penghasilan_nama : 'Data tidak tersedia';
                            ?>
                        </td>
                    </tr>
                        <tr>
                            <th>Alamat Orang Tua</th>
                            <td><?= isset($alamat_ortu) ? $alamat_ortu : 'Data tidak tersedia' ?></td>
                        </tr>
                        <tr>
                            <th>Foto</th>
                            <td>
                                <?php if (!empty($foto)): ?>
                                    <img src="<?= base_url('uploads/foto/' . $foto); ?>" alt="Foto Mahasiswa" style="width: 150px; height: auto;" />
                                <?php else: ?>
                                    Tidak ada foto.
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>KTP</th>
                            <td>
                                <?php if (!empty($ktp)): ?>
                                    <a href="<?= base_url('uploads/ktp/' . $ktp) ?>" target="_blank">Lihat KTP</a>
                                <?php else: ?>
                                    Tidak ada KTP.
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>KK</th>
                            <td>
                                <?php if (!empty($kk)): ?>
                                    <a href="<?= base_url('uploads/kk/' . $kk) ?>" target="_blank">Lihat KK</a>
                                <?php else: ?>
                                    Tidak ada KK.
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>KPM</th>
                            <td>
                                <?php if (!empty($kpm)): ?>
                                    <a href="<?= base_url('uploads/kpm/' . $kpm) ?>" target="_blank">Lihat KPM</a>
                                <?php else: ?>
                                    Tidak ada KPM.
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>KRS</th>
                            <td>
                                <?php if (!empty($krs)): ?>
                                    <a href="<?= base_url('uploads/krs/' . $krs) ?>" target="_blank">Lihat KRS</a>
                                <?php else: ?>
                                    Tidak ada KRS.
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Transkip Nilai</th>
                            <td>
                                <?php if (!empty($transkip_nilai)): ?>
                                    <a href="<?= base_url('uploads/transkip_nilai/' . $transkip_nilai) ?>" target="_blank">Lihat Transkip Nilai</a>
                                <?php else: ?>
                                    Tidak ada Transkip Nilai.
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Surat Aktif Kuliah</th>
                            <td>
                                <?php if (!empty($surat_aktif_kuliah)): ?>
                                    <a href="<?= base_url('uploads/surat_aktif_kuliah/' . $surat_aktif_kuliah) ?>" target="_blank">Lihat Surat Aktif Kuliah</a>
                                <?php else: ?>
                                    Tidak ada Surat Aktif Kuliah.
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Surat Rekomendasi</th>
                            <td>
                                <?php if (!empty($surat_rekomendasi)): ?>
                                    <a href="<?= base_url('uploads/surat_rekomendasi/' . $surat_rekomendasi) ?>" target="_blank">Lihat Surat Rekomendasi</a>
                                <?php else: ?>
                                    Tidak ada Surat Rekomendasi.
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Surat Pernyataan</th>
                            <td>
                                <?php if (!empty($surat_pernyataan)): ?>
                                    <a href="<?= base_url('uploads/surat_pernyataan/' . $surat_pernyataan) ?>" target="_blank">Lihat Surat Pernyataan</a>
                                <?php else: ?>
                                    Tidak ada Surat Pernyataan.
                                <?php endif; ?>
                            </td>
                        </tr>
                    </table>
                    <div class="card-footer">
                        <a href="<?= base_url('pengajuan'); ?>" class="btn btn-warning"><i class="fas fa-arrow-left"></i> Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
