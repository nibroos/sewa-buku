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
    ?>
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Judul Buku</th>
                    <th scope="col">Tanggal Pinjam</th>
                    <th scope="col">Tanggal Kembali</th>
                    <th scope="col">Status Peminjaman</th>
                </tr>
            </thead>    
            <tbody>
            <?php 
                $no = 1;
                foreach($db->tampil_peminjaman_peminjam($username) as $x) {
            ?>
                <tr>
                    <th scope="row"><?php echo $no++;?></th>
                    <td><?php echo $x['judul_buku']; ?></td>
                    <td><?php 
                        $tanggal_pinjam = $x['tanggal_pinjam'];
                        $tanggal_pinjam1 = date("d F Y", strtotime($tanggal_pinjam));
                        echo $tanggal_pinjam1;
                    ?></td>
                    <td><?php 
                        $tanggal_kembali = $x['tanggal_kembali'];
                        $tanggal_kembali1 = date("d F Y", strtotime($tanggal_kembali));
                        echo $tanggal_kembali1;
                    ?></td>
                    <td><?php 
                        $status_peminjaman = $x['status'];
                        if ($status_peminjaman == '1') {
                            $tanggal_hari_ini = date('d F Y ');
                            if (strtotime($tanggal_hari_ini) < strtotime($tanggal_kembali1)) {
                                echo "Belum dikembalikan";
                            } else {
                                $waktu_kembali2 = date_create($tanggal_kembali1);
                                $tanggal_hari_ini = date("d F Y");
                                $tanggal_hari_ini2 = date_create($tanggal_hari_ini);
                                $diff = date_diff($waktu_kembali2, $tanggal_hari_ini2);
                                echo "Belum dikembalikan <b>(terlambat".$diff->days." hari)</b>";
                            }
                        } elseif($status_peminjaman == '2') {
                            echo "Sudah dikembalikan";
                        }
                    ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
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