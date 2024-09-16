<!doctype html>

<?php
  include "include/config.php";
  if(isset($_POST['simpan']))
  {
	  $kategoriKODE = $_POST["inputkategoriKODE"];
	   $kategoriNAMA = $_POST["inputkategoriNAMA"];
	    $kategoriKET = $_POST["inputkategoriKET"];
		 $kategoriREFERENCE = $_POST["inputkategoriREFERENCE"];

         mysqli_query($connection, "insert into kategoriwisata values ('$kategoriKODE', '$kategoriNAMA', '$kategoriKET', '$kategoriREFERENCE')");
         header("location:inputcategoriphp.php");
  }
?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <!-- Ini bagian kerja saya -->
   
    <div class="col-sm-10">
    <form method= "POST">
        <div class="form-group row">
            <label for="kategoriKODE" class="col-sm-3 col-form-label">Kategori Kode :</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="kategoriKODE" name="inputkategoriKODE" placeholder="Inputkan kategori kode">
            </div>
        </div>
		
		<div class="form-group row">
            <label for="kategoriNAMA" class="col-sm-3 col-form-label">Kategori Nama :</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="kategoriNAMA"  name="inputkategoriNAMA" placeholder="Inputkan nama kategori">
            </div>
        </div>
		
		<div class="form-group row">
            <label for="kategoriKET:" class="col-sm-3 col-form-label">Keterangan kategori :</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="kategoriKET"  name="inputkategoriKET" placeholder="Inputkan keterangan kategori">
            </div>
        </div>
		
		<div class="form-group row">
            <label for="kategoriREFERENCE" class="col-sm-3 col-form-label">Kategori Referensi :</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="kategoriREFERENCE"  name="inputkategoriREFERENCE" placeholder="Inputkan refesensi keterangan">
            </div>
        </div>
		 
			<button type="submit" class="btn btn-dark" name="simpan" value= "simpan">Submit</button>
			<button type="reset" class="btn btn-danger">Cancel</button>
    </form>
    </div>
    <!-- Akhir kerja saya -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>