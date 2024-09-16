<?php
// Koneksi ke basis data
$servername="localhost";
$username="root";
$password="";
$dbname="latihan";

$connection=mysqli_connect($servername, $username, $password, $dbname);
if(!$connection)
{
    die("connection failed: ".mysqli_connect_error());
}

?>