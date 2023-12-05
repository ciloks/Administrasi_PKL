<?php
include '../../koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($link, "DELETE FROM login    
    WHERE id_login='$id'");

    if ($query) {
        $_SESSION['berhasil'] = "Berhasil Menambahkan Data Peminjaman";
        header("Location: list_accounts.php");
        exit;
    } else {
        $_SESSION['gagal'] = "Gagal Menambahkan Data Peminjaman";
        header("Location: list_accounts.php");
        exit;
    }
}
?>