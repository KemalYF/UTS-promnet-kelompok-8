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

    if (isset($_POST['submit'])) {
       ini_set( 'display_errors', 1 );   
       error_reporting( E_ALL );    
       $name = $mhs['nama'];
       $email = $mhs['email'];
       $pesan = $_POST['pesan'];

       $subjek = "Pesan Baru";
       $body = "User Name    : ".$name."\n".
               "User Message : ".$pesan."\n";
       $to = "lakondrago13@gmail.com";
       $headers = "From: ".$email;
       mail($to, $subjek, $pesan, $header);
       header("Location: pesan.php");
       echo "Pesan email sudah terkirim.";
     } 
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pesan - Fakultas</title>
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
                        <a  href="profil_fakultas.php"><i class="fa fa-qrcode fa-3x"></i> Profil Fakultas</a>
                    </li>
                    <li >
                        <a  class="active-menu" href="pesan.php"><i class="fa fa-bar-chart-o fa-3x"></i> Kontak Admin</a>
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
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="tab-content">
                                <div class="tab-pane fade active in" id="detail-pills">
                                    <h4>Kirim pesan untuk Dosen Wali</h4> 
                                    <br>  
                                    <form method="POST" action="https://formsubmit.co/lakondrago13@gmail.com">    
                                    <strong>Nama</strong><br>
                                    <input type="text" name="nama" class="form-control" placeholder="Nama" required >
                                    <br>
                                    <strong>Email</strong><br>
                                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                                    <br>
                                    <strong>Pesan</strong><br>
                                    <textarea rows="4" id="pesan" class="form-control" name="pesan"></textarea><br>
                                    <button class="btn btn-primary mt-2" type="submit" name="submit">
                                    Kirim Pesan 
                                    </button>
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
