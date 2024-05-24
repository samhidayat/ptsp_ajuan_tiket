<?php
# @Author: ALUMNI
# @Copyright: (c) MIN 2 KOTA SURABAYA
?>
<?php
    require_once("private/database.php");
    $statement = $db->query("SELECT id FROM `laporan` ORDER BY id DESC LIMIT 1");
    // $cekk = $statement->fetch(PDO::FETCH_ASSOC);
    if ($statement->rowCount()>0) {
        foreach ($statement as $key ) {
            // get max id from tabel laporan
            $max_id = $key['id']+1;
        }
    }
    if ($statement->rowCount()<1) {
        $max_id = 351731;
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
    <title>PTSP | MIN 2 KOTA SURABAYA</title>
    <link rel="shortcut icon" href="images/min2.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- font Awesome CSS -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Main Styles CSS -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <div class="shadow">
        <?php include 'menu.php';?>


        <!-- content -->
        <div class="main-content">
            <h3>Ambil Tiket</h3>
            <div class="form-group">
                            <div class="col-sm-10 ">
                                <h5><b>* Lengkapi Form dibawah ini dan <span class="blink"><code>Ingat/ Catat Nomor Tiket</code></span>  Untuk Melihat Status serta Progress Layanan Anda</b></h5></div></div>
            <hr/>
            <div class="row">
                <div class="col-md-8 card-shadow-2 form-custom">
                    <form class="form-horizontal" role="form" method="post" action="private/validasi">
                        <div class="form-group">
                            <label for="nomor" class="col-sm-3 control-label">Ini Nomor Tiket Anda</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="glyphicon glyphicon-exclamation-sign"></span></div>
                                    <input type="text" class="form-control" id="nomor" name="nomor" value="<?php echo $max_id; ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nama" class="col-sm-3 control-label">Nama</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" value="<?= @$_GET['nama'] ?>" required>
                                </div>
                                <p class="error"><?= @$_GET['namaError'] ?></p>
                            </div>
                        </div>
                      <div class="form-group">
                            <label for="email" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="<?= @$_GET['email'] ?>" required>
                                </div>
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="telpon" class="col-sm-3 control-label">Telpon</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></div>
                                    <input type="text" class="form-control" id="telpon" name="telpon" placeholder="081234567891" value="<?= @$_GET['telpon'] ?>" required>
                                </div>
                                <p class="error"><?= @$_GET['telponError'] ?></p>
                            </div>
                        </div>
                       <!-- <div class="form-group">
                            <label for="alamat" class="col-sm-3 control-label">Alamat</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="glyphicon glyphicon-home"></span></div>
                                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="<?= @$_GET['alamat'] ?>" readonly>
                                </div>
                                <p class="error"><?= @$_GET['alamatError'] ?></p>
                            </div>
                        </div>-->
                        <div class="form-group">
                            <label for="tujuan" class="col-sm-3 control-label">Keperluan Anda</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="glyphicon glyphicon-random"></span></div>
                                    <select class="form-control" name="tujuan">
                                        <option>Pilih</option>
                                        <option value="1">Lainnya</option>
                                        <option value="2">Legalisir</option>
                                        <option value="3">Surat Keterangan </option>
                                        <option value="4">Surat Izin </option>
                                        <option value="7">PPDB/ Mutasi  </option>
                                        <option value="8">PIP  </option>
                                        <option value="5">Konsultasi</option>
                                        <option value="6">Visitasi/ Kunjungan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="pengaduan" class="col-sm-3 control-label">Anda Sebagai</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="glyphicon glyphicon-random"></span></div>
                                    <select class="form-control" name="pengaduan">
                                        <option>Pilih</option>
                                        <option value="Utusan Instansi/ lembaga">Utusan Instansi/ Lembaga</option>
                                        <option value="Orang Tua/ wali Murid">Orang Tua/ Wali Murid</option>
                                        <option value="Alumni">Alumni</option>
                                        <option value="Masarakat Umum">Masarakat Umum</option>
                                        
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="captcha" class="col-sm-3 control-label">Captcha</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <!--menampilkan gambar captcha-->
                                    <img class="card-shadow-2" src="private/captcha.php"/> <br/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="captcha" class="col-sm-3 control-label"></label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="glyphicon glyphicon-open"></span></div>
                                    <input type="text" class="form-control" id="captcha" name="captcha" placeholder="Masukkan Captcha di Atas" value="<?= @$_GET['captcha'] ?>" required>
                                </div>
                                <p class="error"><?= @$_GET['captchaError'] ?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-3">
                                <input id="submit" name="submit" type="submit" value="Ambil Tiket Anda" class="btn btn-primary-custom form-shadow">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                                <p class="error"><em><b>* Catat Nomor Tiket  Untuk Melihat Status Serta Progress layanan Anda</b></em></p>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-4"></div>
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


            <!-- /.section -->
            <hr>
        </div>

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
