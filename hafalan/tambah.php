<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>crud santri</title>
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
            <h5 class="card-header">Data Hafalan</h5>
            <div class="card-body">
                <form action="proses_simpan.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Surah</label>
                        <input type="text" name="nama_juz" class="form-control" id="nama_juz">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Santri</label>
                        <select class="form-control" name="id_santri">
                            <option value="">--</option>
                            <?php
                            include 'koneksi.php';
                            $data = mysqli_query($koneksi, "select * from santri");
                            while ($d = mysqli_fetch_array($data)) {
                            ?>
                                <option value="<?php echo $d['id_santri']; ?>"><?php echo $d['nama']; ?></option>
                            <?php
                            } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Guru</label>
                        <select class="form-control" name="id_guru">
                            <option value="">--</option>
                            <?php
                            include 'koneksi.php';
                            $data = mysqli_query($koneksi, "select * from guru");
                            while ($d = mysqli_fetch_array($data)) {
                            ?>
                                <option value="<?php echo $d['id_guru']; ?>"><?php echo $d['nama_guru']; ?></option>
                            <?php
                            } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-info">Simpan</button>
                </form>
            </div>
        </div>
    </div>




    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>