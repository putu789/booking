<?php
include "db_connect.php";
if (isset($_POST["dok"])){
$dok = $_POST['dok'];
?>
<table class="table table-bordered"> 
	<thead>
		<th>
			Poliklinik
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
$query = query("SELECT b.nm_poli,a.hari_kerja,a.jam_mulai FROM jadwal a, poliklinik b WHERE a.kd_dokter= '$dok' AND a.kd_poli = b.kd_poli ");
while ($hasil = fetch_array($query)) {?>
		<tr>
			<td>
				<?php echo $hasil['nm_poli'];?>
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
	echo "No";
}