<?php 
session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
}

$link = mysqli_connect("localhost","root","","administrasi_pkl");

function query($sql){
    global $link;
    $rows = [];
    $query = mysqli_query($link,$sql);
    while($row=mysqli_fetch_assoc($query)){
        $rows[]=$row;
    }
    return $rows;
}




?>