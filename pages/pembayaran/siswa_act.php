<?php 
include '../../koneksi.php';

$nis = $_POST['nis'];
$nama = $_POST['nama'];
$jurusan = $_POST['jurusan'];
date_default_timezone_set("Asia/Jakarta");
$tglsekarang = date("Y-m-d H:i:s");

if (empty($nis) || empty($nama)) {
    echo "<script>alert('NIS dan Nama Siswa tidak boleh kosong.');
          document.location.href = 'pembayaran.php'</script>";
} else {
    $ceknis = query("SELECT * FROM siswa WHERE nis = '$nis'");

    if ($ceknis) {
        echo "<script>alert('NIS telah digunakan.');
              document.location.href = 'pembayaran.php'</script>";
    } else {
        mysqli_query($link, "INSERT INTO siswa VALUES (NULL,'$nis','$nama','$jurusan','11','0','$tglsekarang','$_SESSION[user_id]',NULL,NULL,NULL,NULL)");
        
        echo "<script>alert('Data Siswa Berhasil Ditambahkan.');
              document.location.href = 'pembayaran.php'</script>";
    }
}
?>