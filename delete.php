<?php
require_once 'BukuORM.php';

try {
    $id = $_GET['id'] ?? null;

    if (empty($id)) {
        throw new Exception('ID buku tidak valid.');
    }

    // ambil data dari database
    $buku = BukuORM::findOne($id);

    if (!$buku) {
        throw new Exception('Data buku tidak ditemukan.');
    }

    // hapus data
    $buku->delete();

    // redirect ke daftar setelah sukses
    header('Location: list_buku.php');
    exit;

} catch (Exception $e) {
    // tampilkan pesan error yang aman untuk debugging
    echo '<div style="padding:20px; background:#fee; color:#c00; border-radius:4px;">';
    echo 'Error deleting buku: ' . htmlspecialchars($e->getMessage());
    if (class_exists('ORM')) {
        echo '<pre style="background:#f0f0f0; padding:10px; margin-top:10px;">Last query: ' . htmlspecialchars(ORM::get_last_query()) . '</pre>';
    }
    echo '</div>';
    echo '<p><a href="list_buku.php">Kembali ke Daftar</a></p>';
}
