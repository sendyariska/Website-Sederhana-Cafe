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
      h3 {
        color: #692d06;
      }
    button {
          background-color: #692d06;
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
    input {
      padding: 6px;
      width: 100%;
      box-sizing: border-box;
      background: #f8f8f8;
      border: 2px solid #ccc;
      outline-color: #692d06;
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
    <center><h1>Login Menuju Halaman Kelola</h1><center>
    <center><h3>Halaman kelola hanya bisa diakses oleh admin</h3><center>
  <br><br>
	<!-- cek pesan notifikasi -->
	<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan'] == "gagal"){
			echo "Login gagal! username dan password salah!";
		}else if($_GET['pesan'] == "logout"){
			echo "Anda telah berhasil logout";
		}else if($_GET['pesan'] == "belum_login"){
			echo "Anda harus login untuk mengakses halaman admin";
		}
	}
	?>
	<br/>
	<br/>
	<form method="post" action="cek_login.php">
        <section class="base">
            <div>
                <label>Username<label>
				<td><input type="text" name="username" placeholder="Masukkan username"></td>
            </div>
			<div>
                <label>Password<label>
				<td><input type="password" name="password" placeholder="Masukkan password"></td>
            </div>
			<div>
				<button type="submit">Login</button>
            </div>
        </section>		
	</form>
</body>
</html>