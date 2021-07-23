<?php
    include('config.php');
    $koneksi = new database();
    $koneksi->tambah_data_buku($_POST['kode_buku'], $_POST['judul_buku'], $_POST['kode_pengarang'],
            $_POST['kode_jenis_buku'], $_POST['kode_penerbit'], $_POST['isbn'], $_POST['tahun'],
            $_POST['deskripsi'], $_POST['jumlah']);
    header('location:browse_data.php');
?>