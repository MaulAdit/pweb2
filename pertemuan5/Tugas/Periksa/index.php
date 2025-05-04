<?php
require_once '../dbkoneksi.php';

// Ambil data periksa + join ke pasien & paramedik
$sql = "SELECT p.*, ps.nama AS nama_pasien, pm.nama AS nama_dokter
        FROM periksa p
        LEFT JOIN pasien ps ON ps.id = p.pasien_id
        LEFT JOIN paramedik pm ON pm.id = p.dokter_id";
$rs = $dbh->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Data Pemeriksaan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #e0e7ff, #cfd8ff);
            color: #1b2a49;
            margin: 0;
            padding: 20px;
        }
        h3 {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            font-size: 2rem;
            color: #102a63;
            margin-bottom: 20px;
            text-align: center;
        }
        .btn {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: #f5f3f4;
            padding: 12px 24px;
            border-radius: 30px;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 20px;
            transition: background 0.3s ease;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            text-align: center;
        }
        .btn:hover {
            background: linear-gradient(135deg, #2a5298, #1e3c72);
        }
        .btn-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 12px;
            font-size: 1rem;
            font-family: 'Roboto', sans-serif;
            box-shadow: 0 6px 20px rgba(16, 42, 99, 0.15);
            background: white;
            border-radius: 15px;
            overflow: hidden;
        }
        thead tr {
            background: #1e3c72;
            color: #f5f3f4;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            font-size: 0.95rem;
        }
        thead th {
            padding: 14px 20px;
            text-align: left;
        }
        tbody tr {
            background: #f9faff;
            transition: background 0.3s ease;
            box-shadow: 0 2px 6px rgba(16, 42, 99, 0.08);
            cursor: default;
            border-radius: 12px;
        }
        tbody tr:hover {
            background: #d7e0ff;
            box-shadow: 0 4px 15px rgba(16, 42, 99, 0.25);
        }
        tbody td {
            padding: 16px 20px;
            vertical-align: middle;
            color: #1b2a49;
            border-bottom: none;
            text-align: left;
        }
        tbody td:first-child {
            font-weight: 600;
            color: #102a63;
            width: 40px;
            text-align: center;
        }
        tbody td:last-child {
            width: 160px;
            text-align: center;
        }
        tbody td a {
            margin: 0 8px;
            font-weight: 600;
            color: #1e3c72;
            text-decoration: none;
            font-family: 'Roboto', sans-serif;
            font-size: 0.9rem;
            padding: 6px 12px;
            border-radius: 20px;
            transition: background 0.3s ease, color 0.3s ease;
            border: 1.5px solid transparent;
            display: inline-block;
        }
        tbody td a:hover {
            color: #f5f3f4;
            background: #1e3c72;
            border-color: #12224b;
            text-decoration: none;
        }
        /* Responsive styling */
        @media (max-width: 600px) {
            table, thead, tbody, tr, th, td {
                display: block;
                width: 100%;
            }
            thead tr {
                display: none;
            }
            tbody tr {
                margin-bottom: 20px;
                box-shadow: 0 4px 15px rgba(16, 42, 99, 0.15);
                border-radius: 15px;
                background: #f9faff;
                padding: 15px;
            }
            tbody td {
                text-align: right;
                padding-left: 50%;
                position: relative;
                border-bottom: 1px solid #d1d9ff;
            }
            tbody td::before {
                position: absolute;
                top: 50%;
                left: 12px;
                transform: translateY(-50%);
                font-weight: 700;
                font-family: 'Playfair Display', serif;
                color: #1e3c72;
                white-space: nowrap;
                font-size: 0.9rem;
            }
            tbody td:nth-of-type(1)::before { content: "No"; }
            tbody td:nth-of-type(2)::before { content: "Tanggal"; }
            tbody td:nth-of-type(3)::before { content: "Berat"; }
            tbody td:nth-of-type(4)::before { content: "Tinggi"; }
            tbody td:nth-of-type(5)::before { content: "Tensi"; }
            tbody td:nth-of-type(6)::before { content: "Keterangan"; }
            tbody td:nth-of-type(7)::before { content: "Pasien"; }
            tbody td:nth-of-type(8)::before { content: "Dokter"; }
            tbody td:nth-of-type(9)::before { content: "Aksi"; }
            tbody td:last-child {
                border-bottom: none;
                text-align: center;
                padding-left: 0;
            }
            tbody td a {
                margin: 0 6px;
                padding: 8px 14px;
                font-size: 0.95rem;
            }
        }
    </style>
</head>
<body>

<h3>Data Pemeriksaan</h3>

<div class="btn-container">
    <a href="../Dashboard/admin.php" class="btn">Kembali ke Beranda</a>
    <a href="periksa_form.php" class="btn">Tambah Pemeriksaan</a>
</div>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Berat</th>
            <th>Tinggi</th>
            <th>Tensi</th>
            <th>Keterangan</th>
            <th>Pasien</th>
            <th>Dokter</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $no = 1;
        foreach($rs as $row): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= htmlspecialchars($row->tanggal) ?></td>
            <td><?= htmlspecialchars($row->berat) ?></td>
            <td><?= htmlspecialchars($row->tinggi) ?></td>
            <td><?= htmlspecialchars($row->tensi) ?></td>
            <td><?= htmlspecialchars($row->keterangan) ?></td>
            <td><?= htmlspecialchars($row->nama_pasien) ?></td>
            <td><?= htmlspecialchars($row->nama_dokter) ?></td>
            <td>
                <a href="periksa_form.php?id=<?= htmlspecialchars($row->id) ?>">Edit</a>
                <a href="periksa_proses.php?hapus=1&id=<?= htmlspecialchars($row->id) ?>" onclick="return confirm('Hapus data ini?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>