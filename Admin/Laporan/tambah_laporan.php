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
  <script type="text/javascript" src="jquery-2.1.4.min.js"></script>   <!-- INCLUDE jQuery -->
  
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
        <h1>Tambah Laporan</h1>
      <center>
      <form method="POST" action="proses_tambah_laporan.php" enctype="multipart/form-data" >
      <section class="base">
        <input name="id_menu"  id="id_menu" hidden />
        <input name="username"  id="username" hidden />
        <div>
          <label>Nama Menu</label>
            <select type="text" name="nama_menu" id="nama_menu" autofocus="" required>
              <option>--- Pilih Menu ---</option>
                <?php 
                  $i=1;
                  $sql= mysqli_query($koneksi,"SELECT * FROM tabel_menu");
                  while($isi=mysqli_fetch_array($sql))
                  {
                ?>
              <option><?php echo $isi['nama_menu'];?> </option>
              <?php } ?>
            </select>
        </div>
        <div>
          <label>Kategori Minuman</label>
          <input type="text" name="kategori_menu" id="kategori_menu" readonly="true"/>
        </div>
        <div>
          <label>Jenis Menu</label>
          <input type="text" name="jenis_menu" id="jenis_menu" readonly="true"/>
        </div>
        <div>
          <label>Harga Menu</label>
         <input type="text" name="harga_menu" id="harga_menu" readonly="true" />
        </div>
        <div>
          <label>Jumlah Pesanan</label>
          <input type="number" name="jumlah_pesanan" required="" />
        </div>
        <div>
          <label>Tanggal Penjualan</label>
          <input type="date" name="tanggal_penjualan" required="" />
        </div>
        <div>
          <label>Nama Pengguna</label>
          <select type="text" name="nama_pengguna" id="nama_pengguna" required>
              <option>--- Pilih Pengguna ---</option>
                <?php 
                  $i=1;
                  $sql= mysqli_query($koneksi,"SELECT * FROM tabel_pengguna");
                  while($isi=mysqli_fetch_array($sql))
                  {
                ?>
            <option><?php echo $isi['nama_pengguna'];?> </option>
            <?php } ?>
          </select>
        </div>
        <div>
         <button type="submit">Simpan Laporan</button>
        </div>
        </section>
      </form>


  <script type="text/javascript">
    $(document).ready(function(){

    $('#nama_menu').change(function(){    // KETIKA ISI DARI FIEL 'NPM' BERUBAH MAKA ......
      var nama_menufromfield = $('#nama_menu').val();  // AMBIL isi dari fiel NPM masukkan variabel 'npmfromfield'
      $.ajax({        // Memulai ajax
        method: "POST",      
        url: "ajax_respon_kategori_menu.php",    // file PHP yang akan merespon ajax
        data: { nama_menu: nama_menufromfield}   // data POST yang akan dikirim
      })
        .done(function( hasilajax ) {   // KETIKA PROSES Ajax Request Selesai
            $('#kategori_menu').val(hasilajax);  // Isikan hasil dari ajak ke field 'nama' 
        });
    })
    });


    $(document).ready(function(){

    $('#nama_menu').change(function(){    // KETIKA ISI DARI FIEL 'NPM' BERUBAH MAKA ......
      var nama_menufromfield = $('#nama_menu').val();  // AMBIL isi dari fiel NPM masukkan variabel 'npmfromfield'
      $.ajax({        // Memulai ajax
        method: "POST",      
        url: "ajax_respon_jenis_menu.php",    // file PHP yang akan merespon ajax
        data: { nama_menu: nama_menufromfield}   // data POST yang akan dikirim
      })
        .done(function( hasilajax ) {   // KETIKA PROSES Ajax Request Selesai
            $('#jenis_menu').val(hasilajax);  // Isikan hasil dari ajak ke field 'nama' 
        });
    })
    });


    $(document).ready(function(){

    $('#nama_menu').change(function(){    // KETIKA ISI DARI FIEL 'NPM' BERUBAH MAKA ......
      var nama_menufromfield = $('#nama_menu').val();  // AMBIL isi dari fiel NPM masukkan variabel 'npmfromfield'
      $.ajax({        // Memulai ajax
        method: "POST",      
        url: "ajax_respon_harga_menu.php",    // file PHP yang akan merespon ajax
        data: { nama_menu: nama_menufromfield}   // data POST yang akan dikirim
      })
        .done(function( hasilajax ) {   // KETIKA PROSES Ajax Request Selesai
            $('#harga_menu').val(hasilajax);  // Isikan hasil dari ajak ke field 'nama' 
        });
    })
    });


    $(document).ready(function(){

    $('#nama_menu').change(function(){    // KETIKA ISI DARI FIEL 'NPM' BERUBAH MAKA ......
      var nama_menufromfield = $('#nama_menu').val();  // AMBIL isi dari fiel NPM masukkan variabel 'npmfromfield'
      $.ajax({        // Memulai ajax
        method: "POST",      
        url: "ajax_respon_id_menu.php",    // file PHP yang akan merespon ajax
        data: { nama_menu: nama_menufromfield}   // data POST yang akan dikirim
      })
        .done(function( hasilajax ) {   // KETIKA PROSES Ajax Request Selesai
            $('#id_menu').val(hasilajax);  // Isikan hasil dari ajak ke field 'nama' 
        });
    })
    });


    $(document).ready(function(){

    $('#nama_pengguna').change(function(){    // KETIKA ISI DARI FIEL 'NPM' BERUBAH MAKA ......
      var nama_penggunafromfield = $('#nama_pengguna').val();  // AMBIL isi dari fiel NPM masukkan variabel 'npmfromfield'
      $.ajax({        // Memulai ajax
        method: "POST",      
        url: "ajax_respon_username.php",    // file PHP yang akan merespon ajax
        data: { nama_pengguna: nama_penggunafromfield}   // data POST yang akan dikirim
      })
        .done(function( hasilajax ) {   // KETIKA PROSES Ajax Request Selesai
            $('#username').val(hasilajax);  // Isikan hasil dari ajak ke field 'nama' 
        });
    })
    });

  </script>
  </body>
</html>