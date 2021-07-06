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
    <style>
        td, th {
            padding: 5px;
        }
        td:first-child {
            text-align: center;
        }
    </style>
</head>
<body>
    <?php
        include'menu_admin.html';
    ?>
    <table border="1" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Kode Peminjam</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
            <th>Pekerjaan</th>
            <th>Foto</th>
            <th>Edit</th>
            <th>Hapus</th>
        </tr>
        <?php
            $no = 1; 
            foreach ($db->tampil_data() as $x) {
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $x['kode_peminjam'];?></td>
            <td><?php echo $x['nama_peminjam'];?></td>
            <td><?php echo $x['keterangan_jk'];?></td>
            <td><?php 
                $tanggal_lahir = $x['tanggal_lahir'];
                $tanggal_lahir_ganti_format = date("d-m-Y", strtotime($tanggal_lahir));
                echo $tanggal_lahir_ganti_format;
            ?>
            </td>
            <td><?php echo $x['alamat'];?></td>
            <td><?php echo $x['pekerjaan'];?></td>
            <td>
            <?php 
                if( empty($x['foto']) ) {
            ?>
                <font color="red">Belum ada foto</font>
            <?php 
                } else {
            ?>
                <img src="<?php echo $x['foto']; ?>" alt="" width="50", height="50">
            <?php } ?>
            </td>
            <td><a href="edit_data_peminjam.php?id=<?php echo $x['kode_peminjam']; ?>">Edit</a></td>
            <td><a href="hapus_data_peminjam.php?id=<?php echo $x['kode_peminjam']; ?>">Hapus</a></td>
        </tr>
        <?php
            }
        ?>
    </table>
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