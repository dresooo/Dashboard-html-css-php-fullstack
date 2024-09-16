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
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Restoran</title>
  	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<?php 
	include "include/config.php";
	if(isset($_POST['edit']))
	{
		$namarestoran	 = $_POST['inputkode'];
		$menurestoran	 = $_POST['inputnama'];
    $keteranganrestoran = $_POST['keterangan'];
//		$kodedestinasi = $_POST['kodedestinasi'];

		$filerestoran = $_FILES['file']['name'];
		$file_tmp = $_FILES["file"]["tmp_name"];

		$ekstensifile = pathinfo($filerestoran, PATHINFO_EXTENSION);
		// PERIKSA EKSTEN FILE HARUS JPG ATAU jpg
		if(($ekstensifile == "jpg") or ($ekstensifile == "JPG"))
		{
			move_uploaded_file($file_tmp, 'images/'.$filerestoran); //unggah file ke folder images
			mysqli_query($connection, "insert into restoran value ('$namarestoran', '$menurestoran', '$keteranganrestoran', '$filerestoran')");
			header("location:restoran.php");
		}

    mysqli_query($connection, "update restoran set menurestoran='$menurestoran', keteranganrestoran='$keteranganrestoran', filerestoran='$filerestoran' where namarestoran='$namarestoran' ");
	}
  $namarestoran = $_GET['ubah'];
  $editrestoran = mysqli_query($connection,"select * from restoran where namarestoran = '$namarestoran'");
  $rowedit = mysqli_fetch_array($editrestoran);
  //	$datadestinasi = mysqli_query($connection, "select * from destinasi");
?>


<body>

<div class="row">
<div class="col-sm-1"></div>

<div class="col-sm-10">
	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			<h2 class="display-7"><b>RESTORAN</b></h2>
		</div>
	</div>

	<form method="POST" enctype="multipart/form-data">
		<div class="form-group row">
			<label for="namarestoran" class="col-sm-2 col-form-label">Nama Restoran</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="namarestoran" name="inputkode" placeholder="Nama Restoran"  value="<?php echo $rowedit["namarestoran"] ?>" readonly>
			</div>
		</div>

		<div class="form-group row">
			<label for="menurestoran" class="col-sm-2 col-form-label">Menu Restoran</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="menurestoran" name="inputnama" placeholder="Menu Restoran" value="<?php echo $rowedit["menurestoran"] ?>" >
			</div>
		</div>

    <div class="form-group row">
			<label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="namafoto" name="keterangan" placeholder="Keterangan Restoran"value="<?php echo $rowedit["keteranganrestoran"] ?>" >
			</div>
		</div>


    <div class="form-group row">
        <label for="file" class="col-sm-2 col-form-label">Photo Makanan</label>
        <div class="col-sm-10">
            <input type="file" id="file" name="file" <?php echo $rowedit["filerestoran"] ?>>
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
				<h2 class="display-7"><b>Daftar Restoran</b></h2>
			</div>
		</div>


	<table class="table table-dark table-danger">
		<thead">
			<tr>
				<th>No</th>
				<th>Nama Restoran</th>
				<th>Menu Restoran</th>
<!--				<th>Kode Destinasi</th>  -->
				<th>Keterangan Restoran</th>
<!--				<th colspan="2" style="text-align: center">Action</th> -->
        <th>Photo Makanan</th>
				<th colspan ="2" style="text-align:center;">Aksi</th>
				
			</tr>			
		</thead>

		<tbody>
			<?php $query = mysqli_query($connection, "select * from restoran");
			$nomor = 1;
			while ($row = mysqli_fetch_array($query))
			{ ?>
				<tr>
					<td><?php echo $nomor;?></td>
					<td><?php echo $row['namarestoran'];?></td>
					<td><?php echo $row['menurestoran'];?></td>
          <td><?php echo $row['keteranganrestoran'];?></td>
<!--					<td><?php// echo $row['destinasiKODE'];?></td>  -->
					<td>
						<?php if(is_file("images/".$row['filerestoran']))
						{ ?>
							<img src="images/<?php echo $row['filerestoran']?>" width="80">
						<?php } else
							echo "<img src='images/noimage.png' width='80'>"
						?>
					</td>

          <td width= "5px">
                        <a href="restoranedit.php?ubah=<?php echo $row["namarestoran"]; ?>" class="btn btn-success btn-sm" title="EDIT">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                        </a>
                            </td>
					<td width= "5px">
                                 <a href="restoranhapus.php?hapus=<?php echo $row["namarestoran"]; ?>" class="btn btn-danger btn-sm" title="HAPUS">
                                <i class="bi bi-trash3-fill"></i>
                            </a>
                         </td>
<!--
					<td>
						<a href="photodestinasiubah.php?ubafoto=<?php echo $row['fotoID']?>" class="btn btn-success btn-sm" title="EDIT">
						<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg>
						</a>
					</td>

					<td>
						<a href="photodestinasihapus.php?hapusfoto=<?php echo $row['fotoID']?>" class="btn btn-danger btn-sm" title="DELETE">
<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
</svg>
						</a>
						
					</td>
-->
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