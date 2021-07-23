<?php
include('config.php');
$koneksi = new database();
$konkesi->edit_peminjam($_POST['kode_peminjam'], $_POST['nama_peminjam'], $_POST['jenis_kelamin'], $_POST['tanggal_lahir'], $_POST['alamat'], $_POST['pekerjaan'], $_POST['password']);
header('location: browse_data.php');
