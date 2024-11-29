<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>CRUD Santri</title>
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
            <h5 class="card-header">Data Santri</h5>
            <div class="card-body">
                <?php
                include 'koneksi.php';
                $id_santri = $_GET['id_santri'];
                $data = mysqli_query($koneksi, "SELECT * FROM santri WHERE id_santri = '$id_santri'");
                $santri = mysqli_fetch_assoc($data);

                $errors = [];
                $nis = $santri['nis'];
                $nama = $santri['nama'];
                $id_kelas = $santri['id_kelas'];
                $alamat = $santri['alamat'];

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $nis = trim($_POST['nis']);
                    $nama = trim($_POST['nama']);
                    $id_kelas = trim($_POST['id_kelas']);
                    $alamat = trim($_POST['alamat']);

                    if (empty($nis)) {
                        $errors['nis'] = "Nis is required";
                    }
                    if (empty($nama)) {
                        $errors['nama'] = "nama Lengkap is required";
                    }
                    if (empty($id_kelas)) {
                        $errors['id_kelas'] = "Kelas is required";
                    }
                    if (empty($alamat)) {
                        $errors['alamat'] = "Alamat is required";
                    }

                    // Check for duplicate NIS within the same class
                    $duplicateNISQuery = mysqli_query($koneksi, "SELECT * FROM santri WHERE nis='$nis' AND id_santri != '$id_santri'");
                    if (mysqli_num_rows($duplicateNISQuery) > 0) {
                        $errors['nis'] = "NIS sudah ada, gunakan NIS lain.";
                    }

                    if (empty($errors)) {
                        $update_query = "UPDATE santri SET nis='$nis', nama='$nama', id_kelas='$id_kelas', alamat='$alamat' WHERE id_santri='$id_santri'";
                        mysqli_query($koneksi, $update_query);
                        echo "<script>alert('Data berhasil diedit');</script>";
                        echo "<script>window.location.href = 'index.php';</script>";
                        exit();
                    }
                }
                ?>
                <form id="updateForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id_santri=' . $id_santri; ?>" method="POST">
                    <div class="mb-3">
                        <label class="form-label">NIS</label>
                        <input type="text" name="nis" class="form-control <?php echo isset($errors['nis']) ? 'is-invalid' : ''; ?>" id="nis" value="<?php echo htmlspecialchars($nis); ?>">
                        <div class="error-message"><?php echo $errors['nis'] ?? ''; ?></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="hidden" name="id_santri" value="<?php echo $id_santri; ?>">
                        <input type="text" name="nama" class="form-control <?php echo isset($errors['nama']) ? 'is-invalid' : ''; ?>" id="nama" value="<?php echo htmlspecialchars($nama); ?>">
                        <div class="error-message"><?php echo $errors['nama'] ?? ''; ?></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kelas</label>
                        <select class="form-control <?php echo isset($errors['id_kelas']) ? 'is-invalid' : ''; ?>" name="id_kelas" id="id_kelas">
                            <option value="">-- Pilih Kelas --</option>
                            <?php
                            $kelas = mysqli_query($koneksi, "SELECT * FROM kelas");
                            while ($a = mysqli_fetch_array($kelas)) {
                                $selected = $a['id_kelas'] == $id_kelas ? 'selected' : '';
                                echo "<option value=\"{$a['id_kelas']}\" $selected>{$a['nama_kelas']}</option>";
                            }
                            ?>
                        </select>
                        <div class="error-message"><?php echo $errors['id_kelas'] ?? ''; ?></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <input type="text" name="alamat" class="form-control <?php echo isset($errors['alamat']) ? 'is-invalid' : ''; ?>" id="alamat" value="<?php echo htmlspecialchars($alamat); ?>">
                        <div class="error-message"><?php echo $errors['alamat'] ?? ''; ?></div>
                    </div>
                    <button type="submit" class="btn btn-info">Simpan</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Script untuk menampilkan alert -->
    <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($errors)) : ?>
        <script>
            alert("Ada kesalahan dalam pengeditan data. Mohon periksa kembali formulir.");
        </script>
    <?php endif; ?>
</body>
</html>
