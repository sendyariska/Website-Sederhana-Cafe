<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include '../../koneksi.php';

	// membuat variabel untuk menampung data dari form
  $id_menu       = $_POST['id_menu'];
  $nama_menu     = $_POST['nama_menu'];
  $jenis_menu    = $_POST['jenis_menu'];
  $harga_menu    = $_POST['harga_menu'];
  $gambar_menu   = $_FILES['gambar_menu']['name'];

  //cek dulu jika merubah gambar produk jalankan coding ini
  if($gambar_menu != "") {
    $ekstensi_diperbolehkan = array('png','jpg','jpeg'); //ekstensi file gambar yang bisa diupload 
    $x = explode('.', $gambar_menu); //memisahkan nama file dengan ekstensi yang diupload
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['gambar_menu']['tmp_name'];   
    $angka_acak     = rand(1,999);
    $nama_gambar_baru = $angka_acak.'-'.$gambar_menu; //menggabungkan angka acak dengan nama file sebenarnya
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {
                  move_uploaded_file($file_tmp, '../../Gambar/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                      
                    // jalankan query UPDATE berdasarkan ID yang produknya kita edit
                   $query  = "UPDATE tabel_menu SET nama_menu = '$nama_menu', jenis_menu = '$jenis_menu', harga_menu = '$harga_menu', gambar_menu = '$nama_gambar_baru'";
                    $query .= "WHERE id_menu = '$id_menu'";
                    $result = mysqli_query($koneksi, $query);
                    // periska query apakah ada error
                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                             " - ".mysqli_error($koneksi));
                    } else {
                      //tampil alert dan akan redirect ke halaman index.php
                      //silahkan ganti index.php sesuai halaman yang akan dituju
                      echo "<script>alert('Data berhasil diubah.');window.location='tampil_minuman.php';</script>";
                    }
              } else {     
               //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                  echo "<script>alert('Ekstensi gambar yang boleh hanya png, jpg atau jpeg.');window.location='tambah_produk.php';</script>";
              }
    } else {
      // jalankan query UPDATE berdasarkan ID yang produknya kita edit
      $query  = "UPDATE tabel_menu SET nama_menu = '$nama_menu', jenis_menu = '$jenis_menu', harga_menu = '$harga_menu'";
      $query .= "WHERE id_menu = '$id_menu'";
      $result = mysqli_query($koneksi, $query);
      // periska query apakah ada error
      if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                             " - ".mysqli_error($koneksi));
      } else {
        //tampil alert dan akan redirect ke halaman index.php
        //silahkan ganti index.php sesuai halaman yang akan dituju
          echo "<script>alert('Data berhasil diubah.');window.location='tampil_minuman.php';</script>";
      }
    }

 
