<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include '../../koneksi.php';

	// membuat variabel untuk menampung data dari form
  $tanggal_penjualan = $_POST['tanggal_penjualan'];
  $jumlah_pesanan    = $_POST['jumlah_pesanan'];
  $username          = $_POST['username'];
  $id_menu           = $_POST['id_menu'];


                  // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
                  $query = "INSERT INTO tabel_laporan (tanggal_penjualan, jumlah_pesanan, username, id_menu) VALUES ('$tanggal_penjualan', '$jumlah_pesanan', '$username', '$id_menu')";
                  $result = mysqli_query($koneksi, $query);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Data berhasil ditambah.');window.location='tampil_laporan.php';</script>";
                  }
