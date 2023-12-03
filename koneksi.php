<?php 


$link = mysqli_connect("localhost","root","123","administrasi_pkl");

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