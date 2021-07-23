<?php
include "pages/config.php";
$db = new Database();
$username = $_POST['username'];
$password = $_POST['password'];

foreach ($db->login($username, $password) as $x) {
  session_start();
  $_SESSION["username"] = $username;
  $_SESSION["password"] = $password;
  $akses_id = $x['akses_id'];
  $pass = $x['password'];
  //memeriksa user login sebagai admin atau peminjam
  if (($akses_id == '1') and ($password == $pass)) {
    header('Location: admin_menu.php');
  } else if (($akses_id == '2') and ($password == $pass)) {
    header('Location: index.php');
  } else {
    header('Location: login.php');
  }
}
