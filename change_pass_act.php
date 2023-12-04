<?php 

include 'koneksi.php';

$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$query = mysqli_query($link, "UPDATE login SET password = '$password' WHERE id_login = '$_POST[id]'") ;
if ($query) {
    $_SESSION['berhasil'] = "Berhasil Menambahkan User";
    header("Location: login.php");
    exit;
} else {
    $_SESSION['gagal'] = "Gagal Menambahkan User";
    header("Location: change_pass.php");
    exit;
}


?>