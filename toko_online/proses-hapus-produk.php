<?php 
    include 'db.php';

    if(isset($_GET['idp'])){
        $delete = mysqli_query($conn, "DELETE FROM produk WHERE produk_id = '".$_GET['idp']."' ");
        echo '<script>window.location="data-produk.php"</script>';
    }

?>