<?php 
    include('config.php');
    $koneksi = new database();
    $koneksi->tambah_data_penerbit($_POST['kode_penerbit'], $_POST['nama_penerbit']);
    header('location: tampil_data_penerbit.php')
?>