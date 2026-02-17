<?php
require_once 'config.php';
require_once 'KategoriORM.php';
require_once 'helper.php';

$q = isset($_GET['q']) ? trim($_GET['q']) : '';

if ($q !== '') {
    // cari kategori berdasarkan nama
    $rows = ORM::for_table('kategori')
        ->where_raw('nama LIKE ?', array('%' . $q . '%'))
        ->order_by_desc('id')
        ->find_many();
} else {
    // ambil semua kategori
    $rows = KategoriORM::findMany();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Daftar Kategori (ORM)</title>
        <style>
            body { font-family: Arial, sans-serif; background: #f4f4f4; padding: 20px; }
            .container { max-width: 900px; margin: 0 auto; background: white; padding: 20px; border-radius: 5px; }
            h1 { color: #333; border-bottom: 3px solid #5cb85c; padding-bottom: 10px; }
            table, th, td { border: 1px solid #b8b8b8; padding: 8px 12px; }
            table { border-collapse: collapse; width: 100%; }
            form { margin-bottom: 1.5em; padding: 1em; background: #f9f9f9; border-radius: 4px; }
            form input, form button { padding: 8px; margin-right: 10px; border: 1px solid #ccc; border-radius: 3px; }
            form button { background: #5cb85c; color: white; cursor: pointer; }
            form button:hover { background: #4cae4c; }
            a { color: #0066cc; text-decoration: none; margin-right: 10px; }
            a:hover { text-decoration: underline; }
            .add-btn { margin-bottom: 1em; }
            .add-btn a { background: #5cb85c; color: white; padding: 8px 15px; border-radius: 3px; }
            .add-btn a:hover { background: #4cae4c; }
            tr:nth-child(even) { background: #f9f9f9; }
            tr:first-child { background: #5cb85c; color: white; font-weight: bold; }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>📂 Daftar Kategori Buku</h1>
            <p style="margin-top: 0; color: #666;">
                <a href="list_buku.php" style="color: #0066cc; font-weight: bold;">📚 Kembali ke Daftar Buku</a>
            </p>

            <form method="get" action="">
                <input type="text" name="q" placeholder="Cari nama kategori" value="<?= htmlspecialchars($q); ?>" style="width: 300px;">
                <button type="submit">Cari</button>
                <?php if ($q !== ''): ?>
                    <a href="list_kategori.php" style="margin-left: 10px;">Reset</a>
                <?php endif; ?>
            </form>

            <div class="add-btn">
                <a href="form_tambah_kategori.php">+ Tambah Kategori</a>
            </div>

            <table>
                <tr>
                    <td>No</td>
                    <td>Nama Kategori</td>
                    <td>Deskripsi</td>
                    <td>Aksi</td>
                </tr>
                <?php if (count($rows) > 0): ?>
                    <?php foreach ($rows as $key => $kategori): ?>
                    <tr>
                        <td><?= $key + 1; ?></td>
                        <td><?= htmlspecialchars($kategori->nama); ?></td>
                        <td><?= htmlspecialchars(substr($kategori->deskripsi, 0, 50)); ?></td>
                        <td>
                            <a href="edit_kategori.php?id=<?= $kategori->id; ?>">Edit</a>
                            <a href="delete_kategori.php?id=<?= $kategori->id; ?>" onclick="return confirm('Yakin hapus?');" style="color: red;">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" style="text-align: center; color: #999;">Tidak ada data</td>
                    </tr>
                <?php endif; ?>
            </table>

            <br>
            <a href="list_buku.php">← Kembali ke Daftar Buku</a>
        </div>
    </body>
</html>
