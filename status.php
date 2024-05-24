<?php
# @Author: ALUMNI
# @Copyright: (c) MIN 2 KOTA SURABAYA
?>
<?php
require_once("private/database.php");
$nomorError = "";
global $found, $foundreply;
// jalankan jika tombol cari ditekan
if(isset($_POST['submit'])) {
    $nomor = $_POST['nomor'];
    $is_valid = true;
    // validasi nomor laporan yang di inputankan user
    if (!preg_match("/^[0-9]*$/",$nomor)) { // cek nomor hanya boleh angka
        $nomorError = "Input Hanya Boleh Angka";
        $is_valid = false;
    } else {
        $nomorError = "";
    }
    // jika inpuan valid jalankan
    if ($is_valid) {
        $statement = $db->query("SELECT * FROM laporan LEFT JOIN divisi ON laporan.tujuan = divisi.id_divisi WHERE laporan.id = $nomor");
        // jika laporan tidak ditemukan tampilkan pesan
        if ($statement->rowCount() < 1) {
            $notFound= "Nomor Tiket Tidak Ditemukan !";
        }
        // jika  laporan ditemukan
        else {
            // ada laporan ada tangggapan
            $stat = $db->query("SELECT * FROM `tanggapan` WHERE id_laporan = $nomor");
            if ($stat->rowCount() > 0) {
                $foundreply = true;
            }
            // pengaduan ditemukan
            $nomorError = "";
            $found = true;
        }
    }
}
?>
<!DOCTYPE html>
<!--
  ____    _   _           _  _     ____     ___    _____ 
 / ___|  | | | |         | || |   | ___|   / _ \  |___  |
 \___ \  | |_| |  _____  | || |_  |___ \  | | | |    / / 
  ___) | |  _  | |_____| |__   _|  ___) | | |_| |   / /  
 |____/  |_| |_|            |_|   |____/   \___/   /_/   
                                                         
                                              
Don't just copy and paste, appreciate the creator of this theme by including the owner's website, thank you.

https://www.infoghazi.com/
				
-->					
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Cek Status | MIN 2 KOTA SURABAYA</title>
    <link rel="shortcut icon" href="images/min2.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- font Awesome CSS -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Main Styles CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="js/bootstrap.js"></script>
</head>

