<?php
include "../../koneksi.php";

// session_start();

// // Periksa status login
// if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
//     header('Location: login.php'); // Redirect ke halaman login jika belum login
//     exit();
// }

// $datasiswa = query("SELECT * FROM siswa ");

$datasiswa = query("SELECT siswa.*, jurusan.nama_jurusan, pembayaran.total_pembayaran 
                    FROM siswa 
                    JOIN jurusan ON siswa.id_jurusan = jurusan.id_jurusan
                    JOIN pembayaran ON siswa.id_siswa = pembayaran.id_siswa");



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <link rel="icon" type="image/png" href="../../assets/images/smkn1-cirebon-removebg-preview.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
</head>

<body style="background-color: #B0A695;">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <h2 class="rounded-3 py-3 text-center fw-bold" style="background-color: #776B5D;">Data Siswa</h2>
                        </div>
                        <div style="margin-bottom: 2rem;">
                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modalSiswa" style="background-color: #B0A695;">
                                Tambah Siswa
                            </button>
                        </div>
                        <!-- <div class="mt-2">
                            <form class="d-flex" role="search">
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-dark" type="submit">Cari</button>
                            </form>
                        </div> -->
                        <div class="card" style="border: 2px solid;">

                        <table id="datasiswa2" class="table table-striped">
                            <thead>

                                <tr>
                                    <th>No</th>
                                    <th>Nama Siswa</th>
                                    <th>Jurusan</th>
                                    <th>Kelas</th>
                                    <th>Jumlah Bayar</th>
                                    <th class="text-center">Aksi</th>
                                </tr>

                            </thead>
                            <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($datasiswa as $siswa) : ?>

                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $siswa['nama_siswa'] ?></td>
                                    <td><?= $siswa['nama_jurusan'] ?></td>
                                    <td><?= $siswa['kelas'] ?></td>
                                    <td><?= $siswa['total_pembayaran']?></td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEdit"><i class="fa-solid fa-pen-to-square"></i>
                                            Ubah
                                        </button>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus"><i class="fa-solid fa-trash"></i>
                                            Hapus
                                        </button>
                                    </td>
                                </tr>
                                
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="btn mt-3 float-end" style="background-color: #776B5D;" href="../../index.php">Kembali</a>
    </div>
    <!-- Modal  Hapus-->
    <div class="modal fade" id="modalHapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data Siswa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Yakin ingin menghapus data?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ga jadi ah</button>
                    <button type="button" class="btn btn-primary">Yakin lah</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal Hapus -->
    <!-- Awal modal tambah siswa -->
    <div class="modal fade" id="modalSiswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Pembayaran</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label class="mb-2" for="">NIS</label>
                    <div class="input-group">
                        <input type="number" class="form-control" aria-describedby="basic-addon1">
                    </div>
                    <label class="mb-2" for="">Nama</label>
                    <div class="input-group">
                        <input type="text" class="form-control" aria-describedby="basic-addon1">
                    </div>
                    <label class="mb-2" for="">Jurusan</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Jurusan</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <!-- akhir modal tambah siswa -->
    <!-- Awal modal edit -->
    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Pembayaran</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label class="mb-2" for="">NIS</label>
                    <div class="input-group">
                        <input type="number" class="form-control" aria-describedby="basic-addon1">
                    </div>
                    <label class="mb-2" for="">Nama</label>
                    <div class="input-group">
                        <input type="text" class="form-control" aria-describedby="basic-addon1">
                    </div>
                    <label class="mb-2" for="">Jurusan</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Jurusan</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <label class="mb-2" for="">Kelas</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Kelas</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <label class="mb-2" for="">Jumlah Bayar</label>
                    <div class="input-group">
                        <input type="number" class="form-control" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <!-- akhir modal edit -->

    <!-- Data Tables -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
    new DataTable('#datasiswa2');
    </script>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


</html>