<?php
// tambahkan koneksi
include 'koneksi.php';

// ambil data dari form edit
$id_santri   = $_POST['id_santri'];
$nis         = $_POST['nis'];
$nama        = $_POST['nama'];
$id_kelas    = $_POST['id_kelas'];
$alamat      = $_POST['alamat'];

// update data ke tabel databases
$result = mysqli_query($koneksi, "UPDATE santri SET nis='$nis', nama='$nama', id_kelas='$id_kelas', alamat='$alamat' WHERE id_santri='$id_santri'");

if ($result) {
    // alert data berhasil diedit
    echo "<script>alert('Data berhasil diedit');</script>";
} else {
    // alert jika terjadi masalah saat mengedit data
    echo "<script>alert('Gagal mengedit data');</script>";
}

// mengalihkan ke halaman index setelah berhasil mengupdate
header("location:index.php");
?>
