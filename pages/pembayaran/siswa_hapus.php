<?php
include '../../koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    date_default_timezone_set("Asia/Jakarta");
    $tglsekarang = date("Y-m-d H:i:s");

    $query = mysqli_query($link, "UPDATE siswa SET 
    deleted_at = '$tglsekarang',
    deleted_by = '$_SESSION[user_id]'

    WHERE id_siswa='$id'");

    if ($query) {
        $_SESSION['berhasil'] = "Berhasil Menambahkan Data Peminjaman";
        header("Location: pembayaran.php");
        exit;
    } else {
        $_SESSION['gagal'] = "Gagal Menambahkan Data Peminjaman";
        header("Location: pembayaran.php");
        exit;
    }
}
?>