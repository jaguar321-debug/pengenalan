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
            <h5 class="card-header">Data Kelas</h5>
            <div class="card-body">
                <form id="kelasForm" action="proses_simpan.php" method="POST" onsubmit="return validateForm()">
                    <div class="mb-3">
                        <label class="form-label">Kelas</label>
                        <input type="text" name="nama_kelas" class="form-control" id="nama_kelas">
                        <div id="nama_kelas_error" style="color: red;"></div>
                    </div>
                    <button type="submit" class="btn btn-info">Simpan</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- JavaScript for form validation -->
    <script>
        function validateForm() {
            var nama_kelas = document.getElementById("nama_kelas").value.trim();
            var error_message = document.getElementById("nama_kelas_error");
            
            if (nama_kelas == "") {
                error_message.innerHTML = "Nama kelas tidak boleh kosong";
                return false; // Prevent form submission
            } else {
                error_message.innerHTML = ""; // Clear error message
                var existingKelas = localStorage.getItem("kelas");
            }
            if (existingKelas && existingKelas.includes(nama_kelas)) {
                error_message.innerHTML = "Nama kelas sudah ada";
                return false; // Prevent form submission
            } else {
                // Simpan nama kelas ke localStorage
                if (!existingKelas) {
                    existingKelas = "";
                }
                existingKelas += nama_kelas + ",";
                localStorage.setItem("kelas", existingKelas);
                alert("data berhasil ditambahkan");
                return true; // Allow form submission
            }
        }
    </script>
</body>

</html>