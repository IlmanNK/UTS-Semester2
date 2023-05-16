<?php 
include 'db.php';

?>



<!DOCTYPE html>
<html>

<head>
    <title>VEG MARKET</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: #28a745;
        }

        .navbar-brand,
        .nav-link {
            color: #fff;
        }

        .jumbotron {
            background-image: url('https://example.com/path/to/background-image.jpg');
            background-size: cover;
            height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            text-align: center;
        }

        #section-beranda {
            background-image: url('asset/Garden Detective_ A tip or chore for every day in June.jpeg');
            background-size: cover;
            background-repeat: no-repeat;
        }



        .jumbotron h1 {
            font-size: 48px;
        }

        .jumbotron p {
            font-size: 24px;
        }

        .footer {
            background-color: #333;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }

        .footer a {
            color: #fff;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="#">VEGETABLE MARKET</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="dashboard.php">Dashboard <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profil.php">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="data-kategori.php">Data Kategori</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="data-produk.php">Data produk</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="login.php">
                        Masuk
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="jumbotron" id="section-beranda">
        <div class="container">
            <h1>Selamat datang di Toko Online Sayur!</h1>
            <p>Temukan berbagai pilihan sayuran dan buah-buahan segar langsung dari kebun kami.</p>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img class="card-img-top" src="asset/FARMERS' MARKET IDEAS.jpeg" alt="Sayur">
                            <div class="card-body">
                                <h5 class="card-title">Sayur</h5>
                                <p class="card-text">Pesanlah Sayuran di toko kami</p>
                                <!-- <p class="card-text">Harga: Rp. XXXX</p> -->
                                <a href="form-pelanggan.php" class="btn btn-primary">Tambah ke Keranjang</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img class="card-img-top img-fluid" src="asset/top view fresh fruits different ripe and mellow fruits on white desk photo tasty color diet berry.jpeg" alt="Buah">
                            <div class="card-body">
                                <h5 class="card-title">Buah</h5>
                                <p class="card-text">Pesanlah Sayuran di toko kami</p>
                                <!-- <p class="card-text">Harga: Rp. XXXX</p> -->
                                <a href="form-pelanggan.php" class="btn btn-primary">Tambah ke Keranjang</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img class="card-img-top" src="asset/Spice Up Your Life Without Salt Part II - Kidney Diet Tips.jpeg" alt="Rempah">
                            <div class="card-body">
                                <h5 class="card-title">Rempah</h5>
                                <p class="card-text">Pesanlah Rempah di toko kami</p>
                                <!-- <p class="card-text">Harga: Rp. XXXX</p> -->
                                <a href="form-pelanggan.php" class="btn btn-primary">Tambah ke Keranjang</a>
                            </div>
                        </div>
                    </div>
                    <!-- Tambahkan lebih banyak produk di sini -->
                </div>

            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <small>Copyright &copy; 2023 - VEGETABLE MARKET</small>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>

</html>