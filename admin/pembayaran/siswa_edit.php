<?php
include '../../koneksi.php';

$id_siswa = $_POST['id'];
$nis = $_POST['nis'];
$nama_siswa = $_POST['nama'];
$id_jurusan = $_POST['jurusan'];
date_default_timezone_set("Asia/Jakarta");
$tglsekarang = date("Y-m-d H:i:s");

// Check if NIS already exists for other students
$checkNISQuery = mysqli_query($link, "SELECT * FROM siswa WHERE nis = '$nis' AND id_siswa != '$id_siswa'");
$existingNISData = mysqli_fetch_assoc($checkNISQuery);

if ($existingNISData) {
    echo "
        <script>
        alert('NIS tidak boleh sama dengan NIS lain');
        document.location.href = 'pembayaran.php';
        </script>
    ";
    exit;
}

// Check if Nama_siswa exists for other students
$checkNamaQuery = mysqli_query($link, "SELECT * FROM siswa WHERE nama_siswa = '$nama_siswa' AND id_siswa != '$id_siswa'");
$existingNamaData = mysqli_fetch_assoc($checkNamaQuery);

if ($existingNamaData) {
    echo "
        <script>
        alert('Nama siswa tidak boleh sama dengan Nama siswa lain');
        document.location.href = 'pembayaran.php';
        </script>
    ";
    exit;
}

// If NIS and Nama_siswa validations pass, proceed with the update
$query = mysqli_query($link, "UPDATE siswa SET
nis = '$nis',
nama_siswa = '$nama_siswa',
id_jurusan = '$id_jurusan',
updated_at = '$tglsekarang',
updated_by = '$_SESSION[user_id]'
WHERE id_siswa = '$id_siswa'");

if ($query) {
    echo "
        <script>
        alert('Berhasil Mengubah Data Siswa');
        document.location.href = 'pembayaran.php';
        </script>
    ";
} else {
    echo "
        <script>
        alert('Gagal Mengubah Data Siswa. Silakan coba lagi.');
        document.location.href = 'pembayaran.php';
        </script>
    ";
}
?>
