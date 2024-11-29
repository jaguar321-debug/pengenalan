<?php
// tambahkan koneksi
include 'koneksi.php';

// ambil data dari form edit
$id_juz       = $_POST['id_juz'];
$nama_juz     = $_POST['nama_juz'];
$id_santri    = $_POST['id_santri'];
$id_guru      = $_POST['id_guru'];
$tanggal      = $_POST['tanggal'];

// update data ke tabel databases
$update = mysqli_query($koneksi, "UPDATE hafalan SET nama_juz='$nama_juz', id_santri='$id_santri', id_guru='$id_guru', tanggal='$tanggal' WHERE id_juz='$id_juz'");

// cek apakah query update berhasil dijalankan
if ($update) {
    // jika berhasil, redirect ke halaman index dengan alert
    echo '<script>alert("Data berhasil diedit"); window.location.href = "index.php";</script>';
} else {
    // jika gagal, tampilkan pesan error
    echo "Error: " . mysqli_error($koneksi);
}

// tutup koneksi
mysqli_close($koneksi);
?>
