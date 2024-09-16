
<?php
    include "include/config.php";
    if(isset($_GET['hapus']))
    {
        $suplemenKODE = $_GET["hapus"]; // Corrected this line
        mysqli_query($connection, "delete from suplemen where suplemenKODE='$suplemenKODE'");
        echo "<script>alert('DATA BERHASIL DIHAPUS'); document.location='suplemen.php'</script>";
    }
?>