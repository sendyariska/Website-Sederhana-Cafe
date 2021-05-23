<?php include 'koneksi.php'; ?>
<?php 
							session_start();
							if($_SESSION['status']!="login"){
								header("location:login_admin.php?pesan=belum_login");
							}
						?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Informasi Nilai Akhir</title>
    <script type="text/javascript" src="jquery-2.1.4.min.js"></script>   <!-- INCLUDE jQuery -->
    <link rel="icon" href="img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- themify CSS -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/nice-selec2t.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="css/styl2.css">
    <style type="text/css">
<!--
.style2 {
	color: #000;
}
-->
    </style>
    <script><!-- 

function startCalc(){
interval = setInterval("calc()",1);}
function calc(){
one = document.autoSumForm.nilai_praktikum.value;
two = document.autoSumForm.nilai_tugas.value; 
three = document.autoSumForm.nilai_uts.value; 
four = document.autoSumForm.nilai_uas.value; 
document.autoSumForm.nilai_akhir.value = (one*25/100) + (two*10/100) + (three*15/100) + (four*50/100);}
function stopCalc(){
clearInterval(interval);}
</script>
</head>

<body>
    <!--::header part start::-->
    <header class="main_menu single_page_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand logo_1" href="index.php"> <img src="img/single_page_logo.png" alt="logo"> </a>
                        <a class="navbar-brand logo_2" href="index.php"> <img src="img/logo1.png" alt="logo"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>                        </button>

<div class="collapse navbar-collapse main-menu-item justify-content-end"
                            id="navbarSupportedContent">
                            <ul class="navbar-nav align-items-center">
                                <li class="nav-item">
                                    <a class="nav-link" href="tampil_mahasiswa.php">Mahasiswa</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="tampil_dosen.php">Dosen</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="tampil_matkul.php">Mata Kuliah</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="tampil_nilai.php">Nilai</a>
                                </li>
                                <li class="d-none d-lg-block">
                                    <a class="btn_1" href="logout.php">Logout</a>
                              </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header part end-->

    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner text-center">
                        <div class="breadcrumb_iner_item">
                        
                            <h2>EDIT DATA NILAI</h2>
   	<?php
	include 'koneksi.php';
	$id_nilai = $_GET['id_nilai'];
	$data = mysqli_query($koneksi,"select * from datanilai where id_nilai='$id_nilai'");
	while($d = mysqli_fetch_array($data)){
		?>
	<p><br/>
	  <a href="tampil_nilai.php" class="genric-btn primary medium">Kembali</a>
	<br/>
    <br/>
		<form name='autoSumForm' method="post" action="update_nilai.php">
        <input name="id_nilai" type="hidden" value="<?php echo $d['id_nilai']; ?>">
		  <table width="700" align="center" bordercolor="#999999" bgcolor="#f9f9ff">
            <tr align="left">
              <td width="15">&nbsp; &nbsp;&nbsp;&nbsp;</td>
              <td width="137">NIM&nbsp; </td>
              <td width="209"><select type="text" name="nim" id="nim" value="<?php echo $d['nim']; ?>" required>
                <option><?php echo $d['nim']; ?></option>
				<option>--- Pilih NIM ---</option>
                <?php 
					$i=1;
					$sql= mysqli_query($koneksi,"SELECT * FROM datamhs");
					while($isi=mysqli_fetch_array($sql))
					{
					?>
                <option><?php echo $isi['nim'];?> </option>
                <?php } ?>
                </select></td>
              <td width="29">&nbsp; &nbsp;&nbsp;&nbsp;</td>
              <td width="112">Nilai Praktikum</td>
              <td width="109"><input name="nilai_praktikum" type="text" size="5" maxlength="5" onFocus="startCalc();" onBlur="stopCalc();" value="<?php echo $d['nilai_praktikum']; ?>">&nbsp; 25%</td>
            </tr>
            <tr align="left">
              <td></td>
              <td>Nama</td>
              <td><input type="text" name="nama" id="nama" size="33" readonly="true" value="<?php echo $d['nama']; ?>"></td>
              <td>&nbsp; &nbsp;&nbsp;&nbsp;</td>
              <td>Nilai Tugas</td>
              <td><input name="nilai_tugas" type="text" size="5" maxlength="5" onFocus="startCalc();" onBlur="stopCalc();"  value="<?php echo $d['nilai_tugas']; ?>">&nbsp; 10%</td>
            </tr>
            <tr align="left">
              <td>&nbsp; &nbsp;&nbsp;&nbsp;</td>
              <td>Kode Mata Kuliah</td>
              <td><select type="text" name="kode_mk" id="kode_mk" value="<?php echo $d['kode_mk']; ?>" required>
                <option>--- Pilih Kode MK ---</option>
                <?php 
					$i=1;
					$sql= mysqli_query($koneksi,"SELECT * FROM datamk");
					while($isi=mysqli_fetch_array($sql))
					{
					?>
                <option><?php echo $isi['kode_mk'];?> </option>
                <?php } ?>
                </select></td>
              <td>&nbsp; &nbsp;&nbsp;&nbsp;</td>
              <td>Nilai UTS</td>
              <td><input name="nilai_uts" type="text" size="5" maxlength="5" onFocus="startCalc();" onBlur="stopCalc();" value="<?php echo $d['nilai_uts']; ?>">&nbsp; 15%</td>
            </tr>
            <tr align="left">
              <td></td>
              <td>Nama Mata Kuliah</td>
              <td><input name="nama_mk" id="nama_mk" type="text" size="33" readonly="true" value="<?php echo $d['nama_mk']; ?>"></td>
              <td>&nbsp; &nbsp;&nbsp;&nbsp;</td>
              <td>Nilai UAS</td>
              <td><input name="nilai_uas" type="text" size="5" maxlength="5"  onFocus="startCalc();" onBlur="stopCalc();" value="<?php echo $d['nilai_uas']; ?>">&nbsp; 50%</td>
            </tr>
            <tr align="left">
              <td>&nbsp; &nbsp;&nbsp;&nbsp;</td>
              <td>Dosen Pengampu</td>
              <td><input name="dosen_pengampu" id="dosen_pengampu" type="text" size="33" readonly="true" value="<?php echo $d['dosen_pengampu']; ?>"></td>
              <td>&nbsp; &nbsp;&nbsp;&nbsp;</td>
              <td>Nilai Akhir</td>
              <td><input readonly type=text size="5" name="nilai_akhir" onchange='tryNumberFormat(this.form.thirdBox);' readonly value="<?php echo $d['nilai_akhir']; ?>"></td>
            </tr>
            <tr align="left">
              <td></td>
              <td></td>
              <td><input type="submit" value="Simpan"></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
          </table>
          <br/>
        <font color="#FFFFFF">*Semua data harus diisi agar bisa dimasukkan </font>
		</form>
<?php 
	}
	?>
                     </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
