<?php
session_start();
$koneksi = mysqli_connect("localhost","root","","administrasi_pkl");

function query($sql){
    global $koneksi;
    $rows = [];
    $query = mysqli_query($koneksi,$sql);
    while($row=mysqli_fetch_assoc($query)){
        $rows[]=$row;
    }
    return $rows;
} // Sambungkan ke database

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM login WHERE username = '$username'";
    $result = mysqli_query($koneksi, $query);

    if ($result && mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id_login'];
            $_SESSION['user_role'] = $user['role'];
            $_SESSION['nama_user'] = $user['nama'];
    
            // Redirect sesuai peran pengguna
            if ($user['role'] === 'admin') {
                header("Location: index.php");
                exit(); // Pastikan untuk keluar setelah melakukan redirect
            } elseif ($user['role'] === 'superadmin') {
                header("Location: index_admin.php");
                exit();
            }
        } else {
            echo "
            <script>
            alert('Password Salah, Silakan Coba Lagi!.');
            document.location.href = 'login.php';
            </script>
            ";
        }
    } else {
        echo "
        <script>
        alert('Username Salah, Silakan Coba Lagi!.');
        document.location.href = 'login.php';
        </script>
        ";
    }
}
?>
