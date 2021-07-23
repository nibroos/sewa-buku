<?php
    $cekdir=is_dir("laporan");
    if ($cekdir) {
        opendir("laporan");
    }
    else {
        mkdir("laporan");
        chmod("laporan", 0755);
        opendir("laporan");
    }
    $daftar_list = array("doc", "docx", "pdf");
    $nama_file = $_FILES['laporan']['name'];
    $pecah = explode(".", $nama_file);
    $eksistensi= $pecah[1];
    if (in_array($eksistensi, $daftar_list)) {
        $lokasi_laporan     = $_FILES['laporan']['tmp_name'];
        $nama_laporan       = $_FILES['laporan']['name'];
        $dir_foto_laporan   = "laporan/$nama_laporan";
        move_uploaded_file($lokasi_laporan, $dir_foto_laporan);
    }
    else {
        echo "Type file harus word atau pdf <br>";
    }
?>
