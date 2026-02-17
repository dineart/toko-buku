<?php
require_once 'KategoriORM.php';

try {
    // konversi array jadi object dari $_POST
    $post = (object) $_POST;

    // validasi sederhana
    if (empty($post->nama)) {
        throw new Exception('Field "nama" kategori wajib diisi.');
    }

    // siapkan data baru
    $kategori = KategoriORM::create();

    // isi kolom dengan nilai dari form
    $kategori->nama = $post->nama;
    $kategori->deskripsi = isset($post->deskripsi) ? $post->deskripsi : '';

    // simpan data
    $kategori->save();

    // redirect ke daftar setelah sukses
    header('Location: list_kategori.php');
    exit;

} catch (Exception $e) {
    // tampilkan pesan error yang aman untuk debugging
    echo '<div style="padding:20px; background:#fee; color:#c00; border-radius:4px;">';
    echo 'Error saving kategori: ' . htmlspecialchars($e->getMessage());
    if (class_exists('ORM')) {
        echo '<pre style="background:#f0f0f0; padding:10px; margin-top:10px;">Last query: ' . htmlspecialchars(ORM::get_last_query()) . '</pre>';
    }
    echo '</div>';
    echo '<p><a href="form_tambah_kategori.php">Kembali ke form</a></p>';
}
