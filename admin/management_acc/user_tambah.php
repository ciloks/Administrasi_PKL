<?php 

include '../../koneksi.php';


$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$query = mysqli_query($link, "INSERT INTO login VALUES 
            ('', '$_POST[nama]', '$_POST[username]', '$password',  '$_POST[role]')" );
if ($query) {
    $_SESSION['berhasil'] = "Berhasil Menambahkan User";
    header("Location: ../../index_admin.php");
    exit;
} else {
    $_SESSION['gagal'] = "Gagal Menambahkan User";
    header("Location: info_pembayaran.php?id_siswa=$siswa");
    exit;
}

?>