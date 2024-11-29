<?php
include 'koneksi.php';

if (isset($_GET['id_santri'])) {
    $id_santri = $_GET['id_santri'];

    // Menghapus data berdasarkan id_santri
    $deleteQuery = "DELETE FROM santri WHERE id_santri = '$id_santri'";
    if (mysqli_query($koneksi, $deleteQuery)) {
        echo "<script>alert('Data berhasil dihapus.'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Data sedang digunakan.'); window.location='index.php';</script>";
    }
} else {
    echo "<script>alert('ID tidak ditemukan.'); window.location='index.php';</script>";
}
?>
