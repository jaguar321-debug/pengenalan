<?php
include 'koneksi.php';

if (isset($_GET['id_juz'])) {
    $id_juz = $_GET['id_juz'];

    // Menghapus data berdasarkan id_juz
    $deleteQuery = "DELETE FROM juz WHERE id_juz = '$id_juz'";
    if (mysqli_query($koneksi, $deleteQuery)) {
        echo "<script>alert('Data berhasil dihapus.'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Data sedang digunakan.'); window.location='index.php';</script>";
    }
} else {
    echo "<script>alert('ID tidak ditemukan.'); window.location='index.php';</script>";
}
?>
