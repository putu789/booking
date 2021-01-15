<?php 

include('header.php');
include ('db_connect.php');

?>
<title>Booking periksa RSU Asysyifa Sambi</title>


<style type="text/css">


#divs .div {
    display:none;
}
.alert-danger{
    padding : 5px;
    border-radius: 2px;
}
  #register_form fieldset:not(:first-of-type) {
    display: none;
  }
  .cont {
  display: inline;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 16px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default radio button */
.cont input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

/* Create a custom radio button */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
  border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.cont:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.cont input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the indicator (dot/circle) when checked */
.cont input:checked ~ .checkmark:after {
  display: block;
}

/* Style the indicator (dot/circle) */
.cont .checkmark:after {
 	top: 9px;
	left: 9px;
	width: 8px;
	height: 8px;
	border-radius: 50%;
	background: white;
}
.kotak {
		border: 1px solid #aeb5b0;
		padding : 30px;
	}
.btn-outline {
  color: #4fbfa8;
  background-color: #ffffff;
  border-color: #4fbfa8;
  font-weight: bold;
  letter-spacing: 0.05em;
}

.btn-outline {
  color: #4fbfa8;
  background-color: #ffffff;
  border-color: #4fbfa8;
  font-weight: bold;
  border-radius: 0;
}

.btn-outline:hover,
.btn-outline:active,
.btn-outline:focus,
.btn-outline.active {
  background: #4fbfa8;
  color: #ffffff;
  border-color: #4fbfa8;
  
}


.btn-colour-1 {
  color: #fff;
  background-color: #60cc7d;
  border-color: #75d18e;
  font-weight: bold;
  letter-spacing: 0.05em;
  border-radius: 0;
}

.btn-colour-1:hover,
.btn-colour-1:active,
.btn-colour-1:focus,
.btn-colour-1.active {
  /* let's darken #004E64 a bit for hover effect */
  background: #60d17f;
  color: #ffffff;
  border-color: #75d18e;
}
.oo{
  padding: 10px;
}
h3{
	font-size : 16px;
	text-transform : UPPERCASE;
	color : #189e42;
}
h2{
	text-transform : UPPERCASE;
	font-size : 20px;
	color :#c4213d;
}
.has-error
  {
   border-color:#cc0000;
   background-color:#ffff99;
  }
  .o {
    padding: 5px;
  }
  
</style>
<?php include('container.php');?>
<?php
$selet = query("SELECT * FROM info_rs");
while ($hop = fetch_array($selet)) {
  echo '<input type="hidden" id="hop" value="'.$hop['infone'].'">';
}
?>

<div class="container">
  <div class="kotak" style="padding-top: 2px;">
	<h2 style="margin-top: 2px;"> <img src="../asset/Icon.ico" style="width:50px; height:50px;"/>  Booking periksa RSU Asysyifa Sambi</h2>
  <hr>
	<div class="progress">
	<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
	</div>
	<div class="alert alert-success hide"></div>	
	<form id="register_form" novalidate name="pilihan" method="POST"  enctype="multipart/form-data">	
	<fieldset>
	<h3>Langkah 1: Alur Booking Periksa Online RSU Asysyifa Sambi</h3>
	<div class="container">
  <table>
    <tr>
      <td class="o">1.</td>
      <td class="o">Pendaftaran online RSU Asysyifa Sambi dapat diakses di alamat daftar.asysyifa-sambi.com</td>
    </tr>
    <tr>
      <td class="o">2.</td>
      <td class="o">Pendaftaran dapat dilakukan maksimal 1(satu) bulan, dan Minimal 1 hari sebelum tanggal pemeriksaan</td>
    </tr>
    <tr>
      <td class="o">3.</td>
      <td class="o">Pendaftaran online hanya dapat dilakukan oleh pasien lama (yang sudah pernah periksa di RSU Asysyifa Sambi</td>
    </tr>
    <tr>
      <td class="o">4.</td>
      <td class="o">Pendaftaran online hanya bersifat booking untuk mendapatkan nomor antrian dan kode booking (digunakan untuk verifikasi ketika akan periksa)</td>
    </tr>
    <tr>
      <td class="o">5.</td>
      <td class="o">Setiap pasien yang telah melakukan pendaftaran online diwajibkan untuk verifikasi di anjungan mandiri atau di loket pendaftaran</td>
    </tr>
    <tr>
      <td class="o">6.</td>
      <td class="o">Teliti tanggal petiksa anda, karena untuk tanggal merah (libur nasional) pelayanan rawat jalan poliklinik RSU Asy Syifa Sambi tutup</td>
    </tr>
    <tr>
      <td class="o">7.</td>
      <td class="o">Lihat jadwal praktek dokter spesialis di <a target="_blank" href="/jadwal"><button type="button" class="btn  btn-outline btn-colour-1">Disini</button> </a></td>
    </tr>
    <tr>
      <td class="o">8.</td>
      <td class="o">Apabila tidak ada nama klinik ataupun dokter pada tanggal pilihan anda, berarti tidak ada praktek dokter yang anda tuju pada hari tersebut</td>
    </tr>
  </table>

<p>Jika anda sudah mendaftar dan lupa kode booking sebagai acuan verifikasi pendaftaran online silahkan klik <a href="cek-code.php" target="_blank"><button type="button" class="btn btn-outline btn-colour-1">Disini</button></a></p>
	</div>
  <hr>
	<input type="button" class="next-form btn btn-colour-1" id="start" value="Lanjut" />
	</fieldset>
	<fieldset>
	<h3> Langkah 2: Data Dasar</h3>
	<div class="form-group">
	<label for="first_name">Tanggal Periksa</label>
	<input type="text" auto-complete="off" class="form-control" id="tgl_per" name="tanggal_periksa"  readonly="readonly" placeholder="Tanggal Periksa">
	<span id="tgl_error" class="alert-danger"></span>
	</div>
	
	<div id="pilihan">
	<label for="email_address">Poliklinik Tujuan</label>
    <div class="form-group">
      <div class="form-line">
         <select class="form-control show-tick" name="kd_poli" id="kd_poli">
          <option value="">--Pilih Poliklinik--</option>
							</select>
                            <span id="poli_error" class="alert-danger"></span>
                        </div>
                    </div>
                   
                <div id="loading" style="margin-top: 15px;">
                  <img src="../asset/load.gif" width="85"> <small>Loading...</small>
                </div>
                <label for="email_address">Dokter Tujuan</label>
                <select name="dokter" id="dokter" class="form-control" >
                  <option value="">-- Pilih Dokter --</option>
                </select>
                 <span id="dokter_error" class="alert-danger"></span><br>
            <label for="email_address">Cara Bayar</label>
            <div class="form-group">
                <div class="form-line">
                    <select class="form-control show-tick" name="kd_pj" id="getFname">
                      <option value="">--Pilih jenis bayar--</option>
						<?php
                            $result=query("
                                        SELECT
                                            *
                                        FROM
                                            penjab
                                            WHERE
											png_jawab NOT LIKE '%tk%'
											AND (
                                            png_jawab LIKE '%umum%'
                                            OR
                                            png_jawab LIKE '%bpjs%'
											OR
											png_jawab LIKE '%Jasa%'
                                            )
											ORDER BY png_jawab ASC
                                           
                                            
                                            ");
                        while($row=fetch_array($result)){
							echo "<option id='$row[kd_pj]' value='$row[kd_pj]|$row[png_jawab]'>$row[png_jawab]</option>";
						}?>
                   </select> 
                    <span id="err_bayar" class="alert-danger"></span><br>                  
                </div>
            </div>
            <sup>
              <p style="color: red;">* BPJS PBI merupakan jenis BPJS bantuan dari pemerintah</p>
              <p style="color: red;">* BPJS NON PBI merupakan jenis BPJS Mandiri</p>
            </sup>
            <br>
            <div id="dokter-penuh"></div>
		</div>
    <hr>
	<input type="button" name="previous" class="previous-form btn btn-outline" value="Kembali" />
	<input type="button" name="next" class="next-form btn btn-colour-1" id="data-dasar" value="Lanjut" />
	</fieldset>
	
	<fieldset>
	<h3>Langkah 3: Detail data Pasien</h3>
		<!-- <label class="cont col-md-3">Pasien Lama
		<input type="radio" name="lama_baru" id="lambor" value="lama">
		<span class="checkmark"></span>
		</label>
		<label class="cont col-md-3">Pasien Baru
		<input type="radio" id="lambor1" name="lama_baru" value="baru">
		<span class="checkmark"></span>
		</label> -->
    <!-- <div id="divs"> -->
	    <!-- <div id="form-lama" class="div"> -->
        <div class="col-md-12"><div class="alert alert-info">Masukan tanggal lahir anda dan no rekam medis anda kemudian tekan tombol cari, apabila data ditemukan silahkan klik tombol konfirmasi .
		<br>Tidak tahu No Rekam Medis ? Klik <a href="cek.php" target="_blank"><button type="button" class="btn btn-xs btn-warning">Disini</button></a> </div></div>
          <div class="form-inline" >
            <div  class="form-group" style="padding: 10px;">
              <label>Tanggal Lahir (<?php echo $wajib;?>)</label><br>
              <input type="text" autocomplete="off"  class="form-control tgl_lahir" placeholder="YYYY-MM-DD" id="tanggalan" name="tanggal_lahir"  >
            </div>
             <div  class="form-group" style="padding: 10px;">
              <label>Nomor Rekam Medis (<?php echo $wajib;?>)</label><br>
              <input type="text" auto-complete="off" class="form-control" name="no_rm" id="no_rm"  placeholder="123456">
            </div>
             <div  class="form-group" style="padding: 10px;">
              <label>No Telepon (<?php echo $wajib;?>)</label><br>
              <input type="text" name="no_hp" id="no_hp" class="form-control" placeholder="08123456789">
            </div>
            <div  class="form-group" style="padding: 10px;">
              <label></label><br>
            <input type="button" class="btn btn-info" id="btn-cari" value="cari">
            </div>
          </div>
          <!-- <table style="width: 100%;">
            <tr>
              <td class="oo"><label>Tanggal Lahir (<?php echo $wajib;?>)</label></td>
              <td class="oo"><label>No Rekam Medis (<?php echo $wajib;?>)</label></td>
              <td class="oo"><label>No Telepon (<?php echo $wajib;?>)<sup class="alert-danger">Gunakan no handphone yang aktif dapat dihubungi</sup></label></td>
              <td></td>
            </tr>
            <tr>
              <td class="oo">
                 <input type="text" autocomplete="off"  class="form-control tgl_lahir" id="tanggalan" name="tanggal_lahir"  placeholder="Tanggal Lahir">
              </td>
              <td class="oo">
                <input type="text" auto-complete="off" class="form-control" name="no_rm" id="no_rm"  placeholder="No Rekam Medis">
              </td>
              <td class="oo">
                <input type="text" name="no_hp" id="no_hp" class="form-control" placeholder="No Handphone">
              </td>
              <td class="oo"> --><!-- </td>
            </tr>
          </table> -->
         

        <table style="width: 100%;">
        <tr>
        <td> <span id="result"></span></td>
        </tr>
        <tr>
            <td>
              <input type="hidden" name="no_rekame" id="sil">
           </td>
         </tr>
         <tr>
            <td>
              <span id="labur_eror" class="bahaya"></span>
            </td>
         </tr>
       </table>
      
	<!-- </div> -->

	 <!-- <div id="form-baru" class="div">
      <?php include "form-reg.php";?>
    </div>
  </div> -->
    <hr>
	<input type="button" name="previous" class="previous-form btn btn-outline" value="Kembali" />
	<input type="button" name="next" class="next-form btn btn-colour-1" id="konfirmasi" value="Konfirmasi" />
 

	</fieldset>
  <fieldset>

    <h3>Langkah 4: Konfirmasi</h3>
    <div class="table-responsive">
     <table class="table">
       <tr>
         <td>Tanggal Periksa</td>
         <td>:</td>
         <td ><span id="tugel"></span></td>
         <td>Nama Pasien</td>
         <td>:</td>
         <td><span id="jeneng"></td>
       </tr>
       <tr>
         <td>Poli Tujuan</td>
         <td>:</td>
         <td ><span id="pol_rev"></span></td>
         <td>Dokter</td>
         <td>:</td>
         <td><span id="dok_tuj"></td>
       </tr>
        <tr>
         <td>Jenis Bayar</td>
         <td>:</td>
         <td ><span id="jenis_bayar"></span></td>
         <td>Jenis Kelamin</td>
         <td>:</td>
         <td><span id="jk"></span></td>
       </tr>
       <tr>
         <td>Alamat</td>
         <td>:</td>
         <td ><span id="almate"></span></td>
         <td>Nomor Telepon</td>
         <td>:</td>
         <td><span id="notelp"></span></td>
       </tr>
     </table>
   </div>
     <hr>
      <input type="button" name="previous" id="back-fish" class="previous-form btn btn-outline" value="Kembali" />
      <input type="button" name="submit" id="submitt" class="submit btn btn-colour-1" value="Submit" />
      <div id="sukses"></div>
  </fieldset>
	</form>
	</div>

	
</div>	
<?php include('footer.php');?> 