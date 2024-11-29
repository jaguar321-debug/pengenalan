<?php
include 'koneksi.php';

if (isset($_GET['id_guru'])) {
    $id_guru = $_GET['id_guru'];

    // Menghapus data berdasarkan id_guru
    $deleteQuery = "DELETE FROM guru WHERE id_guru = '$id_guru'";
    if (mysqli_query($koneksi, $deleteQuery)) {
        echo "<script>alert('Data berhasil dihapus.'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Data sedang digunakan.'); window.location='index.php';</script>";
    }
} else {
    echo "<script>alert('ID tidak ditemukan.'); window.location='index.php';</script>";
}
?>
