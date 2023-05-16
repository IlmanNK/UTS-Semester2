<?php
require_once 'db.php'
?>

<?php
session_start();
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}

$query = mysqli_query($conn, "SELECT * FROM admin ORDER BY admin_id = '" . $_SESSION['id'] . "'");
$d = mysqli_fetch_object($query);
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
                    <li class="nav-item ">
                        <a class="nav-link" href="dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="profil.php"> <span class="sr-only">(current)</span>Profil</a>
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
                <P>Profil</P>
            </h3>
            <div class="box">
                <form action="" method="POST">
                    <div class="form-group row">
                        <label for="nama" class="col-4 col-form-label">Nama Lengkap</label>
                        <div class="col-8">
                            <div class="input-group">
                                <input id="nama" name="nama" type="text" class="input-control" value="<?php echo $d->admin_name ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="user" class="col-4 col-form-label">Username</label>
                        <div class="col-8">
                            <input id="user" name="user" type="text" class="input-control" value="<?php echo $d->username ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hp" class="col-4 col-form-label">No hp</label>
                        <div class="col-8">
                            <input id="hp" name="hp" type="text" class="input-control" value="<?php echo $d->admin_telp ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-4 col-form-label">E-mail</label>
                        <div class="col-8">
                            <input id="email" name="email" type="text" class="input-control" value="<?php echo $d->admin_email ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="alamat" class="col-4 col-form-label">Alamat</label>
                        <div class="col-8">
                            <input id="alamat" name="alamat" type="text" class="input-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-4 col-8">
                            <button name="submit" type="submit" class="btn btn-primary">Ubah Profil</button>
                        </div>
                    </div>
                </form>
                <?php
                if (isset($_POST['submit'])) {
                    $nama    = ucwords($_POST['nama']);
                    $user    = $_POST['user'];
                    $hp      = $_POST['hp'];
                    $email   = $_POST['email'];
                    $alamat  = ucwords($_POST['alamat']);

                    $update = "UPDATE admin SET
                                    admin_name = '" . $nama . "',
                                    username = '" . $user . "',
                                    admin_telp = '" . $hp . "',
                                    admin_email = '" . $email . "',
                                    admin_address = '" . $alamat . "',
                                    WHERE admin_id = '" . $d->admin_id . "'";
                    if ($update) {
                        echo '<script>alert("Ubah data berhasil")</script>';
                        echo '<script>window.location="profil.php"</script>';
                    } else {
                        echo 'gagal' . mysqli_error($conn);
                    }
                }
                ?>
            </div>
            <br>

            <h3>
                <P>Ubah Password</P>
            </h3>
            <div class="box">
                <form action="" method="POST">
                    <div class="form-group row">
                        <label for="nama" class="col-4 col-form-label">Masukan password</label>
                        <div class="col-8">
                            <div class="input-group">
                                <input id="nama" name="pass1" type="password" class="input-control" placeholder="Password Baru">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="user" class="col-4 col-form-label">Konfirmasi Password</label>
                        <div class="col-8">
                            <input id="user" name="pass2" type="password" class="input-control" placeholder="Konfirmasi Password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-4 col-8">
                            <button name="ubah_password" type="ubah_password" class="btn btn-primary">Ubah Password</button>
                        </div>
                    </div>
                </form>
                <?php
                if (isset($_POST['ubah_password'])) {

                    $pass1    = $_POST['pass1'];
                    $pass2    = $_POST['pass2'];
                    if ($pass2 != $pass1) {
                        echo '<script>alert("Konfirmasi Password Baru tidak sesuai") </script>';
                    } else {
                        $u_pass = "UPDATE admin SET
                                    password = '" . MD5($pass1) . "',
                                    WHERE admin_id = '" . $d->admin_id . "'";
                        if ($u_pass) {
                            echo '<script>alert("Ubah data berhasil")</script>';
                            echo '<script>window.location="profil.php"</script>';
                        } else{
                            echo 'gagal' . mysqli_error($conn);
                        }
                    }

                }
                ?>
            </div>
        </div>
    </div>
    <footer>
        <div class="container">
            <small>Copyright &copy; 2023 - VEGETABLE MARKET</small>
        </div>
    </footer>
</body>

</html>