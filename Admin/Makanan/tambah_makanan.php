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
        <h1>Tambah Makanan</h1>
      <center>
      <form method="POST" action="proses_tambah_makanan.php" enctype="multipart/form-data" >
      <section class="base">
        <div>
          <label>Nama Makanan</label>
          <input type="text" name="nama_menu" autofocus="" required="" />
        </div>
        <div>
          <label for="jenis_menu">Jenis Makanan</label>
            <select id="jenis_menu" name="jenis_menu">
                <option value="Ice">---Pilih Jenis Makanan---</option>
                <option value="Ice">Ice</option>
                <option value="Fried">Fried</option>
                <option value="Sweet">Sweet</option>
            </select>
        </div>
        <div>
          <label>Harga Makanan</label>
         <input type="number" name="harga_menu" required="" />
        </div>
        <div>
          <label>Gambar Makanan</label>
         <input type="file" name="gambar_menu" required="" />
        </div>
        <div>
         <button type="submit">Simpan Makanan</button>
        </div>
        </section>
      </form>
  </body>
</html>