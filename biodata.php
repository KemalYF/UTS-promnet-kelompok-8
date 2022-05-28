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
    <title>Biodata Mahasiswa</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
   
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
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
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"><a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
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
                        <a  href="pesan.php"><i class="fa fa-bar-chart-o fa-3x"></i> Kontak Admin</a>
                    </li>         
                             
                    <li>
                        <a class="active-menu" href="#"><i class="fa fa-table fa-3x"></i> Biodata Mahasiswa<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Lihat Biodata</a>
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
                     <h2>Biodata Mahasiswa</h2>   
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="tab-content" id="myTabContent">
              <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <br>
                <table class="table table-striped table-sm pd-15">
                  <?php
                      $username = $_SESSION["username"]; 
                      $tampil = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$username'");
                      $data = mysqli_fetch_array($tampil);
                   ?>
                  <tbody><tr>
                    <td>NIM</td>
                    <td><?=$data['nim']?></td>
                  </tr>
                  <tr>
                    <td>Nama</td>
                    <td><?=$data['nama']?></td>
                  </tr>
                  <tr>
                    <td>Jurusan</td>
                    <td><?=$data['jurusan']?></td>
                  </tr>
                  <tr>
                    <td>Jenis Kelamin</td>
                    <td><?=$data['jenis_kelamin']?></td>
                  </tr>
                  <tr>
                    <td>Alamat</td>
                    <td><?=$data['alamat']?></td>
                  </tr>
                  <tr>
                    <td>Telepon</td>
                    <td><?=$data['telepon']?></td>
                  </tr>
                  <tr>
                    <td>Email</td>
                    <td><?=$data['email']?></td>
                  </tr>
                  <tr>
                    <td>Tanggal Lahir</td>
                    <td><?=$data['tgl']?></td>
                  </tr>
                  <tr>
                    <td>Agama</td>
                    <td><?=$data['agama']?></td>
                  </tr>
                </tbody></table>
                <a href="edit_biodata.php?username=<?= $data['username'];?>" class="btn btn-warning">Edit</a>

              </div>
            </div>
                    <!--End Advanced Tables -->
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
