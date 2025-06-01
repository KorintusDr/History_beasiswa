<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Pencairan Dana</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Data Pencairan Dana</h2>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>NIM</th>
                <th>No Telepon</th>
                <th>Universitas</th>
                <th>Bantuan</th>
                <th>Jumlah</th>
                <th>Tanggal</th>
                <th>Status Pencairan</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pencairan as $item): ?>
            <tr>
                <td><?= $item['nama_lengkap'] ?></td>
                <td><?= $item['nim'] ?></td>
                <td><?= $item['no_telepon'] ?></td>
                <td><?= $item['nama_universitas'] ?></td>
                <td><?= $item['nama_beasiswa'] ?></td>
                <td><?= $item['jumlah_beasiswa'] ?></td>
                <td><?= date('d-m-Y', strtotime($item['tanggal_pencairan'])) ?></td>
                <td><?= $item['status'] ?></td>
                <td><?= $item['keterangan'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
