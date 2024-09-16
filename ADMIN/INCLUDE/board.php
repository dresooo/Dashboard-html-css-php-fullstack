<!-- hitung banyak row pada tabble -->

<?php
    include "config.php";
    $sql = mysqli_query($connection, "select * from destinasi");
    $jumlah = mysqli_num_rows($sql);
?>    

<?php
    include "config.php";
    $sql = mysqli_query($connection, "select * from berita");
    $jumlah1 = mysqli_num_rows($sql);
?>  
<?php
    include "config.php";
    $sql = mysqli_query($connection, "select * from restoran");
    $jumlah2 = mysqli_num_rows($sql);
?>  
<?php
    include "config.php";
    $sql = mysqli_query($connection, "select * from hotel");
    $jumlah3 = mysqli_num_rows($sql);
?>  

<?php
    include "config.php";
    $sql = mysqli_query($connection, "select * from travel");
    $jumlah4 = mysqli_num_rows($sql);
?>  

<?php
    include "config.php";
    $sql = mysqli_query($connection, "select * from oleh");
    $jumlah5 = mysqli_num_rows($sql);
?>  
<?php
    include "config.php";
    $sql = mysqli_query($connection, "select * from kategoriwisata");
    $jumlah6 = mysqli_num_rows($sql);
?>  
<?php
    include "config.php";
    $sql = mysqli_query($connection, "select * from suplemen");
    $jumlah7 = mysqli_num_rows($sql);
?>  



                                <div class="row">
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-primary text-white mb-4">
                                        <div class="card-body">Destinasi Wisata : <?php echo $jumlah ?></div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="destinasitabble.php">View Details</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-warning text-white mb-4">
                                        <div class="card-body">Berita : <?php echo $jumlah1 ?></div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="beritatabble.php">View Details</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-success text-white mb-4">
                                        <div class="card-body">Restoran : <?php echo $jumlah2 ?> </div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="restorantabble.php">View Details</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-danger text-white mb-4">
                                        <div class="card-body">Hotel : <?php echo $jumlah3 ?></div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="hoteltabble.php">View Details</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                <div class="card bg-secondary text-white mb-4">
                                        <div class="card-body">Travel : <?php echo $jumlah4 ?></div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="traveltabble.php">View Details</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                <div class="card bg-dark text-white mb-4">
                                        <div class="card-body">Oleh-Oleh : <?php echo $jumlah5 ?></div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="olehtabble.php">View Details</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                        <div class="card-body">Kategori Wisata : <?php echo $jumlah6 ?></div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="olehtabble.php">View Details</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                        <div class="card-body">Suplemen : <?php echo $jumlah7 ?></div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="olehtabble.php">View Details</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>