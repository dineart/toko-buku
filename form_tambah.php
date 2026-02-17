<?php
require_once 'KategoriORM.php';

$list_kategori = KategoriORM::findMany();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form Tambah Buku</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; margin: 0; padding: 20px; }
        form { background: white; padding: 30px; border-radius: 5px; box-shadow: 0 0 10px rgba(0,0,0,0.1); max-width: 500px; margin: 50px auto; }
        h2 { text-align: center; color: #333; }
        div { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; color: #555; font-weight: bold; }
        input[type="text"], input[type="number"], select, textarea { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        textarea { resize: vertical; }
        button { width: 100%; padding: 10px; background-color: #5cb85c; border: none; border-radius: 4px; color: white; font-size: 16px; cursor: pointer; }
        button:hover { background-color: #4cae4c; }
        .btn-secondary { background-color: #6c757d; margin-top: 10px; }
        .btn-secondary:hover { background-color: #5a6268; }
    </style>
</head>
<body>
    <form method="post" action="save.php">
        <h2>Tambah Buku Baru</h2>
        
        <div>
            <label for="judul">Judul Buku:</label>
            <input type="text" id="judul" name="judul" required>
        </div>

        <div>
            <label for="penulis">Penulis:</label>
            <input type="text" id="penulis" name="penulis" required>
        </div>

        <div>
            <label for="kategori_id">Kategori:</label>
            <select name="kategori_id" id="kategori_id" required>
                <option value="">-- Pilih Kategori --</option>
                <?php foreach ($list_kategori as $kategori) : ?>
                <option value="<?= $kategori->id; ?>">
                    <?= htmlspecialchars($kategori->nama); ?>
                </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div>
            <label for="harga">Harga:</label>
            <input type="number" id="harga" name="harga" step="1000" required>
        </div>

        <div>
            <label for="stok">Stok:</label>
            <input type="number" id="stok" name="stok" value="0" required>
        </div>

        <div>
            <label for="deskripsi">Deskripsi:</label>
            <textarea id="deskripsi" name="deskripsi" rows="4"></textarea>
        </div>

        <button type="submit">Simpan Buku</button>
        <a href="list_buku.php" style="display: block; text-align: center; margin-top: 10px; color: #666;">Kembali ke Daftar</a>
    </form>
</body>
</html>
