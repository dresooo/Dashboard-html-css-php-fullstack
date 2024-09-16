<!DOCTYPE html>
<html lang="en">
<?php
ob_start();
session_start();
if(!isset($_SESSION['useremail'])) {
  header("location:login.php");
}
?>

<?php include "INCLUDE/head.php"; ?>

<?php
include "include/config.php";
if(isset($_POST['Simpan'])) {
  $andresID = $_POST["andresID"];
  $andresKOTA = $_POST["andresKOTA"];
  $destinasiKODE = $_POST["destinasiKODE"];

  
  mysqli_query($connection, "INSERT INTO andres (andresID, andresKOTA, destinasiKODE) VALUES ('$andresID', '$andresKOTA', '$destinasiKODE')");
  header("location:uasandres.php");

}

$datadestinasi = mysqli_query($connection, "select * from destinasi");
?>




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





      <head>
        <title>UAS ANDRES</title>

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
          integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
      </head>


      <body>

        <div class="row">
          <div class="col-sm-1"></div>
          <div class="col-sm-10">
            <form method="POST" enctype="multipart/form-data">
              <div class="mb-3 row">
                <label for="andresID" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="andresID" id="andresID" maxlength="5">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="andresKOTA" class="col-sm-2 col-form-label">Nama Kota</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="andresKOTA" id="andresKOTA">
                </div>
              </div>

            
            
              <div class="mb-3 row">
                <label for="destinasiKODE" class="col-sm-2 col-form-label">Kode Destinasi</label>
                <div class="col-sm-10">
                  <select class="form-control" id="destinasiKODE" name="destinasiKODE">
                    <option>Kategori Wisata</option>
                    <?php while($row = mysqli_fetch_array($datadestinasi)) { ?>
                      <option value="<?php echo $row["destinasiKODE"] ?>">
                        <?php echo $row["destinasiNAMA"] ?>
                       
                      </option>
                    <?php } ?>
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                  <input type="submit" class="btn btn-success" value="Simpan" name="Simpan">
                  <button type="reset" class="btn btn-danger">Batal</button>
                </div>
              </div>
              <br>
            </form>

            <div class="jumbotron mt-5">
              <h2 class="display-5">Hasil entri data KOTA</h2>
            </div>

            <!-- Form for searching data -->
            <form method="POST">
              <div class="form-group row mb-2">
                <label for="search" class="col-sm-3">Nama Kolta</label>
                <div class="col-sm-6">
                  <input type="text" name="search" class="form-control" id="search" value="<?php if(isset($_POST["search"])) {
                    echo $_POST["search"];
                  } ?>" placeholder="Cari nama Kota" ;>
                </div>
                <input type="submit" name="kirim" class="col-sm-1 btn btn-primary" value="Search">
              </div>
            </form>
            <!-- End of search form -->

            <!-- Table data for DESTINASI -->
            <table class="table table-dark table-hover">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">ID</th>
                  <th scope="col">Nama Kota</th>
                  <th scope="col">Kode Destinasi</th>
               
                </tr>
              </thead>
              <tbody>

                <!-- untuk search data -->
                <?php
                // --------------------- PAGING -- MEMBUAT GANTI HALAMAN ---------------- >
                $jumlahtampilan = 3;
                $halaman = (isset($_GET['page'])) ? $_GET['page'] : 1;
                $mulaitampilan = ($halaman - 1) * $jumlahtampilan;

                // ----------------- AKHIR PAGING -- MEMBUAT GANTI HALAMAN ---------------- >
                

                //	$query = mysqli_query($connection, "select destinasi.* 
                //	from destinasi");
                if(isset($_POST["kirim"])) {
                  $search = $_POST["search"];
                  $query = mysqli_query($connection, "select andres.* 
                                from andres
                                where andresKOTA like '%".$search."%' limit $mulaitampilan, $jumlahtampilan");
                  // --------------------- PAGING -- MEMBUAT GANTI HALAMAN ---------------- 
                  //	pada bagian ini tambhan --- limit $mulaitampilan, $jumlahtampilan ---	
                
                } else {
                  $query = mysqli_query($connection, "select andres.* 
                                    from andres limit $mulaitampilan, $jumlahtampilan");
                }
                //	pada bagian ini tambhan --- limit $mulaitampilan, $jumlahtampilan ---	
                





                // $query = mysqli_query($connection,"select destinasi.* from destinasi");
                // if(isset($_POST["kirim"])) {
                //     $search = $_POST["search"];
                //     $query = mysqli_query($connection,"select destinasi.* from destinasi where destinasiNAMA like '%".$search."%'");
                // }else
                // {
                //     $query = mysqli_query($connection,"select destinasi.* from destinasi");
                // }
                
                $nomor = 1;
                while($row = mysqli_fetch_array($query)) {
                  ?>
                  <tr>
                    <td>
                      <?php echo $mulaitampilan + $nomor; ?>
                    </td>
                    <td>
                      <?php echo $row['andresID']; ?>
                    </td>
                    <td>
                      <?php echo $row['andresKOTA']; ?>
                    </td>
                    <td>
                      <?php echo $row['destinasiKODE']; ?>
                    </td>
                    
        


                  

                
                  </tr>
                  <?php $nomor++; ?>
                <?php } ?>
              </tbody>
            </table>

            <!--------------------- PAGING -- MEMBUAT GANTI HALAMAN ---------------->
            <?php
            $query = mysqli_query($connection, "SELECT * FROM andres");
            $jumlahrecord = mysqli_num_rows($query);
            $jumlahpage = ceil($jumlahrecord / $jumlahtampilan);
            ?>


            <nav aria-label="Page navigation example">
              <ul class="pagination">
                <li class="page-item"><a class="page-link" href="?page=<?php $nomorhal = 1;
                echo $nomorhal ?>">PERTAMA</a></li>
                <?php for($nomorhal = 1; $nomorhal <= $jumlahpage; $nomorhal++) { ?>
                  <li class="page-item">
                    <?php
                    if($nomorhal != $halaman) { ?>
                      <a class="page-link" href="?page=<?php echo $nomorhal ?>">
                        <?php echo $nomorhal ?>
                      </a>
                    <?php } else { ?>
                      <a class="page-link" href="?page=<?php echo $nomorhal ?>">
                        <?php echo $nomorhal ?>
                      </a>
                    <?php } ?>
                  </li>
                <?php } ?>
                <li class="page-item"><a class="page-link" href="?page=<?php echo $nomorhal - 1 ?>">TERAKHIR</a></li>
              </ul>
            </nav>

            <!----------------- AKHIR PAGING -- MEMBUAT GANTI HALAMAN ---------------->
          </div><!-- penutup div class col-sm-10-->
        </div><!--penutup div class row-->


      </body>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

                    <script>
                        $(document).ready(function () {
                            $('#kodekategori').select(
                                {
                                    closeOnSelect: true,
                                    allowClear: true,
                                    placeholder: 'Pilih Kategori Wisata'
                                });
                        });
                    </script>

</main>
<?php include 'INCLUDE/footer.php'; ?>
</div>
</div>
<?php include "INCLUDE/jsscript.php"; ?>
</body>
</html>