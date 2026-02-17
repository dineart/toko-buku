<?php
require_once 'KategoriORM.php';

$id = $_GET['id'] ?? null;
$kategori = KategoriORM::findOne($id);

if (!$kategori) {
    echo 'Data kategori tidak ditemukan';
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form Edit Kategori</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; margin: 0; padding: 20px; }
        form { background: white; padding: 30px; border-radius: 5px; box-shadow: 0 0 10px rgba(0,0,0,0.1); max-width: 500px; margin: 50px auto; }
        h2 { text-align: center; color: #333; }
        div { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; color: #555; font-weight: bold; }
        input[type="text"], textarea { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        textarea { resize: vertical; }
        button { width: 100%; padding: 10px; background-color: #0066cc; border: none; border-radius: 4px; color: white; font-size: 16px; cursor: pointer; }
        button:hover { background-color: #0052a3; }
        a { display: block; text-align: center; margin-top: 10px; color: #666; text-decoration: none; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <form method="post" action="update_kategori.php">
        <h2>✏️ Edit Kategori</h2>
        
        <input type="hidden" name="id" value="<?= $kategori->id; ?>">

        <div>
            <label for="nama">Nama Kategori:</label>
            <input type="text" id="nama" name="nama" value="<?= htmlspecialchars($kategori->nama); ?>" required>
        </div>

        <div>
            <label for="deskripsi">Deskripsi:</label>
            <textarea id="deskripsi" name="deskripsi" rows="4"><?= htmlspecialchars($kategori->deskripsi); ?></textarea>
        </div>

        <button type="submit">Update Kategori</button>
        <a href="list_kategori.php">Kembali ke Daftar</a>
    </form>
</body>
</html>
