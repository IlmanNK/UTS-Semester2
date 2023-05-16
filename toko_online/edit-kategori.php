<?php
include 'db.php';
session_start();
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}

$kategori = mysqli_query($conn, "SELECT * FROM kategori_produk WHERE kategori_id = '".$_GET['id']."' ");
if(mysqli_num_rows($kategori) == 0){
    echo '<script>window.location="data-kategori.php"</script>';
}
$k = mysqli_fetch_object($kategori);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>VEG MARKET</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css\style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <!--===============================================================================================-->

</head>


<body>
    <!-- HEADER -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-success">
            <a class="navbar-brand" href="#">VEGETABLE MARKET</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown" style="margin-left: 450px;">
                <ul class="navbar-nav" style="color: white;">
                    <li class="nav-item active">
                        <a class="nav-link" href="dashboard.php">Dashboard</a>
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
                        <a class="nav-link" href="keluar.php">
                           Keluar
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

    </header>
    <!-- CONTENT -->
    <div class="section">
        <div class="container">
            <h3>
                Edit Data Kategori
            </h3>
            <div class="box">
                <form action="" method="POST">
                    <div class="form-group row">
                        <label for="nama" class="col-4 col-form-label">Nama Kategori</label>
                        <div class="col-8">
                            <div class="input-group">
                                <input id="nama" name="nama" type="text" class="input-control" value="<?php echo $k->nama_kategori ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-4 col-8">
                            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
                <?php 
                if(isset($_POST['submit'])){
                    $nama = ucwords($_POST['nama']);

                    $update = mysqli_query($conn, "UPDATE kategori_produk SET
                                            nama_kategori = '".$nama."'
                                            WHERE kategori_id = '".$k->kategori_id."'  " );

                    if($update){
                        echo '<script>alert("Edit data Berhasil")</script>';
                        echo '<script>window.location="data-kategori.php"</script>';
                    } else{
                        echo 'gagal'.mysqli_error($conn);
                    }
                }
                ?>
            </div>
            <br>

        </div>
    </div>
    <footer>
        <div class="container">
            <small>Copyright &copy; 2023 - VEGETABLE MARKET</small>
        </div>
    </footer>
</body>

</html>