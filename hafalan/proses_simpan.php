<?php
// Tambahkan koneksi databases
include 'koneksi.php';

// Menerima data dari form
$nama_juz   = $_POST['nama_juz'];
$id_santri  = $_POST['id_santri'];
$id_guru    = $_POST['id_guru'];
$tanggal    = $_POST['tanggal'];

// Mengirim ke databases
$insert = mysqli_query($koneksi, "INSERT INTO hafalan VALUES ('', '$nama_juz', '$id_santri', '$id_guru', '$tanggal')");

// Cek jika query berhasil dijalankan
if ($insert) {
    // Alert jika data berhasil ditambahkan
    echo '<script>alert("Data berhasil ditambahkan");</script>';
    // Redirect ke halaman index
    echo '<script>window.location.href = "index.php";</script>';
} else {
    // Alert jika terjadi kesalahan
    echo '<script>alert("Gagal menambahkan data");</script>';
    // Redirect ke halaman index
    echo '<script>window.location.href = "index.php";</script>';
}
?>
