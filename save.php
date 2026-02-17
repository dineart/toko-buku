<?php
require_once 'BukuORM.php';
require_once 'helper.php';

try {
    // konversi array jadi object dari $_POST
    $post = (object) $_POST;

    // validasi sederhana
    if (empty($post->judul) || empty($post->penulis) || empty($post->kategori_id)) {
        throw new Exception('Field "judul", "penulis", dan "kategori_id" wajib diisi.');
    }

    // siapkan data baru
    $buku = BukuORM::create();

    // isi kolom dengan nilai dari form
    $buku->judul = $post->judul;
    $buku->penulis = $post->penulis;
    $buku->kategori_id = $post->kategori_id;
    $buku->harga = isset($post->harga) ? intval($post->harga) : 0;
    $buku->stok = isset($post->stok) ? intval($post->stok) : 0;
    $buku->deskripsi = isset($post->deskripsi) ? $post->deskripsi : '';
    $buku->tanggal_tambah = date("Y-m-d H:i:s");

    // simpan data
    $buku->save();

    // redirect ke daftar setelah sukses
    header('Location: list_buku.php');
    exit;

} catch (Exception $e) {
    // tampilkan pesan error yang aman untuk debugging
    echo '<div style="padding:20px; background:#fee; color:#c00; border-radius:4px;">';
    echo 'Error saving buku: ' . htmlspecialchars($e->getMessage());
    if (class_exists('ORM')) {
        echo '<pre style="background:#f0f0f0; padding:10px; margin-top:10px;">Last query: ' . htmlspecialchars(ORM::get_last_query()) . '</pre>';
    }
    echo '</div>';
    echo '<p><a href="form_tambah.php">Kembali ke form</a></p>';
}
