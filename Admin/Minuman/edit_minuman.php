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
          echo "<script>alert('Data tidak ditemukan pada database');window.location='tampil_minuman.php';</script>";
       }
  } else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    echo "<script>alert('Masukkan data id.');window.location='tampil_minuman.php';</script>";
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
        <h1>Edit Minuman <?php echo $data['nama_menu']; ?></h1>
      <center>
      <form method="POST" action="proses_edit_minuman.php" enctype="multipart/form-data" >
      <section class="base">
        <!-- menampung nilai id produk yang akan di edit -->
        <input name="id_menu" value="<?php echo $data['id_menu']; ?>"  hidden />
        <div>
          <label>Nama Minuman</label>
          <input type="text" name="nama_menu" value="<?php echo $data['nama_menu']; ?>" autofocus="" required="" />
        </div>
        <div>
          <label for="jenis_menu">Jenis Minuman</label>
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
                if($data['jenis_menu'] == 'Milk')
                {?>
                  <option hidden=true value="Milk">Hide</option>
                <?php   }?>
                <?php 
                if($data['jenis_menu'] != 'Milk')
                {?>
                  <option value="Milk">Milk</option>
                <?php   }?>

                <?php 
                if($data['jenis_menu'] == 'Tea')
                {?>
                  <option hidden=true value="Tea">Hide</option>
                <?php   }?>
                <?php 
                if($data['jenis_menu'] != 'Tea')
                {?>
                  <option value="Tea">Tea</option>
                <?php   }?>

                <?php 
                if($data['jenis_menu'] == 'Fruit')
                {?>
                  <option hidden=true value="Fruit">Hide</option>
                <?php   }?>
                <?php 
                if($data['jenis_menu'] != 'Fruit')
                {?>
                  <option value="Fruit">Fruit</option>
                <?php   }?>

                <?php 
                if($data['jenis_menu'] == 'Coffee')
                {?>
                  <option hidden=true value="Coffee">Hide</option>
                <?php   }?>
                <?php 
                if($data['jenis_menu'] != 'Coffee')
                {?>
                  <option value="Coffee">Coffee</option>
                <?php   }?>
                
                <!-- <option value="Milk">Milk</option>
                <option value="Tea">Tea</option>
                <option value="Fruit">Fruit</option>
                <option value="Coffee">Coffee</option> -->
            </select>
        </div>
        <div>
          <label>Harga Minuman</label>
         <input type="number" name="harga_menu" required=""value="<?php echo $data['harga_menu']; ?>" />
        </div>
        <div>
          <label>Gambar Minuman</label>
          <img src="../../Gambar/<?php echo $data['gambar_menu']; ?>" style="width: 120px;float: left;margin-bottom: 5px;">
          <input type="file" name="gambar_menu" />
          <i style="float: left;font-size: 11px;color: #692d06">Abaikan jika tidak merubah gambar minuman</i>
        </div>
        <div>
         <button type="submit">Simpan Minuman</button>
        </div>
        </section>
      </form>
  </body>
</html>