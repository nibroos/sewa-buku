<?php 
    include('config.php');
    $koneksi = new database();
    $koneksi->tambah_data_jenis_buku($_POST['kode_jenis_buku'], $_POST['nama_jenis_buku']);
    header('location: tampil_data_jenis_buku.php')
?>