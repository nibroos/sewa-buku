<?php 
    include'config.php';
    $db = new database();
    $username = $_POST['username'];
    $password = $_POST['password'];

    foreach( $db->login($username) as $x ) {
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $akses_id             = $x['akses_id'];
        $pass                 = $x['password'];
        // memeriksa user yg login sebagai admin atau peminjam
        if (($akses_id == '1') AND ($password == $pass)) {
            header("Location: halaman_admin.php");
        }
        elseif (($akses_id == '2') AND ($password == $pass)) {
            header("Location: halaman_peminjam.php");
        } 
        else {
            header("Location: login.php");
        }
    }
?>