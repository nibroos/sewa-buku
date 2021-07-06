<?php
    session_start();
    $username = $_SESSION['username'];
    include'config.php';
    $db = new database();

    foreach($db->login($username) as $x) {
        $akses_id = $x['akses_id'];
        if ( $akses_id == '2') {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
            <?php 
                include'menu_peminjam.html';
                $data_peminjam = $db->tampil_peminjam($username);
            ?>
            <div class="container">
                <form action="simpan_edit_peminjam.php" method="post">
                    <input type="hidden" name="kode_peminjam" value="<?php echo $data_peminjam[0]['kode_peminjam']; ?>">
                    <table>
                        <tr>
                            <td>Kode Peminjam</td>
                            <td><input type="text" name="kode_peminjam" value="<?php echo $data_peminjam[0]['kode_peminjam']; ?>" disabled></td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td><input type="text" name="nama_peminjam" value="<?php echo $data_peminjam[0]['nama_peminjam']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>
                                <select name="jenis_kelamin">
                                    <?php
                                        $result = $db->tampil_data_jenis_kelamin();
                                        $no = 1;
                                        $kode_jenis_kelamin = $data_peminjam[0]['kode_jk'];
                                        foreach ($result as $x) {
                                            echo "<option value=".$x['kode_jk'];
                                            if ($x['kode_jk'] == $kode_jenis_kelamin) {echo " selected=selected";}
                                            echo ">" . $x['keterangan_jk']."</option>";
                                        } 
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir</td>
                            <td><input type="date" name="tanggal_lahir" value="<?php echo $data_peminjam[0]['tanggal_lahir']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td><textarea name="alamat"><?php echo $data_peminjam[0]['alamat']; ?></textarea></td>
                        </tr>
                        <tr>
                            <td>Pekerjaan</td>
                            <td><input type="text" name="pekerjaan" value="<?php echo $data_peminjam[0]['pekerjaan']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td><input type="text" name="password" value="<?php echo $data_peminjam[0]['password']; ?>"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" value="Simpan"></td>
                        </tr>
                    </table>
                </form>
            </div>
</body>
</html>
<?php 
        }
        else {
            echo "Anda belum login";
            header("Location: login.php");
        }
    }
?>