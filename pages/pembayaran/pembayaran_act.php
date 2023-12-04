<?php
include '../../koneksi.php';

// $id = query("SELECT id_siswa FROM siswa WHERE= '$_GET['id_siswa']'");

$siswa = $_POST['id_siswa'];
$nominal = $_POST['nominal'];
$keterangan = $_POST['keterangan'];
date_default_timezone_set("Asia/Jakarta");
$tglsekarang = date("Y-m-d H:i:s");

$query = mysqli_query($link,"INSERT INTO pembayaran 
VALUE(NULL,'$siswa','$nominal','$keterangan','$tglsekarang','$_SESSION[user_id]',NULL,NULL,NULL,NULL)");

mysqli_query($link,"UPDATE siswa SET jumlah_pembayaran = (jumlah_pembayaran+$nominal) WHERE id_siswa = '$siswa'");

if ($query) {
    $_SESSION['berhasil'] = "Berhasil Menambahkan Data Peminjaman";
    header("Location: info_pembayaran.php?id_siswa=$siswa");
    exit;
} else {
    $_SESSION['gagal'] = "Gagal Menambahkan Data Peminjaman";
    header("Location: info_pembayaran.php?id_siswa=$siswa");
    exit;
}
?>