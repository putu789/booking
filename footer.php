
<div class="footer">
	<div class="container">
		&copy;<?php echo date("Y");?> - RSU Asy Syifa Sambi
	</div>
</div>
<style>
@import url(https://fonts.googleapis.com/css?family=Roboto);.whatsapp{font-family:Roboto,Arial,Sans-serif;font-size:14px;font-weight:400;right:5%;position:fixed;bottom:0;z-index: 999;}a{color:#fff;text-decoration:none;transition:ease-in-out .2s}a:hover{box-shadow:0 1px 4px rgba(0,0,0,.12),0 1px 3px rgba(0,0,0,.24);color:#fff}.icons{background:#25d366;border-radius:10px 10px 0 0;display:block;height:42px;margin-bottom:0px;width:150px}.icons:hover{background:#128c7e}.icons span{display:block;left:5px;top:5px;transform:translate(0,10px)}svg{border-radius:10px;display:block;fill:#fff;float:left;height:42px;margin-right:5px;-webkit-transition:ease-in-out .175s;transition:ease-in-out .175s;width:42px}
</style>
<div class="whatsapp">    
        <a class="icons" target="_blank" href="https://api.whatsapp.com/send?phone=+6285339010440&text=Hallo RSU Asy Syifa Sambi, Saya ingin bertanya?"><svg viewBox="0 0 800 800"><path d="M519 454c4 2 7 10-1 31-6 16-33 29-49 29-96 0-189-113-189-167 0-26 9-39 18-48 8-9 14-10 18-10h12c4 0 9 0 13 10l19 44c5 11-9 25-15 31-3 3-6 7-2 13 25 39 41 51 81 71 6 3 10 1 13-2l19-24c5-6 9-4 13-2zM401 200c-110 0-199 90-199 199 0 68 35 113 35 113l-20 74 76-20s42 32 108 32c110 0 199-89 199-199 0-111-89-199-199-199zm0-40c133 0 239 108 239 239 0 132-108 239-239 239-67 0-114-29-114-29l-127 33 34-124s-32-49-32-119c0-131 108-239 239-239z"/></svg><span>Bantuan ?</span></a>         
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
<script src="asset/bootstrap.min.js"></script>
<script src="datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script type="text/javascript" src="select2/dist/js/select2.full.min.js"></script>
<script type="text/javascript">
	function Show(id){
		$(".modal-footer").css({"padding":"19px 20px 20px","margin-top":"15px","text-align":"right","border-top":"1px solid #e5e5e5"});
		$(".modal-body").css("overflow-y","auto");

			$('#'+id).on('shown.bs.modal',function(){
			$("#"+id+">.modal-dialog>.modal-content>.modal-body").css("height","auto");
			h1=$("#"+id+">.modal-dialog").height();
			h2=$(window).height();
			h3=$("#"+id+">.modal-dialog>.modal-content>.modal-body").height();
			h4=h2-(h1-h3);		
			if($(window).width()>=768){
				if(h1>h2){
					$("#"+id+">.modal-dialog>.modal-content>.modal-body").height(h4);
				}
				$("#"+id+">.modal-dialog").css("margin","30px auto");
				$("#"+id+">.modal-dialog>.modal-content").css("border","1px solid rgba(0,0,0,0.2)");
				$("#"+id+">.modal-dialog>.modal-content").css("border-radius",6);				
				if($("#"+id+">.modal-dialog").height()+30>h2){
					$("#"+id+">.modal-dialog").css("margin-top","0px");
					$("#"+id+">.modal-dialog").css("margin-bottom","0px");
				}
			}
			else{
			
			$("#"+id+">.modal-dialog>.modal-content>.modal-body").height(h4);
			$("#"+id+">.modal-dialog").css("margin",0);
			$("#"+id+">.modal-dialog>.modal-content").css("border",0);
			$("#"+id+">.modal-dialog>.modal-content").css("border-radius",0);	
		}
		
			window.onresize=function(){
				$("#"+id+">.modal-dialog>.modal-content>.modal-body").css("height","auto");
				h1=$("#"+id+">.modal-dialog").height();
				h2=$(window).height();
				h3=$("#"+id+">.modal-dialog>.modal-content>.modal-body").height();
				h4=h2-(h1-h3);
				if($(window).width()>=768){
					if(h1>h2){
						$("#"+id+">.modal-dialog>.modal-content>.modal-body").height(h4);
					}
					$("#"+id+">.modal-dialog").css("margin","30px auto");
					$("#"+id+">.modal-dialog>.modal-content").css("border","1px solid rgba(0,0,0,0.2)");
					$("#"+id+">.modal-dialog>.modal-content").css("border-radius",6);				
					if($("#"+id+">.modal-dialog").height()+30>h2){
						$("#"+id+">.modal-dialog").css("margin-top","0px");
						$("#"+id+">.modal-dialog").css("margin-bottom","0px");
					}
				}
			else{
				
				$("#"+id+">.modal-dialog>.modal-content>.modal-body").height(h4);
				$("#"+id+">.modal-dialog").css("margin",0);
				$("#"+id+">.modal-dialog>.modal-content").css("border",0);
				$("#"+id+">.modal-dialog>.modal-content").css("border-radius",0);	
			}
		};
	});  
	
	$('#'+id).on('hide.bs.modal',function(){
		window.onresize=function(){};
	});  
	
	var y1=0;
	var y2=0;
	var div=$("#"+id+">.modal-dialog>.modal-content>.modal-body")[0];
	div.addEventListener("touchstart",function(event){
		y1=event.touches[0].clientY;
	});
	div.addEventListener("touchmove",function(event){
		event.preventDefault();
		y2=event.touches[0].clientY;
		var limite=div.scrollHeight-div.clientHeight;
		var diff=div.scrollTop+y1-y2;
		if(diff<0)diff=0;
		if(diff>limite)diff=limite;
		div.scrollTop=diff;
		y1=y2;
	});
	
	$('html, body').scrollTop(0);
	//Show
	$("#"+id).modal('show');
}

	$("#booking").click(function(){
		var url = '/booking/reg';
		 window.location = url;		
	});
	
	$("#dokter").click(function(){
		var urlDokter = '/booking/jadwal';
		 window.location = urlDokter;		
	});
	$("#manage").click(function(){
		$("#manageModal").modal('show');		
	});
	$("#card").click(function(){
		$("#cardModal").modal('show');		
	});
	$("#tataCara").click(function(){
		var info = 'info';
		$.ajax({
			type : 'POST',
			url : 'info.php',
			data :{info : info},
			success:function(data){
				Show("info");
				$("#bodyInfo").html(data);
			}
		});
			
	});
	$("#queueBtn").click(function(){
		var queue = 'queue';
		$.ajax({
			type : 'POST',
			url : 'queue.php',
			data :{queue : queue},
			success:function(data){
				Show("queue");
				$("#bod").html(data);
			}
		});	
	});
	
</script>

<div class="modal fade" id="manageModal" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="titleModal">Manage Booking</h4>
      </div>
      <div class="modal-body">
        <div class="form-inline">
		  <div class="form-group">
		    <input type="text" class="form-control" id="noRm" placeholder="Nomor Rekam Medis">
		  </div>
		  <div class="form-group">
		    <input type="text" class="form-control" id="tglPeriksa" placeholder="Tanggal periksa">
		  </div>
		  <div class="form-group">
		  	<select class="form-control dokterDaftar" id="dokterDaftar" style="width: 100%;">
			</select>
		  </div>
		  <button type="button" id="cariManage" class="btn btn-success">Cari</button>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
	function formatData (data) {
        var $data = $(
           '<b>'+ data.text +'</b>'
        	);
       			 return $data;
    		};
	$('.dokterDaftar').select2({
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
	$('#tglPeriksa').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true,
        toggleActive: true,
        startDate: '+1d',
        }).on('changeDate', function (ev) {
        $('#tglPeriksa').change();
    }); 
	$("#cariManage").click(function(){
		var noRm = $("#noRm").val();
		var tglPeriksa = $("#tglPeriksa").val();
		var dokterDaftar = $("#dokterDaftar").val();
		$.ajax({
			type: "POST",
			url : "cek-manage.php",
			data : {noRm : noRm, tglPeriksa:tglPeriksa, dokterDaftar:dokterDaftar},
			success:function(data){
				$("#manageModal").modal('hide');
				Show("manageModalHasil");
				$("#hasManage").html(data);
			}
		});
	});
    	 
</script>
<div class="modal fade" id="manageModalHasil" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="titleModal">Manage Booking</h4>
      </div>
      <div class="modal-body">
      	<div id="hasManage"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalSukses"  role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="titleModal">Manage Booking</h4>
			</div>
			<div class="modal-body">
				<div id="statusBatal"></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="cardModal" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="titleModal">Kartu Pasien Elektronik</h4>
      </div>
      <div class="modal-body">
        <div class="form-inline">
		  <div class="form-group">
		    <input type="text" class="form-control" id="noRme" placeholder="Nomor Rekam Medis">
		  </div>
		  <div class="form-group">
		    <input type="text" class="form-control" id="tglLahir" autocomplete="off" placeholder="Tanggal Lahir">
		  </div>
		  <button type="button" id="cetakKartu" class="btn btn-success">Cetak</button>
		  <div id="loadCard"><img src="asset/loader.gif"> Mencari ...</div>
		</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div> -->
<script type="text/javascript">
$(document).ready(function(){
	$("#loadCard").hide();
	$('#tglLahir').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true,
        toggleActive: true,
        })

	$("#cetakKartu").click(function(){
		$("#loadCard").show();
		var noRme = $("#noRme").val();
		var tglLahir = $("#tglLahir").val();
		var urlcard = '/booking/e-card.php';
		$.ajax({
			type : 'POST',
			url : 'e-card.php?noRme='+noRme+'&lahir='+tglLahir+'',
			data :{noRme : noRme, tglLahir:tglLahir},
			
			success:function(data){
				$("#loadCard").hide();
				var base64Image = data;
				$("#cardModal").modal('hide');
				Show("cardHasil");
				$("#hasCard").html(data);
      		}
		});
		
		
	});
});




    	 
</script>
<div class="modal fade" id="cardHasil"  role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="titleModal">Kartu Pasien</h4>
      </div>
      <div class="modal-body">
      	<div class="gfg">
      		<div id="hasCard" style="height: auto; width:100%; overflow:hidden;"></div>
      	</div>
      	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="info"  role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="titleModal">Tata Cara Penggunaan Aplikasi BOM (Booking Online Mandiri) RSU Asy Syifa Sambi</h4>
      </div>
      <div class="modal-body">
      		<div id="bodyInfo"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div> 

<div class="modal fade"  id="queue" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Antrian Dokter Hari Ini <?php echo date("d-m-Y");?></h4>
      </div>
      <div class="modal-body" id="bod">
        <p>One fine body&hellip;</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



</body>
</html>