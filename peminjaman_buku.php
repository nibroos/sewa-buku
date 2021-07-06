<?php 
    session_start();
    $username = $_SESSION['username'];
    include'config.php';
    $db = new database();

    foreach($db->login($username) as $x) {
        $akses_id = $x['akses_id'];
        if ( $akses_id == '1') {
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
        include'menu_admin.html';
    ?>
    <h3>Peminjaman Buku</h3>
    <form action="simpan_peminjaman.php" method="post">
        <table>
            <tr>
                <td>Judul Buku</td>
                <td>
                    <select name="kode_buku">
                        <option value="--"></option>
                        <?php 
                            $no = 1;
                            foreach($db->ambil_data_buku() as $x) {
                                echo '<option value="'.$x['kode_buku'].'">'.$x['judul_buku'].'</option>';
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Peminjam</td>
                <td>
                    <select name="kode_peminjam">
                        <option value="--"></option>
                        <?php 
                            $no = 1;
                            foreach($db->ambil_data_peminjam() as $x) {
                                echo '<option value="'.$x['kode_peminjam'].'">'.$x['nama_peminjam'].'</option>';
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Simpan"></td>
            </tr>
        </table>
    </form>
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