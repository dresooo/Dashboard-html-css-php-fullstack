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
  include "include/configtugas.php";
  if(isset($_POST['simpan']))
  {
	  $berita825220026 = $_POST["inputberita825220026"];
	   $beritaDRESO = $_POST["inputberitaDRESO"];
	    $kategoriberita825220026 = $_POST["inputkategoriberita825220026"];
       $event825220026 = $_POST["inputevent825220026"];

         mysqli_query($connection, "insert into dreso values ('$berita825220026', '$beritaDRESO', '$kategoriberita825220026', '$event825220026')");
         header("location:tugasdua.php");
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
            <label for="berita825220026" class="col-sm-3 col-form-label">KODE BERITA</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="berita825220026" name="inputberita825220026" placeholder="KODE BERITA">
            </div>
        </div>
      <!-- kategori nama  -->
      <div class="form-group row">
            <label for="beritaDRESO" class="col-sm-3 col-form-label">JUDUL BERITA</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="beritaDRESO" name="inputberitaDRESO" placeholder="JUDUL BERITA">
            </div>
        </div>
      <!-- keterangan berita -->
      <div class="form-group row">
            <label for="kategoriberita825220026" class="col-sm-3 col-form-label">KODE KATEGORI BERITA</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="kategoriberita825220026" name="inputkategoriberita825220026" placeholder="KODE KATEGORI BERITA">
            </div>
        </div>

        <div class="form-group row">
            <label for="event825220026" class="col-sm-3 col-form-label">Keterangan Kategori Berita</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="event825220026" name="inputevent825220026" placeholder="KODE EVENT">
            </div>
        </div>
        <!-- button -->
        
        <div class="col-sm-7" style= "margin-left: 150px">
          <button type="submit" class="btn btn-dark" name="simpan" value= "simpan">Submit</button>
			    <button type="reset" class="btn btn-danger">Cancel</button>
      </div>
    </div>
    
    </form>
    <div class = "col-sm-7">
      <!-- untuk membuat form pencarian data -->
      <form method="POST">
                        <div class="form-group row mb-2">
                            <label for="searchnama" class="col-sm-3">Nama Berita</label>
                            <div class="col-sm-6">
                                <input type="text" name="searchnama" class="form-control" id="searchnama"
                                value="<?php if(isset($_POST["searchnama"])) {echo $_POST["searchnama"];}?>"
                                placeholder="Cari nama berita";>
                            </div>
                            <input type="submit" name="kirim1"class="col-sm-1 btn btn-primary" value="search">
                        </div>
                </form>
            <!-- akhir dari pencarian -->
            <!-- untuk membuat form pencarian data -->
            <form method="POST">
                        <div class="form-group row mb-2">
                            <label for="searchkode" class="col-sm-3">kode berita</label>
                            <div class="col-sm-6">
                                <input type="text" name="searchkode" class="form-control" id="searchkode"
                                value="<?php if(isset($_POST["searchkode"])) {echo $_POST["searchkode"];}?>"
                                placeholder="Cari Kode Berita";>
                            </div>
                            <input type="submit" name="kirim2"class="col-sm-1 btn btn-primary" value="Search">
                        </div>
                </form>
            <!-- akhir dari pencarian -->
    <table class="table table-dark table-hover">
                <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Berita</th>
                    <th scope="col">Judul Berita</th>
                    <th scope="col">Kode Kategori Berita</th>
                    <th scope="col">Kode Event</th>
                    <th colspan ="2" style="text-align:center;">Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    // $query = mysqli_query($connection,"select destinasi.* from destinasi");
 
                    if(isset($_POST["kirim1"])) {
                        $searchnama = $_POST["searchnama"];
                        $query = mysqli_query($connection,"select dreso.* from dreso where beritaDRESO like '%".$searchnama."%'");
                    }elseif(isset($_POST["kirim2"])) {
                        $searchkode = $_POST["searchkode"];
                        $query = mysqli_query($connection,"select dreso.* from dreso where berita825220026 like '%".$searchkode."%'");
                      }else
                    {
                        $query = mysqli_query($connection,"select dreso.* from dreso");
                    }
                    $nomor = 1;
                    while($row = mysqli_fetch_array($query))
                    {
                ?>
                    <tr>
                        <td><?php echo $nomor ?></td>
                        <td><?php echo $row['berita825220026']; ?></td>
                        <td><?php echo $row['beritaDRESO']; ?></td>
                        <td><?php echo $row['kategoriberita825220026']; ?></td>
                        <td><?php echo $row['event825220026']; ?></td>
                        <td width= "5px">
                        <a href="tugasduaedit.php?ubah=<?php echo $row["berita825220026"]; ?>" class="btn btn-success btn-sm" title="EDIT">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                        </a>
                            </td>
                        <td width= "5px">
                                 <a href="tugasduahapus.php?hapus=<?php echo $row["berita825220026"]; ?>" class="btn btn-danger btn-sm" title="hapus">
                                <i class="bi bi-trash3-fill"></i>
                            </a>
                    </tr>
                    <?php $nomor++; ?>
                    <?php } ?>
                    
                </tbody>
            </table>
    
    </div>
   
  </body>

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

