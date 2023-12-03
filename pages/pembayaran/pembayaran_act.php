<?php
include '../../koneksi.php';

// $id = query("SELECT id_siswa FROM siswa WHERE= '$_GET['id_siswa']'");

$siswa = $_POST['id_siswa'];
$nominal = $_POST['nominal'];
$keterangan = $_POST['keterangan'];

$query = mysqli_query($link,"INSERT INTO pembayaran 
VALUE(NULL,'$siswa','$nominal','$keterangan')");

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