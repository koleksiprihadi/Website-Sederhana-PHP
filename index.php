<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        
        <?php session_start(); require_once("header.php"); ?>
    </head>
    <body>
    <div class="container"><?php require_once ("menu.php"); ?></div>
    <div class="bg-landing">
        <img src="https://raw.githubusercontent.com/koleksiprihadi/FinalProject2020/master/public/images/landing.jpg" class="img-landing" alt="">
    </div>
    <div class="text-jumbotron">
            <div>
                <center>
                    <h1>Belajar Menjadi Developer Profesional Sekarang</h1>
                    <a href="#langganan" class="btn btn-danger ">MULAI BELAJAR</a>
                </center>
            </div>    
    </div>
    <div class="border-page1">
        <div class="row jarak-atas-bawah">
            <div class="col-1"></div>
            <div class="col-sm-5">
            <h2>About CODIE</h2>
            <p class="paragraf">
                Lorem ipsum dolor sit amet, consectetur
                adipiscing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua. Ut
                enim ad minim veniam, quis nostrud
                exercitation ullamco laboris nisi ut aliquip ex
                ea commodo consequat. Duis aute irure dolor
                in reprehenderit in voluptate velit esse cillum
                dolore eu fugiat nulla pariatur. Excepteur sint
                occaecat cupidatat non proident, sunt in culpa
                qui officia deserunt mollit anim id est laborum.
            </p>
            </div>
            <div class="col-sm-5 border">
                <div class="media">
                    <img src="assets/img/video-player.png" height="100px" class="mr-3" alt="video-tutorial">
                    <div class="media-body">
                        <h5 class="mt-0">Video Tutorial Step by Step</h5>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                            sed do eiusmod tempor incididunt ut labore et dolore
                            magna aliqua. Ut enim ad minim veniam, quis nostrud
                    </div>
                </div>
                <div class="media">
                    <img src="assets/img/payment.png" height="100px" class="mr-3" alt="payment">
                    <div class="media-body">
                        <h5 class="mt-0">Video Tutorial Step by Step</h5>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                            sed do eiusmod tempor incididunt ut labore et dolore
                            magna aliqua. Ut enim ad minim veniam, quis nostrud
                    </div>
                </div>
                <div class="media">
                    <img src="assets/img/browser.png" height="100px" class="mr-3" alt="browser">
                    <div class="media-body">
                        <h5 class="mt-0">Video Tutorial Step by Step</h5>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                            sed do eiusmod tempor incididunt ut labore et dolore
                            magna aliqua. Ut enim ad minim veniam, quis nostrud
                    </div>
                </div>
            </div>
            <div class="col-1"></div>
        </div>
    </div>
    <div class="warna-merah">
        <div class="row">
                <div class="col">
                    <center>
                        <h4>1000+</h4>
                        Pengguna Aktif
                    </center>
                </div>
                <div class="col">
                    <center>
                        <h4>50+</h4>
                        Kelas Online
                    </center>
                </div>
                <div class="col">
                    <center>
                        <h4>1000+</h4>
                        Materi Belajar
                    </center>
                </div>
                <div class="col">
                    <center>
                        <h4>5+</h4>
                        Pengajar
                    </center>
                </div>
        </div>
    </div>
    <div>
        <div class="border-page2" id="langganan">
            <center class="jarak-atas-bawah"><h1>Langganan</h1></center>
            <div class="container">
            <div class="col-sm pop-1">
                        <div class="container pading-pop">
                            <center>
                                <img src="assets/img/html.png" height="100px" alt="">
                                <h4>Rp 100.000/bulan</h4>
                            
                                <p>
                                    Dapatkan Semua Kelas Premium
                                </p>
                                <a href="ceklogin.php" class="btn btn-danger ">Daftar</a>
                            </center>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    </body>
    
    <footer></footer>

    <?php include_once("assets/js/navbar.php"); ?>
</html>