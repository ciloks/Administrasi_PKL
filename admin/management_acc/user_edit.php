<?php
include '../../koneksi.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    if ($_POST['password'] == '') {
        $query = mysqli_query($link, "UPDATE login    
        SET nama = '$_POST[nama]',username = '$_POST[username]',role = '$_POST[role]'
        WHERE id_login='$id'");
    } else {
        if ($_POST['password'] != $_POST['konfir_password']) {
            $_SESSION['gagal'] = "Gagal Mengubah Data Akun";
            header("Location: list_accounts.php");
            exit;
        }
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $query = mysqli_query($link, "UPDATE login    
        SET nama = '$_POST[nama]',username = '$_POST[username]', password = '$password',role = '$_POST[role]'
        WHERE id_login='$id'");
    }

    if ($query) {
        $_SESSION['berhasil'] = "Berhasil Menambahkan Data Akun";
        header("Location: list_accounts.php");
        exit;
    } else {
        $_SESSION['gagal'] = "Gagal Menambahkan Data Akun";
        header("Location: list_accounts.php");
        exit;
    }
}
