<?php 
    include 'db.php';

    if(isset($_GET['idk'])){
        $delete = mysqli_query($conn, "DELETE FROM kategori_produk WHERE kategori_id = '".$_GET['idk']."' ");
        echo '<script>window.location="data-kategori.php"</script>';
    }

    if(isset($_GET['idp'])){
        $delete = mysqli_query($conn, "DELETE FROM produk WHERE produk_id = '".$_GET['idp']."' ");
        echo '<script>window.location="data-produk.php"</script>';
    }
?>