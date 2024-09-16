<?php
    include "include/config.php";
    if(isset($_GET['hapus']))
    {
        $olehKODE = $_GET["hapus"];
        mysqli_query($connection, "delete from oleh where olehKODE='$olehKODE'");
        echo "<script>alert('DATA BERHASIL DIHAPUS'); document.location='oleh.php'</script>";
    }
?>