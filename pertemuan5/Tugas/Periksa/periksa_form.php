<?php
require_once '../dbkoneksi.php';

$id = $_GET['id'] ?? '';
$data = [
    'tanggal' => '',
    'berat' => '',
    'tinggi' => '',
    'tensi' => '',
    'keterangan' => '',
    'pasien_id' => '',
    'dokter_id' => ''
];

if ($id) {
    $sql = "SELECT * FROM periksa WHERE id = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$id]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
}

$pasien = $dbh->query("SELECT id, nama FROM pasien")->fetchAll(PDO::FETCH_ASSOC);
$dokter = $dbh->query("SELECT id, nama FROM paramedik")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Form Pemeriksaan</title>
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

        form {
            background: white;
            padding: 28px;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(16, 42, 99, 0.15);
            max-width: 500px;
            margin: auto;
        }

        label {
            font-weight: bold;
            margin-top: 12px;
            display: block;
        }

        input,
        textarea,
        select {
            width: 100%;
            margin-top: 6px;
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #d1d9ff;
            border-radius: 5px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        input:focus,
        textarea:focus,
        select:focus {
            border-color: #1e3c72;
            outline: none;
        }

        .btn-submit {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: #f5f3f4;
            padding: 12px 20px;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            font-weight: 700;
            width: 48%;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            display: inline-block;
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
            cursor: pointer;
            font-weight: 700;
            width: 48%;
            text-align: center;
            display: inline-block;
            text-decoration: none;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .btn-cancel:hover {
            background: #b91c1c; /* merah gelap */
            box-shadow: 0 4px 12px rgba(185, 28, 28, 0.6);
        }

        .btn-group {
            display: flex;
            justify-content: space-between;
            gap: 4%;
            margin-top: 15px;
        }
    </style>
</head>
<body>

<h3>Form Pemeriksaan</h3>
<form method="POST" action="periksa_proses.php">
    <input type="hidden" name="id_edit" value="<?= htmlspecialchars($id) ?>">

    <label for="tanggal">Tanggal:</label>
    <input type="date" name="tanggal" id="tanggal" value="<?= htmlspecialchars($data['tanggal']) ?>" required>

    <label for="berat">Berat (kg):</label>
    <input type="number" name="berat" id="berat" step="0.1" value="<?= htmlspecialchars($data['berat']) ?>" required>

    <label for="tinggi">Tinggi (cm):</label>
    <input type="number" name="tinggi" id="tinggi" step="0.1" value="<?= htmlspecialchars($data['tinggi']) ?>" required>

    <label for="tensi">Tensi:</label>
    <input type="text" name="tensi" id="tensi" value="<?= htmlspecialchars($data['tensi']) ?>" required>

    <label for="keterangan">Keterangan:</label>
    <textarea name="keterangan" id="keterangan" required><?= htmlspecialchars($data['keterangan']) ?></textarea>

    <label for="pasien_id">Pasien:</label>
    <select name="pasien_id" id="pasien_id" required>
        <option value="">-- Pilih Pasien --</option>
        <?php foreach ($pasien as $ps): ?>
            <option value="<?= $ps['id'] ?>" <?= ($ps['id'] == $data['pasien_id']) ? 'selected' : '' ?>>
                <?= htmlspecialchars($ps['nama']) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label for="dokter_id">Dokter:</label>
    <select name="dokter_id" id="dokter_id" required>
        <option value="">-- Pilih Dokter --</option>
        <?php foreach ($dokter as $dr): ?>
            <option value="<?= $dr['id'] ?>" <?= ($dr['id'] == $data['dokter_id']) ? 'selected' : '' ?>>
                <?= htmlspecialchars($dr['nama']) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <div class="btn-group">
        <button type="submit" name="proses" value="<?= $id ? 'Update' : 'Simpan' ?>" class="btn-submit">
            <?= $id ? 'Update' : 'Simpan' ?>
        </button>
        <a href="index.php" class="btn-cancel">Batal</a>
    </div>
</form>

</body>
</html>