<?php
    $current_page = basename($_SERVER['PHP_SELF']);
    $role = $this->session->userdata('role');
    $status_pendaftaran = isset($status_pendaftaran) ? $status_pendaftaran : null;
?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="<?= base_url(); ?>" class="brand-link">
        <img src="<?= base_url('backend/dist/img/logo.png'); ?>" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">BeaSiswaKu</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
            <a href="<?= base_url('profile'); ?>" class="d-block"><h2><?= $this->session->userdata('username') ? $this->session->userdata('username') : 'Guest'; ?></h2></a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="<?= base_url('dashboard'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>


                <?php if ($role == 'petugas') : ?>
                <li class="nav-item">
                    <a href="<?= base_url('user'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Data Pengguna</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-database"></i>
                        <p>Data Master <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('beasiswa'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-graduation-cap"></i>
                                <p>Data Beasiswa</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('agama'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-praying-hands"></i>
                                <p>Data Agama</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('pekerjaan'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-briefcase"></i>
                                <p>Data Pekerjaan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('penghasilan'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-money-bill-wave"></i>
                                <p>Data Penghasilan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('universitas'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-university"></i>
                                <p>Data Universitas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('fakultas'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-building"></i>
                                <p>Data Fakultas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('programstudi'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-chalkboard-teacher"></i>
                                <p>Data Program Studi</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                            <a href="<?= base_url('pengajuan'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-file-alt"></i>
                                <p>Data Pengajuan</p>
                            </a>
                </li>
                <li class="nav-item">
                        <a href="<?= base_url('pencairan'); ?>" class="nav-link">
                            <i class="nav-icon fas fa-money-check-alt"></i>
                            <p>Data Pencairan</p>
                        </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('penggunaan'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-book"></i> 
                        <p>Data Penggunaan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('backup/download'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-download"></i> 
                        <p>Backup Database</p>
                    </a>
                </li>

               <?php endif; ?>


                <?php if ($role == 'pimpinan') : ?>
                    <li class="nav-item">
                            <a href="<?= base_url('pengajuan'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-file-alt"></i>
                                <p>Data Pengajuan</p>
                            </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('pencairan'); ?>" class="nav-link">
                            <i class="nav-icon fas fa-money-check-alt"></i>
                            <p>Data Pencairan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('penggunaan'); ?>" class="nav-link">
                            <i class="nav-icon fas fa-book"></i> 
                            <p>Data Penggunaan</p>
                        </a>
                    </li>

                <?php endif; ?>


                <?php if ($role == 'mahasiswa') : ?>
                    <li class="nav-item">
                            <a href="<?= base_url('pengajuan'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-file-alt"></i>
                                <p>Daftar Beasiswa</p>
                            </a>
                </li>
                <li class="nav-item">
                        <a href="<?= base_url('pencairan'); ?>" class="nav-link">
                            <i class="nav-icon fas fa-money-check-alt"></i>
                            <p>Data Pencairan</p>
                        </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('penggunaan'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-book"></i> 
                        <p>Data Penggunaan</p>
                    </a>
                </li>

                <?php endif; ?>

                <li class="nav-item">
                    <a href="<?= base_url('auth/logout'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Keluar
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>
