<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Form Edit Universitas</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item active">Edit Universitas</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-info-circle"></i> Isi Formulir untuk Mengedit Universitas</h3>
                        </div>
                        <form method="POST" action="<?= base_url('universitas/edit/' . $universitas->id_universitas); ?>" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nama_universitas">Nama Universitas</label>
                                            <input type="text" class="form-control" id="nama_universitas" name="nama_universitas" value="<?= $universitas->nama_universitas; ?>" placeholder="Enter nama universitas" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" value="<?= $universitas->email; ?>" placeholder="Enter email" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="nomor_telepon">Nomor Telepon</label>
                                            <input type="number" class="form-control" id="nomor_telepon" name="nomor_telepon" value="<?= $universitas->nomor_telepon; ?>" placeholder="Enter nomor telepon" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <textarea class="form-control" id="alamat" name="alamat" rows="4" placeholder="Masukkan alamat" required><?= $universitas->alamat; ?></textarea>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update Data</button>
                                <button type="reset" class="btn btn-warning"><i class="fas fa-undo"></i> Kosongkan</button>
                                <a href="<?= base_url('universitas'); ?>" class="btn btn-info"><i class="fas fa-arrow-left"></i> Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
