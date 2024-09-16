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
                        if(isset($_POST['Simpan']))
                        {
                            $berita825220026 = $_POST["kodeberita"];
                            $beritaDRESO = $_POST["namaberita"];
                            $kategoriberita825220026 = $_POST["kategoriberita"];
                            $event825220026 = $_POST["eventberita"];
                            $namarestoran = $_POST["namarestoran"];
                            
                            mysqli_query($connection, "insert into berita values ('$berita825220026', '$beritaDRESO', '$kategoriberita825220026','$event825220026','$namarestoran')");
                            header("location:berita.php");
                        }
                        // select from diffrent table
                        $namarestoran = mysqli_query($connection,"select * from restoran");
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
                        <input type="text" class="form-control" name="kodeberita" id="kodeberita" maxlenght="4" >
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="namaberita" class="col-sm-2 col-form-label">Nama Berita</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="namaberita" id="namaberita">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="kategoriberita" class="col-sm-2 col-form-label">Kategori Berita</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="kategoriberita" id="kategoriberita">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="eventberita" class="col-sm-2 col-form-label">Event Berita</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="eventberita" id="eventberita">
                    </div>
                </div>           

                <div class="mb-3 row">
                    <label for="namarestoran" class="col-sm-2 col-form-label">Nama Restoran</label>
                    <div class="col-sm-10">
                    <select class="form-control" id="namarestoran" name="namarestoran">
    <option value="">Nama Restoran</option>
    <?php while ($row = mysqli_fetch_array($namarestoran)) { ?>
        <option value="<?php echo $row["namarestoran"] ?>">
            <?php echo $row["menurestoran"] . ' - ' . $row["keteranganrestoran"] ?>
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
                <h2 class="display-5">Hasil entri data Berita</h2>
            </div>
 
            <!-- untuk membuat form pencarian data -->
                <form method="POST">
                        <div class="form-group row mb-2">
                            <label for="search" class="col-sm-3">Nama Berita</label>
                            <div class="col-sm-6">
                                <input type="text" name="search" class="form-control" id="search"
                                value="<?php if(isset($_POST["search"])) {echo $_POST["search"];}?>"
                                placeholder="Cari nama Berita";>
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
                    <th scope="col">Kode Berita</th>
                    <th scope="col">Nama Berita</th>
                    <th scope="col">Kategori Berita</th>
                    <th scope="col">Event Berita</th>
                    <th scope="col">Nama Restoran</th>
                    <th colspan ="2" style="text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                <!-- untuk search data -->
                <?php
                        // --------------------- PAGING -- MEMBUAT GANTI HALAMAN ---------------- >
                        $jumlahtampilan = 3;
                        $halaman = (isset($_GET['page']))? $_GET['page'] : 1;
                        $mulaitampilan = ($halaman - 1) * $jumlahtampilan;

                        // ----------------- AKHIR PAGING -- MEMBUAT GANTI HALAMAN ---------------- >

                        //	$query = mysqli_query($connection, "select destinasi.* 
                        //	from destinasi");
                        if(isset($_POST["kirim"]))
                        {
                            $search = $_POST["search"];
                            $query = mysqli_query($connection, "select berita.* 
                                from destinasi
                                where beritaDRESO like '%".$search."%' limit $mulaitampilan, $jumlahtampilan");
                        // --------------------- PAGING -- MEMBUAT GANTI HALAMAN ---------------- 
                        //	pada bagian ini tambhan --- limit $mulaitampilan, $jumlahtampilan ---	

                        }else
                            {
                                $query = mysqli_query($connection, "select berita.* 
                                    from berita limit $mulaitampilan, $jumlahtampilan");
                            }
                        //	pada bagian ini tambhan --- limit $mulaitampilan, $jumlahtampilan ---	


                        
                    // $query = mysqli_query($connection,"select destinasi.* from destinasi");
                    // if(isset($_POST["kirim"])) {
                    //     $search = $_POST["search"];
                    //     $query = mysqli_query($connection,"select berita.* from berita where beritaDRESO like '%".$search."%'");
                    // }else
                    // {
                    //     $query = mysqli_query($connection,"select berita.* from berita");
                    // }
 
                    $nomor = 1;
                    while($row = mysqli_fetch_array($query))
                    {
                ?>
                    <tr>
                          <td><?php echo $mulaitampilan + $nomor; ?></td> 
                        <td><?php echo $row['berita825220026']; ?></td>
                        <td><?php echo $row['beritaDRESO']; ?></td>
                        <td><?php echo $row['kategoriberita825220026']; ?></td>
                        <td><?php echo $row['event825220026']; ?></td>
                        <td><?php echo $row['namarestoran']; ?></td>

                        <!-- Ubah button -->
                        <td width= "5px">
                        <a href="beritaedit.php?ubah=<?php echo $row["berita825220026"]; ?>" class="btn btn-success btn-sm" title="EDIT">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                        </a>
                            </td>

                            <!-- Delete buttton -->
                        <td width= "5px">
                                 <a href="beritahapus.php?hapus=<?php echo $row["berita825220026"]; ?>" class="btn btn-danger btn-sm" title="HAPUS">
                                <i class="bi bi-trash3-fill"></i>
                            </a>
                         </td>
                    </tr>
                    <?php $nomor++; ?>
                    <?php } ?>
                </tbody>
            </table>

                        <!--------------------- PAGING -- MEMBUAT GANTI HALAMAN ---------------->
            <?php 
                $query = mysqli_query($connection, "SELECT * FROM berita");
                $jumlahrecord = mysqli_num_rows($query);
                $jumlahpage = ceil($jumlahrecord/$jumlahtampilan);
            ?>

            <!-- TAMPILAN PADA HALAMAN PAGINATION INI DAPAT DIAMBIL DARI BOOTSTRAP 5 
                    PADA BAGIAN components -> pagination 
            -->
                        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="?page=<?php $nomorhal=1; echo $nomorhal?>">PERTAMA</a></li>
                <?php for($nomorhal=1; $nomorhal<=$jumlahpage; $nomorhal++)
                { ?>
                <li class="page-item">
                <?php 
                if($nomorhal!=$halaman)
                { ?>  
                <a class="page-link" href="?page=<?php echo $nomorhal?>"><?php echo $nomorhal?></a>
                <?php }
                else { ?>
                <a class="page-link" href="?page=<?php echo $nomorhal?>"><?php echo $nomorhal?></a>
                <?php } ?>
                </li>
                <?php } ?>
                <li class="page-item"><a class="page-link" href="?page=<?php echo $nomorhal-1?>">TERAKHIR</a></li>
            </ul>
            </nav>

<!----------------- AKHIR PAGING -- MEMBUAT GANTI HALAMAN ---------------->


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


