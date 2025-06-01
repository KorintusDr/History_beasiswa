<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengajuan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            color: #333;
        }
        h2 {
            text-align: center;
            color: #004085;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 14px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th {
            background-color: #004085;
            color: white;
            padding: 12px;
            text-align: center;
        }
        td {
            padding: 10px;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        /* .text-center {
            text-align: center;
        } */
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>
<body>
    <h2>Data Pengajuan Mahasiswa</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Mahasiswa</th>
                <th>NIM</th>
                <th>Tempat, Tanggal Lahir</th>
                <th>Nomor Telepon</th>
                <th>IPK</th>
                <th>Tanggal Pendaftaran</th>
                <th>Status Pengajuan</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach ($pengajuan as $item): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $item->nama_lengkap ?></td>
                    <td><?= $item->nim ?></td>
                    <td><?= $item->tempat_lahir ?>, <?= date('d-m-Y', strtotime($item->tanggal_lahir)) ?></td>
                    <td><?= $item->no_telepon ?></td>
                    <td><?= $item->ipk ?></td>
                    <td><?= date('d-m-Y', strtotime($item->tanggal_pendaftaran)) ?></td>
                    <td><?= $item->status_pendaftaran ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="footer">
        <p>&copy; <?= date('Y') ?> Malas Coding - Semua Hak Dilindungi</p>
    </div>
</body>
</html>
