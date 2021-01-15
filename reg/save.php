<style type="text/css">
    .kod {
        border: 1px solid #00000;
        padding: 10px;
    }
    .kotake {
        border: 1px solid #00000;
        padding: 25px;
    }
</style>
<?php
 include "db_connect.php";
 include "phpqrcode/qrlib.php";
 if (isset($_POST["tgl"] , $_POST["hasil0"], $_POST["dok1"],$_POST["pisah0"]))

 {
 $tgl_per = $_POST["tgl"];
 $hasil0= $_POST["hasil0"];
 $hasil1= $_POST["hasil1"];
 $dok1=$_POST["dok1"];
 $dok2=$_POST["dok2"];
 $pisah0=$_POST["pisah0"];
 $pisah1=$_POST["pisah1"];
 $jen=$_POST["jen"];
 $tgl_lahir=$_POST["tgl_lahir"];
 $nm_pasien = $_POST["pisah1"];
 $no_hp = $_POST["no_hp"];
 $generatebook = KodeBooking();
 $not = $_POST['not'];
 
 if ($tgl_per == $date) {
    $errors[] = "<div class='alert alert-danger'>Tidak dapat mendaftar ditanggal yang sama dengan tanggal periksa</div>";
 }
  $cek = fetch_array(query("SELECT no_rkm_medis FROM booking_registrasi WHERE no_rkm_medis='$pisah0' AND tanggal_periksa='$tgl_per' AND status = 'Belum'"));
if ($cek != '') {
     $errors[] = '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Anda sudah terdaftar untuk tanggal '.$tgl_per.'. Silahkan pilih tanggal periksa yang lain, klik <a href="booking"><button class="btn btn-xs btn-info">Disini</button></a> untuk merefresh halaman.</div></div>
</div>';
}
$kuota = query("SELECT COUNT(kd_dokter) as jumlah  From booking_registrasi WHERE kd_dokter= '00.08.03' AND tanggal_periksa='$tgl_per' AND status != 'Batal'");
    while ($kot = fetch_array($kuota)) {
    $jmlhe = $kot['jumlah']; 
    }
    if ($jmlhe >= '30'){
                $errors[]= "Kuota Untuk dr. Sumardjo Sudah penuh (kuota 30 pasien)";
    }

 
if(!empty($errors)) {
    foreach($errors as $error) {
        echo validation_errors($error);
    } 
}else{
 $no_reg_akhir = fetch_array(query("SELECT max(no_reg) FROM booking_registrasi WHERE kd_dokter='$dok1' and tanggal_periksa='$tgl_per'"));

  $tempdir = "../qrcode/"; 
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


        
        $insert = query("
            INSERT INTO booking_registrasi (tanggal_booking,jam_booking,no_rkm_medis,tanggal_periksa,kd_dokter,kd_poli,no_reg,kd_pj,limit_reg,jam_periksa,status,kd_booking, qrcode)
            VALUES 
                 ('$date','$time','$pisah0','$tgl_per','$dok1','$hasil0','$no_reg','$jen', '1','', 'Belum','$generatebook','$namafile')
        ");
        $update = query("UPDATE pasien SET no_tlp ='$no_hp'  WHERE no_rkm_medis = '$pisah0'");
        echo '<div class="row">
          <div class="col-md-6"></div>
          <div class="col-md-6"><h3>Kode Booking Anda</h3><hr>';
        $seles = query("SELECT * FROM booking_registrasi WHERE no_rkm_medis='$pisah0' AND tanggal_periksa='$tgl_per' AND status = 'Belum'");
        while ($kou = fetch_array($seles)) {
            $tgl_book = $kou['tanggal_booking'];
                echo '
                <div class="row">
                <div class="col-xs-8 col-sm-6">
                <img src="../qrcode/'.$kou['qrcode'].'"><br>
                <p><sup><i>'.$kou['tanggal_booking'].'</i></sup></p>
                </div>
                <div class="col-xs-4 col-sm-6">
                <h4>Kode Booking : '.$kou['kd_booking'].' </h4>
				<h5>No Antrian : '.$kou['no_reg'].' </h5>
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
            <script type="text/javascript">
            $("#tutup").click(function(){
                location.reload();
            });
            </script>
                 <p>
                <button class="btn btn-md btn-warning" onclick="printContent('kartubook')">Cetak</button>
                <a href=""><button style="margin-left:10px;" type="button" id="tutup" class="btn btn-md btn-danger">Tutup</button></a></p></div>
                <p>Harap datang 30 menit sebelum jam praktek dokter untuk melakukan verifikasi pendaftaran ke loket pendaftaran</p>
                <p><?php echo $not;?></p>
                <p>untuk jadwal praktek Dokter klik <a href="http://daftar.asysyifa-sambi.com/jadwal"><button class="btn btn-xs btn-warning">Disini</button></a></p>
                </div>
                <div id="kartubook" style="display:none" class="kotake">
                    <table style="width: 100%;" class="table">
                        <tr>
                            <td colspan="4" class="kod" align="center"><h4>Kartu Tanda Booking</h4></td>
                        </tr>
                        <tr style="padding: 10px;">
                            <td><img src="qrcode/<?php echo $kou['qrcode']; ?>"> <p><sup><i><?php echo $kou['tanggal_booking'];?></i></sup></p></td>
                            <td>No. Booking <br> Nama Pasien<br>Tgl Periksa</td><td>:<br>:<br>:</td><td><?php echo $kou['kd_booking']; ?><br><?php echo $nm_pasien; ?><br><?php echo $kou['tanggal_periksa'];?></td>
                        </tr>
                    
                    </table>
                    
                </div>
                

            <?php echo  '
 </div>

            ';
        }
	}
 }else{
    echo "Halaman Tidak Dapat diakses";
 }

 
?>