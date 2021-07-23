<?php
class database
{
  var $host     = "localhost";
  var $username = "root";
  var $password = "";
  var $database = "sewa_buku";
  var $koneksi  = "";

  function __construct()
  {
    $this->koneksi = mysqli_connect($this->host, $this->username, $this->password, $this->database);
    if (mysqli_connect_errno()) {
      echo "Koneksi database gagal : " . mysqli_connect_error();
    }
  }

  function tampil_data()
  {
    $data = mysqli_query($this->koneksi, "SELECT a.*, b.* FROM data_peminjam a INNER JOIN jenis_kelamin b ON b.kode_jk = a.jenis_kelamin");
    while ($row = mysqli_fetch_array($data)) {
      $hasil[] = $row;
    }
    return $hasil;
    $this->koneksi->affected_rows;
  }
  function tampil_data_jenis_kelamin()
  {
    $data_jenis_kelamin = mysqli_query($this->koneksi, "SELECT * FROM jenis_kelamin");
    while ($row_jenis_kelamin = mysqli_fetch_array($data_jenis_kelamin)) {
      $hasil_jenis_kelamin[] = $row_jenis_kelamin;
    }
    return $hasil_jenis_kelamin;
  }
  // fungsi 1
  // function tambah_data_peminjam($kode_peminjam, $nama_peminjam, $jenis_kelamin, $tanggal_lahir, $alamat, $pekerjaan) {
  //     mysqli_query($this->koneksi, " INSERT INTO data_peminjam VALUES ('','$kode_peminjam','$nama_peminjam','$jenis_kelamin', '$tanggal_lahir', '$alamat', '$pekerjaan','','')");
  // }

