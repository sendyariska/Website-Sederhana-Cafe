<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include '../../koneksi.php';

	// membuat variabel untuk menampung data dari form
  $username       = $_POST['username'];
  $password     = $_POST['password'];
  $nama_pengguna     = $_POST['nama_pengguna'];

                    // jalankan query UPDATE berdasarkan ID yang produknya kita edit
                   $query  = "UPDATE tabel_pengguna SET password = '$password', nama_pengguna = '$nama_pengguna'";
                    $query .= "WHERE username = '$username'";
                    $result = mysqli_query($koneksi, $query);
                    // periska query apakah ada error
                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                             " - ".mysqli_error($koneksi));
                    } else {
                      //tampil alert dan akan redirect ke halaman index.php
                      //silahkan ganti index.php sesuai halaman yang akan dituju
                      echo "<script>alert('Data berhasil diubah.');window.location='tampil_pengguna.php';</script>";
                    }
