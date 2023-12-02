<?php
session_start();

// Periksa status login
if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
  header('Location: pages/login.php'); // Redirect ke halaman login jika belum login
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Pembayaran PKL</title>
  <link rel="stylesheet" href="assets/css/style.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
  <link rel="icon" type="image/png" href="assets/images/smkn1-cirebon-removebg-preview.png" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<body>
  <!-- navbar -->
  <nav class="navbar navbar-expand-lg" style="background-color: #776B5D;">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="assets/images/smkn1-cirebon-removebg-preview.png" alt=" Gambar" width="50" height="50" />
      </a>
      <p class="m-auto text-light fs-5 p-2 rounded-3" style="background-color: #B0A695;">PEMBAYARAN PKL</p>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav gap-5 m-auto">
          <div class="list-nav">
            <a class="nav-link text-light fs-5" aria-current="page" href="./pages/pembayaran/pembayaran.php">Pembayaran</a>
          </div>
          <div class="list-nav">
            <a class="nav-link text-light fs-5" href="pages/siswa/siswa.php">Siswa</a>
          </div>
        </div>
        <a class="btn btn-outline-light" href="pages/login.php"><i class="fa-solid fa-right-from-bracket me-2"></i>Logout</a>
      </div>
    </div>
  </nav>
  <!-- akhir navbar -->
  <!-- hero -->
  <div class="container-fluid py-5" style="background-color:#B0A695;">
    <div class="row align-items-center">
      <div class="col">
        <h4 class="text-light text-center fw-bold">Pembayaran</h4>
        <h4 class="text-light text-center fw-bold">Praktek Kerja Lapangan</h4>
      </div>
      <div class="col justify-content-center d-flex">
        <div style="background-color: #776B5D; padding: 20px; border-radius: 30px; outline: 3px solid white;">
          <img src="./assets/images/smkn1-cirebon-removebg-preview.png" alt="" width="200px">
        </div>
      </div>
    </div>
  </div>
  <!-- akhir hero -->
  <!-- tabel pembayaran -->
  <div class="container-fluid">
    <div class="container py-5">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <div>
                <h2 class="rounded-3 py-3 text-center fw-bold" style="background-color: #776B5D;">Data Pembayaran</h2>
              </div>
              <div>
              </div>
              <table class="table">
                <thead>

                  <tr>
                    <th>No</th>
                    <th>Nis</th>
                    <th>Nama Siswa</th>
                    <th>Jurusan</th>
                    <th>Kelas</th>
                    <th>Nominal Pembayaran</th>
                    <th>Keterangan</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>12127591</td>
                    <td>Abdul Mun'im Sudrajat</td>
                    <td>RPL2</td>
                    <td>12</td>
                    <td>Rp. 30.000</td>
                    <td>Lunas</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>12127592</td>
                    <td>Afrizal Rafly</td>
                    <td>RPL2</td>
                    <td>12</td>
                    <td>Rp. 35.000</td>
                    <td>Lunas</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- akhir table pembayaran -->
  <!-- tabel siswa -->
  <div class="container-fluid">
    <div class="container py-5">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <div>
                <h2 class="rounded-3 py-3 text-center fw-bold" style="background-color: #776B5D;">Data Siswa</h2>
              </div>
              <div>
              </div>
              <table class="table">
                <thead>

                  <tr>
                    <th>No</th>
                    <th>Nis</th>
                    <th>Nama Siswa</th>
                    <th>Jurusan</th>
                    <th>Kelas</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>12127591</td>
                    <td>Abdul Mun'im Sudrajat</td>
                    <td>RPL2</td>
                    <td>12</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>12127592</td>
                    <td>Afrizal Rafly</td>
                    <td>RPL2</td>
                    <td>12</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- akhir tabel siswa -->
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</html>