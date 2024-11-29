<?php
//tambahkan koneksi
include 'koneksi.php';

//ambil data dari form edit
$id_guru         =$_POST['id_guru'];
$nama_guru       =$_POST['nama_guru'];

//update data ke tabel databases
mysqli_query($koneksi, "update guru set nama_guru='$nama_guru' where id_guru='$id_guru'");

//mengalihkan ke halaman index setelah berhasil mengupdate
header("location:index.php");
?>


