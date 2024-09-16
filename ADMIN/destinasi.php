<!DOCTYPE html>
<html lang="en">
<?php
ob_start();
session_start();
if(!isset($_SESSION['useremail'])) {
    header("location:login.php");
}
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
                if(isset($_POST['Simpan'])) {
                    $destinasiKODE = $_POST["kodedestinasi"];
                    $destinasiNAMA = $_POST["namadestinasi"];
                    $destinasiKET = $_POST["ketdestinasi"];
                    $kategoriKODE = $_POST["kodekategori"];

                    $destinasiFOTO = $_FILES['file']['name'];
                    $file_tmp = $_FILES["file"]["tmp_name"];

                    $ekstensifile = pathinfo($destinasiFOTO, PATHINFO_EXTENSION);
                    if(in_array($ekstensifile, ["jpg", "JPG"])) {
                        move_uploaded_file($file_tmp, 'images/'.$destinasiFOTO); // upload file to the 'images' folder
                        mysqli_query($connection, "INSERT INTO destinasi (destinasiKODE, destinasiNAMA, destinasiKET, destinasiFOTO, kategoriKODE) VALUES ('$destinasiKODE', '$destinasiNAMA', '$destinasiKET', '$destinasiFOTO', '$kategoriKODE')");
                        header("location:destinasi.php");
                    }
                }
 
                $datakategori = mysqli_query($connection, "select * from kategoriwisata");
                ?>

                <head>
                    <title>DESTINASI</title>

                    <link rel="stylesheet" href="css/bootstrap.min.css">
                    <link rel="stylesheet"
                        href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
                    <link rel="stylesheet"
                        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
                        integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e"
                        crossorigin="anonymous">
                </head>

                <body>
                    <div class="row">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-10">
                            <form method="POST" enctype="multipart/form-data">
                                <div class="mb-3 row">
                                    <label for="kodedestinasi" class="col-sm-2 col-form-label">Kode Destinasi</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="kodedestinasi" id="kodedestinasi"
                                            maxlength="4">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="namadestinasi" class="col-sm-2 col-form-label">Nama Destinasi</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="namadestinasi" id="namadestinasi">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="ketdestinasi" class="col-sm-2 col-form-label">Keterangan
                                        Destinasi</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="ketdestinasi" id="ketdestinasi">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="file" class="col-sm-2 col-form-label">Photo Hotel</label>
                                    <div class="col-sm-10">
                                        <input type="file" id="file" name="file">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="kodekategori" class="col-sm-2 col-form-label">Kode Kategori</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="kodekategori" name="kodekategori">
                                            <option>Kategori Wisata</option>
                                            <?php while($row = mysqli_fetch_array($datakategori)) { ?>
                                                <option value="<?php echo $row["kategoriKODE"] ?>">
                                                    <?php echo $row["kategoriKODE"] ?>
                                                    <?php echo $row["kategoriNAMA"] ?>
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
                                <h2 class="display-5">Hasil entri data destinasi wisata</h2>
                            </div>

                            <!-- Form for searching data -->
                            <form method="POST">
                                <div class="form-group row mb-2">
                                    <label for="search" class="col-sm-3">Nama Destinasi</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="search" class="form-control" id="search"
                                            value="<?php if(isset($_POST["search"])) {
                                                echo $_POST["search"];
                                            } ?>"
                                            placeholder="Cari nama destinasi" ;>
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
                                        <th scope="col">Kode Destinasi</th>
                                        <th scope="col">Nama Destinasi</th>
                                        <th scope="col">Keterangan Kategori</th>
                                        <th scope="col">Foto Kategori</th>
                                        <th scope="col">Kode Kategori</th>
                                        <th colspan="2"> Aksi </th>
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
                                        $query = mysqli_query($connection, "select destinasi.* 
                                from destinasi
                                where destinasiNAMA like '%".$search."%' limit $mulaitampilan, $jumlahtampilan");
                                        // --------------------- PAGING -- MEMBUAT GANTI HALAMAN ---------------- 
                                        //	pada bagian ini tambhan --- limit $mulaitampilan, $jumlahtampilan ---	
                                    
                                    } else {
                                        $query = mysqli_query($connection, "select destinasi.* 
                                    from destinasi limit $mulaitampilan, $jumlahtampilan");
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
                                                <?php echo $row['destinasiKODE']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['destinasiNAMA']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['destinasiKET']; ?>
                                            </td>
                                            <td>
                                                <?php if(is_file("images/".$row['destinasiFOTO'])) { ?>
                                                    <img src="images/<?php echo $row['destinasiFOTO'] ?>" width="80">
                                                <?php } else
                                                    echo "<img src='images/noimage.png' width='80'>"
                                                        ?>


                                                </td>
                                                <td>
                                                <?php echo $row['kategoriKODE']; ?>
                                            </td>


                                            <!-- Ubah button -->
                                            <td width="5px">
                                                <a href="destinasiedit.php?ubah=<?php echo $row["destinasiKODE"]; ?>"
                                                    class="btn btn-success btn-sm" title="EDIT">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                        <path
                                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                        <path fill-rule="evenodd"
                                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                    </svg>
                                                </a>
                                            </td>

                                            <!-- Delete buttton -->
                                            <td width="5px">
                                                <a href="destinasihapus.php?hapus=<?php echo $row["destinasiKODE"]; ?>"
                                                    class="btn btn-danger btn-sm" title="HAPUS">
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
                            $query = mysqli_query($connection, "SELECT * FROM destinasi");
                            $jumlahrecord = mysqli_num_rows($query);
                            $jumlahpage = ceil($jumlahrecord / $jumlahtampilan);
                            ?>


                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link"
                                            href="?page=<?php $nomorhal = 1;
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
                                    <li class="page-item"><a class="page-link"
                                            href="?page=<?php echo $nomorhal - 1 ?>">TERAKHIR</a></li>
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
                        $(document).ready(function () {
                            $('#kodekategori').select(
                                {
                                    closeOnSelect: true,
                                    allowClear: true,
                                    placeholder: 'Pilih Kategori Wisata'
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