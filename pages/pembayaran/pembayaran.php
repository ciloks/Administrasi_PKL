
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
                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modalPembayaran" style="background-color: #B0A695;">
                                Tambah Pembayaran
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
                                <tr>
                                    <td>1</td>
                                    <td>12127591</td>
                                    <td>Abdul Mun'im Sudrajat</td>
                                    <td>RPL2</td>
                                    <td>12</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus"><i class="fa-solid fa-trash"></i>
                                            Hapus
                                        </button>
                                        <a href="info_pembayaran.php" class="btn btn-success"><i class="fa-solid fa-magnifying-glass"></i>Info</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>12127592</td>
                                    <td>Afrizal Rafly</td>
                                    <td>RPL2</td>
                                    <td>12</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus"><i class="fa-solid fa-trash"></i>
                                            Hapus
                                        </button>
                                        <a href="info_pembayaran.php" class="btn btn-success"><i class="fa-solid fa-magnifying-glass"></i>Info</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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
    <!-- Awal modal pembayaran -->
    <div class="modal fade" id="modalPembayaran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    new DataTable('#data-pembayaran');
    </script>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


</html>