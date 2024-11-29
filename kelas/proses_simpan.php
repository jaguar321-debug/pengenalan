<?php
//Tambahkan koneksi databases
include 'koneksi.php';

//menerima data dari form
$nama_kelas     =$_POST['nama_kelas'];

// mengirim ke databases
mysqli_query($koneksi, "insert into kelas values('','$nama_kelas')");

//sesudah menginput di alihkan ke halaman index
header("location:index.php");
?>