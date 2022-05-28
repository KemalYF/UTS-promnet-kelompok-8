<?php
    session_start();

    if(!isset($_SESSION["login"])){
        header("Location: index.php");
        exit;
    }
    include("konek.php");
    // buat query untuk ambil data dari database
    $username = $_SESSION["username"];
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $query = mysqli_query($koneksi, $sql);
    $mhs = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Berita</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="style-mobile.css">
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="dashboard.php">Fakultas</a> 
            </div>
  <div style="color: white;padding: 15px 50px 5px 50px;float: right;font-size: 16px;">
   <a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				    <li class="text-center">
                    <?php if($mhs["foto"] == ""): ?>
                        <img src="assets/img/find_user.png" class="user-image img-responsive"/>
                    <?php else : ?>
                        <img src = "images/<?= $mhs["foto"]; ?>" class="user-image img-responsive"/>
                    <?php endif; ?>
					</li>
				
					
                    <li>
                        <a  href="dashboard.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                    <li>
                        <a  class="active-menu" href="berita.php"><i class="fa fa-desktop fa-3x"></i> Berita & Search Berita</a>
                    </li>
                    <li>
                        <a  href="profil_fakultas.php"><i class="fa fa-qrcode fa-3x"></i> Profil Fakultas</a>
                    </li>
                    <li >
                        <a  href="pesan.php"><i class="fa fa-bar-chart-o fa-3x"></i> Kontak Admin</a>
                    </li>   			
					                   
                    <li>
                        <a href="#"><i class="fa fa-table fa-3x"></i> Biodata Mahasiswa<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="biodata.php">Lihat Biodata</a>
                            </li>
                            <li>
                                <a href="edit_biodata.php">Edit Biodata</a>
                            </li>
                        </ul>
                    </li>  	
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2 href="">Portal Berita</h2>
                        <br>  
                        

                    </div>
                    <div class="col-md-12">
                        <!--Cari berita-->
                        <p>Cari Berita : </p>
                        <input class="form-control" id="myInput" type="text" placeholder="Search..">
                        <br>
                        <h1>Berita Terbaru</h1>
                        <br>
                        <div id="myDIV">
                           <div class="jumbotron">
                                <table class="table table-borderless">
                                    <tr>
                                        <td rowspan="2"><img src = "https://lh3.googleusercontent.com/proxy/c5cY7yW_dXoxF8kgQEgDn8zEAN-figX4Chi5h2Y2rkq_waqsGcIL5SUYVw8Uvn4SAOHnIKXqLbewdGv-K1QttmGEpUwycUM5" class="img-responsive"></td>
                                        <th>IKOM FPMIPA Selenggarakan Seminar dan Workshop</th>
                                    </tr>
                                    <tr>
                                        <td style="text-align: justify;">
                                            dalam salah satu program kerja IKOM (Ikatan Orang Tua Mahasiswa) FPMIPA UPI adalah membekali para mahasiswa/i FPMIPA UPI dengann soft skill. Pada tanggal 1 Desember 2018 bertempat di auditorium fpmipa telah diselenggarakan seminar/workshop dg tema " seni komunikasi mengajar guru yg dirindukkan dan public speaking bagi para mhs fpmipa baik prodi pendidikan maupun non kependidikan".
                                        </td>
                                    </tr>
                                </table>
                                <p>
                                    <a href="http://fpmipa.upi.edu/berita/IKOM-FPMIPA-Selenggarakan-Seminar-dan-Workshop/0000399.html" class="btn btn-primary btn-lg" role="button">Baca Selengkapnya</a>
                                </p>
                            </div>
                            <br>
                            <div class="jumbotron">
                                <table class="table table-borderless">
                                    <tr>
                                        <td rowspan="2"><img src = "http://berita.upi.edu/wp-content/uploads/2017/11/IMG-20171104-WA0061-Copy.jpg" class="img-responsive"></td>
                                        <th>Mahasiswa Ilkom Juara 1 Pada Gemastik 10</th>
                                    </tr>
                                    <tr>
                                        <td style="text-align: justify;">
                                            Mahasiswa Departemen Pendidikan Ilmu Komputer kembali mengharumkan nama UPI. Kali ini medali emas dipersembahkan untuk almamater tercinta oleh tim Desain User Experience (UX) dalam Pagelaran Mahasiswa Nasional Bidang Teknologi Informasi dan Komunikasi (Gemastik) Ke-10 Tahun 2017. Tim yang beranggotakan Rahman Abdul Razak, Taufik Dzikri Pangestu, dan Mitha Gustiani ini tampil menjadi juara pertama dalam kategori Desain UX setelah bertarung dalam babak final yang dilaksanakan pada tanggal 2 s.d. 4 November 2017 di Universitas Indonesia, Depok.
                                        </td>
                                    </tr>
                                </table>
                                <p>
                                    <a href="http://fpmipa.upi.edu/berita/Mahasiswa-Ilkom-Juara-1-Pada-Gemastik-10/0000397.html" class="btn btn-primary btn-lg" role="button">Baca Selengkapnya</a>
                                </p>
                            </div>
                            <br>
                            <div class="jumbotron">
                                <table class="table table-borderless">
                                    <tr>
                                        <td rowspan="2"><img src = "https://assets.pikiran-rakyat.com/crop/7x0:637x465/x/photo/2021/04/23/3848373903.jpg" class="img-responsive"></td>
                                        <th>Segera Klaim Update Kode Redeem Genshin Impact untuk Jumat 23 April 2021, dan Dapatkan Hadiahnya!</th>
                                    </tr>
                                    <tr>
                                        <td style="text-align: justify;">
                                            Kode Redeem Genshin Impact (GI) hari ini Jumat, 23 April 2021 datang kembali dan sudah bisa kamu gunakan kembali.
                                            Game yang belakangan ini menarik hati para penggemar game bergenre open world mulai melirik Game terbaru Genshin Impact (GI). Selain grafik yang baik, stabilitas dalam permainan pun menjadi kelebihan dari Genshin Impact (GI).
                                        </td>
                                    </tr>
                                </table>
                                <p>
                                    <a href="https://tasikmalaya.pikiran-rakyat.com/teknologi/pr-061813883/segera-klaim-update-kode-redeem-genshin-impact-untuk-jumat-23-april-2021-dan-dapatkan-hadiahnya" class="btn btn-primary btn-lg" role="button">Baca Selengkapnya</a>
                                </p>
                            </div> 
                        </div>

                    </div>
                </div>

                 <!-- /. ROW  -->
                 <hr />
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
                <script>
                $(document).ready(function(){
                $("#myInput").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#myDIV div").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
                });
                </script>

    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
    <div class="modal-footer">
        <div class="grid-footer grid-coloumn">
            <div class="row">
                <div class="col-lg-5 col-md-12 col-sm-12 mb-4">
                    <div class="col"><font face="Elephant" color="ivory" size="4">Alamat</font></div>
                        <div class="col-9"><font face="Calibri" color="moccasin" size="2">Jl. Cimande No. 131 Bandung 40154 Jawa Barat - Indonesia</font></div>
                        <div class="col-9"><font face="Calibri" color="moccasin" size="2">+62-89012345947</font></div>
                        <div class="col-9"><font face="Calibri" color="moccasin" size="2">lakondrago13@gmail.com</font></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5 col-md-12 col-sm-12 mb-4">
                    <div class="col"><font face="Elephant" color="ivory" size="4">Contact Us</font></div>
                    <a href="pesan.php" ><h5 color="green"><font face="Calibri" color="moccasin" size="2">Kontak Admin</font></a>
                </div>
                <img src="logo.png" alt="logo" class="img-berita" width="25%">
            </div>
        </div>
    </div>

</body>
</html>
