<?php
// Assuming you have the necessary credentials for your database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "tugas2web";

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Rest of your code
if (isset($_POST['tambah'])) {
    // Sanitize and retrieve form data
    $nama = htmlspecialchars($_POST['nama']);
    $tgl_lahir = htmlspecialchars($_POST['tgl']);
    $jk = htmlspecialchars($_POST['jk']);
    $agama = htmlspecialchars($_POST['agama']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $hp = htmlspecialchars($_POST['hp']);
    $email = htmlspecialchars($_POST['email']);

    // Check for empty fields
    if (empty($nama) || empty($tgl_lahir) || empty($jk) || empty($agama) || empty($alamat) || empty($hp) || empty($email)) {
        echo "<script>alert('Pastikan Anda sudah mengisi semua formulir.');window.location='?p=anggota';</script>";
    } else {
        // Perform the database insertion
        $sql = $conn->query("INSERT INTO tb_anggota VALUES (null, '$nama', '$tgl_lahir', '$jk', '$agama', '$alamat', '$hp', '$email')") or die(mysqli_error($conn));
        if ($sql) {
            echo "<script>alert('Data Berhasil Ditambahkan.');window.location='?p=anggota';</script>";
        } else {
            echo "<script>alert('Data Gagal Ditambahkan.')</script>";
        }
    }
}

// Close the database connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <title>Tambah Anggota</title>
</head>

<body>
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">Start Bootstrap</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->

        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li><hr class="dropdown-divider" /></li>
                    <li><a class="dropdown-item" href="#!">Logout</a></li>
</ul>
</li>
</ul>
</nav>
<div id="layoutSidenav">
<div id="layoutSidenav_nav">
<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
<div class="sb-sidenav-menu">
<div class="nav">
<div class="sb-sidenav-menu-heading">Core</div>
<a class="nav-link" href="index.php">
<div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
Dashboard
</a>
<div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                         data-bs-parent="#sidenavAccordion">
<nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
<div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne"
                                 data-bs-parent="#sidenavAccordionPages">
<nav class="sb-sidenav-menu-nested nav">
<a class="nav-link" href="login.html">Login</a>
<a class="nav-link" href="register.html">Register</a>
<a class="nav-link" href="password.html">Forgot Password</a>
</nav>
</div>
<a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                 data-bs-target="#pagesCollapseError" aria-expanded="false"
                                 aria-controls="pagesCollapseError">
Error
<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>
<div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne"
                                 data-bs-parent="#sidenavAccordionPages">
<nav class="sb-sidenav-menu-nested nav">
<a class="nav-link" href="401.html">401 Page</a>
<a class="nav-link" href="404.html">404 Page</a>
<a class="nav-link" href="500.html">500 Page</a>
</nav>
</div>
</nav>
</div>
<div class="sb-sidenav-menu-heading">Addons</div>
<a class="nav-link" href="Tambah.php">
<div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
Tambah
</a>
</div>
</div>
<div class="sb-sidenav-footer">
<div class="small">Logged in as:</div>
Start Bootstrap
</div>
</nav>
</div>
<div id="layoutSidenav_content">
<main>
<div class="container-fluid px-4">
<h1 class="mt-4">Tambahkan Data</h1>
<div class="card-header mb-5">
<div class="container">
<div class="row justify-content-center">
<div class="col-md-6">
<form action="" method="post">
<div class="item form-group">
<label class="col-form-label col-md-3 col-sm-3 label-align"
                                             for="first-name">Nama <span class="required">*</span></label>
<div class="col-md-9 col-sm-9">
<input type="text" id="first-name" required="required"
                                                 class="form-control" name="nama">
</div>
</div>
<div class="item form-group">
<label class="col-form-label col-md-3 col-sm-3 label-align"
                                                for="tgl">Tanggal Lahir <span class="required">*</span></label>
                                            <div class="col-md-9 col-sm-9">
                                                <input type="date" id="tgl" required="required"
                                                    class="form-control" name="tgl">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                for="jk">Jenis Kelamin <span class="required">*</span></label>
                                            <div class="col-md-9 col-sm-9">
                                                <select class="form-control" id="jk" name="jk">
                                                    <option value="Laki-laki">Laki-laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Agama</label>
											<div class="col-md-6 col-sm-6 ">
												<select class="form-control" name="agama" required>
													<option value="">---Pilih Agama---</option>
													<option>Islam</option>
													<option>Kristen Protestan</option>
													<option value="Katolik">Katolik</option>
													<option value="Hindu">Hindu</option>
													<option value="Buddha">Buddha</option>
												</select>
											</div>
										</div>
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                for="alamat">Alamat <span class="required">*</span></label>
                                            <div class="col-md-9 col-sm-9">
                                                <textarea class="form-control" id="alamat" required="required"
                                                    name="alamat"></textarea>
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                for="hp">Nomor HP <span class="required">*</span></label>
                                            <div class="col-md-9 col-sm-9">
                                                <input type="text" id="hp" required="required"
                                                    class="form-control" name="hp">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                for="email">Email <span class="required">*</span></label>
                                            <div class="col-md-9 col-sm-9">
                                                <input type="email" id="email" required="required"
                                                    class="form-control" name="email">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <div class="col-md-6 col-sm-6 offset-md-3">
                                                <input type="submit" class="btn btn-primary" name="tambah"
                                                    value="Tambah">
                                                <a href="?p=anggota" class="btn btn-secondary">Batal</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/datatables.js"></script>
    <script
    src="js/scripts.js"></script>
</body>

</html>

