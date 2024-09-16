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
	if(isset($_POST['Simpan']))
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

	}

?>


<body>

<div class="row">
<div class="col-sm-1"></div>

<div class="col-sm-10">
	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			
		</div>
	</div>

	
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

            <!-- untuk membuat form pencarian data -->
						<form method="POST">
                        <div class="form-group row mb-2">
                            <label for="search" class="col-sm-3">Nama Restoran</label>
                            <div class="col-sm-6">
                                <input type="text" name="search" class="form-control" id="search"
                                value="<?php if(isset($_POST["search"])) {echo $_POST["search"];}?>"
                                placeholder="Cari nama Restoran";>
                            </div>
                            <input type="submit" name="kirim"class="col-sm-1 btn btn-primary" value="Search">
                        </div>
                </form>

	<table class="table table-dark table-danger">
		<thead >
			<tr>
				<th>No</th>
				<th>Nama Restoran</th>
				<th>Menu Restoran</th>
<!--				<th>Kode Destinasi</th>  -->
				<th>Keterangan Restoran</th>
<!--				<th colspan="2" style="text-align: center">Action</th> -->
        <th>Photo Makanan</th>
			
				
			</tr>			
		</thead>

		<tbody>

		 <!-- untuk search data -->
 						<?php
                    // $query = mysqli_query($connection,"select destinasi.* from destinasi");
                    if(isset($_POST["kirim"])) {
                        $search = $_POST["search"];
                        $query = mysqli_query($connection,"select restoran.* from restoran where namarestoran like '%".$search."%'");
                    }else
                    {
                        $query = mysqli_query($connection,"select restoran.* from restoran");
                    }
 
                    $nomor = 1;
                    while($row = mysqli_fetch_array($query))
                    {
            ?>
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