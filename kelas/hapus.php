<?php
include 'koneksi.php';

if (isset($_GET['id_kelas'])) {
    $id_kelas = $_GET['id_kelas'];

    // Menghapus data berdasarkan id_kelas
    $deleteQuery = "DELETE FROM kelas WHERE id_kelas = '$id_kelas'";
    if (mysqli_query($koneksi, $deleteQuery)) {
        echo "<script>alert('Data berhasil dihapus.'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Data sedang digunakan.'); window.location='index.php';</script>";
    }
} else {
    echo "<script>alert('ID tidak ditemukan.'); window.location='index.php';</script>";
}
?>
