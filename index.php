<!DOCTYPE html>
<html lang="en">


<!-- untuk jumlah  pada destinasi pilihan-->
<?php
include "ADMIN/INCLUDE/config.php";
$sql = mysqli_query($connection, "select * from destinasi");
$jumlah = mysqli_num_rows($sql);

$sql = mysqli_query($connection, "select * from berita");
$jumlah1 = mysqli_num_rows($sql);


$sql = mysqli_query($connection, "select * from restoran");
$jumlah2 = mysqli_num_rows($sql);

$sql = mysqli_query($connection, "select * from hotel");
$jumlah3 = mysqli_num_rows($sql);

$sql = mysqli_query($connection, "select * from travel");
$jumlah4 = mysqli_num_rows($sql);

$sql = mysqli_query($connection, "select * from oleh");
$jumlah5 = mysqli_num_rows($sql);

$sql = mysqli_query($connection, "select * from kategoriwisata");
$jumlah6 = mysqli_num_rows($sql);

$sql = mysqli_query($connection, "select * from suplemen");
$jumlah7 = mysqli_num_rows($sql);
?>


<!-- query untuk simpan ke tabble saran -->
<?php
include "ADMIN/INCLUDE/config.php";
if (isset($_POST['Simpan'])) {
  $saranID = $_POST["inputid"];
  $saranNAMA = $_POST["inputnama"];
  $saranNAMA = $_POST["inputemail"];
  $saranKET = $_POST["inputket"];
  // $olehKODE = $_POST["namarestoran"];

  mysqli_query($connection, "insert into saran values ('$saranID', '$saranNAMA', '$saranNAMA','$saranKET')");
  echo "<script>document.location='index.php'</script>";
}

// untuk dropdown menu
$kategorimenu = mysqli_query($connection, "select * from kategoriwisata");
$restoranmenu = mysqli_query($connection, "select * from restoran");
$hotelmenu = mysqli_query($connection, "select * from hotel");

