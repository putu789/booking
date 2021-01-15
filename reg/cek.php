<?php 

include('header.php');
include ('db_connect.php');
$tgle       = date('Y-m-d', strtotime('+1 days'));
$tentukan_hari=date('D',strtotime($tgle));
		 $day = array(
			'Sun' => 'AKHAD',
			'Mon' => 'SENIN',
			'Tue' => 'SELASA',
			'Wed' => 'RABU',
			'Thu' => 'KAMIS',
			'Fri' => 'JUMAT',
			'Sat' => 'SABTU'
			);
$hari=$day[$tentukan_hari];
?>
<title>Booking periksa RSU Asysyifa Sambi - Cek No Rekam Medis</title>


<style type="text/css">
#divs .div {
    display:none;
}
.alert-danger{
    padding : 5px;
    border-radius: 2px;
}
  #register_form fieldset:not(:first-of-type) {
    display: none;
  }
  .cont {
  display: inline;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 16px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default radio button */
.cont input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

/* Create a custom radio button */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
  border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.cont:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.cont input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the indicator (dot/circle) when checked */
.cont input:checked ~ .checkmark:after {
  display: block;
}

/* Style the indicator (dot/circle) */
.cont .checkmark:after {
 	top: 9px;
	left: 9px;
	width: 8px;
	height: 8px;
	border-radius: 50%;
	background: white;
}
.kotak {
		border: 1px solid #aeb5b0;
		padding : 30px;
	}
.btn-outline {
  color: #4fbfa8;
  background-color: #ffffff;
  border-color: #4fbfa8;
  font-weight: bold;
  letter-spacing: 0.05em;
}

.btn-outline {
  color: #4fbfa8;
  background-color: #ffffff;
  border-color: #4fbfa8;
  font-weight: bold;
  border-radius: 0;
}

.btn-outline:hover,
.btn-outline:active,
.btn-outline:focus,
.btn-outline.active {
  background: #4fbfa8;
  color: #ffffff;
  border-color: #4fbfa8;
  
}


.btn-colour-1 {
  color: #fff;
  background-color: #60cc7d;
  border-color: #75d18e;
  font-weight: bold;
  letter-spacing: 0.05em;
  border-radius: 0;
}

.btn-colour-1:hover,
.btn-colour-1:active,
.btn-colour-1:focus,
.btn-colour-1.active {
  /* let's darken #004E64 a bit for hover effect */
  background: #60d17f;
  color: #ffffff;
  border-color: #75d18e;
}
h3{
	font-size : 16px;
	text-transform : UPPERCASE;
	color : #189e42;
}
h2{
	text-transform : UPPERCASE;
	font-size : 20px;
	color :#c4213d;
}
.has-error
  {
   border-color:#cc0000;
   background-color:#ffff99;
  }
  
</style>
<?php include('container.php');?>

<div class="container">
  <div class="kotak">
	<h2><img src="asset/Icon.ico" style="width:100px; height:100px;"/>  Booking periksa RSU Asysyifa Sambi - Cek No Rekam Medis</h2>
	
		
	<form id="register_form" novalidate action="form_action.php"   name="pilihan" action="" method="POST"  >
	<fieldset>
	<h3>Cek No rekam medis</h3>
        <div class="col-md-12"><div class="alert alert-info">Masukan tanggal lahir anda dan NIK  anda kemudian tekan tombol cari
        </div></div>
        <div class="col-md-5">
          <div class="form-group">
          <label for="first_name">Tanggal Lahir</label>
          <input type="text" autocomplete="off" class="form-control lahirmu" id="tanggalan" name="tanggal_lahir"  placeholder="Tanggal Lahir">
  	       </div> 
           </div> 
       <div class="col-md-5">
          <div class="form-group">
          <label for="first_name">NIK (Nomor Induk Kependudukan)</label>
          <input type="text" auto-complete="off" class="form-control" name="nik" id="nik"  placeholder="Nomor Induk kependudukan">
        </div> 
        </div>
        <br>

        <div class="col-md-5">
          <input type="button" class="btn btn-info" id="btn-cek" value="cari">
        </div>
        <div class="col-md-12" style="margin-top: 20px;">
         <div id="sile"></div>
      </div>
    
	</fieldset>
	</form>
	</div>
	
</div>	
<?php include('footer.php');?> 
<script type="text/javascript">
	 function cari(){

         var lahirmu=$(".lahirmu").val();
         var nik=$("#nik").val();
         if (lahirmu== "") {
          $('.lahirmu').addClass('has-error');
          
        }else if (nik=="") {
          $('#nik').addClass('has-error');
        }
          if(nik!="" && lahirmu!=""){
              $("#sile").html("<img src='asset/loader.gif'/>");
                $.ajax({
                    type:"post",
                    url:"cek-rm.php",
                    data:{lahirmu: lahirmu, nik: nik},
                    success:function(data){
                            $("#sile").html(data);
                            $('#nik').removeClass('has-error');
                            $('.lahire').removeClass('has-error');
                          }
                      });
          }                                    
      }

      $("#btn-cek").click(function(){
          cari();
      });

      $('#nik').keyup(function(e) {
          if(e.keyCode == 13) {
             cari();
          }
      });
</script>