<body>
    <!--Success Modal Saved-->
    <div class="modal fade" id="failedmodal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm " role="document">
            <div class="modal-content bg-2">
                <div class="modal-header ">
                    <h4 class="modal-title text-center text-danger">Gagal</h4>
                </div>
                <div class="modal-body">
                    <p class="text-center">Nomor Tiket Tidak Ditemukan</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" onclick="location.href='status';" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <?php
    // alert pengaduan tidak ditemukan
    if(isset($notFound)) {
        ?>
        <script type="text/javascript">
        $("#failedmodal").modal();
        </script>
        <?php
    }
    ?>

    <div class="shadow">
        <?php include 'menu.php';?>

        <!-- content -->
        <div class="main-content">
            <h3>Lihat Status Tiket  Anda</h3>
            <hr/>
            <div class="row">
                <div class="col-md-6 card-shadow-2 form-custom">
                    <form class="form-horizontal" role="form" method="post">
                        <div class="form-group">
                            <label for="nomor" class="col-sm-4 control-label">Nomor Tiket</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="glyphicon glyphicon-exclamation-sign"></span></div>
                                    <input type="text" class="form-control" id="nomor" name="nomor" placeholder="Masukkan Nomor Tiket" required>
                                </div>
                                <p class="error"><?= @$nomorError ?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-4">
                                <input id="submit" name="submit" type="submit" value="Cek Status" class="btn btn-primary-custom form-shadow">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6"></div>
            </div>

            <br>
            <?php
            // dijalankan ketika $found bernilai true // laporan ditemukan
            if ($found){
                foreach ($statement as $key) {
                    $mysqldate = $key['tanggal'];
                    $phpdate = strtotime($mysqldate);
                    $tanggal = date( 'd F Y, H:i:s', $phpdate);
                    ?>
                    <h3>Hasil Pencarian</h3>

                    <div class="row">
                        <div class="col-md-8">

                            <div class="panel-body-lihat card-shadow-2">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h5 class="h3-laporan custom"><kbd>Status Tiket Anda</kbd></h5>
                                    </div>
                                    
                                </div>
                                <hr class="hr-laporan">
                                <a class="media-left" href="#"><img class="img-circle card-shadow-2 img-sm" src="images/avatar/avatar1.png"></a>
                                <div class="media-body">
                                    <div>
                                        <h4 class="text-green profil-name" style="font-family: monospace;">Tiket an.  <?php echo $key['nama']; ?></h4>
                                        <p class="text-muted text-sm"><i class="fa fa-th fa-fw"></i> - Pada tanggal <?php echo $tanggal; ?></p>
                                    </div>
                                    
                                    <hr class="hr-nama">
                                    <div class="isi-laporan">
                                        <p class="text-justify"><br/><kbd>Nomor Tiket :</kbd><br/>
                                            <h3><?php echo $key['id']; ?></h3>
                                        </p>
                                    </div>
                                  <!--  <hr class="hr-laporan">
                                    
                                    <hr class="hr-nama">
                                    <div class="isi-laporan">
                                        <p class="text-justify"><br/><kbd>Nomor Antrian Anda :</kbd><br/>
                                            <h1><?php echo $key['id']-100; ?></h1>
                                        </p>
                                    </div>-->
                                    
                                    <hr class="hr-laporan">
                                    
                                    <hr class="hr-nama">
                                    <div class="isi-laporan">
                                        <p class="text-justify"><br/><kbd>Anda Sebagai :</kbd><br/>
                                            <h4><?php echo $key['isi']; ?></h4>
                                        </p>
                                    </div>
                                    <hr class="hr-laporan">

                                    <!-- Comments -->
                                    <br/>
                                    <div>
                                        <h5 class="custom"><kbd>Keperluan :</h5></kbd><h4><?php echo $key['nama_divisi']; ?></h4>
                                        <hr class="hr-laporan">
                                        <?php
                                        // dijalankan ketika $foundreply bernilai true // tanggapan ditemukan
                                        if ($foundreply){
                                            foreach ($stat as $key) {
                                                $mysqldatea = $key['tanggal_tanggapan'];
                                                $phpdatea = strtotime($mysqldatea);
                                                $tanggal_tanggapan = date( 'd F Y, H:i:s', $phpdatea);
                                                ?>

                                                <div class="media-block comment">
                                                    <a class="media-left" href="#"><img class="img-circle card-shadow-2 img-sm" src="images/avatar/avatar2.png"></a>
                                                    <div class="media-body">
                                                        <div>
                                                            <h4 class="text-primary profil-name" style="font-family: monospace;"><?php echo $key['admin']; ?></h4>
                                                            <p class="text-muted text-sm"><i class="fa fa-th fa-fw"></i>  -  <?php echo $tanggal_tanggapan; ?></p>
                                                        </div>
                                                        <hr class="hr-nama-admin">
                                                        <p class="text-justify">
                                                            <?php echo $key['isi_tanggapan']; ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- media body -->
                                            <?php
                                        }
                                    }
                                    // dijalankan ketika $cari bernilai false // tanggapan tidak ditemukan
                                    else {
                                        echo "<h4><i class=\"fa fa-exclamation-circle fa-fw\"></i> Disilahkan untuk datang ke PTSP MIN 2 KOTA SURABAYA dan harap diingat/dicatat nomor tiket anda</h4>";
                                    }
                                    ?>
                                </div>
                                <!-- panel body -->
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
                <div class="col-md-4">
                </div>
            </div>

            <!-- link to top -->
            <a id="top" href="#" onclick="topFunction()">
                <i class="fa fa-arrow-circle-up"></i>
            </a>
            <script>
            // When the user scrolls down 100px from the top of the document, show the button
            window.onscroll = function() {scrollFunction()};
            function scrollFunction() {
                if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                    document.getElementById("top").style.display = "block";
                } else {
                    document.getElementById("top").style.display = "none";
                }
            }

            // When the user clicks on the button, scroll to the top of the document
            function topFunction() {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            }
            </script>
            <!-- link to top -->

            <!-- /.main content -->
        </div>


        <hr>

   <?php include 'footer.php';?>

        <div class="copyright py-4 text-center text-white">
            <div class="container">
                <small>Alumni | &copy;<script>document.write(new Date().getFullYear())</script>
 MIN 2 KOTA SURABAYA</small>
            </div>
        </div>
        <!-- shadow -->
    </div>

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="js/bootstrap.js"></script>

</body>

</html>
