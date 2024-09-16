
<?php
    include "include/config.php";
    if(isset($_GET['hapus']))
    {
        $hotelKODE = $_GET["hapus"]; // Corrected this line
        mysqli_query($connection, "delete from hotel where hotelKODE='$hotelKODE'");
        echo "<script>alert('DATA BERHASIL DIHAPUS'); document.location='hotel.php'</script>";
    }
?>