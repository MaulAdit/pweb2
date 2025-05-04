<?php
// Koneksi Database
require_once '../dbkoneksi.php';

// Ambil data pasien
$sql = "SELECT * FROM pasien";
$rs = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Data Pasien</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: linear-gradient(135deg, #e0e7ff, #cfd8ff);
            color: #1b2a49;
            font-family: 'Roboto', sans-serif;
        }
        h1 {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            font-size: 2.8rem;
            color: #102a63;
            margin-bottom: 20px;
            text-align: center;
            text-shadow: 0 2px 5px rgba(16, 42, 99, 0.3);
        }
        .btn {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: #f5f3f4;
            font-weight: 600;
            padding: 12px 24px;
            border-radius: 30px;
            text-decoration: none;
            box-shadow: 0 4px 12px rgba(42, 82, 152, 0.4);
            transition: background 0.3s ease, box-shadow 0.3s ease;
            font-family: 'Playfair Display', serif;
        }
        .btn:hover,
        .btn:focus {
            background: linear-gradient(135deg, #2a5298, #1e3c72);
            box-shadow: 0 6px 18px rgba(42, 82, 152, 0.6);
            outline: none;
        }
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 12px;
            box-shadow: 0 6px 20px rgba(16, 42, 99, 0.15);
            background: white;
            border-radius: 15px;
            overflow: hidden;
            font-size: 1rem;
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
        tbody tr {
            background: #f9faff;
            transition: background 0.3s ease;
            cursor: default;
            box-shadow: 0 2px 6px rgba(16, 42, 99, 0.08);
        }
        tbody tr:hover {
            background: #d7e0ff;
            box-shadow: 0 4px 15px rgba(16, 42, 99, 0.25);
        }
        tbody tr td {
            padding: 16px 20px;
            vertical-align: middle;
            color: #1b2a49;
            border-bottom: none;
            text-align: center;
        }
        tbody tr td:first-child {
            font-weight: 600;
            color: #102a63;
            width: 40px;
        }
        tbody tr td:nth-child(2),
        tbody tr td:nth-child(3),
        tbody tr td:nth-child(4),
        tbody tr td:nth-child(5),
        tbody tr td:nth-child(6),
        tbody tr td:nth-child(7),
        tbody tr td:nth-child(8) {
            text-align: left;
        }
        tbody tr td a {
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
        tbody tr td a:hover {
            color: #f5f3f4;
            background: #1e3c72;
            border-color: #12224b;
            text-decoration: none;
        }
        /* Responsive: mobile friendly */
        @media (max-width: 600px) {
            body {
                margin: 16px;
            }
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
            tbody tr td {
                text-align: right;
                padding-left: 50%;
                position: relative;
                border-bottom: 1px solid #d1d9ff;
            }
            tbody tr td::before {
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
            tbody tr td:nth-of-type(1)::before { content: "No"; }
            tbody tr td:nth-of-type(2)::before { content: "Kode"; }
            tbody tr td:nth-of-type(3)::before { content: "Nama"; }
            tbody tr td:nth-of-type(4)::before { content: "Tempat, Tgl Lahir"; }
            tbody tr td:nth-of-type(5)::before { content: "Gender"; }
            tbody tr td:nth-of-type(6)::before { content: "Email"; }
            tbody tr td:nth-of-type(7)::before { content: "Alamat"; }
            tbody tr td:nth-of-type(8)::before { content: "Kelurahan"; }
            tbody tr td:nth-of-type(9)::before { content: "Aksi"; text-align: center; }
            tbody tr td:last-child {
                border-bottom: none;
                text-align: center;
                padding-left: 0;
            }
            tbody tr td a {
                margin: 0 6px;
                padding: 8px 14px;
                font-size: 0.95rem;
            }
        }
        .text-center {
            text-align: center;
        }
        .flex-between {
            display: flex;
            justify-content: space-between;
            margin-bottom: 24px;
        }
    </style>
</head>
<body>

<div class="container mx-auto px-4 py-6 max-w-7xl">
    <h1>Data Pasien</h1>

    <!-- Tombol navigasi -->
    <div class="flex-between">
        <a href="../Dashboard/admin.php" class="btn">Kembali ke Beranda</a>
        <a href="pasien_form.php" class="btn">Tambah Pasien</a>
    </div>

    <div style="overflow-x:auto;">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Tempat, Tgl Lahir</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>Kelurahan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php $no = 1; foreach($rs as $row): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= htmlspecialchars($row['kode']) ?></td>
                    <td><?= htmlspecialchars($row['nama']) ?></td>
                    <td><?= htmlspecialchars($row['tmp_lahir']) . ', ' . htmlspecialchars($row['tgl_lahir']) ?></td>
                    <td><?= htmlspecialchars($row['gender']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td><?= htmlspecialchars($row['alamat']) ?></td>
                    <td><?= htmlspecialchars($row['kelurahan_id']) ?></td>
                    <td>
                        <a href="pasien_form.php?id=<?= htmlspecialchars($row['id']) ?>">Edit</a> |
                        <a href="pasien_proses.php?hapus=1&id=<?= htmlspecialchars($row['id']) ?>" onclick="return confirm('Hapus data ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