  function tambah_data_peminjam($kode_peminjam, $nama_peminjam, $jenis_kelamin, $tanggal_lahir, $alamat, $pekerjaan, $foto)
  {
    mysqli_query($this->koneksi, "INSERT INTO data_peminjam 
                    VALUES ('','$kode_peminjam','$nama_peminjam','$jenis_kelamin', '$tanggal_lahir', '$alamat', '$pekerjaan','','$foto')");
    $ambil_id = mysqli_query($this->koneksi, "SELECT id FROM data_peminjam ORDER BY id DESC LIMIT 1");
    $row_id = mysqli_fetch_array($ambil_id);
    $hasil_id = $row_id['id'];
    mysqli_query($this->koneksi, "INSERT INTO user VALUES('', '$kode_peminjam', '$kode_peminjam', '2', '$hasil_id')");
  }
  function kode_peminjam($kode_peminjam)
  {
    $data_peminjam = mysqli_query($this->koneksi, "SELECT a.*, b.* FROM data_peminjam a INNER JOIN jenis_kelamin b ON b.kode_jk = a.jenis_kelamin WHERE a.kode_peminjam='$kode_peminjam'");
    while ($row_peminjam = mysqli_fetch_assoc($data_peminjam)) {
      $hasil_peminjam[] = $row_peminjam;
    }
    return $hasil_peminjam;
  }
  function edit_data_peminjam($kode_peminjam, $nama_peminjam, $jenis_kelamin, $tanggal_lahir, $alamat, $pekerjaan, $foto)
  {
    mysqli_query($this->koneksi, "UPDATE data_peminjam SET nama_peminjam='$nama_peminjam', jenis_kelamin='$jenis_kelamin', 
                tanggal_lahir='$tanggal_lahir', alamat='$alamat', pekerjaan='$pekerjaan', foto='$foto' 
                WHERE kode_peminjam = '$kode_peminjam'");
  }
  function hapus_data_peminjam($kode_peminjam)
  {
    mysqli_query($this->koneksi, "DELETE FROM data_peminjam WHERE kode_peminjam = '$kode_peminjam'");
  }
  function tambah_data_jenis_buku($kode_jenis_buku, $nama_jenis_buku)
  {
    mysqli_query($this->koneksi, "INSERT INTO data_jenis_buku VALUES('', '$kode_jenis_buku', '$nama_jenis_buku')");
  }
  function tampil_data_jenis_buku()
  {
    $data = mysqli_query($this->koneksi, "SELECT * FROM data_jenis_buku");
    while ($row = mysqli_fetch_array($data)) {
      $hasil[] = $row;
    }
    return $hasil;
  }
  function tambah_data_penerbit($kode_penerbit, $nama_penerbit)
  {
    mysqli_query($this->koneksi, "INSERT INTO data_penerbit VALUES('', '$kode_penerbit', '$nama_penerbit')");
  }
  function tampil_data_penerbit()
  {
    $data = mysqli_query($this->koneksi, "SELECT * FROM data_penerbit");
    while ($row = mysqli_fetch_array($data)) {
      $hasil[] = $row;
    }
    return $hasil;
  }
  function tambah_data_pengarang($kode_pengarang, $nama_pengarang)
  {
    mysqli_query($this->koneksi, "INSERT INTO data_pengarang VALUES('', '$kode_pengarang', '$nama_pengarang')");
  }
  function tampil_data_pengarang()
  {
    $data = mysqli_query($this->koneksi, "SELECT * FROM data_pengarang");
    while ($row = mysqli_fetch_array($data)) {
      $hasil[] = $row;
    }
    return $hasil;
  }
  function ambil_data_pengarang()
  {
    $data_pengarang = mysqli_query($this->koneksi, "SELECT * FROM data_pengarang");
    while ($row_data_pengarang = mysqli_fetch_array($data_pengarang)) {
      $hasil_data_pengarang[] = $row_data_pengarang;
    }
    return $hasil_data_pengarang;
  }
  function ambil_data_jenis_buku()
  {
    $data_jenis_buku = mysqli_query($this->koneksi, "SELECT * FROM data_jenis_buku");
    while ($row_data_jenis_buku = mysqli_fetch_array($data_jenis_buku)) {
      $hasil_data_jenis_buku[] = $row_data_jenis_buku;
    }
    return $hasil_data_jenis_buku;
  }
  function ambil_data_penerbit()
  {
    $data_penerbit = mysqli_query($this->koneksi, "SELECT * FROM data_penerbit");
    while ($row_data_penerbit = mysqli_fetch_array($data_penerbit)) {
      $hasil_data_penerbit[] = $row_data_penerbit;
    }
    return $hasil_data_penerbit;
  }
  function tambah_data_buku($kode_buku, $judul_buku, $kode_pengarang, $kode_jenis_buku, $kode_penerbit, $isbn, $tahun, $deskripsi, $jumlah)
  {
    mysqli_query($this->koneksi, "INSERT INTO data_buku VALUES ('','$kode_buku', '$judul_buku', '$kode_pengarang', '$kode_jenis_buku', '$kode_penerbit', '$isbn', '$tahun', '$deskripsi', '$jumlah')");
  }
  function tampil_data_buku()
  {
    $data = mysqli_query($this->koneksi, "SELECT a.*,b.*,c.*,d.* FROM data_buku a 
                    INNER JOIN data_pengarang b ON b.kode_pengarang = a.kode_pengarang
                    INNER JOIN data_jenis_buku c ON c.kode_jenis_buku = a.kode_jenis_buku
                    INNER JOIN data_penerbit d ON d.kode_penerbit = a.kode_penerbit");
    while ($row = mysqli_fetch_array($data)) {
      $hasil[] = $row;
    }
    return $hasil;
  }
  function ambil_data_buku()
  {
    $data_buku = mysqli_query($this->koneksi, "SELECT * FROM data_buku");
    while ($row_data_buku = mysqli_fetch_array($data_buku)) {
      $hasil_data_buku[] = $row_data_buku;
    }
    return $hasil_data_buku;
  }
  function ambil_data_peminjam()
  {
    $data_peminjam = mysqli_query($this->koneksi, "SELECT * FROM data_peminjam");
    while ($row_data_peminjam = mysqli_fetch_array($data_peminjam)) {
      $hasil_data_peminjam[] = $row_data_peminjam;
    }
    return $hasil_data_peminjam;
  }
  function tambah_peminjaman($kode_buku, $kode_peminjam)
  {
    $tanggal_pinjam = date('Y-m-d');
    $tanggal_kembali = date('Y-m-d', time() + (60 * 60 * 24 * 7));
    mysqli_query($this->koneksi, " INSERT INTO peminjaman VALUES ('','$kode_buku','$kode_peminjam',
                '$tanggal_pinjam','$tanggal_kembali','1')");
  }
  function tampil_peminjaman()
  {
    $data = mysqli_query($this->koneksi, "SELECT a.*,b.*,c.* FROM peminjaman a 
                    INNER JOIN data_buku b ON b.kode_buku = a.kode_buku
                    INNER JOIN data_peminjam c ON c.kode_peminjam = a.kode_peminjam");
    while ($row = mysqli_fetch_array($data)) {
      $hasil[] = $row;
    }
    return $hasil;
  }

  function login($username)
  {
    $data = mysqli_query($this->koneksi, "SELECT * FROM user WHERE username = '$username'");
    if (mysqli_num_rows($data) == 0) {
      echo "<b>Data user tidak ada</b>";
      $hasil = [];
      header("Location: login.php");
    } else {
      while ($row = mysqli_fetch_array($data)) {
        $hasil[] = $row;
      }
    }

    return $hasil;
  }

  function tampil_peminjaman_peminjam($username)
  {
    $data = mysqli_query($this->koneksi, "SELECT a.*, b.*, c.* FROM peminjaman a
                                INNER JOIN data_buku b ON b.kode_buku = a.kode_buku
                                INNER JOIN data_peminjam c ON c.kode_peminjam = a.kode_peminjam 
                                WHERE a.kode_peminjam = '$username'");
    while ($row = mysqli_fetch_array($data)) {
      $hasil[] = $row;
    }

    return $hasil;
  }

  function tampil_peminjam($kode_peminjam)
  {
    $data_peminjam = mysqli_query($this->koneksi, "SELECT a.*, b.*, c.password FROM data_peminjam a 
                            INNER JOIN jenis_kelamin b ON b.kode_jk = a.jenis_kelamin 
                            INNER JOIN user c ON c.data_peminjam_id = a.id
                            WHERE a.kode_peminjam='$kode_peminjam'");
    while ($row_peminjam = mysqli_fetch_assoc($data_peminjam)) {
      $hasil_peminjam[] = $row_peminjam;
    }
    return $hasil_peminjam;
  }

  function edit_peminjam($kode_peminjam, $nama_peminjam, $jenis_kelamin, $tanggal_lahir, $alamat, $pekerjaan, $password)
  {
    mysqli_query($this->koneksi, "UPDATE data_peminjam 
                        SET nama_peminjam='$nama_peminjam', jenis_kelamin='$jenis_kelamin', tanggal_lahir='$tanggal_lahir', alamat='$alamat', pekerjaan='$pekerjaan' 
                        WHERE kode_peminjam = '$kode_peminjam'");
    mysqli_query($this->koneksi, "UPDATE user SET password = '$password' WHERE username = '$kode_peminjam'");
  }

  function test()
  {
    $conn = $this->koneksi;
    $conn->query("SELECT * FROM user");
  }
}