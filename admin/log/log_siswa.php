<?php
include '../../koneksi.php';

$datapembayaran = query("SELECT
siswa.created_at AS siswa_created_at,
siswa.created_by AS siswa_created_by,
siswa.updated_at AS siswa_updated_at,
siswa.updated_by AS siswa_updated_by,
siswa.deleted_at AS siswa_deleted_at,
siswa.deleted_by AS siswa_deleted_by,
siswa.id_siswa AS id,
siswa.*,
pembayaran.*,
jurusan.*
FROM siswa 
LEFT JOIN pembayaran ON siswa.id_siswa = pembayaran.id_siswa
INNER JOIN jurusan ON siswa.id_jurusan = jurusan.id_jurusan 
GROUP BY siswa.id_siswa");


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = mysqli_query($link,"UPDATE siswa SET
    deleted_at = NULL,
    deleted_by = NULL

    WHERE id_siswa = '$id'");
     if ($query) {
        echo "
        <script>
        alert('Berhasil Mengembalikan Siswa Yang Telah Dihapus');
        document.location.href = 'log_siswa.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Gagal Mengembalikan Siswa Yang Telah Dihapus. Silakan coba lagi.');
        </script>
        ";
    } 
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
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
                            <h2 class="rounded-3 py-3 text-center fw-bold" style="background-color: #776B5D;">History
                                Data Siswa</h2>
                        </div>

                        <table id="data-pembayaran" class="table table-striped">
                            <thead>

                                <tr>
                                    <th class="table-info">No</th>
                                    <th class="text-center">Nis</th>
                                    <th class="text-center">Nama Siswa</th>
                                    <th class="text-center table-success">Dibuat Pada </th>
                                    <th class="text-center table-success">Dibuat Oleh</th>
                                    <th class="text-center table-warning">Diubah Pada</th>
                                    <th class="text-center table-warning">Diubah Oleh</th>
                                    <th class="text-center table-danger">Dihapus Pada</th>
                                    <th class="text-center table-danger">Dihapus Oleh</th>
                                    <th class="text-center table-primary">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1 ?>
                                <?php foreach($datapembayaran as $p) : ?>
                                <?php
                                        // Gunakan parameter pada fungsi query untuk memastikan keamanan query
                                        $nama_user_c = ($p['siswa_created_by']) ? query("SELECT * FROM login WHERE id_login = {$p['siswa_created_by']}") : null;
                                        $nama_user_u = ($p['siswa_updated_by']) ? query("SELECT * FROM login WHERE id_login = {$p['siswa_updated_by']}") : null;
                                        $nama_user_d = ($p['siswa_deleted_by']) ? query("SELECT * FROM login WHERE id_login = {$p['siswa_deleted_by']}") : null;

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
                                    <td class="text-center table-info"><?= $i ?></td>
                                    <td class="text-center"><?= $p['nis']?></td>
                                    <td class="text-center"><?= $p['nama_siswa']?></td>
                                    <td class="text-center table-success">
                                        <?php
                                                if (!empty($p['siswa_created_at']) && $p['siswa_created_at'] !== '0000-00-00 00:00:00') {
                                                    echo date('d-m-Y : H.i.s', strtotime($p['siswa_created_at']));
                                                } 
                                            ?>
                                    </td>
                                    <td class="text-center table-success"><?= $username_c ?></td>
                                    <td class="text-center table-warning">
                                        <?php
                                                if (!empty($p['siswa_updated_at']) && $p['siswa_updated_at'] !== '0000-00-00 00:00:00') {
                                                    echo date('d-m-Y : H.i.s', strtotime($p['siswa_updated_at']));
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
                                                if (!empty($p['siswa_deleted_at']) && $p['siswa_deleted_at'] !== '0000-00-00 00:00:00') {
                                                    echo date('d-m-Y : H.i.s', strtotime($p['siswa_deleted_at']));
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
                                                if ($p['siswa_deleted_at'] !== null || $p['siswa_deleted_by'] !== null) {
                                                ?>
                                        <button type="button" class="btn btn-info " data-bs-toggle="modal"
                                            data-bs-target="#kembali_data_<?php echo $p['id'] ?>" title="Kembalikan">
                                            <i class="fa fa-undo" title="Kembalikan"></i>Kembalikan Data
                                        </button>
                                        <?php
                                                }
                                                ?>

                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#hapus_buku_<?php echo $d['id_buku'] ?>" title="Hapus">
                                            <i class="fa fa-trash" title="Hapus"></i>Hapus
                                        </button>

                                        <a href="log_pembayaran.php?id_siswa=<?= $p['id'] ?>"
                                            class="btn btn-success "><i
                                                class="fa-solid fa-magnifying-glass"></i>Info</a>



                                        <!-- Modal Pengembalian Data -->
                                        <div class="modal fade" id="kembali_data_<?php echo $p['id'] ?>"
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
                                                        <a href="?id=<?=$p['id']?>"
                                                            class="btn btn-primary">Kembalikan</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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


    <!-- Data Tables -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
    new DataTable('#data-pembayaran');
    </script>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>


</html>