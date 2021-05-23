<?php
  include('../koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
?>

<?php 
	session_start();
	if($_SESSION['status']!="login"){
		header("location:../login.php?pesan=belum_login");
	}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Responsi Sendy Ariska</title>
    <style type="text/css">
      * {
        font-family: "Trebuchet MS";
      }
      h1 {
        text-transform: uppercase;
        color: #692d06 ;
      }
      h2 {
        text-transform: uppercase;
        color: #692d06 ;
      }
      h3 {
        color: #692d06 ;
      }
    table {
      border: solid 1px #fe8c00;
      border-collapse: collapse;
      border-spacing: 0;
      width: 95%;
      margin: 10px auto 10px auto;
    }
    table thead th {
        background-color: #e9a750;
        border: solid 1px #fe8c00;
        color: #692d06;
        padding: 10px;
        text-align: left;
        text-shadow: 1px 1px 1px #fff;
        text-decoration: none;
        text-align:center;
    }
    table tbody td {
        border: solid 1px #fe8c00;
        color: #333;
        padding: 10px;
        text-shadow: 1px 1px 1px #fff;
    }
    a {
          background-color: #fe8c00 ;
          color: #fff;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
    }
    ul {
          list-style-type: none;
          margin: 0;
          padding: 0;
          overflow: hidden;
          background-color: #fe8c00;
          font-family: Arial, Helvetica, sans-serif;
    }
    li {
          float: left;
    }
    li a {
          display: block;
          color: white;
          text-align: center;
          padding: 14px 36px;
          text-decoration: none;
          font-size: 17px;
    }
    li a:hover {
          background-color: white;
          color: black;
    }
    </style>
    
  </head>
  <body bgcolor = "#ffd194">
    <ul>
        <li><a href="beranda.php">Beranda</a></li>
        <li><a href="Minuman/tampil_minuman.php">Minuman</a></li>
        <li><a href="Makanan/tampil_makanan.php">Makanan</a></li>
        <li><a href="Laporan/tampil_laporan.php">Laporan</a></li>
        <li><a href="Pengguna/tampil_pengguna.php">Pengguna</a></li>
        <li><a href="../logout.php">Logout</a></li>
    </ul>
    <br><br><br><br><br><br>
    <center><h1>Website Coffee & Chef Palangkaraya</h1><center>
    <br>
    <br><br>
    <br>
    <center><h2>Creamy Hot And Ready To Serve</h2><center>
    <br>
    <br>
    <center><h3>Membuat hidangan cafe yang lezat seperti restoran</h3><center>
    <center><h3>dengan waktu tunggu hanya beberapa menit</h3><center>
    <br>

    <tr>
        <th><a href="Minuman/tampil_minuman.php">&nbsp Cek Minuman &nbsp</a></th>
        <th><a href="Makanan/tampil_makanan.php">&nbsp Cek Makanan &nbsp</a></th>
    </tr>
  </body>
</html>