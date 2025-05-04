<?php
require_once '../dbkoneksi.php';

$sql = "SELECT * FROM kelurahan";
$rs = $dbh->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Daftar Kelurahan</title>
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
      tbody td:nth-of-type(2)::before { content: "Nama Kelurahan"; }
      tbody td:nth-of-type(3)::before { content: "Aksi"; }
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
  <div class="max-w-4xl mx-auto">
    <h3>Daftar Kelurahan</h3>
    <div class="btn-container">
      <a href="../Dashboard/admin.php" class="btn">Kembali Ke Dashboard</a>
      <a href="kelurahan_form.php" class="btn">Tambah Kelurahan</a>
    </div>

    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Kelurahan</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; while ($row = $rs->fetch(PDO::FETCH_ASSOC)): ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= htmlspecialchars($row['nama_kelurahan']) ?></td>
          <td>
            <a href="kelurahan_form.php?id=<?= htmlspecialchars($row['id']) ?>">Edit</a>
            <a href="kelurahan_proses.php?hapus=1&id=<?= htmlspecialchars($row['id']) ?>"
               onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</body>
</html>