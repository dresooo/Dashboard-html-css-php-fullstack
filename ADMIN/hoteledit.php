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
	<title>Hotel</title>
  	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<?php 
	include "include/config.php";
	if(isset($_POST['edit']))
	{
		$hotelKODE	 = $_POST['inputkode'];
		$hotelNAMA	 = $_POST['inputnama'];
    $hotelKET = $_POST['keterangan'];
//		$kodedestinasi = $_POST['kodedestinasi'];

		$hotelFILE = $_FILES['file']['name'];
		$file_tmp = $_FILES["file"]["tmp_name"];

		$ekstensifile = pathinfo($hotelFILE, PATHINFO_EXTENSION);

		// PERIKSA EKSTEN FILE HARUS JPG ATAU jpg
		if(($ekstensifile == "jpg") or ($ekstensifile == "JPG"))
		{
			move_uploaded_file($file_tmp, 'images/'.$hotelFILE); //unggah file ke folder images
			
		}

    mysqli_query($connection, "update hotel set hotelNAMA='$hotelNAMA', hotelKET='$hotelKET', hotelFILE='$hotelFILE' where hotelKODE='$hotelKODE' ");
		 echo "<script>document.location='hotel.php'</script>";
	}
  $hotelKODE= $_GET['ubah'];
  $edithotel = mysqli_query($connection,"select * from hotel where hotelKODE = '$hotelKODE'");
  $rowedit = mysqli_fetch_array($edithotel);
?>


<body>

<div class="row">
<div class="col-sm-1"></div>

<div class="col-sm-10">
	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			<h2 class="display-7"><b>HOTEL</b></h2>
		</div>
	</div>

	<form method="POST" enctype="multipart/form-data">
		<div class="form-group row">
			<label for="namarestoran" class="col-sm-2 col-form-label">Kode Hotel</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="namarestoran" name="inputkode" placeholder="Kode Hotel" value="<?php echo $rowedit["hotelKODE"] ?>" readonly>
			</div>
		</div>

		<div class="form-group row">
			<label for="menurestoran" class="col-sm-2 col-form-label">Nama Hotel</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="menurestoran" name="inputnama" placeholder="Nama Hotel"value="<?php echo $rowedit["hotelNAMA"] ?>">
			</div>
		</div>

    <div class="form-group row">
			<label for="keterangan" class="col-sm-2 col-form-label">Keterangan Hotel</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="namafoto" name="keterangan" placeholder="Keterangan Hotel" value="<?php echo $rowedit["hotelNAMA"] ?>"">
			</div>
		</div>

		<div class="form-group row">
			<label for="file" class="col-sm-2 col-form-label">Photo Hotel</label>
			<div class="col-sm-10">
				<input type="file" id="file" name="file" value="<?php echo $rowedit ["hotelFILE"] ?>">
			</div>
		</div>

		<div class="form-group row">
			<div class="col-sm-2"></div>
			<div class="col-sm-10">
				<input type="submit" name="edit" class="btn btn-primary" value="Ubah">
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
				<h2 class="display-7"><b>Daftar Hotel</b></h2>
			</div>
		</div>

            <!-- untuk membuat form pencarian data -->
						<form method="POST">
                        <div class="form-group row mb-2">
                            <label for="search" class="col-sm-3">Nama Hotel</label>
                            <div class="col-sm-6">
                                <input type="text" name="search" class="form-control" id="search"
                                value="<?php if(isset($_POST["search"])) {echo $_POST["search"];}?>"
                                placeholder="Cari nama Hotel";>
                            </div>
                            <input type="submit" name="kirim"class="col-sm-1 btn btn-primary" value="Search">
                        </div>
                </form>

	<table class="table table-dark table-danger">
		<thead >
			<tr>
				<th>No</th>
				<th>Kode Hotel</th>
				<th>Nama Hotel</th>
<!--				<th>Kode Destinasi</th>  -->
				<th>Keterangan Hotel</th>
<!--				<th colspan="2" style="text-align: center">Action</th> -->
        <th>Photo Hotel</th>
				<th colspan ="2" style="text-align:center;">Aksi</th>
				
			</tr>			
		</thead>

		<tbody>

		 <!-- untuk search data -->
 						<?php
                    // $query = mysqli_query($connection,"select destinasi.* from destinasi");
                    if(isset($_POST["kirim"])) {
                        $search = $_POST["search"];
                        $query = mysqli_query($connection,"select hotel.* from hotel where hotelKODE like '%".$search."%'");
                    }else
                    {
                        $query = mysqli_query($connection,"select hotel.* from hotel");
                    }
 
                    $nomor = 1;
                    while($row = mysqli_fetch_array($query))
                    {
            ?>
				<tr>
					<td><?php echo $nomor;?></td>
					<td><?php echo $row['hotelKODE'];?></td>
					<td><?php echo $row['hotelNAMA'];?></td>
          <td><?php echo $row['hotelKET'];?></td>
<!--					<td><?php// echo $row['destinasiKODE'];?></td>  -->
					<td>
						<?php if(is_file("images/".$row['hotelFILE']))
						{ ?>
							<img src="images/<?php echo $row['hotelFILE']?>" width="80">
						<?php } else
							echo "<img src='images/noimage.png' width='80'>"
						?>

						
					</td>

													<!-- Ubah button -->
													<td width= "5px">
                        <a href="hoteledit.php?ubah=<?php echo $row["hotelKODE"]; ?>" class="btn btn-success btn-sm" title="EDIT">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                        </a>
                            </td>

														<td width= "5px">
                                 <a href="hotelhapus.php?hapus=<?php echo $row["hotelKODE"]; ?>" class="btn btn-danger btn-sm" title="HAPUS">
                                <i class="bi bi-trash3-fill"></i>
                            </a>
                         </td>
				</tr>
			<?php $nomor = $nomor + 1;?>
			<?php }	?>
		</tbody>
		
	</table>
	</div>

	<div class="col-sm-1"></div>

	
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