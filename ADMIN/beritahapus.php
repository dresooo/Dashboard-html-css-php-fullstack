<?php
    include "include/config.php";
    if(isset($_GET['hapus']))
    {
        $berita825220026 = $_GET["hapus"];
        mysqli_query($connection, "delete from berita where berita825220026='$berita825220026'");
        echo "<script>alert('DATA BERHASIL DIHAPUS'); document.location='berita.php'</script>";
    }
?>