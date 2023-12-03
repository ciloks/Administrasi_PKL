<?php 
include '../../koneksi.php';

$nis = $_POST['nis'];
$nama = $_POST['nama'];
$jurusan = $_POST['jurusan'];

if (empty($nis) || empty($nama)) {
    echo "<script>alert('NIS dan Nama Siswa tidak boleh kosong.');
          document.location.href = 'pembayaran.php'</script>";
} else {
    $ceknis = query("SELECT * FROM siswa WHERE nis = '$nis'");

    if ($ceknis) {
        echo "<script>alert('NIS telah digunakan.');
              document.location.href = 'pembayaran.php'</script>";
    } else {
        mysqli_query($link, "INSERT INTO siswa VALUES (null,'$nis','$nama','$jurusan','11','0')");
        
        echo "<script>alert('Data Siswa Berhasil Ditambahkan.');
              document.location.href = 'pembayaran.php'</script>";
    }
}
?>