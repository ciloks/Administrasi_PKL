<?php
include '../../koneksi.php';

$nominal = mysqli_real_escape_string($link, $_POST['nominal']);
$kembali = mysqli_real_escape_string($link, $_POST['kembali']);
$keterangan = mysqli_real_escape_string($link, $_POST['keterangan']);
$id = mysqli_real_escape_string($link, $_POST['id_pembayaran']);

// Validasi input: Pastikan nominal_pembayaran tidak kosong
if (empty($nominal)) {
    echo "
        <script>
        alert('Nominal pembayaran tidak boleh kosong');
        document.location.href = 'info_pembayaran.php?id_siswa=$kembali';
        </script>
    ";
    exit(); // Keluar dari skrip jika ada kesalahan
}

// Ambil total nominal_pembayaran untuk siswa tertentu sebelum diubah
$total_nominal_query = mysqli_query($link, "SELECT SUM(nominal_pembayaran) AS total_nominal FROM pembayaran WHERE id_siswa = '$kembali'");
$total_nominal_result = mysqli_fetch_assoc($total_nominal_query);
$total_nominal_sebelumnya = $total_nominal_result['total_nominal'];

// Ambil nominal_pembayaran yang akan diubah
$nominal_awal_query = mysqli_query($link, "SELECT nominal_pembayaran FROM pembayaran WHERE id_pembayaran = '$id'");
$nominal_awal_result = mysqli_fetch_assoc($nominal_awal_query);
$nominal_awal = $nominal_awal_result['nominal_pembayaran'];

// Hitung selisih antara nominal yang baru dan nominal yang lama
$selisih_nominal = $nominal - $nominal_awal;

// Update pembayaran
$query = mysqli_query($link, "UPDATE pembayaran SET
nominal_pembayaran = '$nominal',
keterangan = '$keterangan'
WHERE id_pembayaran = '$id'");

// Update jumlah_pembayaran di tabel siswa
$update_siswa_query = mysqli_query($link, "UPDATE siswa SET jumlah_pembayaran = jumlah_pembayaran - '$nominal_awal' + '$nominal' WHERE id_siswa = '$kembali'");

if ($query && $update_siswa_query) {
    echo "
        <script>
        alert('Berhasil Mengubah Data');
        document.location.href = 'info_pembayaran.php?id_siswa=$kembali';
        </script>
    ";
} else {
    echo "
        <script>
        alert('Gagal Mengubah data. Silakan coba lagi.');
        document.location.href = 'info_pembayaran.php?id_siswa=$kembali';
        </script>
    ";
}
?>
