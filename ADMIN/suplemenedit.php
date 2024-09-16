<!DOCTYPE html>



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
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Restoran</title>
  	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<?php 
	include "include/config.php";
	if(isset($_POST['Edit']))
	{
		$suplemenKODE	 = $_POST['inputkode'];
		$suplemenNAMA	 = $_POST['inputnama'];
    $suplemenKET = $_POST['keterangan'];
//		$kodedestinasi = $_POST['kodedestinasi'];

		$suplemenFILE = $_FILES['file']['name'];
		$file_tmp = $_FILES["file"]["tmp_name"];

		$ekstensifile = pathinfo($suplemenFILE, PATHINFO_EXTENSION);
										
		// PERIKSA EKSTEN FILE HARUS JPG ATAU jpg
		if(($ekstensifile == "jpg") or ($ekstensifile == "JPG"))
		{
			move_uploaded_file($file_tmp, 'images/'.$suplemenFILE); //unggah file ke folder images
			mysqli_query($connection, "insert into suplemen value ('$suplemenKODE', '$suplemenNAMA', '$suplemenKET', '$suplemenFILE')");
			header("location:suplemen.php");
		}
    mysqli_query($connection, "update suplemen set menurestoran='$menurestoran', keteranganrestoran='$keteranganrestoran', filerestoran='$filerestoran' where namarestoran='$namarestoran' ");
	}

?>


<body>

<div class="row">
<div class="col-sm-1"></div>

<div class="col-sm-10">
	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			<h2 class="display-7"><b>SUPLEMEN</b></h2>
		</div>
	</div>

	<form method="POST" enctype="multipart/form-data">
		<div class="form-group row">
			<label for="namarestoran" class="col-sm-2 col-form-label">kode Suplemen</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="namarestoran" name="inputkode" placeholder="Kode Suplemen" value="<?php echo $rowedit["suplemenKODE"] ?>" readonly>
			</div>
		</div>

		<div class="form-group row">
			<label for="menurestoran" class="col-sm-2 col-form-label">Nama Suplemen</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="menurestoran" name="inputnama" placeholder="Nama Suplemen" value="<?php echo $rowedit["suplemenNAMA"] ?>">
			</div>
		</div>

    <div class="form-group row">
			<label for="keterangan" class="col-sm-2 col-form-label">Keterangan Suplement</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="namafoto" name="keterangan" placeholder="Keterangan Suplemen" value="<?php echo $rowedit["suplemenKET"] ?>">
			</div>
		</div>

		<div class="form-group row">
			<label for="file" class="col-sm-2 col-form-label">Photo Suplement</label>
			<div class="col-sm-10">
				<input type="file" id="file" name="file" value="<?php echo $rowedit["suplemenFILE"] ?>">
			</div>
		</div>

		<div class="form-group row">
			<div class="col-sm-2"></div>
			<div class="col-sm-10">
				<input type="submit" name="Simpan" class="btn btn-primary" value="Simpan">
				<input type="submit" name="Batal" class="btn btn-secondary" value="Batal">
			</div>
		</div>
	</form>
	
</div>

<div class="col-sm-1"></div>
</div>

<div class="row">
	<div class="col-sm-1"></div>
	<div class="col-sm-10">
		<div class="jumbotron jumbotron-fluid">
			<div class="container">
				<h2 class="display-7"><b>Daftar Suplemen</b></h2>
			</div>
		</div>

            <!-- untuk membuat form pencarian data -->
						<form method="POST">
                        <div class="form-group row mb-2">
                            <label for="search" class="col-sm-3">Nama Suplemen</label>
                            <div class="col-sm-6">
                                <input type="text" name="search" class="form-control" id="search"
                                value="<?php if(isset($_POST["search"])) {echo $_POST["search"];}?>"
                                placeholder="Cari nama Suplement";>
                            </div>
                            <input type="submit" name="kirim"class="col-sm-1 btn btn-primary" value="Search">
                        </div>
                </form>

	<table class="table table-dark table-danger">
		<thead >
			<tr>
				<th>No</th>
				<th>Kode Suplemen</th>
				<th>Nama Suplement</th>
<!--				<th>Kode Destinasi</th>  -->
				<th>Keterangan Suplement</th>
<!--				<th colspan="2" style="text-align: center">Action</th> -->
        <th>Photo Suplement</th>
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
										$query = mysqli_query($connection, "select suplemen.* 
											from restoran
											where menurestoran like '%".$search."%' limit $mulaitampilan, $jumlahtampilan");
									// --------------------- PAGING -- MEMBUAT GANTI HALAMAN ---------------- 
									//	pada bagian ini tambhan --- limit $mulaitampilan, $jumlahtampilan ---	

									}else
										{
											$query = mysqli_query($connection, "select suplemen.* 
												from suplemen limit $mulaitampilan, $jumlahtampilan");
										}
									//	pada bagian ini tambhan --- limit $mulaitampilan, $jumlahtampilan ---	






                    // // $query = mysqli_query($connection,"select destinasi.* from destinasi");
                    // if(isset($_POST["kirim"])) {
                    //     $search = $_POST["search"];
                    //     $query = mysqli_query($connection,"select restoran.* from restoran where namarestoran like '%".$search."%'");
                    // }else
                    // {
                    //     $query = mysqli_query($connection,"select restoran.* from restoran");
                    // }
 
                    $nomor = 1;
                    while($row = mysqli_fetch_array($query))
                    {
            ?>
				<tr>
					<td><?php echo $mulaitampilan + $nomor; ?></td> 
					<td><?php echo $row['suplemenKODE'];?></td>
					<td><?php echo $row['suplemenNAMA'];?></td>
          <td><?php echo $row['suplemenKET'];?></td>
<!--					<td><?php// echo $row['destinasiKODE'];?></td>  -->
					<td>
						<?php if(is_file("images/".$row['suplemenFILE']))
						{ ?>
							<img src="images/<?php echo $row['suplemenFILE']?>" width="80">
						<?php } else
							echo "<img src='images/noimage.png' width='80'>"
						?>

						
					</td>

													<!-- Ubah button -->
													<td width= "5px">
                        <a href="suplemenedit.php?ubah=<?php echo $row["suplemenKODE"]; ?>" class="btn btn-success btn-sm" title="EDIT">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                        </a>
                            </td>

														<td width= "5px">
                                 <a href="suplemenhapus.php?hapus=<?php echo $row["suplemenKODE"]; ?>" class="btn btn-danger btn-sm" title="HAPUS">
                                <i class="bi bi-trash3-fill"></i>
                            </a>
                         </td>
				</tr>
			<?php $nomor = $nomor + 1;?>
			<?php }	?>
		</tbody>
		
	</table>

<!--------------------- PAGING -- MEMBUAT GANTI HALAMAN ---------------->
<?php 
    $query = mysqli_query($connection, "SELECT * FROM suplemen");
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


	</div>

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