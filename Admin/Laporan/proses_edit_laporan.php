<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include '../../koneksi.php';

	// membuat variabel untuk menampung data dari form
  $tanggal_penjualan  = $_POST['tanggal_penjualan'];
  $jumlah_pesanan     = $_POST['jumlah_pesanan'];
  $username           = $_POST['username'];
  $id_menu            = $_POST['id_menu'];
  $id_laporan         = $_POST['id_laporan'];

                    // jalankan query UPDATE berdasarkan ID yang produknya kita edit
                   $query  = "UPDATE tabel_laporan SET tanggal_penjualan = '$tanggal_penjualan', jumlah_pesanan = '$jumlah_pesanan', username = '$username', id_menu = '$id_menu'";
                    $query .= "WHERE id_laporan = '$id_laporan'";
                    $result = mysqli_query($koneksi, $query);
                    // periska query apakah ada error
                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                             " - ".mysqli_error($koneksi));
                    } else {
                      //tampil alert dan akan redirect ke halaman index.php
                      //silahkan ganti index.php sesuai halaman yang akan dituju
                      echo "<script>alert('Data berhasil diubah.');window.location='tampil_laporan.php';</script>";
                    }
         
 
