<?php 
    include('config.php');
    $koneksi = new database();
    $koneksi->edit_peminjam($_POST['kode_peminjam'],$_POST['nama_peminjam'],$_POST['jenis_kelamin'],$_POST['tanggal_lahir'],$_POST['alamat'],$_POST['pekerjaan'], $_POST['password']);
    header('location: setting_peminjam.php');
?>