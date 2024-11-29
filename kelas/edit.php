<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Edit Data Kelas</title>
    <style>
        .error-message {
            color: red;
            display: none;
        }

        .is-invalid~.error-message {
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
            <h5 class="card-header">Edit Data Kelas</h5>
            <div class="card-body">
                <?php
                include 'koneksi.php';
                $id_kelas = $_GET['id_kelas'];
                $data = mysqli_query($koneksi, "SELECT * FROM kelas WHERE id_kelas = '$id_kelas'");
                $kelas = mysqli_fetch_assoc($data);

                $errors = [];
                $nama_kelas = $kelas['nama_kelas'];

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $nama_kelas = trim($_POST['nama_kelas']);

                    if (empty($nama_kelas)) {
                        $errors['nama_kelas'] = "Nama Kelas tidak boleh kosong";
                    }

                    // Check for duplicate Kelas within the same class
                    $duplicateKelasQuery = mysqli_query($koneksi, "SELECT * FROM kelas WHERE nama_kelas='$nama_kelas' AND id_kelas != '$id_kelas'");
                    if (mysqli_num_rows($duplicateKelasQuery) > 0) {
                        $errors['nama_kelas'] = "Kelas sudah ada, gunakan kelas lain.";
                    }

                    if (empty($errors)) {
                        $update_query = "UPDATE kelas SET nama_kelas ='$nama_kelas' WHERE id_kelas='$id_kelas'";
                        mysqli_query($koneksi, $update_query);
                        echo "<script>alert('Data berhasil diedit');</script>";
                        echo "<script>window.location.href = 'index.php';</script>";
                        exit();
                    }
                }
                ?>
                <form id="updateForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id_kelas=' . $id_kelas; ?>" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Nama Kelas</label>
                        <input type="hidden" name="id_kelas" value="<?php echo $id_kelas; ?>">
                        <input type="text" name="nama_kelas" class="form-control <?php echo isset($errors['nama_kelas']) ? 'is-invalid' : ''; ?>" id="nama_kelas" value="<?php echo htmlspecialchars($nama_kelas); ?>">
                        <div class="error-message"><?php echo $errors['nama_kelas'] ?? ''; ?></div>
                    </div>
                    <button type="submit" class="btn btn-info">Simpan</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
