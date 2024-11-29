


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <!-- Bootstrap Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">

    <title>Dashboard - Pemilahan</title>
    <style>
        body {
            display: flex;
            min-height: 100vh;
            margin: 0;
            background: #f3f4f6;
            font-family: Arial, sans-serif;
        }
        .sidebar {
            width: 250px;
            height: 100%;
            background: linear-gradient(45deg, #488AC7, #357ABD);
            color: white;
            position: fixed;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: width 0.3s;
            z-index: 1000;
        }
        .sidebar:hover {
            width: 300px;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
        }
        .sidebar .nav-link {
            display: flex;
            align-items: center;
            padding: 10px 20px;
            transition: background-color 0.3s, padding-left 0.3s;
        }
        .sidebar .nav-link.active, .sidebar .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
            padding-left: 30px;
        }
        .sidebar .nav-link i {
            margin-right: 10px;
            font-size: 1.2rem;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
            flex-grow: 1;
            transition: margin-left 0.3s;
        }
        .sidebar:hover ~ .content {
            margin-left: 300px;
        }
        .contact-person {
            text-align: center;
            padding: 20px;
        }
        .tooltip-custom {
            position: absolute;
            background-color: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 0.9rem;
            display: none;
            white-space: nowrap;
            z-index: 1001;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div>
            <button class="btn btn-sidebar text-white w-100 text-start mb-4" aria-current="page"><i class="bi bi-house-door-fill"></i> Pemilahan</button>
            <ul class="nav flex-column text-center">
                <li class="nav-item position-relative">
                    <a class="nav-link" href="#"><i class="bi bi-house-door-fill"></i> Dashboard</a>
                    <div class="tooltip-custom">Dashboard</div>
                </li>
                <li class="nav-item position-relative">
                    <a class="nav-link" href="kelas/index.php"><i class="bi bi-journal-bookmark-fill"></i> Data Kelas</a>
                    <div class="tooltip-custom">Data Kelas</div>
                </li>
                <li class="nav-item position-relative">
                    <a class="nav-link" href="siswa/index.php"><i class="bi bi-person-fill"></i> Data Santri</a>
                    <div class="tooltip-custom">Data Santri</div>
                </li>
                <li class="nav-item position-relative">
                    <a class="nav-link" href="hafalan/index.php"><i class="bi bi-book-fill"></i> Data Hafalan</a>
                    <div class="tooltip-custom">Data Hafalan</div>
                </li>
                <li class="nav-item position-relative">
                    <a class="nav-link" href="guru/index.php"><i class="bi bi-person-badge-fill"></i> Data Guru</a>
                    <div class="tooltip-custom">Data Guru</div>
                </li>
            </ul>
        </div>
        <div class="contact-person">
            <h5>Contact Person</h5>
            <p>
                <i class="bi bi-person-circle"></i> John Doe<br>
                <i class="bi bi-envelope-fill"></i> johndoe@example.com<br>
                <i class="bi bi-telephone-fill"></i> +1234567890
            </p>
        </div>
    </div>

    <!-- Content -->
    <div class="content container-fluid">
        <h2 class="text-center mb-4">Dashboard</h2>
        <div class="row">
            <div class="col-md-6 my-4">
                <div class="card">
                    <h5 class="card-header bg-primary text-white">
                        Data Santri
                    </h5>
                    <div class="card-body">
                        <p class="card-text">Kelola data santri di sini.</p>
                        <a href="siswa/index.php" class="btn btn-info">Lihat Data Santri</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 my-4">
                <div class="card">
                    <h5 class="card-header bg-primary text-white">
                        Data Kelas
                    </h5>
                    <div class="card-body">
                        <p class="card-text">Kelola data kelas di sini.</p>
                        <a href="kelas/index.php" class="btn btn-info">Lihat Data Kelas</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 my-4">
                <div class="card">
                    <h5 class="card-header bg-primary text-white">
                        Data Hafalan
                    </h5>
                    <div class="card-body">
                        <p class="card-text">Kelola data hafalan di sini.</p>
                        <a href="hafalan/index.php" class="btn btn-info">Lihat Data Hafalan</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 my-4">
                <div class="card">
                    <h5 class="card-header bg-primary text-white">
                        Data Guru
                    </h5>
                    <div class="card-body">
                        <p class="card-text">Kelola data guru di sini.</p>
                        <a href="guru/index.php" class="btn btn-info">Lihat Data Guru</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script>
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('mouseover', () => {
                link.querySelector('.tooltip-custom').style.display = 'block';
            });
            link.addEventListener('mouseout', () => {
                link.querySelector('.tooltip-custom').style.display = 'none';
            });
        });
    </script>
</body>

</html>
