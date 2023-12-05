<?php
include "../../koneksi.php";

$dataakun = query("SELECT * FROM login ");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ganti Password</title>
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
                            <h2 class="rounded-3 py-3 text-center fw-bold" style="background-color: #776B5D;">Data User Accounts</h2>
                        </div>
                        <div>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#TambahUser" style="background-color: #B0A695;">
                                Tambah User
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="TambahUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Akun</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="user_tambah.php" method="post">
                                            <div class="modal-body">
                                                <div class="mb-3 me-3">
                                                    <label for="name" class="form-label">Nama</label>
                                                    <input type="text" class="form-control" id="name" aria-describedby="username" name="nama">
                                                </div>
                                                <div class="mb-3 me-3">
                                                    <label for="username" class="form-label">Username</label>
                                                    <input type="text" name="username" class="form-control" id="username">
                                                </div>
                                                <div class="mb-3 me-3">
                                                    <label for="password" class="form-label">Password</label>
                                                    <input type="password" name="password" class="form-control" id="password">
                                                </div>
                                                <div class="mb-3 me-3">
                                                    <label for="role" class="form-label">Role</label>
                                                    <select class="form-select" name="role" id="role" style="width:100%;">
                                                        <option value="superadmin">SuperAdmin</option>
                                                        <option value="admin">Admin</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn" style="background-color: #B0A695;">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>
                        </div>
                        <table id="datauser" class="table table-striped">
                            <thead>

                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Role</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($dataakun as $akun) : ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $akun["nama"] ?></td>
                                        <td><?= $akun["username"] ?></td>
                                        <td><?= $akun["role"] ?></td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $akun['id_login']; ?>"><i class="fa-solid fa-edit"></i>
                                                Edit
                                            </button>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $akun['id_login']; ?>"><i class="fa-solid fa-trash"></i>
                                                Hapus
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Modal - EDIT -->
                                    <div class="modal fade" id="modalEdit<?= $akun['id_login']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Akun</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="user_edit.php" method="post">
                                                    <input type="hidden" name="id" value="<?= $akun['id_login'] ?>">
                                                    <div class="modal-body">
                                                        <div class="mb-3 me-3">
                                                            <label for="name" class="form-label">Nama</label>
                                                            <input type="text" class="form-control" id="name" aria-describedby="username" name="nama" value="<?= $akun['nama'];?>">
                                                        </div>
                                                        <div class="mb-3 me-3">
                                                            <label for="username" class="form-label">Username</label>
                                                            <input type="text" name="username" class="form-control" id="username" value="<?= $akun['username'];?>">
                                                        </div>
                                                        <div class="mb-3 me-3">
                                                            <label for="password" class="form-label">Password</label>
                                                            <input type="password" name="password" class="form-control" id="password">
                                                        </div>
                                                        <div class="mb-3 me-3">
                                                            <label for="password" class="form-label">Konfirmasi Password</label>
                                                            <input type="password" name="konfir_password" class="form-control" id="password">
                                                        </div>
                                                        <div class="mb-3 me-3">
                                                            <label for="role" class="form-label">Role</label>
                                                            <select class="form-select" name="role" id="role" style="width:100%;">
                                                                <option value="superadmin" <?= $akun['role'] == 'superadmin' ? 'selected' : '' ?>>SuperAdmin</option>
                                                                <option value="admin" <?= $akun['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                        <button type="submit" class="btn" style="background-color: #B0A695;">Simpan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END MODAL EDIT -->

                                    <!-- Modal  Hapus-->
                                    <div class="modal fade" id="modalHapus<?= $akun['id_login']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data Akun</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Yakin ingin menghapus data?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ga jadi ah</button>
                                                    <a href="user_hapus.php?id=<?= $akun['id_login'] ?>" type="hapus" class="btn btn-primary">Yakin lah</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Akhir Modal Hapus -->
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <a class="btn mt-3 float-end" style="background-color: #776B5D;" href="../../index_admin.php">Kembali</a>
    </div>

    <!-- Awal modal pembayaran -->
    <div class="modal fade" id="modalJurusan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Pembayaran</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label class="" for="">Pilih Siswa</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Pilih</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <label class="mt-2" for="">Kelas</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Kelas</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <label class="mt-2" for="">Nominal Pembayaran</label>
                    <div class="input-group">
                        <input type="number" class="form-control" aria-describedby="basic-addon1">
                    </div>
                    <label class="mt-2" for="">Keterangan</label>
                    <div class="input-group">
                        <textarea class="form-control" id="floatingTextarea2" style="height: 100px"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <!-- akhir modal pembayaran -->


    <!-- Data Tables -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
        new DataTable('#datauser');
    </script>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


</html>