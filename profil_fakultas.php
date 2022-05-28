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
    <title>Profil Fakultas</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

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
                        <a  href="berita.php"><i class="fa fa-desktop fa-3x"></i> Berita & Search Berita</a>
                    </li>
                    <li>
                        <a  class="active-menu" href="#"><i class="fa fa-qrcode fa-3x"></i> Profil Fakultas</a>
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
                        <h2>Profil Fakultas</h2> 
                        <br>  
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Profil Fakultas
                                </div>
                                <div class="panel-body">
                                    <ul class="nav nav-pills">
                                        <li class="active"><a href="#detail-pills" data-toggle="tab">Detail</a>
                                        </li>
                                        <li class=""><a href="#visi-pills" data-toggle="tab">Visi</a>
                                        </li>
                                        <li class=""><a href="#misi-pills" data-toggle="tab">Misi</a>
                                        </li>
                                        <li class=""><a href="#tum-pills" data-toggle="tab">Tujuan Umum</a>
                                        </li>
                                        <li class=""><a href="#tuk-pills" data-toggle="tab">Tujuan Khusus</a>
                                        </li>
                                    </ul>

                                    <div class="tab-content">
                                        <div class="tab-pane fade active in" id="detail-pills">
                                            <h4>Detail</h4>
                                            <img src="fakultas.jpg" alt="logo" width="100%">
                                            <p>Fakultas ini merupakan fakultas yang terdiri dari beberapa jurusan yang hanya disukai oleh beberapa orang. Seperti teknik Informatika, telekomunikasi, ilmu komputer, matematika, dan Software Engineering. Gedung fakultas ini memiliki kualitas yang sangat baik, anda bisa lihat gambar diatas seperti apa. Bagus bukan?</p>
                                        </div>
                                        <div class="tab-pane fade" id="visi-pills">
                                            <h4>Visi</h4>
                                            <p>Menjadi pelopor dan pusat keunggulan penyelenggaraan pendidikan 
                                            dan pengembangan ilmu pengetahuan dan teknologi bidang komputer serta rekayasa komputasi 
                                            dalam penumbuhan inovasi sistem dan teknologi guna meningkatkan tata nilai, 
                                            harkat dan budaya bangsa dengan medayagunakan teknologi informasi secara berkelanjutan.</p>
                                        </div>
                                        <div class="tab-pane fade" id="misi-pills">
                                            <h4>Misi</h4>
                                            <p>
                                                <li>Menghasilkan lulusan dan karya ilmiah dalam bidang komputer yang berwawasan global serta 
                                                    berkewirausahaan melalui pendidikan, penelitian dan pengabdian masyarakat yang terintegrasi serta 
                                                    berkesinambungan sehingga dapat bersaing di lingkungan internasional.</li>
                                                <li>Menyelenggarakan pendidikan yang berwawasan global dan berkewirausahaan dalam bidang komputer</li>
                                                <li>Melakukan penelitian yang inovatif dan tepat guna bagi masyarakat bidang komputer</li>
                                                <li>Menyelenggarakan pelayanan dan pengabdian serta pemberdayaan masyarakat dalam pemanfaatan teknologi informasi dan komunikasi yang berkelanjutan</li>
                                            </p>
                                        </div>
                                        <div class="tab-pane fade" id="tum-pills">
                                            <h4>Tujuan Umum</h4>
                                            <p>
                                                <li>Sesuai dengan tujuan UEU, Fasilkom menghasilkan sumber daya manusia yang berkarakter dan berdaya saing tinggi.</li>
                                                <li>Turut berperan serta bersama pemerintah dan lembaga sejenis mengembangkan iptek dan 
                                                    meningkatkan kecerdasan dan kesejahteraan dalam kehidupan bangsa dalam mendidik masyarakat 
                                                    agar meningkatkan kecerdasan dan kehidupan bangsa.</li>
                                                <li>Menghasilkan Sumber Daya Manusia yang handal dan berkualitas dalam bidang komputer yang beretika dan berwawasan global.</li>
                                            </p>
                                        </div>
                                        <div class="tab-pane fade" id="tuk-pills">
                                            <h4>Tujuan Khusus</h4>
                                            <p>
                                                <li>Mewujudkan pendidikan komputer yang berkualitas dalam pengajaran, 
                                                    penelitian dan pengabdian kepada masyarakat</li>
                                                <li>Mewujudkan penelitian yang berbasis pada pengembangan dalam bidang Teknologi Komunikasi dan Informasi</li>
                                                <li>Mewujudkan pengabdian kepada masyarakat sebagai bentuk tanggung jawab yang berbasis 
                                                    dalam bidang Teknologi Komunikasi dan Informasi.</li>
                                                <li>Menghasilkan mahasiswa yang memiliki jiwa kepemimpinan, kewirausahaan, 
                                                    mampu dalam memecahkan masalah, bertanggung jawab dan beradaptasi dalam lingkungan global 
                                                    sehingga  mempunyai kemampuan daya saing (komparatif dan kompetitif) dan memiliki kemampuan 
                                                    untuk melanjutkan pendidikan yang lebih tinggi.</li>
                                                <li>Mewujudkan tenaga pendidik yang bermutu berlandaskan kredibilitas professional dan bertanggung jawab.</li>
                                                <li>Mewujudkan manajemen fakultas yang efesien dan efektif serta berkesinambungan berlandaskan 
                                                    kredibilitas profesional, transparan, akuntabel, dan bertanggung jawab.</li>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
