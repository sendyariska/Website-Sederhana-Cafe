<?php
  // memanggil file koneksi.php untuk membuat koneksi
include '../../koneksi.php';

  // mengecek apakah di url ada nilai GET id
  if (isset($_GET['username'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $username = ($_GET["username"]);

    // menampilkan data dari database yang mempunyai id=$id
    $query = "SELECT * FROM tabel_pengguna WHERE username='$username'";
    $result = mysqli_query($koneksi, $query);
    // jika data gagal diambil maka akan tampil error berikut
    if(!$result){
      die ("Query Error: ".mysqli_errno($koneksi).
         " - ".mysqli_error($koneksi));
    }
    // mengambil data dari database
    $data = mysqli_fetch_assoc($result);
      // apabila data tidak ada pada database maka akan dijalankan perintah ini
       if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan pada database');window.location='tampil_password.php';</script>";
       }
  } else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    echo "<script>alert('Masukkan data id.');window.location='tampil_password.php';</script>";
  }         
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
        <h1>Ubah Password</h1>
      <center>
      <form method="POST" action="proses_edit_pengguna.php" enctype="multipart/form-data" >
      <section class="base">
        <!-- menampung nilai id produk yang akan di edit -->
        <input name="username" value="<?php echo $data['username']; ?>"  hidden />
        <div>
          <label>Username</label>
          <input type="text" name="username" value="<?php echo $data['username']; ?>" disabled=true />
        </div>
          <label>Password</label>
          <input type="text" name="password" value="<?php echo $data['password']; ?>" autofocus="" required="" />
        </div>
        </div>
          <label>Nama Pengguna</label>
          <input type="text" name="nama_pengguna" value="<?php echo $data['nama_pengguna']; ?>" autofocus="" required="" />
        </div>
        <div>
         <button type="submit">Perbarui Password</button>
        </div>
      </section>
      </form>

  </body>
</html>