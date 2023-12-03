<?php
include '../../koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $kembali = $_GET['kembali'];
    $nominal = $_GET['nominal'];

    $query = mysqli_query($link, "DELETE FROM pembayaran WHERE id_pembayaran='$id'");
    mysqli_query($link,"UPDATE siswa SET jumlah_pembayaran = (jumlah_pembayaran-$nominal) WHERE id_siswa = '$kembali'");

    if ($query) {
        $_SESSION['berhasil'] = "Berhasil Menambahkan Data Peminjaman";
        header("Location: info_pembayaran.php?id_siswa=$kembali");
        exit;
    } else {
        $_SESSION['gagal'] = "Gagal Menambahkan Data Peminjaman";
        header("Location: info_pembayaran.php?id_siswa=$kembali");
        exit;
    }
}
?>