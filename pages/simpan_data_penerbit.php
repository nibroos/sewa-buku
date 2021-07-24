<?php
ob_start();
include('config.php');
$koneksi = new database();
$koneksi->tambah_data_penerbit($_POST['kode_penerbit'], $_POST['nama_penerbit']);
header('location:browse_data.php');
ob_flush();
