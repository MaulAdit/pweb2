<?php
// Connect koneksi ke database
require_once '../dbkoneksi.php';

// Ambil data dari form
$id = $_GET['id'] ?? '';
$nama = '';

if ($id) {
    $stmt = $dbh->prepare("SELECT * FROM kelurahan WHERE id = ?");
    $stmt->execute([$id]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $nama = $row['nama_kelurahan'];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title><?= $id ? 'Edit' : 'Tambah' ?> Kelurahan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #e0e7ff, #cfd8ff);
            color: #1b2a49;
        }

        form {
            max-width: 500px;
            margin: auto;
            background: white;
            padding: 28px;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(16, 42, 99, 0.15);
        }

        label {
            font-weight: 700;
            display: block;
            margin-top: 12px;
            margin-bottom: 6px;
            color: #102a63;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #d1d9ff;
            border-radius: 5px;
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
            margin-top: 20px;
            gap: 10px;
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
        }

        .btn-submit:hover {
            background: linear-gradient(135deg, #2a5298, #1e3c72);
            box-shadow: 0 4px 12px rgba(42, 82, 152, 0.4);
        }

        .btn-cancel {
            background: #dc2626;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 30px;
            font-weight: 700;
            font-size: 1rem;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            flex: 1;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn-cancel:hover {
            background: #b91c1c;
            box-shadow: 0 4px 12px rgba(185, 28, 28, 0.6);
        }

        h3 {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            font-size: 2rem;
            color: #102a63;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h3><?= $id ? 'Edit' : 'Tambah' ?> Kelurahan</h3>
    <form method="post" action="kelurahan_proses.php">
        <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">

        <label for="nama_kelurahan">Nama Kelurahan</label>
        <input type="text" name="nama_kelurahan" id="nama_kelurahan" value="<?= htmlspecialchars($nama) ?>" required>

        <div class="btn-group">
            <button type="submit" class="btn-submit" name="proses" value="<?= $id ? 'Update' : 'Simpan' ?>">
                <?= $id ? 'Update' : 'Simpan' ?>
            </button>
            <a href="index.php" class="btn-cancel">Batal</a>
        </div>
    </form>
</body>
</html>