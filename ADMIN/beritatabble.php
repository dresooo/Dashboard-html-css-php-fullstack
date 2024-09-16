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
                  
                    </tr>
                </thead>
                <tbody>

                <!-- untuk search data -->
                <?php
                    // $query = mysqli_query($connection,"select destinasi.* from destinasi");
                    if(isset($_POST["kirim"])) {
                        $search = $_POST["search"];
                        $query = mysqli_query($connection,"select berita.* from berita where beritaDRESO like '%".$search."%'");
                    }else
                    {
                        $query = mysqli_query($connection,"select berita.* from berita");
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
                        <td><?php echo $row['namarestoran']; ?></td>

                      
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


