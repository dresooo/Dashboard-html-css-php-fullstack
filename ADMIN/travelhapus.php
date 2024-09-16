
<?php
    include "include/config.php";
    if(isset($_GET['hapus']))
    {
        $travelKODE = $_GET["hapus"]; // Corrected this line
        mysqli_query($connection, "delete from travel where travelKODE='$travelKODE'");
        echo "<script>alert('DATA BERHASIL DIHAPUS'); document.location='travel.php'</script>";
    }
?>