<?php
include '../../koneksi.php';
$dataUser = [];
if (isset($_GET['id_siswa'])){
    $dataUser = query("SELECT * FROM siswa WHERE siswa.id_siswa = '$_GET[id_siswa]'")[0];
}



$datapembayaran = query("SELECT 
pembayaran.created_at AS pembayaran_created_at,
pembayaran.created_by AS pembayaran_created_by,
pembayaran.updated_at AS pembayaran_updated_at,
pembayaran.updated_by AS pembayaran_updated_by,
pembayaran.deleted_at AS pembayaran_deleted_at,
pembayaran.deleted_by AS pembayaran_deleted_by,
siswa.*,
pembayaran.*,
jurusan.*
FROM siswa 
INNER JOIN jurusan ON siswa.id_jurusan = jurusan.id_jurusan
INNER JOIN pembayaran ON pembayaran.id_siswa = siswa.id_siswa
WHERE siswa.id_siswa = '$_GET[id_siswa]'");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $back = $_GET['kembali'];
    $nominal = $_GET['nominal'];

    $query = mysqli_query($link,"UPDATE pembayaran SET
    deleted_at = NULL,
    deleted_by = NULL

    WHERE id_pembayaran = '$id'");

    mysqli_query($link,"UPDATE siswa SET jumlah_pembayaran = (jumlah_pembayaran+$nominal) WHERE id_siswa = '$back'");

     if ($query) {
        echo "
        <script>
        alert('Berhasil Mengembalikan Pembayaran Yang Telah Dihapus');
        document.location.href = 'log_pembayaran.php?id_siswa=$back';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Gagal Mengembalikan Pembayaran Yang Telah Dihapus. Silakan coba lagi.');
        </script>
        ";
    } 
}


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
                                <?= isset($_GET['id_siswa'])? $dataUser['nama_siswa'] : $dataUser['nama_siswa'] ?></h2>
                        </div>
                        <table class="table table-striped" id="data-pembayaran">
                            <thead>
                                <tr>
                                    <th class="text-center table-info" rowspan="2">No</th>
                                    <th class="text-center" colspan="2">Informasi Pembayaran</th>
                                    <th class="text-center table-success" rowspan="2">Dibuat Pada </th>
                                    <th class="text-center table-success" rowspan="2">Dibuat Oleh</th>
                                    <th class="text-center table-warning" rowspan="2">Diubah Pada</th>
                                    <th class="text-center table-warning" rowspan="2">Diubah Oleh</th>
                                    <th class="text-center table-danger" rowspan="2">Dihapus Pada</th>
                                    <th class="text-center table-danger" rowspan="2">Dihapus Oleh</th>
                                    <th class="text-center table-primary" rowspan="2">Aksi</th>
                                </tr>
                                <tr>
                                    <th class="text-center">Nominal Pembayaran</th>
                                    <th class="text-center">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1 ?>
                                <?php if(!empty($datapembayaran)) : ?>
                                <?php foreach($datapembayaran as $p) : ?>
                                <?php
                                        // Gunakan parameter pada fungsi query untuk memastikan keamanan query
                                        $nama_user_c = ($p['pembayaran_created_by']) ? query("SELECT * FROM login WHERE id_login = {$p['pembayaran_created_by']}") : null;
                                        $nama_user_u = ($p['pembayaran_updated_by']) ? query("SELECT * FROM login WHERE id_login = {$p['pembayaran_updated_by']}") : null;
                                        $nama_user_d = ($p['pembayaran_deleted_by']) ? query("SELECT * FROM login WHERE id_login = {$p['pembayaran_deleted_by']}") : null;

                                        // Deklarasikan variabel username sebelumnya untuk menghindari masalah variabel tidak terdefinisi
                                        $username_c = $username_u = $username_d = '';

                                        // Periksa apakah hasil query tidak kosong
                                        if ($nama_user_c) {
                                            $username_c = $nama_user_c[0]['username'];
                                        }
                                        if ($nama_user_u) {
                                            $username_u = $nama_user_u[0]['username'];
                                        }
                                        if ($nama_user_d) {
                                            $username_d = $nama_user_d[0]['username'];
                                        } 
                                        ?>
                                <tr>
                                    <td class="text-center table-info"><?= $i++ ?></td>
                                    <td class="text-center"><?= $p['nominal_pembayaran']?></td>
                                    <td class="text-center"><?= $p['keterangan']?></td>
                                    <td class="text-center table-success">
                                        <?php
                                                if (!empty($p['pembayaran_created_at']) && $p['pembayaran_created_at'] !== '0000-00-00 00:00:00') {
                                                    echo date('d-m-Y : H.i.s', strtotime($p['pembayaran_created_at']));
                                                } 
                                            ?>
                                    </td>
                                    <td class="text-center table-success"><?= $username_c ?></td>
                                    <td class="text-center table-warning">
                                        <?php
                                                if (!empty($p['pembayaran_updated_at']) && $p['pembayaran_updated_at'] !== '0000-00-00 00:00:00') {
                                                    echo date('d-m-Y : H.i.s', strtotime($p['pembayaran_updated_at']));
                                                } else {
                                                    echo "Data Tidak Diubah";
                                                }
                                                ?>
                                    </td>
                                    <td class="text-center table-warning">
                                        <?= !empty($username_u) ? $username_u : 'Data Tidak Diubah' ?>
                                    </td>
                                    <td class="text-center table-danger">
                                        <?php
                                                if (!empty($p['pembayaran_deleted_at']) && $p['pembayaran_deleted_at'] !== '0000-00-00 00:00:00') {
                                                    echo date('d-m-Y : H.i.s', strtotime($p['pembayaran_deleted_at']));
                                                } else {
                                                    echo "Data Tidak Dihapus";
                                                }
                                                ?>
                                    </td>
                                    <td class="text-center table-danger">
                                        <?= !empty($username_d) ? $username_d : 'Data Tidak Dihapus' ?>
                                    </td>

                                    <td class="text-center table-primary" style="display:flex; gap: 5px;">
                                        <?php
                                    
                                                // Pemeriksaan apakah deleted_at atau deleted_by tidak NULL
                                                if ($p['pembayaran_deleted_at'] !== null || $p['pembayaran_deleted_by'] !== null) {
                                                ?>
                                        <button type="button" class="btn btn-info " data-bs-toggle="modal"
                                            data-bs-target="#kembali_data_<?php echo $p['id_pembayaran'] ?>"
                                            title="Kembalikan">
                                            <i class="fa fa-undo" title="Kembalikan"></i>Kembalikan Data
                                        </button>
                                        <?php
                                                }
                                                ?>
                                        <!-- MODAL Pengembalian Data -->
                                        <div class="modal fade" id="kembali_data_<?php echo $p['id_pembayaran'] ?>"
                                            data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Peringatan!
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>

                                                    </div>
                                                    <div class="modal-body">

                                                        <p>Yakin ingin mengembalikan data ini ?</p>

                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Tutup</button>
                                                        <a href="?id=<?=$p['id_pembayaran']?>&kembali=<?=$dataUser['id_siswa']?>&nominal=<?=$p['nominal_pembayaran']?>"
                                                            class="btn btn-primary">Kembalikan</a>
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
        <a class="btn mt-3 float-end" style="background-color: #776B5D;" href="log_siswa.php">Kembali</a>
    </div>



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