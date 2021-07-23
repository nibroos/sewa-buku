<?php
include('config.php');
$koneksi = new database();
$koneksi->tambah_data_pengarang($_POST['kode_pengarang'], $_POST['nama_pengarang']);
header('location:browse_data.php');