<!-- breadcrumb start-->

    <!-- feature_part start--><!-- upcoming_event part start-->

    <!-- learning part start--><!-- learning part end-->

    <!-- member_counter counter start --><!-- member_counter counter end -->

    <!--::review_part start::--><!--::blog_part end::-->

    <!-- footer part start-->
    <footer class="footer-area"></footer>
    <!-- footer part end-->

    <!-- jquery plugins here-->
    <!-- jquery -->
    <script src="js/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- easing js -->
    <script src="js/jquery.magnific-popup.js"></script>
    <!-- swiper js -->
    <script src="js/swiper.min.js"></script>
    <!-- swiper js -->
    <script src="js/masonry.pkgd.js"></script>
    <!-- particles js -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <!-- swiper js -->
    <script src="js/slick.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
    <script type="text/javascript">
$(document).ready(function(){

 $('#nim').change(function(){    // KETIKA ISI DARI FIEL 'NPM' BERUBAH MAKA ......
  var nimfromfield = $('#nim').val();  // AMBIL isi dari fiel NPM masukkan variabel 'npmfromfield'
  $.ajax({        // Memulai ajax
    method: "POST",      
    url: "ajaxrespon1.php",    // file PHP yang akan merespon ajax
    data: { nim: nimfromfield}   // data POST yang akan dikirim
  })
    .done(function( hasilajax ) {   // KETIKA PROSES Ajax Request Selesai
        $('#nama').val(hasilajax);  // Isikan hasil dari ajak ke field 'nama' 
    });
 })
});
</script>
    <script type="text/javascript">
$(document).ready(function(){

 $('#kode_mk').change(function(){    // KETIKA ISI DARI FIEL 'NPM' BERUBAH MAKA ......
  var nimfromfield = $('#kode_mk').val();  // AMBIL isi dari fiel NPM masukkan variabel 'npmfromfield'
  $.ajax({        // Memulai ajax
    method: "POST",      
    url: "ajaxrespon3.php",    // file PHP yang akan merespon ajax
    data: { kode_mk: nimfromfield}   // data POST yang akan dikirim
  })
    .done(function( hasilajax ) {   // KETIKA PROSES Ajax Request Selesai
        $('#nama_mk').val(hasilajax);  // Isikan hasil dari ajak ke field 'nama' 
    });
 })
});
</script>
    <script type="text/javascript">
$(document).ready(function(){

 $('#kode_mk').change(function(){    // KETIKA ISI DARI FIEL 'NPM' BERUBAH MAKA ......
  var nimfromfield = $('#kode_mk').val();  // AMBIL isi dari fiel NPM masukkan variabel 'npmfromfield'
  $.ajax({        // Memulai ajax
    method: "POST",      
    url: "ajaxrespon4.php",    // file PHP yang akan merespon ajax
    data: { kode_mk: nimfromfield}   // data POST yang akan dikirim
  })
    .done(function( hasilajax ) {   // KETIKA PROSES Ajax Request Selesai
        $('#dosen_pengampu').val(hasilajax);  // Isikan hasil dari ajak ke field 'nama' 
    });
 })
});
</script>
</body>

</html>