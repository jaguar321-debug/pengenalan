<?php
//Tambahkan koneksi databases
include 'koneksi.php';

//menerima data dari form
$nama_guru     =$_POST['nama_guru'];

// mengirim ke databases
mysqli_query($koneksi, "insert into guru values('','$nama_guru')");

//sesudah menginput di alihkan ke halaman index
header("location:index.php");
?>