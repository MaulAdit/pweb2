<?php
// Koneksi Database
require_once '../dbkoneksi.php';

// Definisi Query
$id = $_GET['id'] ?? null;
$nama = $gender = $tmp_lahir = $tgl_lahir = $kategori = $telpon = $alamat = '';
$proses = "Simpan";

if ($id) {
    $sql = "SELECT * FROM paramedik WHERE id = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$id]);
    $row = $stmt->fetch();

    if ($row) {
        $nama = $row->nama;
        $gender = $row->gender;
        $tmp_lahir = $row->tmp_lahir;
        $tgl_lahir = $row->tgl_lahir;
        $kategori = $row->kategori;
        $telpon = $row->telpon;
        $alamat = $row->alamat;
        $proses = "Update";
    }
}
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
        font-size: 2.5rem;
        color: #102a63;
        text-align: center;
        margin-bottom: 20px;
        text-shadow: 0 2px 5px rgba(16, 42, 99, 0.3);
    }

    form {
        background: white;
        padding: 20px;
        border-radius: 15px;
        box-shadow: 0 4px 20px rgba(16, 42, 99, 0.15);
        max-width: 600px;
        margin: auto;
    }

    label {
        font-weight: bold;
        margin-top: 10px;
        display: block;
    }

    input[type="text"],
    input[type="date"],
    select,
    textarea {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border: 1px solid #d1d9ff;
        border-radius: 5px;
        font-size: 1rem;
        transition: border-color 0.3s ease;
    }

    input[type="text"]:focus,
    input[type="date"]:focus,
    select:focus,
    textarea:focus {
        border-color: #1e3c72;
        outline: none;
    }

    textarea {
        height: 100px;
        resize: none;
    }

    .btn-submit {
        background: linear-gradient(135deg, #1e3c72, #2a5298);
        color: #f5f3f4;
        font-weight: 600;
        padding: 12px 20px;
        border: none;
        border-radius: 30px;
        cursor: pointer;
        transition: background 0.3s ease, box-shadow 0.3s ease;
        margin-top: 15px;
        width: 48%;
        display: inline-block;
    }

    .btn-submit:hover {
        background: linear-gradient(135deg, #2a5298, #1e3c72);
        box-shadow: 0 4px 12px rgba(42, 82, 152, 0.4);
    }

    .btn-cancel {
        background: #a5a5a5;
        color: white;
        font-weight: 600;
        padding: 12px 20px;
        border: none;
        border-radius: 30px;
        cursor: pointer;
        transition: background 0.3s ease, box-shadow 0.3s ease;
        margin-top: 15px;
        width: 48%;
        display: inline-block;
        text-align: center;
        text-decoration: none;
        user-select: none;
    }

    .btn-cancel:hover {
        background: #858585;
        box-shadow: 0 4px 12px rgba(133, 133, 133, 0.6);
    }

    .btn-container {
        margin-top: 15px;
        display: flex;
        justify-content: space-between;
        gap: 4%;
    }
</style>

<h1><?= $proses ?> Paramedik</h1>

<form method="POST" action="paramedik_proses.php">
    <label>Nama:</label>
    <input type="text" name="nama" value="<?= htmlspecialchars($nama) ?>" required>

    <label>Gender:</label>
    <select name="gender" required>
        <option value="L" <?= ($gender == 'L') ? 'selected' : '' ?>>Laki-laki</option>
        <option value="P" <?= ($gender == 'P') ? 'selected' : '' ?>>Perempuan</option>
    </select>

    <label>Tempat Lahir:</label>
    <input type="text" name="tmp_lahir" value="<?= htmlspecialchars($tmp_lahir) ?>" required>

    <label>Tanggal Lahir:</label>
    <input type="date" name="tgl_lahir" value="<?= htmlspecialchars($tgl_lahir) ?>" required>

    <label>Kategori:</label>
    <input type="text" name="kategori" value="<?= htmlspecialchars($kategori) ?>" required>

    <label>Telpon:</label>
    <input type="text" name="telpon" value="<?= htmlspecialchars($telpon) ?>" required>

    <label>Alamat:</label>
    <textarea name="alamat" required><?= htmlspecialchars($alamat) ?></textarea>

    <?php if($id): ?>
        <input type="hidden" name="id_edit" value="<?= htmlspecialchars($id) ?>">
    <?php endif; ?>

    <div class="btn-container">
        <input type="submit" name="proses" value="<?= $proses ?>" class="btn-submit">
        <a href="index.php" class="btn-cancel">Batal</a>
    </div>
</form>
