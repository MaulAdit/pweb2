<?php
// Koneksi ke Database
require_once '../dbkoneksi.php';

// Definisi Query
$sql = "SELECT * FROM paramedik";
$rs = $dbh->query($sql);
?>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display&family=Roboto&display=swap');

    body {
        font-family: 'Roboto', sans-serif;
        background: linear-gradient(135deg, #e0e7ff, #cfd8ff);
        color: #1b2a49;
        margin: 30px;
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

    a.btn, a.btn:visited {
        display: inline-block;
        background: linear-gradient(135deg, #1e3c72, #2a5298);
        color: #f5f3f4;
        font-weight: 600;
        padding: 12px 24px;
        border-radius: 30px;
        text-decoration: none;
        box-shadow: 0 4px 12px rgba(42, 82, 152, 0.4);
        transition: background 0.3s ease, box-shadow 0.3s ease;
        font-family: 'Playfair Display', serif;
        margin-bottom: 12px;
    }
    a.btn:hover, a.btn:focus {
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
    }

    tbody tr td:first-child {
        font-weight: 600;
        color: #102a63;
        width: 40px;
        text-align: center;
    }

    tbody tr td:last-child {
        width: 160px;
        text-align: center;
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
        tbody tr td:nth-of-type(2)::before { content: "Nama"; }
        tbody tr td:nth-of-type(3)::before { content: "Gender"; }
        tbody tr td:nth-of-type(4)::before { content: "Tempat, Tgl Lahir"; }
        tbody tr td:nth-of-type(5)::before { content: "Kategori"; }
        tbody tr td:nth-of-type(6)::before { content: "Telpon"; }
        tbody tr td:nth-of-type(7)::before { content: "Alamat"; }
        tbody tr td:nth-of-type(8)::before { content: "Aksi"; text-align: center; }
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

    .text-right {
        text-align: right;
        margin-top: 24px;
    }
</style>

<!-- Optional heading -->
<h1>Daftar Paramedik</h1>

<a href="paramedik_form.php" class="btn">+ Tambah Paramedik</a>
<table>
    <thead>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Gender</th>
        <th>Tempat, Tgl Lahir</th>
        <th>Kategori</th>
        <th>Telpon</th>
        <th>Alamat</th>
        <th>Aksi</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $no = 1;
    foreach($rs as $row){
    ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= htmlspecialchars($row->nama) ?></td>
        <td><?= htmlspecialchars($row->gender) ?></td>
        <td><?= htmlspecialchars($row->tmp_lahir) . ', ' . htmlspecialchars($row->tgl_lahir) ?></td>
        <td><?= htmlspecialchars($row->kategori) ?></td>
        <td><?= htmlspecialchars($row->telpon) ?></td>
        <td><?= htmlspecialchars($row->alamat) ?></td>
        <td>
            <a href="paramedik_form.php?id=<?= htmlspecialchars($row->id) ?>">Edit</a> |
            <a href="paramedik_proses.php?hapus=1&id=<?= htmlspecialchars($row->id) ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
        </td>
    </tr>
    <?php } ?>
    </tbody>
</table>
<div class="text-right">
    <a href="../Dashboard/admin.php" class="btn">Kembali ke Beranda</a>
</div>
