<!doctype html>
<html lang="en">
<?php
    ob_start();
    session_start();
    if(!isset($_SESSION['useremail']))
        header("location:login.php");
?>
<?php include "INCLUDE/head.php"; ?>
    <body class="sb-nav-fixed">
        <?php include "INCLUDE/nav.php"; ?>
        <div id="layoutSidenav">
            <?php include "INCLUDE/menu.php"; ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <?php include "INCLUDE/board.php"; ?>
                    </div>
<?php
  include "include/config.php";
  if(isset($_POST['simpan']))
  {
	  $kategoriKODE = $_POST["inputkategoriKODE"];
	   $kategoriNAMA = $_POST["inputkategoriNAMA"];
	    $kategoriKET = $_POST["inputkategoriKET"];
		 $kategoriREFERENCE = $_POST["inputkategoriREFERENCE"];

         mysqli_query($connection, "insert into kategoriwisata values ('$kategoriKODE', '$kategoriNAMA', '$kategoriKET', '$kategoriREFERENCE')");
         header("location:inputkategori.php");
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
    <div class="col-sm-7">
      <div class="alert alert-dark" role="alert">
        <b>ENTRY DATA KATEGORI BERITA</b>
     </div>
    </div>
    <div class="col-sm-7">
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
                                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
                                
                                <script>
                                    $(document).ready(function() {
                                        $('#kodekategori').select(
                                        {
                                            closeOnSelect : true,
                                            allowClear : true,
                                            placeholder : 'Pilih Kategori Wisata'
                                        });
                                    });
                                </script>
                            </div>
                        </div>
                    </body>
                </main>
                <?php include 'INCLUDE/footer.php'; ?>
            </div>
        </div>
        <?php include "INCLUDE/jsscript.php"; ?>
    </body>
</html>