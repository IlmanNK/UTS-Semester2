<?php 
    require_once 'db.php';
?>

<?php
session_start();
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}

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
                    <li class="nav-item">
                        <a class="nav-link" href="profil.php">Profil</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="data-kategori.php"> <span class="sr-only">(current)</span>Data Kategori</a>
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
            <h3>Data Kategori</h3>
            <div class="box">
                <p><a href="tambah-kategori.php">Tambah Data</a></p>
                <table class="table">
                    <thead>
                        <tr>
                            <th class="col-md-1">No</th>
                            <th class="col-md-9">Kategori</th>
                            <th class="col-md-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no = 1;
                            $kategori = mysqli_query($conn, "SELECT * FROM kategori_produk ORDER BY kategori_id DESC");
                            if(mysqli_num_rows($kategori) > 0){
                            while($row = mysqli_fetch_array($kategori)){
                        ?>
                        
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $row['nama_kategori'] ?></td>
                            <td>
                                <a href="edit-kategori.php?id=<?php echo $row ['kategori_id']?>">Edit</a>  || <a href="proses-hapus.php?idk=<?php echo $row ['kategori_id']?>" onclick="return confirm('Apakah anda yakin?')">Hapus</a>
                            </td>
                        </tr>
                        <?php }}else{ ?>
                            <tr>
                                <td colspan="3">Tidak ada Data</td>
                            </tr>
                            <?php }?>
                        </tbody>
                </table>
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