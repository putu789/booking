
<?php
 include "db_connect.php";
 if (isset($_POST["noRm"] , $_POST["tglPeriksa"], $_POST["dokterDaftar"]))
 {
 $no_rkm_medis=$_POST["noRm"];
 $tgl_periksa=$_POST["tglPeriksa"];
 $dokter = $_POST['dokterDaftar'];

 $result=query("SELECT * FROM booking_registrasi where no_rkm_medis = '$no_rkm_medis' AND  tanggal_periksa = '$tgl_periksa' AND kd_dokter = '$dokter'");
 $found=num_rows($result);
 
 if($found>0){
 	$sql = query("SELECT a.nm_pasien,a.tgl_lahir,a.alamat,b.tanggal_booking,b.tanggal_periksa, c.nm_dokter,d.nm_poli,e.png_jawab,b.status,b.kd_booking,b.qrcode FROM pasien a, booking_registrasi b, dokter c, poliklinik d, penjab e where b.no_rkm_medis = '$no_rkm_medis' AND  b.tanggal_periksa = '$tgl_periksa' AND b.kd_dokter = '$dokter' AND b.status= 'Belum' AND b.no_rkm_medis = a.no_rkm_medis AND b.kd_dokter = c.kd_dokter AND b.kd_poli = d.kd_poli AND b.kd_pj = e.kd_pj");
    while($row=fetch_array($sql)){
    echo "
    <style type='text/css'>
    	.colo {
    		background-color : #a9b0a9;
    		color : #ffffff;
    		font-weight: bold;
    	}
    	td{
    		padding : 5px;
    		border-bottom: 1px solid #e1f5e2;
    	}
    	table{
    		width: 100%;
    	}
    </style>
    <label> Detail Data Booking Anda </label>
    <input type='hidden' id='noRmHasil' value='".$no_rkm_medis."'>
    <input type='hidden' id='tglPeriksaHasil' value='".$tgl_periksa."'>
    <input type='hidden' id='dokterDaftarHasil' value='".$dokter."'>
    <table>
    		 <tr>
    		 	<td class='colo'>Nama</td>
    		 	<td>".$row['nm_pasien']."</td>
    		 </tr>
    		  <tr>
    		 	<td class='colo'>Alamat</td>
    		 	<td>".$row['alamat']."</td>
    		 </tr>
    		 <tr>
    		 	<td class='colo'>Tanggal Lahir</td>
    		 	<td>".$row['tgl_lahir']."</td>
    		 </tr>
    		 <tr>
    		 	<td class='colo'>Tanggal Booking</td>
    		 	<td>".$row['tanggal_booking']."</td>
    		 </tr>
    		 <tr>
    		 	<td class='colo'>Tanggal Periksa</td>
    		 	<td>".$row['tanggal_periksa']."</td>
    		 </tr>
    		 <tr>
    		 	<td class='colo'>Klinik</td>
    		 	<td>".$row['nm_poli']."</td>
    		 </tr>
    		 <tr>
    		 	<td class='colo'>Dokter</td>
    		 	<td>".$row['nm_dokter']."</td>
    		 </tr>
    		 <tr>
    		 	<td class='colo'>Cara Bayar</td>
    		 	<td>".$row['png_jawab']."</td>
    		 </tr>
    		 <tr>
    		 	<td class='colo'>Status</td>
    		 	<td>".$row['status']."</td>
    		 </tr>
    		 <tr>
    		 	<td class='colo'>Kode Booking</td>
    		 	<td><img src='qrcode/".$row['qrcode']."' style='width:50px;height:50px;'>
    		 	".$row['kd_booking']."<p> <sub><i>".$row['tanggal_booking']."</i></sub></p></td>
    		 </tr>
    	  </table>

    	  <br>";
    	  if ($row['status'] == 'Belum') {
    	  	echo "<button class='btn btn-danger' id='btlPeriksa'>Batalkan Periksa</button>";
    	  }else{
    	  	echo "<div  class='alert alert-danger'>Data Booking Anda Sudah Dibatalkan</div>";
    	  }
    	  echo "<script type='text/javascript'>
    	  $('#btlPeriksa').click(function(){
			var noRm = $('#noRmHasil').val();
			var tglPeriksa = $('#tglPeriksaHasil').val();
			var dokterDaftar = $('#dokterDaftarHasil').val();
			$.ajax({
				type: 'POST',
				url : 'batalDb.php',
				data : {noRm : noRm, tglPeriksa:tglPeriksa, dokterDaftar:dokterDaftar},
				success:function(data){
					$('#manageModalHasil').modal('hide');
					Swal.fire(
					  'SUKSES!',
					  'Anda Telah Membatalkan Periksa!',
					  'success'
					)
				}
			});
		});
    	  </script>

    	  ";
    	  echo '';
    	  
    	  
    }   
 }else{
    echo "<div  class='alert alert-danger'>Data Booking Tidak Ditemukan</div>";
 }
}else{
	echo "halaman tidak dapat diakses";
}
?>