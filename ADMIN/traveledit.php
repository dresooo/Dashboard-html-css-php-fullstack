<!DOCTYPE html>
<html lang="en">
<?php
    ob_start();
    session_start();
    if(!isset($_SESSION['useremail']))
        header("location:login.php");
?>

<!-- DASHBOARD -->
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
                        if(isset($_POST['edit']))
                        {
                            $travelKODE = $_POST["kodeberita"];
                            $travelNAMA = $_POST["namaberita"];
                            $travelKET = $_POST["kategoriberita"];
                           
                            $olehKODE = $_POST["namarestoran"];
                            
                            mysqli_query($connection, "update travel set travelNAMA='$travelNAMA', travelKET='$travelKET', olehKODE='$olehKODE' where travelKODE='$travelKODE' ");
                           
                        }
                        // select from diffrent table
                        $olehKODE = mysqli_query($connection,"select * from oleh");
                        

                        $travelKODE = $_GET['ubah'];
                        $edittravel = mysqli_query($connection,"select * from travel where travelKODE = '$travelKODE'");
                        $rowedit = mysqli_fetch_array($edittravel);
                        $namaolehResult = mysqli_query($connection,"select * from oleh");
                        $rowNamaoleh = mysqli_fetch_array($namaolehResult);
                    ?>

                    <head>
                        <title>BERITA</title>
                        <link rel="stylesheet" href="css/bootstrap.min.css">
                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
                        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
                    </head>


                    <Body>

                    <div class="row">
    <div class="col-sm-1">
    </div>
        <div class="col-sm-10">
            <form method="POST">
                <div class="mb-3 row">
                    <label for="kodeberita" class="col-sm-2 col-form-label">Kode Berita</label>   
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="kodeberita" id="kodeberita" maxlenght="4"  value="<?php echo $rowedit["travelKODE"] ?>" readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="namaberita" class="col-sm-2 col-form-label">Nama Berita</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="namaberita" id="namaberita" value="<?php echo $rowedit["travelNAMA"] ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="kategoriberita" class="col-sm-2 col-form-label">Kategori Berita</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="kategoriberita" id="kategoriberita" value="<?php echo $rowedit["travelKET"] ?>">
                    </div>
                </div>
            
                <div class="mb-3 row">
                    <label for="namarestoran" class="col-sm-2 col-form-label">Nama Oleh Oleh</label>
                    <div class="col-sm-10">
                    <select class="form-control" id="namarestoran" name="namarestoran" value = " <?php echo $rowedit["olehKODE"] ?>">
    <option value="">Nama Oleh Oleh</option>
    <?php while ($row = mysqli_fetch_array($olehKODE)) { ?>
        <option value="<?php echo $row["olehKODE"] ?>">
            <?php echo $row["olehNAMA"] . ' - ' . $row["olehKET"] .' - ' . $row["olehHARGA"] ?>
        </option>
    <?php } ?>
</select>
                    </div>
                </div>
           
 
                <div class="form-group row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10">
                        <input type="submit" class="btn btn-success" value="Ubah" name="edit">
                        <button type="reset" class="btn btn-danger">Batal</button>
                    </div>
                </div>
                <br>
            </form>
 
            <div class="jumbotron mt-5">
                <h2 class="display-5">Hasil entri data Travel</h2>
            </div>
 
            <!-- untuk membuat form pencarian data -->
                <form method="POST">
                        <div class="form-group row mb-2">
                            <label for="search" class="col-sm-3">Nama Travel</label>
                            <div class="col-sm-6">
                                <input type="text" name="search" class="form-control" id="search"
                                value="<?php if(isset($_POST["search"])) {echo $_POST["search"];}?>"
                                placeholder="Cari nama Travel";>
                            </div>
                            <input type="submit" name="kirim"class="col-sm-1 btn btn-primary" value="Search">
                        </div>
                </form>
            <!-- akhir dari pencarian -->
            

            <!-- TABLE DATA DARI DESTINASI -->
            <table class="table table-dark table-hover">
                <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Travel</th>
                    <th scope="col">Nama Travel</th>
                    <th scope="col">Keterangan Travel</th>
                    <th scope="col">Nama Oleh oleh</th>
                    <th colspan ="2" style="text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                <!-- untuk search data -->
                <?php
                    // $query = mysqli_query($connection,"select destinasi.* from destinasi");
                    if(isset($_POST["kirim"])) {
                        $search = $_POST["search"];
                        $query = mysqli_query($connection,"select travel.* from travel where travelKODE like '%".$search."%'");
                    }else
                    {
                        $query = mysqli_query($connection,"select travel.* from travel");
                    }
 
                    $nomor = 1;
                    while($row = mysqli_fetch_array($query))
                    {
                ?>
                    <tr>
                        <td><?php echo $nomor ?></td>
                        <td><?php echo $row['travelKODE']; ?></td>
                        <td><?php echo $row['travelNAMA']; ?></td>
                        <td><?php echo $row['travelKET']; ?></td>
                        <td><?php echo $row['olehKODE']; ?></td>

                        <!-- Ubah button -->
                        <td width= "5px">
                        <a href="traveledit.php?ubah=<?php echo $row["travelKODE"]; ?>" class="btn btn-success btn-sm" title="EDIT">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                        </a>
                            </td>

                            <!-- Delete buttton -->
                        <td width= "5px">
                                 <a href="travelhapus.php?hapus=<?php echo $row["travelKODE"]; ?>" class="btn btn-danger btn-sm" title="HAPUS">
                                <i class="bi bi-trash3-fill"></i>
                            </a>
                         </td>
                    </tr>
                    <?php $nomor++; ?>
                    <?php } ?>
                </tbody>
            </table>
        </div><!-- penutup div class col-sm-10-->
    </div><!--penutup div class row-->

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


