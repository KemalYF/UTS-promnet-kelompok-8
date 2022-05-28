<?php
    session_start();
    if (isset($_SESSION["login"])) {
        header("location: dashboard.php");
        exit;
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Fakultas | Universitas Saka Daek</title>
    
    <style>
    *{
      box-sizing: border-box;
      margin: 0px;
      list-style: none;
      text-decoration: none;
    }

    .grid-header{
    background-image: url('template.jpg');
    background-position: bottom;
    border-bottom: 3px rgba(163, 159, 159, 0.767) solid;
    display: grid;
    grid-template-columns: repeat(2, 50%);
    padding: 20px;
    height: 90px;
    width: 100%;
    margin-bottom: 50px;
    }

    .grid-header img {
      width: 10%;
      position: relative;
      bottom: 14px;
      right: 210px;
      margin: auto;
    }

    .grid-header h1{
      position: relative;
      right: 480px;
      top: 5px;
    }

    body {
        background-image: url('Buku-Investasi.jpg');
        background-repeat: no-repeat;
    }

    .container{
    width: 50%;
    margin: auto;
    margin-bottom: 5%;
    position: relative;
    top: 130px;
    }

    .article{
    width: 90%;
    margin: auto;
    margin-bottom: 50px;
    background-image: url('blue.jpg');
    padding: 20px;
    border-radius: 20px;
    }

    .article td {
      text-align: center;
    }

    .article h2 {
      text-align: center ;
      margin-top: 2%;
    }

    .article h1 {
      text-align: center;
      height: 80px;

    }

    .article img{
        float: left;
        width: 21%;
        position: relative;
        bottom: 25px;
    }

    .center {
      align-items: center;
    }
    
    button {
    display:inline-block;
    width: 90%;
    height: 40px;
    margin-top: 10px;
    text-align: center;
    justify-content: center;
    position: relative;
    left: 0;
    right: 0;
    background-color: deepskyblue;
    font-family: sans-serif;
    }

    button:hover{
      background: rgb(22, 37, 248);
    }

  </style>
<link rel="stylesheet" href="style-mobile2.css">
</head>

<body>
    <div class="container containert">
        <div class="article">
        
        <h2><img src="logo.png" alt="logo">WEBSITE FAKULTAS</h2>
        <h1>Fakultas Komputer</h1>
        <br>
        <hr>
        <nav>
            <ul>
                <button>
                <li><a href="registrasi.php">Registrasi</a></li>
                </button>
                <button>
                <li><a href="login.php">Login</a></li>
                </button>
            </ul>
        </nav>
        
    </div>
</div>
</body>
</html>