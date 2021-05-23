<?php
  // memanggil file koneksi.php untuk membuat koneksi
include '../../koneksi.php';

  // mengecek apakah di url ada nilai GET id
  if (isset($_GET['id_menu'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id_menu = ($_GET["id_menu"]);

    // menampilkan data dari database yang mempunyai id=$id
    $query = "SELECT * FROM tabel_menu WHERE id_menu='$id_menu'";
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
          echo "<script>alert('Data tidak ditemukan pada database');window.location='tampil_makanan.php';</script>";
       }
  } else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    echo "<script>alert('Masukkan data id.');window.location='tampil_makanan.php';</script>";
  }         
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
        <h1>Edit Makanan <?php echo $data['nama_menu']; ?></h1>
      <center>
      <form method="POST" action="proses_edit_makanan.php" enctype="multipart/form-data" >
      <section class="base">
        <!-- menampung nilai id produk yang akan di edit -->
        <input name="id_menu" value="<?php echo $data['id_menu']; ?>"  hidden />
        <div>
          <label>Nama Makanan</label>
          <input type="text" name="nama_menu" value="<?php echo $data['nama_menu']; ?>" autofocus="" required="" />
        </div>
        <div>
          <label for="jenis_menu">Jenis Makanan</label>
          <select id="jenis_menu" name="jenis_menu" >
          <option value="Ice"><?php echo $data['jenis_menu']; ?></option>
                <?php 
                if($data['jenis_menu'] == 'Ice')
                {?>
                  <option hidden=true value="Ice">Hide</option>
                <?php   }?>
                <?php 
                if($data['jenis_menu'] != 'Ice')
                {?>
                  <option value="Ice">Ice</option>
                <?php   }?>

                <?php 
                if($data['jenis_menu'] == 'Fried')
                {?>
                  <option hidden=true value="Fried">Hide</option>
                <?php   }?>
                <?php 
                if($data['jenis_menu'] != 'Fried')
                {?>
                  <option value="Fried">Fried</option>
                <?php   }?>

                <?php 
                if($data['jenis_menu'] == 'Sweet')
                {?>
                  <option hidden=true value="Sweet">Hide</option>
                <?php   }?>
                <?php 
                if($data['jenis_menu'] != 'Sweet')
                {?>
                  <option value="Sweet">Sweet</option>
                <?php   }?>

                
                <!-- <option value="Milk">Milk</option>
                <option value="Tea">Fried</option>
                <option value="Fruit">Sweet</option> -->
            </select>
        </div>
        <div>
          <label>Harga Makanan</label>
         <input type="number" name="harga_menu" required=""value="<?php echo $data['harga_menu']; ?>" />
        </div>
        <div>
          <label>Gambar Makanan</label>
          <img src="../../Gambar/<?php echo $data['gambar_menu']; ?>" style="width: 120px;float: left;margin-bottom: 5px;">
          <input type="file" name="gambar_menu" />
          <i style="float: left;font-size: 11px;color: #692d06">Abaikan jika tidak merubah gambar makanan</i>
        </div>
        <div>
         <button type="submit">Simpan Makanan</button>
        </div>
        </section>
      </form>
  </body>
</html>