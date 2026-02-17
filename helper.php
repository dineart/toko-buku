<?php

function format_rupiah($angka){
    $hasil_rupiah = "Rp " . format_uang($angka);
    return $hasil_rupiah;
}

function format_uang($angka){
    $nilai = number_format($angka, 0, ',', '.');
    return $nilai;
}

function format_tanggal($tanggal){
    $arr_bulan = array(1=>'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
    $tgl = explode('-', $tanggal);
    return $tgl[2] . ' ' . $arr_bulan[(int)$tgl[1]] . ' ' . $tgl[0];
}

?>
