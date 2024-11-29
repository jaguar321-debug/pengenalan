<?php
//tambahkan koneksi
include 'koneksi.php';

//ambil data dari form edit
$id_kelas         =$_POST['id_kelas'];
$nama_kelas       =$_POST['nama_kelas'];

//update data ke tabel databases
mysqli_query($koneksi, "update kelas set nama_kelas='$nama_kelas' where id_kelas='$id_kelas'");

//mengalihkan ke halaman index setelah berhasil mengupdate
header("location:index.php");
?>