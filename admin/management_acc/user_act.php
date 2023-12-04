<?php 
include '../../koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha384-Z2yoZYYuZQ3fp2IYKRqLW2jvM+GqXnp/NEXA6NzAIsj8eeqD5O5fqlxo3nxW2Y1Z" crossorigin="anonymous">
</head>

<body style="background-color: #B0A695;">
    <div class="container" style="margin-top: 140px;">
        <div class="row">
            <div class="col-md-6 justify-content-center d-flex">
                <img src="../../assets/images/login-removebg-preview.png" alt=" Gambar" width="500" height="300" />
            </div>
            <div class="col-md-6 justify-content-center d-flex shadow" style="height: 350px; border-radius: 15px; background-color: #776B5D;">
                <div class="form-login d-flex align-items-center justify-content-center">
                    <form method="post" action="user_tambah.php">
                        <h3 class="text-center fw-bold">Tambah User</h3>
                        <div class="d-flex">
                            <div class="mb-3 me-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="name" aria-describedby="username" name="nama">
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" id="username">
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="mb-3 me-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password">
                            </div>
                            <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select class="form-control" name="role" id="role" style="width:100%;">
                                    <option value="superadmin">SuperAdmin</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-dark" value="login">
                            <i class="fa-solid fa-right-to-bracket" style="color: #ffffff;"></i>
                            Buat Akun
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>