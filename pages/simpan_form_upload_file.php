<?php
    $cekdir=is_dir("foto_profil");
    if ($cekdir) {
        opendir("foto_profil");
    }
    else {
        mkdir("foto_profil");
        chmod("foto_profil", 0755);
        opendir("foto_profil");
    }
    $lokasi_foto_profil = $_FILES['foto_profil']['tmp_name'];
    $nama_foto_profil = $_FILES['foto_profil']['name'];
    $dir_foto_profil = "foto_profil/$nama_foto_profil";
    move_uploaded_file($lokasi_foto_profil, $dir_foto_profil);
?>
