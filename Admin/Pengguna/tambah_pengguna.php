<?php
  include('../../koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  
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
        color: #692d06;
      }
    button {
          background-color: #fe8c00;
          color: #fff;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
          border: 0px;
          margin-top: 20px;
    }
    label {
      margin-top: 10px;
      float: left;
      text-align: left;
      width: 100%;
    }
    select {
      padding: 6px;
      width: 100%;
      box-sizing: border-box;
      background: #f8f8f8;
      border: 2px solid #ccc;
      outline-color: #fe8c00;
    }
    input {
      padding: 6px;
      width: 100%;
      box-sizing: border-box;
      background: #f8f8f8;
      border: 2px solid #ccc;
      outline-color: #fe8c00;
    }
    div {
      width: 100%;
      height: auto;
    }
    .base {
      width: 400px;
      height: auto;
      padding: 20px;
      margin-left: auto;
      margin-right: auto;
      background: #ededed;
    }
    </style>
  </head>
  <body bgcolor = "#ffd194">
      <center>
        <h1>Tambah Pengguna</h1>
      <center>
      <form method="POST" action="proses_tambah_pengguna.php" enctype="multipart/form-data" >
      <section class="base">
        <div>
          <label>Nama Pengguna</label>
          <input type="text" name="nama_pengguna" autofocus="" required="" />
        </div>
        <div>
          <label>Username</label>
         <input type="text" name="username" required="" />
        </div>
        <div>
          <label>Password</label>
         <input type="text" name="password" required="" />
        </div>
        <div>
         <button type="submit">Simpan Pengguna</button>
        </div>
        </section>
      </form>
  </body>
</html>