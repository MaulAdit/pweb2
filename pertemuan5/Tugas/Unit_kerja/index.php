<?php
// Koneksi Database
require_once '../dbkoneksi.php';

// Definisi Query
$sql = "SELECT * FROM unit_kerja";
$rs = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Daftar Unit Kerja</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #e0e7ff, #cfd8ff);
            color: #1b2a49;
            padding: 20px;
        }

        h3 {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            font-size: 2rem;
            color: #102a63;
            text-align: center;
            margin-bottom: 20px;
        }

        .btn {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: #f5f3f4;
            padding: 12px 20px;
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
            justify-content: space-between; /* Ruang antara tombol kiri dan kanan */
            align-items: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(16, 42, 99, 0.15);
        }

        thead {
            background: #1e3c72;
            color: #f5f3f4;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #d1d9ff;
        }

        tbody tr:hover {
            background: #f1f5f9;
        }

        .action-links a {
            margin-right: 10px;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h3>Daftar Unit Kerja</h3>
    
    <div class="btn-container">
        <a href="../Dashboard/admin.php" class="btn">Kembali ke Dashboard</a>
        <a href="unit_form.php" class="btn">+ Tambah Unit Kerja</a>
    </div>
    
    <table class="table-auto border mt-4 w-full">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Unit</th>
                <th>Nama Unit</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php $no = 1; foreach($rs as $row): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= htmlspecialchars($row['kode_unit']) ?></td>
                <td><?= htmlspecialchars($row['nama_unit']) ?></td>
                <td><?= htmlspecialchars($row['keterangan']) ?></td>
                <td class="action-links">
                    <a href="unit_form.php?id=<?= $row['id'] ?>" class="text-blue-600">Edit</a> |
                    <a href="unit_proses.php?hapus=1&id=<?= $row['id'] ?>" class="text-red-600" onclick="return confirm('Hapus data ini?')">Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>