<?php
require_once 'KategoriORM.php';

try {
    $id = $_GET['id'] ?? null;

    if (empty($id)) {
        throw new Exception('ID kategori tidak valid.');
    }

    // ambil data dari database
    $kategori = KategoriORM::findOne($id);

    if (!$kategori) {
        throw new Exception('Data kategori tidak ditemukan.');
    }

    // hapus data
    $kategori->delete();

    // redirect ke daftar setelah sukses
    header('Location: list_kategori.php');
    exit;

} catch (Exception $e) {
    // tampilkan pesan error yang aman untuk debugging
    echo '<div style="padding:20px; background:#fee; color:#c00; border-radius:4px;">';
    echo 'Error deleting kategori: ' . htmlspecialchars($e->getMessage());
    if (class_exists('ORM')) {
        echo '<pre style="background:#f0f0f0; padding:10px; margin-top:10px;">Last query: ' . htmlspecialchars(ORM::get_last_query()) . '</pre>';
    }
    echo '</div>';
    echo '<p><a href="list_kategori.php">Kembali ke Daftar</a></p>';
}
