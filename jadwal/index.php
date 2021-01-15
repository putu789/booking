<?php include "db_connect.php";?>
<html>
<head>
	<title>Jadwal Dokter RSU Asy Syifa Sambi</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="asset/css/select2.min.css">
	<link rel="stylesheet" type="text/css" href="asset/css/blog.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<style type="text/css">
		.card{
			border: #06274d solid 1px;
		}
		.card-header{
			background: #06274d;
			color: #ffffff;

		}
		.form-control{
			border-radius: 0px;
		}
		.select2{
			border-radius: 0px;
		}
	</style>
</head>
<body>
<div class="container">
	<header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
          <div class="col-4 pt-1">
            
          </div>
          <div class="col-4 text-center">
            <a class="blog-header-logo text-dark" href="#"><img src="asset/Header-2.jpg" style=" width: 100%;
  height: auto;"></a>
          </div>
          <div class="col-4 d-flex justify-content-end align-items-center">
            
          </div>
        </div>
      </header>

  <div class="row" style="margin-top: 20px;">
  	<!-- COLUMN 1 -->
    <div class="col">
      <div class="col-md-9">

			<div class="card">
			  <div class="card-header">
			   Pencarian Jadwal berdasar Dokter
			  </div>
			  <div class="card-body">
			  	<label>Pilih Dokter</label>
			    	<select class="form-control kd_dokter" id="kd_dokter">
			    		
			    	</select>

			      <footer style="margin-top: 15px;">
			      	<div class="btn-group">
			      	<button type="button" class="btn btn-info" id="c_jad">Lihat Jadwal</button><button type="button" class="btn btn-success" id="l_prof">Profil Dokter</button>
			      	</div>
			      </footer>
			  </div>
			</div>
		</div>
		<!-- END card -->
		<div class="col-md-9" style="margin-top: 10px;">
		<div class="card">
			  <div class="card-header">
			   Pencarian Jadwal berdasar Poli
			  </div>
			  <div class="card-body">
			  	<label>Pilih Poliklinik</label>

			    	<select class="form-control poli" id="poli">
			    		<option>---Pilih Poliklinik---</option>
			    		<?php
			  	$result = query("
					SELECT
					jadwal.kd_poli,poliklinik.nm_poli,
					DATE_FORMAT(jadwal.jam_mulai, '%H:%i') AS jam_mulai,
					DATE_FORMAT(jadwal.jam_selesai, '%H:%i') AS jam_selesai
					FROM
					jadwal,
					poliklinik,
					dokter
					WHERE
					jadwal.kd_poli = poliklinik.kd_poli
					AND
					(jadwal.kd_poli <> 'IGDK' AND jadwal.kd_poli <> 'U0009' AND jadwal.kd_poli <> '	
			U0013'  AND jadwal.kd_poli <> 'UMU')
					AND
					jadwal.kd_dokter = dokter.kd_dokter
					
					GROUP BY
					poliklinik.kd_poli
					");
					while($data = fetch_array($result)){ 
			  	?>
			  	<option value="<?php echo $data['kd_poli'];?>"><?php echo $data['nm_poli'];?></option>
			  	<?php }
			  	?>
			    	</select>
			    	<div id="loading"><img src="asset/loader.gif"></div>
			  	<label>Pilih Dokter</label>
			    	<select class="form-control" id="hari"></select>

			      <footer style="margin-top: 15px;">
			      	<button type="button" class="btn btn-info" id="c_jad_pol">Lihat Jadwal</button>
			      </footer>
			  </div>
			</div>
		</div>
		<!-- END card -->

    </div>
    <!-- COUMN 2 -->
    <div class="col">
     <div class="col-md-12" id="hasilnya">
			<div class="card">
			  <div class="card-header">
			   Hasil Pencarian
			  </div>
			  <div class="card-body">
			    	<div id="hasil"></div>
			  </div>
			</div>
		</div>
		<div  style="position:fixed;bottom:0;right:5%;
z-index: 999;">
			<?php 

		$sql_hitung = query("SELECT * FROM visitor");
 
		while($row = fetch_array($sql_hitung)){
			$jml_sekarang = $row['counts'];
			$jml_baru = $jml_sekarang + 1;
			$update_counts = query("UPDATE visitor SET counts='$jml_baru'");
		}
		?>
		
		  <div style="background:#5b9630; padding: 5px;"><i class="material-icons" style="font-size:16px;">people</i></div>
		  <div style="background:#ad230a;color: white; padding: 5px;"><b><?php echo $jml_baru;?></b></div>
		
		
    </div>
  </div>
	
		
		
		
		
<script  src="asset/jquery.js"></script>
<script src="asset/js/bootstrap.min.js"></script>
<script src="asset/select2.full.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		function formatData (data) {
        var $data = $(
           '<b>'+ data.text +'</b>'
        	);
       			 return $data;
    		};
    	$('.kd_dokter').select2({
	        placeholder: 'Pilih Dokter',
	        ajax: {
	          url: 'select-dokter.php',
	          dataType: 'json',
	          delay: 250,
	          processResults: function (data) {
	            return {
	              results: data
	            };
	          },
	          cache: true
	        },
	        templateResult: formatData,
	        minimumInputLength: 0
      	});
    	$("#loading").hide(); 
      	$('.poli').change(function(){
		    $("#hari").hide();
		    $("#loading").show(); 
      		var poli = $(".poli").val();
	        $.ajax({
	          type: "POST", 
	          url: "dokter.php", 
	          data: {poli : poli}, 
	          dataType: "json",
	          beforeSend: function(e) {
	            if(e && e.overrideMimeType) {
	              e.overrideMimeType("application/json;charset=UTF-8");
	            }
	          },
	          success: function(response){ 
	            $("#loading").hide(); 
	            $("#hari").html(response.data_kota).show();
	          },
	          error: function (xhr, ajaxOptions, thrownError) { 
	            alert(thrownError); 
	          }
	        });
      	});
		$("#c_jad").click(function(){
			var dok = $("#kd_dokter").val();
			$("#hasil").html("<img style='display: block;margin-left: auto; margin-right: auto;width: 50%;' src='asset/puls.gif'/><br> Memuat...");
			$.ajax({
				url: 'hasil.php',
		        method: 'post', 
		        data: {dok:dok},    
		        success:function(data){   
		          $('#hasil').html(data);  
        }
			});
		});

		$("#c_jad_pol").click(function(){
			var polo = $("#poli").val();
			var doki = $("#hari").val();
			$("#hasil").html("<img style='display: block;margin-left: auto; margin-right: auto;width: 50%;' src='asset/puls.gif'/><br> Memuat...");
			$.ajax({
				url: 'hasil2.php',
		        method: 'post', 
		        data: {polo:polo,doki:doki},    
		        success:function(data){   
		          $('#hasil').html(data);  
        }
			});
		});
	})
</script>
</body>
</html>