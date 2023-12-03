<?php 
session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: ../login.php");
}

$koneksi = mysqli_connect("localhost","root","","perpustakaan");

function query($sql){
    global $koneksi;
    $rows = [];
    $query = mysqli_query($koneksi,$sql);
}




?>