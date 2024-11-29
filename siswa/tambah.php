<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>CRUD Santri</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #488AC7;">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Pemilahan</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../index.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../kelas/index.php">Data Kelas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../siswa/index.php">Data Santri</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../hafalan/index.php">Data Hafalan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../guru/index.php">Data Guru</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<br>
<div class="container">
    <div class="card">
        <div class="card-header">Data Santri</div>
        <div class="card-body">
            <form id="santriForm" action="proses_simpan.php" method="POST">
                <div class="mb-3">
                    <label class="form-label">Nis</label>
                    <input type="text" name="nis" class="form-control" id="nis">
                    <div class="text-danger" id="nisError" style="display:none;">Nis is required</div>
                    <div class="text-danger" id="nisUniqueError" style="display:none;">Nis sudah terdaftar</div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" id="nama">
                    <div class="text-danger" id="namaError" style="display:none;">Nama Lengkap is required</div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Kelas</label>
                    <select class="form-control" name="id_kelas" id="id_kelas">
                        <option value="">-- Pilih Kelas --</option>
                        <?php
                        include 'koneksi.php';
                        $data = mysqli_query($koneksi, "select * from kelas");
                        while ($d = mysqli_fetch_array($data)) {
                            ?>
                            <option value="<?php echo $d['id_kelas']; ?>"><?php echo $d['nama_kelas']; ?></option>
                        <?php } ?>
                    </select>
                    <div class="text-danger" id="kelasError" style="display:none;">Kelas is required</div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <input type="text" name="alamat" class="form-control" id="alamat">
                    <div class="text-danger" id="alamatError" style="display:none;">Alamat is required</div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script>
document.getElementById('santriForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent form from submitting
    let isValid = true;

    // Validate Nis
    const nis = document.getElementById('nis').value;
    const nisError = document.getElementById('nisError');
    const nisUniqueError = document.getElementById('nisUniqueError');
    if (nis === '') {
        nisError.style.display = 'block';
        isValid = false;
    } else {
        nisError.style.display = 'none';
    }

    // Validate Nama Lengkap
    const nama = document.getElementById('nama').value;
    const namaError = document.getElementById('namaError');
    if (nama === '') {
        namaError.style.display = 'block';
        isValid = false;
    } else {
        namaError.style.display = 'none';
    }

    // Validate Kelas
    const kelas = document.getElementById('id_kelas').value;
    const kelasError = document.getElementById('kelasError');
    if (kelas === '') {
        kelasError.style.display = 'block';
        isValid = false;
    } else {
        kelasError.style.display = 'none';
    }

    // Validate Alamat
    const alamat = document.getElementById('alamat').value;
    const alamatError = document.getElementById('alamatError');
    if (alamat === '') {
        alamatError.style.display = 'block';
        isValid = false;
    } else {
        alamatError.style.display = 'none';
    }

    if (isValid) {
        // Perform AJAX request to check NIS uniqueness
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'proses_simpan.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (this.status === 200) {
                const response = JSON.parse(this.responseText);
                if (response.status === 'error' && response.message === 'NIS sudah terdaftar.') {
                    nisUniqueError.style.display = 'block';
                } else {
                    nisUniqueError.style.display = 'none';
                    // Display success message or redirect to another page
                    alert(response.message);
                    if (response.status === 'success') {
                        document.getElementById('santriForm').reset();
                    }
                }
            }
        };
        const params = `nis=${nis}&nama=${nama}&id_kelas=${kelas}&alamat=${alamat}`;
        xhr.send(params);
    }
});
</script>
</body>
</html>