// untuk tampilan setiap data
$destinasi = mysqli_query($connection, "select * from destinasi,kategoriwisata where 
           destinasi.kategoriKODE = kategoriwisata.kategoriKODE");
$hotel = mysqli_query($connection, "select * from hotel");

$restoran = mysqli_query($connection, "select * from restoran");

$suplemen = mysqli_query($connection, "select * from suplemen");

$berita = mysqli_query($connection, "select * from berita");

$oleh = mysqli_query($connection, "select * from oleh");

$travel = mysqli_query($connection, "select * from travel");

$kota = mysqli_query($connection, "select * from andres,destinasi where 
andres.destinasiKODE = destinasi.destinasiKODE");

?>


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dreso</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.17.0/font/bootstrap-icons.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="index7.css">
</head>


<body style="font-family: 'Poppins', sans-serif;">

  <div class="container">

    <!-- menu -->
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Andres</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">

              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </li>
            <!-- DROPDOWN KATEGORI WISATA -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Kategori Wisata
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <?php
                if (mysqli_num_rows($kategorimenu) > 0) {
                  while ($row = mysqli_fetch_array($kategorimenu)) {
                    ?>
                    <li><a class="dropdown-item" href="#">
                        <?php echo $row["kategoriNAMA"]; ?>
                      </a></li>
                    <?php
                  }
                }
                ?>
              </ul>
            </li>

            <!-- DROPDOWN RESTORAN -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Restoran
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <?php
                if (mysqli_num_rows($restoranmenu) > 0) {
                  while ($row = mysqli_fetch_array($restoranmenu)) {
                    ?>
                    <li><a class="dropdown-item" href="#">
                        <?php echo $row["menurestoran"]; ?>
                      </a></li>
                    <?php
                  }
                }
                ?>
              </ul>
            </li>

            <!-- DROPDOWN Hotel -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Hotel
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <?php
                if (mysqli_num_rows($hotelmenu) > 0) {
                  while ($row = mysqli_fetch_array($hotelmenu)) {
                    ?>
                    <li><a class="dropdown-item" href="#">
                        <?php echo $row["hotelNAMA"]; ?>
                      </a></li>
                    <?php
                  }
                }
                ?>
              </ul>
            </li>



            <li class="nav-item">
              <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
          </ul>
          <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>
    <!-- end of line menu -->





    <!-- carosel -->
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
          aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
          aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
          aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="ADMIN/images/bg-05.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>First slide label</h5>
            <p>Some representative placeholder content for the first slide.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="ADMIN/images/simpson1.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Second slide label</h5>
            <p>Some representative placeholder content for the second slide.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="ADMIN/images/simpson2.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Third slide label</h5>
            <p>Some representative placeholder content for the third slide.</p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    <!-- End of line carosel -->

    <div class="backgroundfull">

      <!-- PARIWISATA INDONESIA -->
      <div class="bgcolor">
        <div class="atas">
          <h2>Pariwisata INDONESIA</h2>
        </div>
        <div class="tengah">
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti culpa ullam aspernatur fugiat, delectus
            optio laborum porro quod ex! Veritatis aperiam recusandae, eos sequi nulla quisquam et dolorum id
            necessitatibus ex labore nemo praesentium quos incidunt quo ad repudiandae laudantium exercitationem
            voluptatum maiores fugit nesciunt impedit delectus consequuntur! Atque omnis ratione inventore voluptatum
            consequuntur perferendis velit labore officiis totam explicabo minima rerum ut sed voluptatibus quia dolores
            numquam distinctio aliquam saepe ad repellendus, veritatis corporis aspernatur? Eveniet minus harum,
            laboriosam alias eos quam nihil quia aliquam accusantium, odio possimus obcaecati eius mollitia tempore
            quisquam deleniti at pariatur nam sint autem?</p>
        </div>
        <div class="bawah">
          <h2>Travel News</h2>
        </div>
      </div>



      <!-- destinasi tampilan -->
      <div class="backgroundberita">
        <div class="row">
          <div class="col-sm-9 newsinfo">
            <div class="infoberita">
              <h2> Latest News</h2>
            </div>

            <?php
            if (mysqli_num_rows($destinasi) > 0) {
              while ($row = mysqli_fetch_array($destinasi)) { ?>
                <div class="d-flex news-item">
                  <div class="flex-shrink-0">
                    <?php
                    $imagePath = "ADMIN/images/" . $row["destinasiFOTO"]; // Adjust the path based on your directory structure
                    ?>
                    <img style="width: 140px; height: 100%; margin-right: 30px; margin-top: 20px;"
                      src="<?php echo $imagePath; ?>" alt="">
                  </div>
                  <div class="flex-grow-1">
                    <h5 style="margin-top: 20px ;font-size: 20px;">
                      <?php echo $row["destinasiNAMA"]; ?> <small class="text-muted"><i>
                          <?php echo $row["kategoriNAMA"]; ?>
                        </i></small>
                    </h5>
                    <p>
                      <?php echo substr($row["destinasiKET"], 0, 250); ?>......
                    </p>
                    <button type="button" class="btn btn-secondary">Secondary</button>
                  </div>
                </div>
                <?php
              }
            }
            ?>
          </div> <!-- penutup col sm9 -->

          <div class="col-sm-3 cardbg">
            <div class="row">
              <div class="col-md-12">
                <div class="infoberita">
                  <h2> Panaroma</h2>
                </div>
                <div class="card" style="width: 23rem; margin-top: 25px">
                  <img style="width: 100px; margin-left: 0px; height:100%; margin-top : 10px"
                    src="https://logowik.com/content/uploads/images/bart-simpson2997.logowik.com.webp"
                    class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                      card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                  </div>
                </div>

                <div class="card" style="width: 23rem; margin-top: 50px; ">
                  <img style="width: 100px; margin-left: 0px; height:100%;  margin-top : 10px"
                    src="https://logowik.com/content/uploads/images/bart-simpson2997.logowik.com.webp"
                    class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                      card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                  </div>
                </div>
              </div> <!-- penutup col-md-12 -->
            </div> <!-- penutup row for card -->
          </div> <!-- penutup col sm3 -->
        </div> <!-- penutup row -->
      </div> <!-- penutup bg berita -->
    </div> <!-- penutup bgfull -->


    <!-- whats in websiteku -->
    <div class="bglogo">
      <div class="whatatas">
        <h2>Whats In Websiteku?</h2>
      </div>
      <div class="whatlogo">
        <div class="kiri">
          <img src="image/gunung.png" alt="">
          <h1>Destinasi Wisata</h1>
        </div>
        <div class="tengah">
          <img src="image/restoran.png" alt="">
          <h1>Pilihan Restoran</h1>
        </div>
        <div class="kanan">
          <img src="image/hotel.png" alt="">
          <h1>Pilihan Hotel</h1>
        </div>
      </div>
    </div> <!-- Penutu bglogo -->


    <!-- HOTEL -->
    <div class="bgdestinasipilihan" style="background-color: #FED9ED; height: 700px;">
      <div class="row">
        <div class="hotel">
          <H2 class="pilihanhotel" style="font-family: 'Poppins', sans-serif;"> Pilihan Hotel</H2>
          <div clas="kiri " style=" width: 750px; height: 500px; float: left; padding-top:25px; padding-left:25px;">



            <?php
            if (mysqli_num_rows($hotel) > 0) {
              while ($row = mysqli_fetch_array($hotel)) { ?>
                <div class="d-flex news-item">
                  <div class="hotelborder" style="background-color:white; 
                border-radius: 40px; width: 700px; height: 165px; padding-left: 25px; padding-top: 15px;">
                    <div class="flex-grow-1" style="width: 500px;float: left;">
                      <h5 style="margin-top: 20px">
                        <?php echo $row["hotelNAMA"]; ?>
                      </h5>
                      <p>
                        <?php echo substr($row["hotelKET"], 0, 250); ?>......
                      </p>
                    </div>

                    <?php
                    $imagePath = "ADMIN/images/" . $row["hotelFILE"]; // Adjust the path based on your directory structure
                    ?>
                    <img style="width: 130px; height: 130px; margin-right: 30px; " src="<?php echo $imagePath; ?>" alt="">

                  </div>
                </div>
                <?php
              }
            }
            ?>

          </div>

          <!-- UNTUK CARD KANAN JUMLAH TAMPILAN -->
          <div class="kanan"
            style="background-color: white;  border-radius: 10px ;padding-left: 25px; width: 400px; height: 300px; float: right; margin-top: 30px; margin-right: 50px; padding-top: 25px;">
            <div class="pilihan" style="; height: 300px; width: 220px; float: left;">
              <h5>Pilihan Destinasi
              </h5>
              <h5>Pilihan Restoran</h5>
              <h5>Pilihan Hotel</h5>
              <h5>Pilihan Berita</h5>
              <h5>Pilihan Oleh-Oleh</h5>
              <h5>Pilihan Suplemen</h5>
              <h5>Pilihan Travel</h5>
              <h5>Pilihan Kategori Wisata</h5>
            </div>

            <div class="jumlah" style="height: 300px; float: right; margin-right: 20px;">
              <div class="circle">
                <?php echo $jumlah ?>
              </div>
              <div class="circle">
                <?php echo $jumlah2 ?>
              </div>
              <div class="circle">
                <?php echo $jumlah3 ?>
              </div>
              <div class="circle">
                <?php echo $jumlah1 ?>
              </div>
              <div class="circle">
                <?php echo $jumlah5 ?>
              </div>
              <div class="circle">
                <?php echo $jumlah7 ?>
              </div>
              <div class="circle">
                <?php echo $jumlah4 ?>
              </div>
              <div class="circle">
                <?php echo $jumlah6 ?>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div> <!-- penutup row -->



    <!-- TAMPILAN DESTINASI FOTO -->
    <div class="fotodestinasi">
      <h2 style="font-family: 'Poppins', sans-serif;">Wonderfull Nusantara</h2>
      <h3 style="font-family: 'Poppins', sans-serif;">Foto Destinasi</h3>
    </div>

    <!-- row 1 -->
    <div class="destinasigambar">
      <div class="d-flex justify-content-center">
        <div class="p-3 bd-highlight">
          <img src="image/borobudur.jpg" alt="">
          <h4>Candi Borobudur</h4>
        </div> 
        <div class="p-3 bd-highlight">
          <img src="image/candisari1.jpg" alt="">
          <h4>Candi Sari</h4>
        </div>
        <div class="p-3 bd-highlight">
          <img src="image/Four.jpg" alt="">
          <h4>Four Season Resort</h4>
        </div>
      </div>
      <!-- row 2 -->
      <div class="d-flex justify-content-center">
        <div class="p-3 bd-highlight">
          <img src="image/alila.jpg" alt="">
          <h4>Alila Purnama Hotel</h4>
        </div>
        <div class="p-3 bd-highlight">
          <img src="image/komodo.jpg" alt="">
          <h4>Pulau Komodo</h4>
        </div>
        <div class="p-3 bd-highlight">
          <img src="image/mandapa.jpg" alt="">
          <h4>Mandapa A Ritz</h4>
        </div>
      </div>
    </div>

    <!-- RESTORAN-->
    <div class="bgdestinasipilihan" style="background-color: #FED9ED; height: 700px;">
      <div class="row">
        <div class="hotel">
          <H2 class="pilihanhotel" style="font-family: 'Poppins', sans-serif;"> Pilihan Restoran</H2>
          <div clas="kiri " style=" width: 750px; height: 500px; float: left; padding-top:25px; padding-left:25px;">



            <?php
            if (mysqli_num_rows($restoran) > 0) {
              while ($row = mysqli_fetch_array($restoran)) { ?>
                <div class="d-flex news-item">
                  <div class="hotelborder" style="background-color:white; 
                border-radius: 40px; width: 700px; height: 165px; padding-left: 25px; padding-top: 15px;">
                    <div class="flex-grow-1" style="width: 500px;float: left;">
                      <h5 style="margin-top: 20px">
                        <?php echo $row["namarestoran"]; ?>
                      </h5>
                      <p>
                        <?php echo substr($row["keteranganrestoran"], 0, 250); ?>......
                      </p>
                    </div>

                    <?php
                    $imagePath = "ADMIN/images/" . $row["filerestoran"]; // Adjust the path based on your directory structure
                    ?>
                    <img style="width: 130px; height: 130px; margin-right: 30px; margin-left: 10px; "
                      src="<?php echo $imagePath; ?>" alt="">

                  </div>
                </div>
                <?php
              }
            }
            ?>
          </div>

          <div class="kanan"
            style="background-color: white;  border-radius: 10px ;padding-left: 25px; width: 400px; height: 300px; float: right; margin-top: 30px; margin-right: 50px; padding-top: 25px;">
            <div class="pilihan" style="; height: 300px; width: 220px; float: left;">
              <h5>Pilihan Destinasi
              </h5>
              <h5>Pilihan Restoran</h5>
              <h5>Pilihan Hotel</h5>
              <h5>Pilihan Berita</h5>
              <h5>Pilihan Oleh-Oleh</h5>
              <h5>Pilihan Suplemen</h5>
              <h5>Pilihan Travel</h5>
              <h5>Pilihan Kategori Wisata</h5>
            </div>

            <div class="jumlah" style="height: 300px; float: right; margin-right: 20px;">
              <div class="circle">
                <?php echo $jumlah ?>
              </div>
              <div class="circle">
                <?php echo $jumlah2 ?>
              </div>
              <div class="circle">
                <?php echo $jumlah3 ?>
              </div>
              <div class="circle">
                <?php echo $jumlah1 ?>
              </div>
              <div class="circle">
                <?php echo $jumlah5 ?>
              </div>
              <div class="circle">
                <?php echo $jumlah7 ?>
              </div>
              <div class="circle">
                <?php echo $jumlah4 ?>
              </div>
              <div class="circle">
                <?php echo $jumlah6 ?>
              </div>
            </div>

          </div>
        </div>
      </div><!-- penutup row -->
    </div> <!-- penutup bgdestinasipilihan-->


    <!-- Suplemen output -->
    <div class="bgsuplemen">
      <div class="row">
        <h1>Suplemen</h1>
        <div class="kiri">
          <?php
          if (mysqli_num_rows($suplemen) > 0) {
            while ($row = mysqli_fetch_array($suplemen)) { ?>
              <div class="news-item">
                <div class="hotelborder">
                  <div class="flex-grow-1">
                    <h5 style="margin-top: 20px">
                      <?php echo $row["suplemenNAMA"]; ?>
                    </h5>
                    <p>
                      <?php echo substr($row["suplemenKET"], 0, 100); ?>......
                    </p>
                  </div>

                  <?php
                  $imagePath = "ADMIN/images/" . $row["suplemenFILE"]; // Sesuaikan path berdasarkan struktur direktori Anda
                  ?>
                  <img src="<?php echo $imagePath; ?>" alt="">
                </div>
              </div>
              <?php
            }
          }
          ?>
        </div>
      </div>
    </div>

          <!-- andresuas -->
    <div class="bgsuplemen">
      <div class="row">
        <h1>Kota</h1>
        <div class="kiri">
          <?php
          if (mysqli_num_rows($kota) > 0) {
            while ($row = mysqli_fetch_array($kota)) { ?>
              <div class="news-item">
                <div class="hotelborder">
                  <div class="flex-grow-1">
                    <h5 style="margin-top: 20px">
                      <?php echo $row["destinasiNAMA"]; ?>
                    </h5>
                    <p style =" font-size: 13px;">
                       <?php echo substr($row["andresKOTA"], 0, 100); ?>
                    </p>
                    <p><?php echo substr($row["destinasiKET"], 0, 100); ?></p>
                  </div>

                  <?php
                  $imagePath = "ADMIN/images/" . $row["destinasiFOTO"]; // Sesuaikan path berdasarkan struktur direktori Anda
                  ?>
                  <img src="<?php echo $imagePath; ?>" alt="">
                </div>
              </div>
              <?php
            }
          }
          ?>
        </div>
      </div>
    </div>


    <!-- Berita -->
    <div class="bgsuplemen">
      <div class="row">
        <h1>Berita</h1>
        <div class="kiri">
          <?php
          if (mysqli_num_rows($berita) > 0) {
            while ($row = mysqli_fetch_array($berita)) { ?>
              <div class="news-item">
                <div class="hotelborder1">
                  <div class="flex-grow-1">
                    <h5 style="margin-top: 20px">
                      <?php echo $row["beritaDRESO"]; ?>
                    </h5>
                    <p>
                      <?php echo substr($row["event825220026"], 0, 100); ?>......
                    </p>
                  </div>



                </div>
              </div>
              <?php
            }
          }
          ?>
        </div>
      </div>
    </div>

    <!-- oleh oleh -->
    <div class="bgsuplemen">
      <div class="row">
        <h1>Oleh Oleh</h1>
        <div class="kiri">
          <?php
          if (mysqli_num_rows($oleh) > 0) {
            while ($row = mysqli_fetch_array($oleh)) { ?>
              <div class="news-item">
                <div class="hotelborder">
                  <div class="flex-grow-1">
                    <h4 style="margin-top: 20px">
                      <?php echo $row["olehNAMA"]; ?>
                    </h4>
                    <h6> Harga : Rp.
                      <?php echo $row["olehHARGA"]; ?>
                    </h6>
                    <p>
                      <?php echo substr($row["olehKET"], 0, 100); ?>......
                    </p>
                  </div>
                </div>
              </div>
              <?php
            }
          }
          ?>
        </div>
      </div>
    </div>

    <!-- travel -->
    <div class="bgsuplemen">
      <div class="row">
        <h1>Travel</h1>
        <div class="kiri">
          <?php
          if (mysqli_num_rows($travel) > 0) {
            while ($row = mysqli_fetch_array($travel)) { ?>
              <div class="news-item">
                <div class="hotelborder1">
                  <div class="flex-grow-1">
                    <h4 style="margin-top: 20px">
                      <?php echo $row["travelNAMA"]; ?>
                    </h4>
                    <p>
                      <?php echo substr($row["travelKET"], 0, 100); ?>......
                    </p>
                  </div>
                </div>
              </div>
              <?php
            }
          }
          ?>
        </div>
      </div>
    </div>





    <div class="outor">
      <div class="row">
        <h2>What The Author Said?</h2>
        <div class="atas">
          <img src="image/dreso.png" alt="">
          <h3>Andres Malvin Jiu</h3>
          <h4>Website front end ini sangat cape untuk di buat.</h3>
        </div>
        <div class="bawah">
          <img src="image/nico.png" alt="">
          <h3>Nico</h3>
          <h4>Website ini sangat indah.</h3>
        </div>
      </div>
    </div><!-- penutup outor -->

    <div class="saran">
      <div class="row">
        <div class="kiri">
          <h2>Untuk Memberi Saran</h2>
          <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">ID :</label>
              <input type="text" name="inputid" class="form-control" id="exampleFormControlInput1"
                placeholder="Masukan ID">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Nama :</label>
              <input type="text" name="inputnama" class="form-control" id="exampleFormControlInput1"
                placeholder="Masukan Nama">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Email address :</label>
              <input type="email" name="inputemail" class="form-control" id="exampleFormControlInput1"
                placeholder="name@example.com">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Komentar :</label>
              <textarea class="form-control" name="inputket" id="exampleFormControlTextarea1" rows="4"></textarea>
            </div>

            <button type="submit" name="Simpan" value="Simpan" class="btn btn-secondary">Submit</button>
            <button type="reset" class="btn btn-secondary">Cancel</button>
          </form>
        </div>



        <div class="kanan">
          <h2>Komentar Anda</h2>
          <table class="table table-info">
            <thead>
              <tr>
                <th>No</th>
                <th>ID</th>
                <th>Nama</th>
                <!--				<th>Kode Destinasi</th>  -->
                <th>Email</th>
                <!--				<th colspan="2" style="text-align: center">Action</th> -->
                <th>Komentar</th>
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
              if (isset($_POST["kirim"])) {
                $search = $_POST["search"];
                $query = mysqli_query($connection, "select saran.* 
											from restoran
											where menurestoran like '%" . $search . "%' limit $mulaitampilan, $jumlahtampilan");
                // --------------------- PAGING -- MEMBUAT GANTI HALAMAN ---------------- 
                //	pada bagian ini tambhan --- limit $mulaitampilan, $jumlahtampilan ---	
              
              } else {
                $query = mysqli_query($connection, "select saran.* 
												from saran limit $mulaitampilan, $jumlahtampilan");
              }


              $nomor = 1;
              while ($row = mysqli_fetch_array($query)) {
                ?>
                <tr>
                  <td class="table-light">
                    <?php echo $mulaitampilan + $nomor; ?>
                  </td>
                  <td class="table-light">
                    <?php echo $row['saranID']; ?>
                  </td>
                  <td class="table-light">
                    <?php echo $row['saranNAMA']; ?>
                  </td>
                  <td class="table-light">
                    <?php echo $row['saranEMAIL']; ?>
                  </td>
                  <td class="table-light">
                    <?php echo $row['saranKET']; ?>
                  </td>
                </tr>
                <?php $nomor = $nomor + 1; ?>
              <?php } ?>
            </tbody>
          </table>
          <!--------------------- PAGING -- MEMBUAT GANTI HALAMAN ---------------->
          <?php
          $query = mysqli_query($connection, "SELECT * FROM saran");
          $jumlahrecord = mysqli_num_rows($query);
          $jumlahpage = ceil($jumlahrecord / $jumlahtampilan);
          ?>

          <!-- TAMPILAN PADA HALAMAN PAGINATION INI DAPAT DIAMBIL DARI BOOTSTRAP 5 
     PADA BAGIAN components -> pagination 
-->
          <nav aria-label="Page navigation example">
            <ul class="pagination">
              <li class="page-item"><a class="page-link" href="?page=<?php $nomorhal = 1;
              echo $nomorhal ?>">PERTAMA</a>
              </li>
              <?php for ($nomorhal = 1; $nomorhal <= $jumlahpage; $nomorhal++) { ?>
                <li class="page-item">
                  <?php
                  if ($nomorhal != $halaman) { ?>
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
        </div>



      </div><!-- penutup row -->
    </div><!-- penutup saran -->

    <div class="footer">
      <div class="row">
        <div class="kiri">
          <div class="atas">
            <img src="image/location.png" alt="">
            <h4>Jalan Dan Moogot 1, no 17, 1145</h4>
          </div>
          <div class="atas">
            <img src="image/phone.png" alt="">
            <h4 style="">+62 081318999997</h4>
          </div>
          <div class="atas">
            <img src="image/mail.png" alt="">
            <h4>Dreso@Gmail.com</h4>
          </div>
        </div>
        <div class="kanan">
          <h2>About Websiteku</h2>
          <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repudiandae consectetur perspiciatis quibusdam
            velit amet placeat, quam aliquam nam? Rerum eaque corrupti saepe culpa ut illo temporibus commodi sint
            suscipit ex.</p>
          <div class="logofoter">
            <a href=""><img src="image/instagram.png" alt=""><img src="image/facebook.png" alt=""> <img
                src="image/twiter.png" alt=""></a>
          </div>

        </div>
      </div>
    </div>

  </div> <!--pennutup container -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>