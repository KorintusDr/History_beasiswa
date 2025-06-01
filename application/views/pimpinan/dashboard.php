<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?php echo $pengajuan_count; ?></h3>
                            <p>Data Pengajuan</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-file-alt"></i> 
                        </div>
                        <a href="<?= base_url('pengajuan'); ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?php echo $pencairan_dana_beasiswa_count; ?></h3>
                            <p>Data Pencairan Dana Beasiswa</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-hand-holding-usd"></i>
                        </div>
                        <a href="<?= base_url('pencairan'); ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-6">
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <h3><?php echo $penggunaan_beasiswa_count; ?></h3>
                            <p>Data Penggunaan Beasiswa</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-wallet"></i>
                        </div>
                        <a href="<?= base_url('penggunaan'); ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Jumlah Pendaftar</h3>
                        </div>
                        <div class="card-body">
                            <canvas id="statusPendaftaranBarChart" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var statusPendaftaran = <?php echo json_encode($status_pendaftaran_count); ?>; 

    var ctxBar = document.getElementById('statusPendaftaranBarChart').getContext('2d');
    var barChart = new Chart(ctxBar, {
        type: 'bar',
        data: {
            labels: ['Diterima', 'Ditolak', 'Menunggu Konfirmasi'],
            datasets: [{
                label: 'Jumlah Pendaftaran',
                data: statusPendaftaran,
                backgroundColor: ['#36A2EB', '#FF6384', '#FFCE56'],
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    display: true
                }
            }
        }
    });
});
</script>
