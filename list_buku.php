<?php
require_once 'config.php';
require_once 'BukuORM.php';
require_once 'KategoriORM.php';
require_once 'helper.php';

$q = isset($_GET['q']) ? trim($_GET['q']) : '';

if ($q !== '') {
    // cari pada kolom judul dan penulis menggunakan ORM (parameter binding)
    $rows = ORM::for_table('buku')
        ->where_raw('judul LIKE ? OR penulis LIKE ?', array('%' . $q . '%', '%' . $q . '%'))
        ->order_by_desc('id')
        ->find_many();
} else {
    // ambil semua
    $rows = BukuORM::findMany();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Daftar Buku (ORM)</title>
        <style>
            body { font-family: Arial, sans-serif; background: #f4f4f4; padding: 20px; }
            .container { max-width: 1000px; margin: 0 auto; background: white; padding: 20px; border-radius: 5px; }
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
            tr:first-child { background: #fffcf5; font-weight: bold; }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Daftar Buku (ORM)</h1>

            <form method="get" action="">
                <input type="text" name="q" placeholder="Cari judul atau penulis" value="<?= htmlspecialchars($q); ?>" style="width: 300px;">
                <button type="submit">Cari</button>
                <?php if ($q !== ''): ?>
                    <a href="list_buku.php" style="margin-left: 10px;">Reset</a>
                <?php endif; ?>
            </form>

            <div class="add-btn">
                <a href="form_tambah.php">+ Tambah Buku</a>
            </div>

            <table>
                <tr>
                    <td>No</td>
                    <td>Judul</td>
                    <td>Penulis</td>
                    <td>Kategori</td>
                    <td>Harga</td>
                    <td>Stok</td>
                    <td>Aksi</td>
                </tr>
                <?php if (count($rows) > 0): ?>
                    <?php foreach ($rows as $key => $buku): ?>
                    <tr>
                        <td><?= $key + 1; ?></td>
                        <td><?= htmlspecialchars($buku->judul); ?></td>
                        <td><?= htmlspecialchars($buku->penulis); ?></td>
                        <td>
                            <?php 
                            $kategori = KategoriORM::findOne($buku->kategori_id);
                            echo $kategori ? htmlspecialchars($kategori->nama) : 'N/A';
                            ?>
                        </td>
                        <td><?= format_rupiah($buku->harga); ?></td>
                        <td><?= $buku->stok; ?></td>
                        <td>
                            <a href="detail_buku.php?id=<?= $buku->id; ?>">Detail</a>
                            <a href="form_edit.php?id=<?= $buku->id; ?>">Edit</a>
                            <a href="delete.php?id=<?= $buku->id; ?>" onclick="return confirm('Yakin hapus?');" style="color: red;">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" style="text-align: center; color: #999;">Tidak ada data</td>
                    </tr>
                <?php endif; ?>
            </table>
        </div>
    </body>
</html>
