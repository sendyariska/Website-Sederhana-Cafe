<?php 
include '../../koneksi.php'; 

$nama_menu = $_POST['nama_menu']; // Menerima NPM dari JQuery Ajax dari form
$data = mysqli_query($koneksi,"select * from tabel_menu where nama_menu='$nama_menu'"); // Ambil nama mahasiswa berdasarkan npm yang dikirim dari jquery ajax
while($d = mysqli_fetch_array($data)) {      
 echo $d[0]; // Print nama hasil perolehan dari query database
}

?>

