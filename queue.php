<?php $queue = $_POST['queue'];?>
<div class="form-inline">
	<div class="form-group" style="width: 100%; margin-bottom: 5px;">
		<select class="form-control dokterAntri" id="dokterAntri" style="width: 100%;">
		</select>
	</div>
	<button type="button" id="cekAntrian" class="btn btn-block btn-success">Cek Antrian</button>
</div>
<div id="antriHasil"></div>
<script type="text/javascript">
	function formatData (data) {
        var $data = $(
           '<b>'+ data.text +'</b>'
        	);
       			 return $data;
    		};
	$('.dokterAntri').select2({
	        placeholder: 'Pilih Dokter',
	        ajax: {
	          url: 'select-dokter-today.php',
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
	$("#cekAntrian").click(function(){
		var dokterAntri = $("#dokterAntri").val();
		$("#antriHasil").html("<img src='asset/loader.gif'/> Mengecek Daftar Antrian..");
		$.ajax({
			type :"POST",
			url	 : "listQueue.php",
			data : {dokterAntri:dokterAntri},
			success:function(data){
				$("#antriHasil").html(data);
			}
		});
	});
</script> 