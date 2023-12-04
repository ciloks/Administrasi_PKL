<?php 
include 'koneksi.php';
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
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha384-Z2yoZYYuZQ3fp2IYKRqLW2jvM+GqXnp/NEXA6NzAIsj8eeqD5O5fqlxo3nxW2Y1Z" crossorigin="anonymous">
</head>

<body style="background-color: #B0A695;">
    <div class="container" style="margin-top: 140px;">
        <div class="row">
            <div class="col-md-6 justify-content-center d-flex">
                <img src="assets/images/login-removebg-preview.png" alt=" Gambar" width="500" height="300" />
            </div>
            <div class="col-md-6 justify-content-center d-flex shadow" style="height: 350px; border-radius: 15px; background-color: #776B5D;">
                <div class="form-login d-flex align-items-center justify-content-center">
                    <form method="post" action="change_pass_act.php">
                        <input type="hidden" name="id" value="<?= $_SESSION['user_id'];?>">
                        <div class="mb-3">
                            <h3 class="text-center fw-bold">Change Password</h3>
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" aria-describedby="username" name="password">
                        </div>
                        <div class="">
                            <label for="changepassword" class="form-label">Konfirmasi Password</label>
                            <input type="password" name="changepassword" class="form-control" id="changepassword">
                        </div>
                        <div id="username" class="form-text text-dark mb-2">Silahkan Konfirmasi Password Anda</div>
                        <button type="submit" class="btn btn-dark" value="login">
                            <i class="fa-solid fa-right-to-bracket" style="color: #ffffff;"></i>
                            Change Password
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>