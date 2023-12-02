<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <link rel="icon" type="image/png" href="../../assets/images/smkn1-cirebon-removebg-preview.png" />
</head>

<body style="background-color: #B0A695;">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <h2 class="py-3 rounded-3 text-center fw-bold" style="background-color:#776B5D;">Pembayaran</h2>
                        </div>
                        <div>
                            <a class="btn" href="../pembayaran/pembayaran.php" style="background-color: #B0A695;">Daftar Pembayaran</a>
                        </div>
                        <form action=" aksi_tambah_faskes.php" method="POST">
                            <div class="form-floating mt-3">
                                <!-- <input class="form-control" type="text" name="id_faskes" placeholder="Id">
                                <label for="">Pilih Siswa</label> -->
                                <select name="" id="">
                                    <option value="">dasda</option>
                                </select>
                            </div>
                            <div class=" form-floating mt-3">
                                <input class="form-control" type="text" name="nama" placeholder="Nama">
                                <label for="">Kelas</label>
                            </div>
                            <div class="form-floating mt-3">
                                <input class="form-control" type="number" name="tingkat" placeholder="Tingkat">
                                <label for="">Nominal Pembayaran</label>
                            </div>
                            <div class="form-floating mt-3">
                                <input class="form-control" type="text" name="tingkat" placeholder="Tingkat">
                                <label for="">Keterangan</label>
                            </div>
                            <div>
                                <button type="submit" class="btn mt-4 float-end" style="background-color: #776B5D;">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</html>