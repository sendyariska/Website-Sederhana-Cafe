<?php
  include('../../koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  
?>

<?php 
	session_start();
	if($_SESSION['status']!="login"){
		header("location:../../login.php?pesan=belum_login");
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
    table {
      border: solid 1px #fe8c00;
      border-collapse: collapse;
      border-spacing: 0;
      width: 45%;
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
        <li><a href="../beranda.php">Beranda</a></li>
        <li><a href="../Minuman/tampil_minuman.php">Minuman</a></li>
        <li><a href="../Makanan/tampil_makanan.php">Makanan</a></li>
        <li><a href="../Laporan/tampil_laporan.php">Laporan</a></li>
        <li><a href="tampil_pengguna.php">Pengguna</a></li>
        <li><a href="../../logout.php">Logout</a></li>
    </ul>
    <center><h1>Website Coffee & Chef Palangkaraya</h1><center>
    <br>
    <center><h1>Pengguna</h1><center>
    <center><a href="tambah_pengguna.php">+ &nbsp; Tambah Pengguna</a><center>
    <br/>
    <table bgcolor = "#ffffff">
      <thead>
        <tr style="margin: 0px auto">
          <th>Username</th>
          <th>Password</th>
          <th>Nama Pengguna</th>
          <th>Action</th>
        </tr>
    </thead>
    <tbody>
      <?php
      // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
      $query = "SELECT * FROM tabel_pengguna";
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
          <td><?php echo $row['username']; ?></td>
          <td><?php echo $row['password']; ?></td>
          <td><?php echo $row['nama_pengguna']; ?></td>
          <td style="text-align: center"> 
              <a href="edit_pengguna.php?username=<?php echo $row['username']; ?>">Edit</a>
              <a href="hapus_pengguna.php?username=<?php echo $row['username']; ?>" onclick="return confirm('Anda yakin akan menghapus pengguna ini?')">Hapus</a>
          </td>
      </tr>
         
      <?php
        $no++; //untuk nomor urut terus bertambah 1
      }
      ?>
    </tbody>
    </table>
  </body>
</html>