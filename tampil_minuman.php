<?php
  include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
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
        <li><a href="index.php">Beranda</a></li>
        <li><a href="tampil_minuman.php">Minuman</a></li>
        <li><a href="tampil_makanan.php">Makanan</a></li>
        <li><a href="login.php">Login</a></li>
    </ul>
    <center><h1>Website Coffee & Chef Palangkaraya</h1><center>
    <br>
    <center><h1>Menu Minuman</h1><center>
    <br/>
    <table bgcolor = "#ffffff">
      <thead>
        <tr style="margin: 0px auto">
          <th>No</th>
          <th>Nama Minuman</th>
          <th>Jenis Minuman</th>
          <th>Harga Minuman</th>
          <th>Gambar Minuman</th>
        </tr>
    </thead>
    <tbody>
      <?php
      // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
      $query = "SELECT * FROM tabel_menu WHERE kategori_menu='Minuman' ORDER BY id_menu ASC";
      $result = mysqli_query($koneksi, $query);
      //mengecek apakah ada error ketika menjalankan query
      if(!$result){
        die ("Query Error: ".mysqli_errno($koneksi).
           " - ".mysqli_error($koneksi));
      }

      //buat perulangan untuk element tabel dari data mahasiswa
      $no = 1; //variabel untuk membuat nomor urut
      // hasil query akan disimpan dalam variabel $data dalam bentuk array
      // kemudian dicetak dengan perulangan while
      while($row = mysqli_fetch_assoc($result))
      {
      ?>
       <tr>
          <td style="text-align:center"><?php echo $no; ?></td>
          <td><?php echo $row['nama_menu']; ?></td>
          <td><?php echo $row['jenis_menu']; ?></td>
          <td>Rp <?php echo number_format($row['harga_menu'],0,',','.'); ?></td>
          <td style="text-align: center"><img src="Gambar/<?php echo $row['gambar_menu']; ?>" style="width: 150px;"></td>
      </tr>
         
      <?php
        $no++; //untuk nomor urut terus bertambah 1
      }
      ?>
    </tbody>
    </table>
  </body>
</html>