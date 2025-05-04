<?php
// Koneksi Database
require_once '../dbkoneksi.php';

// Definisi Query
$id = $_GET['id'] ?? '';
$data = ['kode_unit' => '', 'nama_unit' => '', 'keterangan' => ''];

if ($id) {
    $stmt = $dbh->prepare("SELECT * FROM unit_kerja WHERE id = ?");
    $stmt->execute([$id]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?= $id ? 'Edit' : 'Tambah' ?> Unit Kerja</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #e0e7ff, #cfd8ff);
            color: #1b2a49;
            padding: 20px;
            margin: 0;
        }

        h3 {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            font-size: 2rem;
            color: #102a63;
            text-align: center;
            margin-bottom: 24px;
        }

        form {
            max-width: 500px;
            margin: 0 auto;
            background: white;
            padding: 28px;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(16, 42, 99, 0.15);
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 700;
            color: #102a63;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #d1d9ff;
            border-radius: 6px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus {
            border-color: #1e3c72;
            outline: none;
        }

        .btn-group {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            margin-top: 20px;
        }

        .btn-submit {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: #f5f3f4;
            padding: 12px 20px;
            border: none;
            border-radius: 30px;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            flex: 1;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            text-align: center;
        }

        .btn-submit:hover {
            background: linear-gradient(135deg, #2a5298, #1e3c72);
            box-shadow: 0 4px 12px rgba(42, 82, 152, 0.4);
        }

        .btn-cancel {
            background: #dc2626; /* merah */
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 30px;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            flex: 1;
            text-align: center;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .btn-cancel:hover {
            background: #b91c1c; /* merah gelap */
            box-shadow: 0 4px 12px rgba(185, 28, 28, 0.6);
        }
    </style>
</head>
<body>
    <h3><?= $id ? 'Edit' : 'Tambah' ?> Unit Kerja</h3>
    <form method="POST" action="unit_proses.php" novalidate>
        <input type="hidden" name="id_edit" value="<?= htmlspecialchars($id) ?>">

        <label for="kode_unit">Kode Unit</label>
        <input type="text" id="kode_unit" name="kode_unit" value="<?= htmlspecialchars($data['kode_unit']) ?>" required>

        <label for="nama_unit">Nama Unit</label>
        <input type="text" id="nama_unit" name="nama_unit" value="<?= htmlspecialchars($data['nama_unit']) ?>" required>

        <label for="keterangan">Keterangan</label>
        <input type="text" id="keterangan" name="keterangan" value="<?= htmlspecialchars($data['keterangan']) ?>" required>

        <div class="btn-group">
            <button type="submit" name="proses" value="<?= $id ? 'Update' : 'Simpan' ?>" class="btn-submit">
                <?= $id ? 'Update' : 'Simpan' ?>
            </button>
            <a href="index.php" class="btn-cancel">Batal</a>
        </div>
    </form>
</body>
</html>