<?php
require_once "db_connect.php";
$no_rkm_medis = $_POST['noRme'];
$tglLahir = $_POST['tglLahir'];
if (isset($no_rkm_medis, $tglLahir)) {
	$today = date("d-m-Y");
	$query = query("SELECT nm_pasien,tgl_lahir,alamat FROM pasien Where no_rkm_medis = '$no_rkm_medis' AND tgl_lahir = '$tglLahir'");
	$cek = num_rows($query);
	if ($cek > 0) {
		while ($hasil = fetch_array($query)) {
		$nama = $hasil['nm_pasien'];
		$tglLahir = $hasil['tgl_lahir'];
		$alamat = $hasil['alamat'];
	}
	ob_start();
	$img = imagecreatefrompng('asset/karturs.png');

	// (B) WRITE TEXT
	$white = imagecolorallocate($img, 0, 0, 0);
	$txt = "NO. RM : ".$no_rkm_medis."";
	$txt1 = "Nama : ".$nama."";
	$txt2 = "Alamat : ".$alamat."";
	$txt3 = "Tgl.Lahir : ".$tglLahir."";
	$txt4 = "".$today."";
	$font = "C:\Windows\Fonts\arial.ttf"; 



	// THE IMAGE SIZE
	$width = imagesx($img);
	$height = imagesy($img);

	// THE TEXT SIZE
	$text_size = imagettfbbox(24, 0, $font, $txt);
	$text_width = max([$text_size[2], $text_size[4]]) - min([$text_size[0], $text_size[6]]);
	$text_height = max([$text_size[5], $text_size[7]]) - min([$text_size[1], $text_size[3]]);
	// CENTERING THE TEXT BLOCK
	$centerX = CEIL(($width - $text_width) / 1.5);
	$centerX = $centerX<0 ? 0 : $centerX;
	$centerY = CEIL(($height - $text_height) / 2.2);
	$centerY = $centerY<0 ? 0 : $centerY;

	
	// CENTERING THE TEXT BLOCK
	$centerX1 = CEIL(($width - $text_width) / 1.5);
	$centerX1 = $centerX1<0 ? 0 : $centerX1;
	$centerY1 = CEIL(($height - $text_height) / 2);
	$centerY1 = $centerY1<0 ? 0 : $centerY1;

	$centerX2 = CEIL(($width - $text_width) / 1.5);
	$centerX2 = $centerX2<0 ? 0 : $centerX2;
	$centerY2 = CEIL(($height - $text_height) / 1.8);
	$centerY2 = $centerY2<0 ? 0 : $centerY2;

	$centerX3 = CEIL(($width - $text_width) / 1.5);
	$centerX3 = $centerX3<0 ? 0 : $centerX3;
	$centerY3 = CEIL(($height - $text_height) / 1.6);
	$centerY3 = $centerY3<0 ? 0 : $centerY3;


	$centerX4 = CEIL(($width - $text_width) / 4);
	$centerX4 = $centerX4<0 ? 0 : $centerX4;
	$centerY4 = CEIL(($height - $text_height) / 1.2);
	$centerY4 = $centerY4<0 ? 0 : $centerY4;


	imagettftext($img, 24, 0, $centerX, $centerY, $white, $font, $txt);
	imagettftext($img, 24, 0, $centerX1, $centerY1, $white, $font, $txt1);
	imagettftext($img, 24, 0, $centerX2, $centerY2, $white, $font, $txt2);
	imagettftext($img, 24, 0, $centerX3, $centerY3, $white, $font, $txt3);
	imagettftext($img, 14, 0, $centerX4, $centerY4, $white, $font, $txt4);

	// (C) OUTPUT IMAGE
	imagealphablending($img, true);
	imagesavealpha($img, true);
	header('Content-type: image/jpeg');
	imagepng($img);
	$outputBuffer = ob_get_clean();
	$base64 = base64_encode($outputBuffer);
	echo '
	<img style="width: 100%; height: 100%;" src="data:image/jpeg;base64,'.$base64.'" />
	<input type="hidden" value="'.$base64.'">
	';
	}else{
		echo "<div class='alert alert-danger'>Data Pasien Tidak Ditemukan</div>";
	}
	
	
}else{
	echo "Data Kosong";
}

?>