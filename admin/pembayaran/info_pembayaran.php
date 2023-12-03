<?php
include '../../koneksi.php';
$dataUser = [];
if (isset($_GET['id_siswa'])){
    $dataUser = query("SELECT * FROM siswa WHERE siswa.id_siswa = '$_GET[id_siswa]'")[0];
}

$datapembayaran = query("SELECT * FROM siswa 
INNER JOIN jurusan ON siswa.id_jurusan = jurusan.id_jurusan
INNER JOIN pembayaran ON pembayaran.id_siswa = siswa.id_siswa
WHERE siswa.id_siswa = '$_GET[id_siswa]'");

// $datapembayaran = query("SELECT * FROM pembayaran
// INNER JOIN siswa ON pembayaran.id_siswa = siswa.id_siswa
// INNER JOIN jurusan ON siswa.id_jurusan = siswa.id_jurusan
// WHERE siswa.id_siswa = '$_GET[id_siswa]'");
// var_dump($dataUser);


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="../../assets/images/smkn1-cirebon-removebg-preview.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
</head>

<body style="background-color: #B0A695;">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <h2 class="rounded-3 py-3 text-center fw-bold" style="background-color: #776B5D;">Detail
                                Pembayaran
                                <?= isset($_GET['id_siswa'])? $dataUser['nama_siswa'] : $dataUser['user_nama'] ?></h2>
                        </div>
                        <div>
                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modalPembayaran"
                                style="background-color: #B0A695;">
                                Tambah Pembayaran
                            </button>
                        </div>
                        <table class="table table-striped" id="data-pembayaran">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nis</th>
                                    <th>Nama Siswa</th>
                                    <th>Jurusan</th>
                                    <th>Kelas</th>
                                    <th>Nominal Pembayaran</th>
                                    <th>Keterangan</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1 ?>
                                <?php if(!empty($datapembayaran)) : ?>
                                <?php foreach($datapembayaran as $p) : ?>
                                <tr>
                                    <td class="text-center"><?= $i++ ?></td>
                                    <td class="text-center"><?= $p['nis']?></td>
                                    <td class="text-center"><?= $p['nama_siswa']?></td>
                                    <td class="text-center"><?= $p['nama_jurusan']?></td>
                                    <td class="text-center"><?= $p['kelas']?></td>
                                    <td class="text-center"><?= $p['nominal_pembayaran']?></td>
                                    <td class="text-center"><?= $p['keterangan']?></td>
                                    <td class="">
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#modalEdit_<?=$p['id_pembayaran']?>"><i
                                                class="fa-solid fa-pen-to-square"></i>
                                            Edit
                                        </button>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#modalHapus_<?=$p['id_pembayaran']?>"><i
                                                class="fa-solid fa-trash"></i>
                                            Hapus
                                        </button>

                                        <!-- Modal Edit -->
                                        <form action="pembayaran_edit.php" method="post">
                                            <div class="modal fade" id="modalEdit_<?= $p['id_pembayaran'] ?>"
                                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit
                                                                Pembayaran Siswa
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group"
                                                                style="margin-bottom:15px;width: 100%">
                                                                <label class="form-label">Nominal</label>
                                                                <input type="number" style="width: 100%;"
                                                                    class="form-control" placeholder="Masukkan Nominal"
                                                                    value="<?= $p['nominal_pembayaran'] ?>"
                                                                    name="nominal">
                                                            </div>
                                                            <div class="form-group"
                                                                style="margin-bottom:15px;width: 100%">
                                                                <label class="form-label">Keterangan</label>
                                                                <textarea name="keterangan" id="" style="width: 100%;"
                                                                    class="form-control" cols="5"
                                                                    rows="5"><?= $p['keterangan'] ?></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <input type="hidden" name="kembali"
                                                                value="<?= $dataUser['id_siswa']?>">
                                                            <input type="hidden" name="id_pembayaran"
                                                                value="<?= $p['id_pembayaran'] ?>">
                                                            <!-- <input type="hidden" name="nominal_awal" value="<?=$p['nominal_pembayaran']?>"> -->
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Tutup</button>
                                                            <button type="submit" class="btn btn-primary"
                                                                name="edit">Simpan</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>


                                        <!-- Modal Hapus -->
                                        <div class="modal fade" id="modalHapus_<?=$p['id_pembayaran']?>" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data
                                                            Siswa</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Anda yakin ingin menghapus data?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <a href="pembayaran_hapus.php?id=<?=$p['id_pembayaran']?>&kembali=<?= $dataUser['id_siswa']?>&nominal=<?=$p['nominal_pembayaran']?>" class="btn btn-primary">Hapus</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <h3>Jumlah Pembayaran = <?=$p['jumlah_pembayaran']?></h3>
                                <?php else : ?>
                                <tr>
                                    <td colspan="7" class="text-center">Tidak Ada Data</td>
                                </tr>
                                <?php endif ; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <a class="btn mt-3 float-end" style="background-color: #776B5D;" href="pembayaran.php">Kembali</a>
    </div>
    <!-- Awal modal pembayaran -->
    <form action="pembayaran_act.php" method="post">
        <div class="modal fade" id="modalPembayaran" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Pembayaran</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label class="mt-2" for="">Nominal Pembayaran</label>
                        <div class="input-group">
                            <input name="nominal" type="number" class="form-control" aria-describedby="basic-addon1">
                        </div>
                        <label class="mt-2" for="">Keterangan</label>
                        <div class="input-group">
                            <textarea name="keterangan" class="form-control" id="floatingTextarea2"
                                style="height: 100px"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id_siswa" value="<?= $dataUser['id_siswa']?>">
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

    <!-- akhir modal edit -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>