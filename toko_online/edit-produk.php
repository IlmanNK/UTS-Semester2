<?php
include 'db.php';
session_start();
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}

$produk = mysqli_query($conn, "SELECT * FROM produk WHERE produk_id = '" . $_GET['id'] . "'");
if(mysqli_num_rows($produk) == 0){
    echo  '<script>window.location="data-produk.php"</script>';
}
$p = mysqli_fetch_object($produk)
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
                Edit Data Produk
            </h3>
            <div class="box">
                <form action="" method="POST" enctype="multipart/form-data">
                    <select class="input-control" name="kategori" required>ch
                        <option value="">--Pilih--</option>
                        <?php
                        $kategori = mysqli_query($conn, "SELECT * FROM kategori_produk ORDER BY kategori_id DESC");
                        while ($r = mysqli_fetch_array($kategori)) {
                        ?>
                            <option value="<?php echo $r['kategori_id'] ?>" <?php echo ($r['kategori_id'] == $p->kategori_id) ? 'selected' : '';  ?>><?php echo $r['nama_kategori'] ?></option>
                        <?php } ?>
                    </select>
                    <div class="container">
                        <div class="row">
                            <!-- <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="produk_id" class="form-control" placeholder="id Produk">
                                </div>
                            </div> -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="kode" class="form-control" placeholder="Kode" value="<?php echo $p->kode ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama" value="<?php echo $p->nama ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="number" name="harga_beli" class="form-control" placeholder="Masukan Harga Beli" value="<?php echo $p->harga_beli ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="number" name="harga_jual" class="form-control" placeholder="Masukan Harga Jual" value="<?php echo $p->harga_jual ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="number" name="stok" class="form-control" placeholder="Masukkan Stok barang" value="<?php echo $p->stok ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="number" name="min_stok" class="form-control" placeholder="Masukkan Minimal Stok" value="<?php echo $p->min_stok ?>" required>
                                </div>
                            </div>
                            <!-- <div class="col-md-6">
                                <div class="form-group">
                                    <input type="file" name="gambar_produk" class="form-control" placeholder="Gambar Produk">
                                </div>
                            </div> -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="textarea" name="deskripsi" class="form-control" placeholder="Deskripsi Produk" value="<?php echo $p->deskripsi ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select class="input-control" name="status">
                                        <option value="">--Pilih--</option>
                                        <option value="1">Aktif</option>
                                        <option value="0">Tidak Aktif</option>
                                </div>
                            </div>

                            <div class="col-md-">
                                <div class="form-group">
                                    <input name="submit" type="submit" class="btn btn-primary"></input>
                                </div>
                            </div>
                            <!-- <div class="col-md-6">
                                <div class="form-group">
                                    <input type="number" name="kategori_produk_id" class="form-control" placeholder="Kategori Produk id">
                                </div>
                            </div> -->
                        </div>
                    </div>

                </form>
                <?php
                if (isset($_POST['submit'])) {

                    // data inputan dari form
                    $kategori      = $_POST['kategori'];
                    $kode          = $_POST['kode'];
                    $nama          = $_POST['nama'];
                    $harga_beli    = $_POST['harga_beli'];
                    $harga_jual    = $_POST['harga_jual'];
                    $stok          = $_POST['stok'];
                    $min_stok      = $_POST['min_stok'];
                    $deskripsi     = $_POST['deskripsi'];


                    $update =  "UPDATE produk SET 
                    --   kategori   =  '" . $kategori  . "',
                      kode_produk       =  '" . $kode  . "',
                      nama_produk       =   '" . $nama  . "',
                      harga_beli_produk =   '" . $harga_beli  . "',
                      harga_jual_produk =   '" . $harga_jual  . "',
                      stok_produk       =     '" . $stok  . "',
                      min_stok_produk   = '" . $min_stok . "',
                      deskripsi_produk  =  '" .$deskripsi . "',
                      WHERE produk_id = '" . $p->produk_id . "'";

                    if ($update) {
                        echo '<script>alert("Ubah data berhasil")</script>';
                        echo '<script>window.location="data-produk.php"</script>';
                    } else {
                        echo 'gagal' . mysqli_error($conn);
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