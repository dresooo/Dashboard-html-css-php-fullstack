
<?php
    include "include/config.php";
    if(isset($_GET['hapus']))
    {
        $namarestoran = $_GET["hapus"]; // Corrected this line
        mysqli_query($connection, "delete from restoran where namarestoran='$namarestoran'");
        echo "<script>alert('DATA BERHASIL DIHAPUS'); document.location='restoran.php'</script>";
    }
?>