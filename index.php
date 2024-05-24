<!-- 
# @Author: ALUMNI
# @Copyright: (c) MIN 2 KOTA SURABAYA
-->
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
    <title>TIKET | MIN 2 KOTA SURABAYA</title>
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

                <h4>Cara buka tiket dan mendapatkan nomor antrian PTSP</h4>
                <hr/>
                
        		<ol>
        			<li><p>Klik menu &quot;<b><a href="ajuan"> Ambil Tiket </a></b>&quot; untuk membuka  tiket baru.</p></li>
        			<li><p>Isi form yang ada sesuai dengan keperluan serta tujuan Anda.</p></li>
        			<li>
                        <p>Pengisian formuliar tiket dimulai dari :
                            <br>- Nama Anda;
                            <br>- eMail Aktif;
                            <br>- No Telp ;
                            <br>- Keperluan Anda;
                            <br>- Anda Sebagai;
                            <br>- Tuliskan kembali Captcha yang ada;
                            <br>- Terakhir Klik Ambil Tiket.
                        </p>
                    </li>
        			<li>
                        <p>Selanjutnya Anda diarahkan ke halaman<strong><a href="status"> Status Tiket </a></strong>
                    </li>
        			<li>
                        <p>Silahkan masukkan nomor tiket untuk melihat status dan progress layanan Anda
                        </p>
                    </li>
        			<li>
                        <p>
                            <b>Selanjutnya Anda datang ke PTSP MIN 2 Kota Surabaya</b>
                        </p>
                    </li>
        		</ol>

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


            <!-- end main-content -->
            </div>

            <hr>

   <?php include 'footer.php';?>

        <div class="copyright py-4 text-center text-white">
            <div class="container">
                <small>Alumni | Copyright &copy; MIN 2 KOTA SURABAYA 2022</small>
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
