<?php
include '../../koneksi.php';

$datapembayaran = query("SELECT *, siswa.id_siswa AS id FROM siswa 
LEFT JOIN pembayaran ON siswa.id_siswa = pembayaran.id_siswa
INNER JOIN jurusan ON siswa.id_jurusan = jurusan.id_jurusan 
GROUP BY siswa.id_siswa");

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
                            <h2 class="rounded-3 py-3 text-center fw-bold" style="background-color: #776B5D;">Data Pembayaran</h2>
                        </div>
                        <div>
                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modalSiswa" style="background-color: #B0A695;">
                                Tambah Siswa
                            </button>
                        </div>
                        <table id="data-pembayaran" class="table table-striped">
                            <thead>

                                <tr>
                                    <th>No</th>
                                    <th>Nis</th>
                                    <th>Nama Siswa</th>
                                    <th>Jurusan</th>
                                    <th>Kelas</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i=1 ?>
                            <?php foreach($datapembayaran as $p) : ?>
                                    <tr>
                                        <td class="text-center"><?= $i ?></td>
                                        <td class="text-center"><?= $p['nis']?></td>
                                        <td class="text-center"><?= $p['nama_siswa']?></td>
                                        <td class="text-center"><?= $p['nama_jurusan']?></td>
                                        <td class="text-center"><?= $p['kelas']?></td>
                                        <td class="text-center">
                                            <a href="info_pembayaran.php?id_siswa=<?= $p['id'] ?>" class="btn btn-success"><i class="fa-solid fa-magnifying-glass"></i>Info</a>
                                        </td>
                                    </tr>
                                    <?php $i++ ?>
                                    <?php endforeach; ?>
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <a class="btn mt-3 float-end" style="background-color: #776B5D;" href="../../index.php">Kembali</a>
    </div>
    <!-- Awal modal tambah siswa -->
    <form action="siswa_act.php" method="post">
        <div class="modal fade" id="modalSiswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Siswa</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group" style="margin-bottom:15px;width: 100%" >
                            <label class="" for="">Nis</label>
                            <input type="number" class="form-control" name="nis" required placeholder="Masukkan Nis Siswa">
                        </div>
                        <div class="form-group" style="margin-bottom:15px;width: 100%" >
                            <label class="" for="">Nama Siswa</label>
                            <input type="text" class="form-control" name="nama" required placeholder="Masukkan Nama Siswa">
                        </div>
                        
                        <div class="form-group" style="margin-bottom:15px;width: 100%" >
                            <label class="" for="">Jurusan</label>
                            <select name="jurusan" class="form-select" aria-label="Default select example">
                                <?php foreach(query("SELECT * FROM jurusan") as $j):?>
                                    <option value="<?=$j['id_jurusan']?>"><?=$j['nama_jurusan']?></option>
                                <?php endforeach?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- akhir modal pembayaran -->


    <!-- Data Tables -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
    new DataTable('#data-pembayaran');
    </script>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


</html>