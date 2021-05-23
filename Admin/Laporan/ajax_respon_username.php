<?php 
include '../../koneksi.php'; 

$nama_pengguna = $_POST['nama_pengguna']; // Menerima NPM dari JQuery Ajax dari form
$data = mysqli_query($koneksi,"select * from tabel_pengguna where nama_pengguna='$nama_pengguna'"); // Ambil nama mahasiswa berdasarkan npm yang dikirim dari jquery ajax
while($d = mysqli_fetch_array($data)) {      
 echo $d[0]; // Print nama hasil perolehan dari query database
}

?>

