<?php
require_once 'KategoriORM.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form Tambah Kategori</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; margin: 0; padding: 20px; }
        form { background: white; padding: 30px; border-radius: 5px; box-shadow: 0 0 10px rgba(0,0,0,0.1); max-width: 500px; margin: 50px auto; }
        h2 { text-align: center; color: #333; }
        div { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; color: #555; font-weight: bold; }
        input[type="text"], textarea { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        textarea { resize: vertical; }
        button { width: 100%; padding: 10px; background-color: #5cb85c; border: none; border-radius: 4px; color: white; font-size: 16px; cursor: pointer; }
        button:hover { background-color: #4cae4c; }
        a { display: block; text-align: center; margin-top: 10px; color: #666; text-decoration: none; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <form method="post" action="save_kategori.php">
        <h2>📂 Tambah Kategori Baru</h2>
        
        <div>
            <label for="nama">Nama Kategori:</label>
            <input type="text" id="nama" name="nama" placeholder="Contoh: Fiksi, Teknologi, dst" required>
        </div>

        <div>
            <label for="deskripsi">Deskripsi:</label>
            <textarea id="deskripsi" name="deskripsi" rows="4" placeholder="Deskripsi singkat kategori ini"></textarea>
        </div>

        <button type="submit">Simpan Kategori</button>
        <a href="list_kategori.php">Kembali ke Daftar</a>
    </form>
</body>
</html>
