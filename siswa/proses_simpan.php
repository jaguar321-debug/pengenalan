<?php
include 'koneksi.php';

$nis = $_POST['nis'];
$nama = $_POST['nama'];
$id_kelas = $_POST['id_kelas'];
$alamat = $_POST['alamat'];

// Check if NIS already exists
$checkNisQuery = "SELECT * FROM santri WHERE nis='$nis'";
$result = mysqli_query($koneksi, $checkNisQuery);

if(mysqli_num_rows($result) > 0) {
    // NIS already exists
    echo json_encode(['status' => 'error', 'message' => 'NIS sudah terdaftar.']);
    exit;
}

// Insert new record
$query = "INSERT INTO santri (nis, nama, id_kelas, alamat) VALUES ('$nis', '$nama', '$id_kelas', '$alamat')";
$insert = mysqli_query($koneksi, $query);

if($insert) {
    echo json_encode(['status' => 'success ', 'message' => 'Data berhasil ditambahkan.']);
    
} else {
    echo json_encode(['status' => 'error', 'message' => 'Gagal menambahkan data.']);
}
?>
