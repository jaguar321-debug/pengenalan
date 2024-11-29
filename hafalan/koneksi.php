<?php
$koneksi = mysqli_connect("localhost","root","","akademik");

//cek koneksi ke database
if(mysqli_connect_errno()){
    echo "koneksi databases gagal :" , mysqli_connect_errno();
}
?>