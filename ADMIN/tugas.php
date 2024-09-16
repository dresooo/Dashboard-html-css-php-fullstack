<!doctype html>

<?php
  include "include/config.php";
  if(isset($_POST['simpan']))
  {
	  $kategoriberitaKODE = $_POST["inputkategoriberitaKODE"];
	   $kategoriberitaNAMA = $_POST["inputkategoriberitaNAMA"];
	    $kategoriberitaKET = $_POST["inputkategoriberitaKET"];

         mysqli_query($connection, "insert into kategoriberita values ('$kategoriberitaKODE', '$kategoriberitaNAMA', '$kategoriberitaKET')");
         header("location:tugas.php");
  }
?>




<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Tugas</title>
  </head>


  
  <body>

  <!-- Header -->
  <div class="col-sm-7">
      <div class="alert alert-dark" role="alert">
        <b>ENTRY DATA KATEGORI BERITA</b>
     </div>
    </div>

  
    <!-- form -->
    <div class="col-sm-7">
    <form method="POST">
      <!-- kategoriberita -->
       <div class="form-group row">
            <label for="kategoriberitaKODE" class="col-sm-3 col-form-label">Kode Kategori Berita</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="kategoriberitaKODE" name="inputkategoriberitaKODE" placeholder="Nama Kategori Berita">
            </div>
        </div>
      <!-- kategori nama  -->
      <div class="form-group row">
            <label for="kategoriberitaNAMA" class="col-sm-3 col-form-label">Nama Kategori Berita</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="kategoriberitaNAMA" name="inputkategoriberitaNAMA" placeholder="Nama Kategori Berita">
            </div>
        </div>
      <!-- keterangan berita -->
      <div class="form-group row">
            <label for="kategoriberitaKET" class="col-sm-3 col-form-label">Keterangan Kategori Berita</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="kategoriberitaKET" name="inputkategoriberitaKET" placeholder="Keterangan Kategori Berita">
            </div>
        </div>
        <!-- button -->
        
         
    
    </form>
    
     <div class="col-sm-7" style= "margin-left: 150px">
          <button type="submit" class="btn btn-dark" name="simpan" value= "simpan">Submit</button>
			    <button type="reset" class="btn btn-danger">Cancel</button>
      </div>
    </div>
  </body>



</html>