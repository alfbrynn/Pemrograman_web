<?php
session_start();

// Login
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validasi login
    if (empty($username) || empty($password)) {
        $error = "Username dan Password harus terisi";
    } elseif (strlen($password) > 6) {
        $error = "Password maksimal 6 karakter";
    } elseif (!preg_match('/[A-Z]/', $password) || !preg_match('/[a-z]/', $password)) {
        $error = "Password harus terdiri dari huruf besar, kecil dan angka";
    } else {
        $_SESSION['username'] = $username;
        header('Location: index.php?page=home');
        exit();
    }
}

// Logout
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    session_destroy();
    header('Location: index.php');
    exit();
}

// Cek Harga
$total = 0;
$total_transaksi = 0;
$total_diskon = 0;
$kupon_diskon = 0;

if (isset($_POST['check'])) {
    $berat = $_POST['berat'];
    $jenis = $_POST['jenis'];
    $kecepatan = $_POST['kecepatan'];
    $member = $_POST['member'];

    // cek apakah jumlah transaksi tersimpan di session
    if (!isset($_SESSION['jumlah_transaksi'])) {
        $_SESSION['jumlah_transaksi'] = 0; // Inisialisasi jika belum ada
    }

    $harga = 0;
    if ($jenis == "Cuci Kering") {
        $harga = 5000 * $berat;
    } elseif ($jenis == "Cuci Setrika") {
        $harga = 8000 * $berat;
    } else {
        $harga = 6000 * $berat;
    }

    if ($kecepatan == "Ekspress") {
        $harga += 2000 * $berat;
    }

    // Hitung total transaksi sebelum diskon
    $total_transaksi = $harga;

    // Hitung diskon jika member
    if ($member == "Member") {
        $total_diskon = 0.1 * $total_transaksi; // 10% diskon
        $total = $total_transaksi - $total_diskon; // Total setelah diskon
    } else {
        $total = $total_transaksi; // Total tanpa diskon
    }

    // Tambahkan logika kupon: gratis 2 kg pada transaksi ke-6
    if ($_SESSION['jumlah_transaksi'] == 5) {
        // Diskon gratis 2 kg
        $berat_diskon = min(2, $berat); // Maksimal 2 kg gratis
        $kupon_diskon = ($harga / $berat) * $berat_diskon; // Hitung nilai diskon 2 kg
        $total -= $kupon_diskon; // Kurangi total dengan diskon kupon

        // Reset jumlah transaksi setelah transaksi ke-6
        $_SESSION['jumlah_transaksi'] = 0;
    } else {
        // Tambah jumlah transaksi jika belum ke-6
        $_SESSION['jumlah_transaksi'] += 1;
    }
}


// Cej halaman yang aktif
$page = isset($_GET['page']) ? $_GET['page'] : 'login';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Laundry</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f0f8ff;
        }

        .navbar {
            background-color: #007bff !important; 
        }
        .navbar .nav-link {
            color: white !important;
        }

        .carousel-inner img {
            height: 50vh;
            object-fit: cover;
        }

        .profil-perusahaan {
            margin-top: 2rem;
            padding: 1.5rem;
            background-color: #e6f7ff;
            border-radius: 8px;
        }

        .profil-perusahaan h2 {
            font-weight: bold;
            color: #007bff; 
        }

        .profil-perusahaan p {
            font-weight: normal;
            color: #333;
        }

        @media (max-width: 768px) {
            .carousel-inner img {
                height: 30vh;
            }
        }
    </style>
    <script>
    function confirmLogout() {
        // Menampilkan dialog konfirmasi
        var confirmAction = confirm("Apakah Anda yakin ingin log out?");
        if (confirmAction) {
            // Jika pengguna memilih "Yes", maka akan logout
            window.location.href = "index.php?action=logout";
        }
    }
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#" style="font-weight: bold; color: white;">LaundryApp</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <?php if (isset($_SESSION['username'])): ?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=cek_harga">Cek Harga</a>
                </li>
                <li class="nav-item">
                    <!-- Konfirmasi logout -->
                    <a class="nav-link" href="#" onclick="confirmLogout()">Logout</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>

<div class="container mt-5">
    <?php if ($page == 'login' && !isset($_SESSION['username'])): ?>
        <!-- Halaman Login -->
        <h2 class="text-center">Login</h2>
        <form action="index.php" method="POST" class="mt-3">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
            </div>
            <?php if (isset($error)): ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php endif; ?>
            <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
        </form>

        <?php elseif ($page == 'home' && isset($_SESSION['username'])): ?>
        <!-- Halaman Home -->
        <div id="carouselExampleIndicators" class="carousel slide mt-4" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/1.jpg" class="d-block w-100" alt="Banner 1">
                </div>
                <div class="carousel-item">
                    <img src="img/2.jpg" class="d-block w-100" alt="Banner 2">
                </div>
                <div class="carousel-item">
                    <img src="img/3.jpeg" class="d-block w-100" alt="Banner 3">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <!-- Profil Perusahaan -->
        <div class="profil-perusahaan">
            <h2 style="text-align: center;">Profil Perusahaan</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, itaque. Ipsam dicta non, odit reprehenderit nesciunt ipsum unde quis iste doloremque consectetur corrupti ex nulla fuga ratione cupiditate vitae? Temporibus. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Suscipit enim quae molestiae blanditiis possimus dolorem temporibus consequatur tenetur architecto nam voluptates reprehenderit eos exercitationem expedita, accusantium accusamus necessitatibus, nobis amet? Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus vel laborum placeat. Ad animi perferendis illum voluptas dolore soluta id non, molestiae maiores quas magnam maxime odit voluptatibus ducimus explicabo. lorem</p>
        </div>

    <?php elseif ($page == 'cek_harga' && isset($_SESSION['username'])): ?>
        <!-- Halaman Cek Harga -->
        <h2 class="text-center">Cek Harga Laundry</h2>
        <form action="index.php?page=cek_harga" method="POST">
            <div class="form-group">
                <label for="berat">Berat (kg):</label>
                <input type="number" class="form-control" id="berat" name="berat" required>
            </div>
            <div class="form-group">
                <label for="jenis">Jenis Layanan:</label>
                <select class="form-control" id="jenis" name="jenis">
                    <option value="Cuci Kering">Cuci Kering</option>
                    <option value="Cuci Setrika">Cuci Setrika</option>
                    <option value="Setrika">Setrika</option>
                </select>
            </div>
            <div class="form-group">
                <label for="kecepatan">Kecepatan:</label>
                <select class="form-control" id="kecepatan" name="kecepatan">
                    <option value="Reguler">Reguler</option>
                    <option value="Ekspress">Ekspress</option>
                </select>
            </div>
            <div class="form-group">
                <label for="member">Membership:</label>
                <select class="form-control" id="member" name="member">
                    <option value="Non Member">Non Member</option>
                    <option value="Member">Member</option>
                </select>
            </div>
            <button type="submit" name="check" class="btn btn-primary">CHECK</button>
        </form>

        <h3 class="mt-4">Total Transaksi Sebelum Diskon: Rp <?php echo number_format($total_transaksi, 0, ',', '.'); ?></h3>
        <h3>Total Diskon Member: Rp <?php echo number_format($total_diskon, 0, ',', '.'); ?></h3>
        <!-- <h3>Diskon kupon : Rp <?php echo number_format($kupon_diskon, 0, ',', '.'); ?></h3> -->
        <h3>Total Harga yang Harus Dibayar: Rp <?php echo number_format($total, 0, ',', '.'); ?></h3>

    <?php endif; ?>
</div>

</body>
</html>
