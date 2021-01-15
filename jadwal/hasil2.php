<?php
include "db_connect.php";
if (isset($_POST["doki"])){
$dok = $_POST['doki'];
$pol = $_POST['polo'];
?>
<table class="table table-bordered"> 
	<thead>
		<th>
			Nama Dokter
		</th>
		<th>
			Hari
		</th>
		<th>
			Waktu
		</th>
	</thead>
	<tbody>
		
	
<?php
$query = query("SELECT b.nm_dokter,a.hari_kerja,a.jam_mulai FROM jadwal a, dokter b WHERE a.kd_dokter= '$dok' AND a.kd_poli = '$pol' AND a.kd_dokter = b.kd_dokter");
while ($hasil = fetch_array($query)) {?>
		<tr>
			<td>
				<?php echo $hasil['nm_dokter'];?>
			</td>
			<td>
				<?php echo $hasil['hari_kerja'];?>
			</td>
			<td>
				<?php echo $hasil['jam_mulai'];?>
			</td>
		</tr>
<?php }
?>
	</tbody>
</table>
<?php }else{
	echo "NO";
}