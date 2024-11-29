<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>crud santri</title>
    <style>
        .error-message {
            color: red;
            display: none;
        }

        .is-invalid ~ .error-message {
            display: block;
        }
    </style>
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
            <h5 class="card-header">Data Guru</h5>
            <div class="card-body">
                <?php
                session_start();
                if (isset($_SESSION['status'])) {
                    echo '<div class="alert alert-success" role="alert">' . $_SESSION['status'] . '</div>';
                    unset($_SESSION['status']);
                }

                include 'koneksi.php';
                $id_guru = $_GET['id_guru'];
                $data = mysqli_query($koneksi, "SELECT * FROM guru WHERE id_guru = '$id_guru'");
                while ($d = mysqli_fetch_array($data)) {
                ?>
                    <form id="guruForm" action="update.php" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Nama Guru</label>
                            <input type="hidden" name="id_guru" value="<?php echo $d['id_guru'] ?>">
                            <input type="text" name="nama_guru" class="form-control <?php echo (empty($d['nama_guru']) ? 'is-invalid' : ''); ?>" id="nama_guru" value="<?php echo $d['nama_guru'] ?>">
                            <div class="error-message">Nama Guru Tidak Boleh Kosong</div>
                        </div>
                        <button type="submit" class="btn btn-info">Simpan</button>
                    </form>
                <?php } ?>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('guruForm').addEventListener('submit', function(event) {
                var isValid = true;

                var nama_guru = document.getElementById('nama_guru');

                if (nama_guru.value.trim() === '') {
                    isValid = false;
                    nama_guru.classList.add('is-invalid');
                } else {
                    nama_guru.classList.remove('is-invalid');
                }

                if (!isValid) {
                    event.preventDefault();
                }
                alert('data berhasil diedit');
            });
        });
    </script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>
