<?php
require_once 'BukuORM.php';
require_once 'KategoriORM.php';
require_once 'helper.php';

$id = $_GET['id'] ?? null;
$buku = BukuORM::findOne($id);

if (!$buku) {
    echo 'Data buku tidak ditemukan';
    exit;
}

$kategori = KategoriORM::findOne($buku->kategori_id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Buku</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; background: white; padding: 30px; border-radius: 5px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h1 { color: #333; margin-bottom: 20px; }
        .row { margin-bottom: 20px; padding: 10px 0; border-bottom: 1px solid #eee; }
        .row:last-child { border-bottom: none; }
        .label { font-weight: bold; color: #555; display: block; margin-bottom: 5px; }
        .value { color: #333; font-size: 16px; }
        .deskripsi { background: #f9f9f9; padding: 10px; border-left: 3px solid #5cb85c; }
        .actions { margin-top: 30px; padding-top: 20px; border-top: 2px solid #eee; }
        .actions a { display: inline-block; padding: 10px 15px; margin-right: 10px; text-decoration: none; border-radius: 3px; }
        .edit { background: #0066cc; color: white; }
        .edit:hover { background: #0052a3; }
        .delete { background: #dc3545; color: white; }
        .delete:hover { background: #c82333; }
        .back { background: #6c757d; color: white; }
        .back:hover { background: #5a6268; }
    </style>
</head>
<body>
    <div class="container">
        <h1><?= htmlspecialchars($buku->judul); ?></h1>

        <div class="row">
            <span class="label">Penulis:</span>
            <span class="value"><?= htmlspecialchars($buku->penulis); ?></span>
        </div>

        <div class="row">
            <span class="label">Kategori:</span>
            <span class="value"><?= $kategori ? htmlspecialchars($kategori->nama) : 'N/A'; ?></span>
        </div>

        <div class="row">
            <span class="label">Harga:</span>
            <span class="value"><?= format_rupiah($buku->harga); ?></span>
        </div>

        <div class="row">
            <span class="label">Stok:</span>
            <span class="value"><?= $buku->stok; ?> unit</span>
        </div>

        <div class="row">
            <span class="label">Deskripsi:</span>
            <div class="value deskripsi"><?= nl2br(htmlspecialchars($buku->deskripsi)); ?></div>
        </div>

        <div class="row">
            <span class="label">Tanggal Ditambahkan:</span>
            <span class="value"><?= format_tanggal(substr($buku->tanggal_tambah, 0, 10)); ?></span>
        </div>

        <div class="actions">
            <a href="form_edit.php?id=<?= $buku->id; ?>" class="edit">Edit</a>
            <a href="delete.php?id=<?= $buku->id; ?>" class="delete" onclick="return confirm('Yakin ingin menghapus buku ini?');">Delete</a>
            <a href="list_buku.php" class="back">Kembali ke Daftar</a>
        </div>
    </div>
</body>
</html>
