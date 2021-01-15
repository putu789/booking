<div class="insert-post-ads1" style="margin-top:20px;">

</div>
</div>
<style>
@import url(https://fonts.googleapis.com/css?family=Roboto);.whatsapp{font-family:Roboto,Arial,Sans-serif;font-size:14px;font-weight:400;right:5%;position:fixed;bottom:0;z-index: 999;}a{color:#fff;text-decoration:none;transition:ease-in-out .2s}a:hover{box-shadow:0 1px 4px rgba(0,0,0,.12),0 1px 3px rgba(0,0,0,.24);color:#fff}.icons{background:#25d366;border-radius:10px 10px 0 0;display:block;height:42px;margin-bottom:0px;width:150px}.icons:hover{background:#128c7e}.icons span{display:block;left:5px;top:5px;transform:translate(0,10px)}svg{border-radius:10px;display:block;fill:#fff;float:left;height:42px;margin-right:5px;-webkit-transition:ease-in-out .175s;transition:ease-in-out .175s;width:42px}
</style>
<div class="whatsapp">    
        <a class="icons" target="_blank" href="https://api.whatsapp.com/send?phone=+6285339010440&text=Hallo RSU Asy Syifa Sambi, Saya ingin bertanya?"><svg viewBox="0 0 800 800"><path d="M519 454c4 2 7 10-1 31-6 16-33 29-49 29-96 0-189-113-189-167 0-26 9-39 18-48 8-9 14-10 18-10h12c4 0 9 0 13 10l19 44c5 11-9 25-15 31-3 3-6 7-2 13 25 39 41 51 81 71 6 3 10 1 13-2l19-24c5-6 9-4 13-2zM401 200c-110 0-199 90-199 199 0 68 35 113 35 113l-20 74 76-20s42 32 108 32c110 0 199-89 199-199 0-111-89-199-199-199zm0-40c133 0 239 108 239 239 0 132-108 239-239 239-67 0-114-29-114-29l-127 33 34-124s-32-49-32-119c0-131 108-239 239-239z"/></svg><span>Bantuan ?</span></a>         
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="../datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script type="text/javascript" src="../script/form.js"></script>
<script type="text/javascript" src="../script/print.min.js"></script>
<script type="text/javascript" src="../select2/dist/js/select2.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>


<script>
$(window).load(function(){
    var hop = $("#hop").val();
    swal({
      type : 'info',
	   allowOutsideClick: false,
      html : '<style>p{ font-size:16px;}</style><p>'+hop+'</p>'});
  });

$('#tanggalan').datepicker({
    format: "yyyy-mm-dd",
    autoclose: true,
    toggleActive: true,
    todayHighlight: true 
});

$('#lahirmu').datepicker({
    format: "yyyy-mm-dd",
    autoclose: true,
    toggleActive: true,
    todayHighlight: true 
});
function formatData (data) {
        var $data = $(
            '<b>'+ data.id +'</b> - <i>'+ data.text +'</i>'
        );
        return $data;
    };
 
</script>
</body></html>

