<?php 
include "db_connect.php";
if (isset($_POST["poliklinik"])){
$poliklinik = $_POST['poliklinik'];
$koi = $_POST['koi'];
$tgle       = $koi;
$tentukan_hari=date('D',strtotime($koi));
         $day = array(
            'Sun' => 'AKHAD',
            'Mon' => 'SENIN',
            'Tue' => 'SELASA',
            'Wed' => 'RABU',
            'Thu' => 'KAMIS',
            'Fri' => 'JUMAT',
            'Sat' => 'SABTU'
            );
$harine=$day[$tentukan_hari];
$result = query("
                                    SELECT
                                        jadwal.kd_poli
                                    FROM
                                        jadwal,
                                        poliklinik,
                                        dokter
                                    WHERE
                                        jadwal.kd_poli = poliklinik.kd_poli
                                    AND
                                        jadwal.kd_dokter = dokter.kd_dokter
                                    AND
                                        jadwal.hari_kerja LIKE '%$harine%'
                            ");
                            while ($data = fetch_array($result)) {
                             

                            $hasil2 = query("
                                        SELECT
                                            jadwal.kd_dokter,
                                            dokter.nm_dokter,
                                            jadwal.jam_mulai,
                                            jadwal.jam_selesai
                                        FROM
                                            jadwal,
                                            poliklinik,
                                            dokter
                                        WHERE
                                            jadwal.kd_poli = poliklinik.kd_poli
                                        AND
                                            jadwal.kd_dokter = dokter.kd_dokter
                                        AND
                                            jadwal.kd_poli = '$poliklinik'
                                        AND
                                            jadwal.hari_kerja LIKE '%$harine%'
                                    ");

$html = "<option value=''>-- Pilih Dokter --</option>";
 while ($data2 = fetch_array($hasil2)) { 
    $akhir = $data2['jam_selesai'];
    $tep = '';
    if ($akhir == '00:00:00') {
        $tep ='Selesai';
    }else{
        $tep = $akhir;
    }
  $html .= "<option value='".$data2['kd_dokter']."|".$data2['nm_dokter']."'>".$data2['nm_dokter']." (".$data2['jam_mulai']." - ".$tep.")</option>"; 
}
}
$callback = array('data_kota'=>$html); 
echo json_encode($callback); 
}else{
    echo "Halaman Tidak Dapat Dimuat";
}
?>