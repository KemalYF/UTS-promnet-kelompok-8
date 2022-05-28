<?php
    session_start();

    if(!isset($_SESSION["login"])){
        header("Location: index.php");
        exit;
    }
    include("konek.php");
    if(isset($_POST['submit'])){
        $username = $_SESSION["username"];

        $fotolama = htmlspecialchars ($_POST['fotolama']);

        //mengecek apakah user memilih gambar baru atau tidak
        if($_FILES['foto']['error'] === 4){
            $foto =$fotolama;
        }else{

            $foto = upload();

        }

        $simpan = mysqli_query($koneksi, "UPDATE users SET jurusan = '$_POST[jurusan]', nim='$_POST[nim]', nama='$_POST[nama]', 
                                tgl='$_POST[tgl]', jenis_kelamin='$_POST[kelamin]', agama='$_POST[agama]', email='$_POST[email]', 
                                telepon='$_POST[tlp]', alamat='$_POST[alamat]', foto='$foto' WHERE username = '$username'");
        if ($simpan) {
            echo "<script> alert('Edit data suksess!!');
                           document.location = 'biodata.php';
                  </script>";
        }else{
            echo mysqli_error($simpan);
            echo "<script> alert('Edit data Gagal!!');
                           document.location = 'edit_biodata.php';
                  </script>";
        }
    }

    // buat query untuk ambil data dari database
    $username = $_SESSION["username"];
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $query = mysqli_query($koneksi, $sql);
    $mhs = mysqli_fetch_assoc($query);

    // fungsi upload foto
    function upload(){
    //mengambil isi data dari $_FILES ke dalam variabel
    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];
    //cek apakah tidak ada foto/file yang diupload
    if($error === 4){
        echo "<script> alert('harap upload foto terlebih dahulu')</script>";
        return false;
    }
    //cek apakah file yang diupload adalah file yang diperbolehkan
    $ekstenFileValid = ['jpg','jpeg','png'];
    //ambil ekstensi gambar/foto/file
    $ekstenFile = explode('.',$namaFile);
    //mengambil ektensi file yang dipecah 
    //mengambil ektensi paling terakhir (end) dan
    //membuat huruf ektensi menjadi huruf kecil (strtolower)
    $ekstenFile = strtolower(end($ekstenFile));
    //mengecek string dalam array
    //mengecek ektensi file yang diupload terdapat pada $ekstenFileValid
    if(!in_array($ekstenFile,$ekstenFileValid)){
        echo "<script> alert('Harap masukan file berupa jpg,jpeg, dan png!')</script>";
        return false;
    }
    //cek gambar apakah ukurannya terlalu besar
    if( $ukuranFile > 5000000){
        echo "<script> alert('Ukuran gambar terlalu besar!')</script>";
        return false;
    }
    //generate nama baru, agar file dengan nama yang sama tidak menimpa 
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstenFile;
    // var_dump($namaFileBaru);die;
    //apabila file lolos pengecekan, maka file akan diupload
    move_uploaded_file($tmpName,'images/'. $namaFileBaru);
    return $namaFileBaru;
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Biodata</title>
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
                        <a  href="pesan.php"><i class="fa fa-bar-chart-o fa-3x"></i> Kontak Admin</a>
                    </li>   			
					                   
                    <li>
                        <a class="active-menu" href="#"><i class="fa fa-table fa-3x"></i> Biodata Mahasiswa<span class="fa arrow"></span></a>
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
                        <h2>Edit Biodata</h2> 
                        <br>  

                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            ISI BIODATA
                        </div>
                        <div class="panel-body">
                            <form method="POST" action="" enctype="multipart/form-data">
                                <input type="hidden" name="fotolama" value="<?= $mhs["foto"];?>">
                                <div class="form-group">
                                    <label>NIM</label>
                                    <input type="text" name="nim" value="<?php echo $mhs['nim']; ?>" class="form-control" placeholder="NIM" required>
                                </div>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="nama" value="<?php echo $mhs['nama']; ?>" class="form-control" placeholder="Nama" required>
                                </div>
                                <div class="form-group">
                                    <label>Jurusan</label>
                                    <?php $prodi = $mhs['jurusan']; ?>
                                     <select name="jurusan" class="form-control" required>
                                        <option <?php echo ($prodi == 'Teknik Informatika') ? "selected": "" ?>>Teknik Informatika</option>
                                        <option <?php echo ($prodi == 'Teknik Telekomunikasi') ? "selected": "" ?>>Teknik Telekomunikasi</option>
                                        <option <?php echo ($prodi == 'Pendidikan Ilmu Komputer') ? "selected": "" ?>>Pendidikan Ilmu Komputer</option>
                                        <option <?php echo ($prodi == 'Ilmu Komputer') ? "selected": "" ?>>Ilmu Komputer</option>
                                        <option <?php echo ($prodi == 'Matematika') ? "selected": "" ?>>Matematika</option>
                                        <option <?php echo ($prodi == 'Software Engineering') ? "selected": "" ?>>Software Engineering</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" name="tgl" value="<?php echo $mhs['tgl']; ?>" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Kelamin</label>
                                    <?php $jk = $mhs['jenis_kelamin']; ?>
                                    <br>
                                    <input type="radio" name="kelamin" value="Laki-laki" <?php echo ($jk == 'Laki-laki') ? "checked": "" ?> required> Laki-laki<br>
                                    <input type="radio" name="kelamin" value="Perempuan" <?php echo ($jk == 'Perempuan') ? "checked": "" ?> required> Perempuan<br>
                                </div>
                                <div class="form-group">
                                    <label for="agama">Agama</label>
                                    <?php $agama = $mhs['agama']; ?>
                                    <select name="agama" class="form-control" required>
                                         <option <?php echo ($agama == 'Islam') ? "selected": "" ?>>Islam</option>
                                         <option <?php echo ($agama == 'Hindu') ? "selected": "" ?>>Hindu</option>
                                         <option <?php echo ($agama == 'Kristen') ? "selected": "" ?>>Kristen</option>
                                         <option <?php echo ($agama == 'Buddha') ? "selected": "" ?>>Buddha</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" value="<?php echo $mhs['email']; ?>" class="form-control" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <label>No. Telepon</label>
                                    <input type="tel" name="tlp" value="<?php echo $mhs['telepon']; ?>" class="form-control" placeholder="Nomor Telepon" required>
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea type="text" name="alamat" class="form-control" placeholder="Alamat" required><?php echo $mhs['alamat']; ?></textarea> 
                                </div>
                                <div class="form-group">
                                    <label>Foto</label>
                                    <br>
                                    <img src="images/<?= $mhs['foto'];?>" width="50">
                                    <br>
                                    <input type="file" name="foto"> 
                                </div>
                                <div style="text-align: right;">
                                    <a href="biodata.php?username=<?= $data['username'];?>" class="btn btn-danger">Batal</a>
                                    <button type="submit" class="btn btn-success" name="submit">Simpan</button>
                                </div>
                                
                            </form>
                                
                        </div>
                    </div>
                     <!-- End Form Elements -->
                </div>
            </div>
                
                <!-- /. ROW  -->
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
