<?php
include "db_connect.php";
include "phpqrcode/qrlib.php";
$get_rm = fetch_array(query("SELECT max(no_rkm_medis) FROM pasien"));
$lastRM = substr($get_rm[0], 0, 6);
$no_rm_next = sprintf('%06s', ($lastRM + 1));


 $tgl_per = $_POST["tgl"];
 $hasil0= $_POST["hasil0"];
 $hasil1= $_POST["hasil1"];
 $dok1=$_POST["dok1"];
 $dok2=$_POST["dok2"];
 $jen=$_POST["jen"];
 $tgl_lahir=$_POST["tgl_lahir"];
 $nama_pasien = $_POST["nama_pasien"];
 $lahirmu = $_POST["lahirmu"];
 $noktp = $_POST["ident"];
 $jekel = $_POST["jkelmain"];
 $alamat = $_POST["alamat"];
 $no_telp = $_POST["no_telp"];
 $kd_prop = $_POST["kd_prop"];
 $kd_kab=$_POST["kd_kab"];
 $kd_kec=$_POST["kd_kec"];
 $kd_kel = $_POST["kd_kel"];
if ($tgl_per != ''){
 $generatebook = KodeBooking();
  $cek_ktp = fetch_array(query("SELECT no_ktp FROM pasien WHERE no_ktp='$noktp'"));
  if($cek_ktp > 0){
    echo '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>NIK anda sudah terdaftar di sistem kami. Daftar sebagai pasien lama</div></div>
    </div>';
    }else{
    
  
  	
  		$kuota = query("SELECT COUNT(kd_dokter) as jumlah  From booking_registrasi WHERE kd_dokter= '00.08.03' AND tanggal_periksa='$tgl_per' AND status != 'Batal'");
        while ($kot = fetch_array($kuota)) {
            $jmlhe = $kot['jumlah']; 
          }
              if ($jmlhe >= '30'){
                 echo "Kuota Untuk dr. Sumardjo Sudah penuh (kuota 30 pasien)";
              }else{
	  	 
		              $cek = fetch_array(query("SELECT no_rkm_medis FROM booking_registrasi WHERE no_rkm_medis='$pisah0' AND tanggal_periksa='$tgl_per'"));
	 
	 		            $no_reg_akhir = fetch_array(query("SELECT max(no_reg) FROM booking_registrasi WHERE kd_dokter='$dok1' and tanggal_periksa='$tgl_per'"));

  			         $tempdir = "qrcode/"; 
                  if (!file_exists($tempdir)) 
                  mkdir($tempdir);

                  $teks_qrcode ="".$generatebook."";
                  $namafile  ="".$pisah0.$generatebook.".png";
                  $level=QR_ECLEVEL_H;
                  $UkuranPixel=5;
                  $UkuranFrame=4;
                  QRcode::png($teks_qrcode, $tempdir.$namafile, $level, $UkuranPixel, $UkuranFrame); 
        
	                $no_urut_reg = substr($no_reg_akhir[0], 0, 3);
	                $no_reg = sprintf('%03s', ($no_urut_reg + 1));

 
                  $insertPasien  = query("INSERT INTO pasien (no_rkm_medis,nm_pasien,no_ktp,jk,tmp_lahir,tgl_lahir,nm_ibu,alamat,gol_darah,pekerjaan,stts_nikah,agama,tgl_daftar,no_tlp,umur,pnd,keluarga,namakeluarga,kd_pj,no_peserta,kd_kel,kd_kec,kd_kab,pekerjaanpj,alamatpj,kelurahanpj,kecamatanpj,kabupatenpj,perusahaan_pasien,suku_bangsa,bahasa_pasien,cacat_fisik,email,nip,kd_prop,propinsipj) VALUES ('$no_rm_next','$nama_pasien','$noktp','$jekel','-','$tgl_lahir','-','$alamat','-','-','-','-','$date','$no_telp','-','-','-','-','$jen','-','$kd_kel','$kd_kec','$kd_kab','-','-','-','-','-','-','12','6','1','-','-','$kd_prop','-')");

 			            $insert = query("
                                  INSERT INTO booking_registrasi (tanggal_booking,jam_booking,no_rkm_medis,tanggal_periksa,kd_dokter,kd_poli,no_reg,kd_pj,limit_reg,jam_periksa,status,kd_booking, qrcode)
                                  VALUES 
				                    ('$date','$time','$no_rm_next','$tgl_per','$dok1','$hasil0','$no_reg','$jen', '1','', 'Belum','$generatebook','$namafile')
        ");
        echo '<div class="row">
		  <div class="col-md-6"></div>
		  <div class="col-md-6"><h3>Kode Booking Anda</h3><hr>';
        $seles = query("SELECT * FROM booking_registrasi WHERE no_rkm_medis='$no_rm_next' AND tanggal_periksa='$tgl_per'");
        while ($kou = fetch_array($seles)) {
        		echo '
        		<div class="row">
      			<div class="col-xs-8 col-sm-6">
      			<img src="qrcode/'.$kou['qrcode'].'"><br>
      			<p><sup><i>'.$kou['tanggal_booking'].'</i></sup></p>
      			</div>
        		<div class="col-xs-4 col-sm-6">
        		<h4>Kode Booking : '.$kou['kd_booking'].' </h4>
        		 </div>'; ?>
        		 <script>
					function printContent(el){
					    var restorepage = document.body.innerHTML;
					    var printcontent = document.getElementById(el).innerHTML;
					    document.body.innerHTML = printcontent;
					    window.print();
					    document.body.innerHTML = restorepage;
					}
					</script>
        		 <p>
        		<button class="btn btn-md btn-warning" onclick="printContent('kartubook')">Cetak</button>
        		<a href=""><button style="margin-left:10px;" type="button" id="tutup" class="btn btn-md btn-danger">Tutup</button></a></p></div>
        		
				</div>
				<div id="kartubook" style="display:none" class="kotake">
					<table style="width: 100%;" class="table">
						<tr>
							<td colspan="4" class="kod" align="center"><h4>Kartu Tanda Booking</h4></td>
						</tr>
						<tr style="padding: 10px;">
							<td><img src="qrcode/<?php echo $kou['qrcode']; ?>"> </td>
							<td>No. Booking <br> Nama Pasien<br>Tgl Periksa</td><td>:<br>:<br>:</td><td><?php echo $kou['kd_booking']; ?><br><?php echo $nama_pasien; ?><br><?php echo $kou['tanggal_periksa'];?></td>
						</tr>
					
					</table>
					
				</div>
          <?php echo	'</div>';
        }
        		

 		}
    }
 
 }else{
  echo "don't look back in anger ^_^";
 }
?>