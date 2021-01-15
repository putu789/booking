$(document).ready(function(){
        var selValue = $('input[name=lama_baru]:checked').val();
        var tgl = $('#tgl_per').val();

        var pol = $('#kd_poli').val();
        var exploded = pol.split('|');
        var hasil0 =exploded[1];
        var hasil1 =exploded[1];

        var dok = $("#dokter").val();
        var ter = dok.split("|");
        var dok1 = ter[0];
        var dok2 = ter[1];

        var silpa = $('#sil').val();
        var pisah = silpa.split('|');
        var pisah0 =pisah[0];
        var pisah1 =pisah[1];
        var pisah2 =pisah[2];
        var pisah3 =pisah[3];
        var pisah4 =pisah[4];
        var sebut ='';
        if (pisah2 == 'L'){
            sebut = 'Laki - Laki';
        }else{
            sebut = 'Perempuan';
        }

        var bay = $("#getFname").val();
        var ar = bay.split('|');
        var jen = ar[0];
        var jen1 = ar[1];

        var jen_k = $("#kelamin").val();
        var pas = $("#sil").val();
        var ien = pas.split("|");
        var pas1 = ien[0];
        var pas2 = ien[1];

    $("#loading").hide();
      

      $('#tgl_per').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true,
        toggleActive: true,
        daysOfWeekDisabled: [0],
        startDate: '+1d',
        endDate: '+1m',
        datesDisabled: ["2020-10-29","2020-12-25"]
        }).on('changeDate', function (ev) {
        $('#tgl_per').change();
        });

      $('#tgl_per').change(function () {
         var tgle_bos =  $('#tgl_per').val();
          $.ajax({
          type: "POST", 
          url: "poliklinik.php", 
          data: {koi : tgle_bos}, 
          dataType: "json",
          beforeSend: function(e) {
            if(e && e.overrideMimeType) {
              e.overrideMimeType("application/json;charset=UTF-8");
            }
          },
          success: function(response){ 
            $("#loading").hide(); 
            $("#kd_poli").html(response.data_poli).show();
          },
          error: function (xhr, ajaxOptions, thrownError) { 
            alert(thrownError); 
          }
        });
    });
   
     
    $("#kd_poli").change(function(){ 
    $("#dokter").hide();
    $("#loading").show(); 
    var str = $("#kd_poli").val();
    var res = str.split("|");
    var pol = res[0];
    var pol1 = res[1];
    var tgle_bos =  $('#tgl_per').val();
  
    $.ajax({
      type: "POST", 
      url: "dokter.php", 
      data: {poliklinik : pol, koi:tgle_bos}, 
      dataType: "json",
      beforeSend: function(e) {
        if(e && e.overrideMimeType) {
          e.overrideMimeType("application/json;charset=UTF-8");
        }
      },
      success: function(response){ 
        $("#loading").hide(); 
        $("#dokter").html(response.data_kota).show();
      },
      error: function (xhr, ajaxOptions, thrownError) { 
        alert(thrownError); 
      }
    });
    });


                 
      function search(){

         var tgl_lahir=$(".tgl_lahir").val();
         var no_rm=$("#no_rm").val();
         var no_hp=$("#no_hp").val();
         if (no_rm== "") {
          $('.tgl_lahir').addClass('has-error');
          
        }else if (tgl_lahir=="") {
          $('#no_rm').addClass('has-error');
        }
        else if (no_hp ==""){
          $('#no_hp').addClass('has-error');
        }
          if(no_rm!="" && tgl_lahir!="" && no_hp!=""){
              $("#result").html("<img src='../asset/loader.gif'/>");
                $.ajax({
                    type:"post",
                    url:"search.php",
                    data:{tgl_lahir: tgl_lahir, no_rm: no_rm},
                    success:function(data){
                      $("#sil").val($.trim(data));
                       $.ajax({
                          type:"post",
                          url:"booking.php",
                          data:{tgl_lahir: tgl_lahir, no_rm: no_rm,no_hp:no_hp},
                          success:function(data){
                            $("#result").html(data);
                            $('#no_rm').removeClass('has-error');
                            $('.tgl_lahir').removeClass('has-error');
                            $('#no_hp').removeClass('has-error');
                            $("#labur_eror").attr('hidden',true);
                          }
                      });
                    }
                });
          }                                    
      }

      $("#btn-cari").click(function(){
          search();
      });

      $('#no_rm').keyup(function(e) {
          if(e.keyCode == 13) {
             search();
          }
      });
      
   $("form").on("#konfirmasi", function(event){
        var formData = $(this).serialize().split("&");
        console.log("You entered:");

        $.each(formData, function(index, value){
          value = value.split("=");
          console.log(value[0] + ": " + value[1]);
        })
        event.preventDefault();
      })

  $(function() {
    var $divs = $('#divs > .div');
    $divs.first().show()
    $('input[type=radio]').on('change',function() {
            $divs.hide();
            $divs.eq( $('input[type=radio]').index( this ) ).show();
     });
  });
  $('#poli_error').removeAttr("style").hide();
  $('#dokter_error').removeAttr("style").hide();
  $('#err_bayar').removeAttr("style").hide();
  $('#lahir_err').removeAttr("style").hide();
  $('#nama_err').removeAttr("style").hide();
  $('#ktp_err').removeAttr("style").hide();
  $('#jenkel_err').removeAttr("style").hide();
  $('#alamat_err').removeAttr("style").hide();
  $('#tgl_error').removeAttr("style").hide();
  var form_count = 1, previous_form, next_form, total_forms;
  total_forms = $("fieldset").length;  
 /* $(".next-form").click(function(){
    previous_form = $(this).parent();
    next_form = $(this).parent().next();
    next_form.show();
    previous_form.hide();
    setProgressBarValue(++form_count);
  });  */
  $(".previous-form").click(function(){
    previous_form = $(this).parent();
    next_form = $(this).parent().prev();
    next_form.show();
    previous_form.hide();
    setProgressBarValue(--form_count);
  });
  setProgressBarValue(form_count);  
  function setProgressBarValue(value){
    var percent = parseFloat(100 / total_forms) * value;
    percent = percent.toFixed();
    $(".progress-bar")
      .css("width",percent+"%")
      .html(percent+"%");   
  } 
  $('#start').click(function(){
    previous_form = $(this).parent();
    next_form = $(this).parent().next();
    next_form.show();
    previous_form.hide();
    setProgressBarValue(++form_count);
  });
  $('#data-dasar').click(function(){
    var tgl = $('#tgl_per').val();
    var dok = $("#dokter").val();
    var ter = dok.split("|");
    var dok1 = ter[0];
  var tanggal_error = '';
  var error_poli = '';
  var tgl_error = '';
  var error_dokter = '';
  var kd_pj_err = '';

   
  var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  if($.trim($('#tgl_per').val()).length == 0 )
  {
    tgl_error = 'Pilih Tanggal Periksa';
   $('#tgl_error').text(tgl_error);
   $('#tgl_error').removeAttr("style").show();
   $('#tgl_per').addClass('has-error');
   
  }else if($.trim($('#kd_poli').val()).length == 0 ){
    error_poli = 'Pilih Poliklinik';
   $('#poli_error').text(error_poli);
   $('#poli_error').removeAttr("style").show();
   $('#kd_poli').addClass('has-error');
    
  }else if($.trim($('#dokter').val()).length == 0 ){
    error_dokter = 'Pilih Dokter';
   $('#dokter_error').text(error_dokter);
   $('#dokter_error').removeAttr("style").show();
   $('#dokter').addClass('has-error');
    
 }else if($.trim($('#getFname').val()).length == 0 ){
  kd_pj_err = 'Pilih jenis bayar';
   $('#err_bayar').text(kd_pj_err);
   $('#err_bayar').removeAttr("style").show();
   $('#getFname').addClass('has-error');
    
 }
  else
  {
    error_poli = '';
    error_dokter = '';
    kd_pj_err = '';
    tgl_error = '';
   $('#poli_error').text(error_poli);
   $('#poli_error').removeAttr("style").show();
   $('#kd_poli').removeClass('has-error');

   $('#dokter_error').text(error_dokter);
   $('#dokter_error').removeAttr("style").show();
   $('#dokter').removeClass('has-error');

   $('#err_bayar').text(kd_pj_err);
   $('#err_bayar').removeAttr("style").show();
   $('#getFname').removeClass('has-error');

   $('#tgl_error').text(tgl_error);
   $('#tgl_error').removeAttr("style").show();
   $('#tgl_per').removeClass('has-error');

  }
 
  if(error_poli != '' || error_dokter != '' || kd_pj_err != '' || tgl_error !='')
  {
    return false;
   
  }
  
  else{
                     /* $('#poli_error').removeAttr("style").hide();
                        $('#dokter_error').removeAttr("style").hide();
                         $('#err_bayar').removeAttr("style").hide();*/
  /*  $.ajax({        
                    type:"post",
                    url:"kuota.php",
                    data:{tgl: tgl, dok1:dok1},
                    success:function(data){
                      if (data == true) {
                         $("#dokter-penuh").html(data);
                         $('#poli_error').removeAttr("style").hide();
                        $('#dokter_error').removeAttr("style").hide();
                         $('#err_bayar').removeAttr("style").hide();
                       }
                       else{*/
                        $('#poli_error').removeAttr("style").hide();
                        $('#dokter_error').removeAttr("style").hide();
                        $('#err_bayar').removeAttr("style").hide();
                        $('#tgl_error').removeAttr("style").hide();
                        previous_form = $(this).parent();
                        next_form = $(this).parent().next();
                        next_form.show();
                        previous_form.hide();
                        setProgressBarValue(++form_count);
                  /*    }*/
                   /* }*/
                /*});*/
   
  }

 

});

   
  $('#konfirmasi').click(function() {
         var selValue = $('input[name=lama_baru]:checked').val();
        var tgl = $('#tgl_per').val();
        var pol = $('#kd_poli').val();
        var no_hp = $('#no_hp').val();
        var exploded = pol.split('|');
        var hasil0 =exploded[1];
        var hasil1 =exploded[1];

        var dok = $("#dokter").val();
        var ter = dok.split("|");
        var dok1 = ter[0];
        var dok2 = ter[1];

        var silpa = $('#sil').val();
        var pisah = silpa.split('|');
        var pisah0 =pisah[0];
        var pisah1 =pisah[1];
        var pisah2 =pisah[2];
        var pisah3 =pisah[3];
        var pisah4 =pisah[4];
        var sebut ='';
        if (pisah2 == 'L'){
            sebut = 'Laki - Laki';
        }else{
            sebut = 'Perempuan';
        }

        var bay = $("#getFname").val();
        var ar = bay.split('|');
        var jen = ar[0];
        var jen1 = ar[1];

        var pas = $("#sil").val();
        var ien = pas.split("|");
        var pas1 = ien[0];
        var pas2 = ien[1];
        /*if (selValue == 'lama'){*/
          var eror_konf = '';
          var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
          if($.trim($('#sil').val()).length == 0){
           eror_konf = 'Data Pasien Tidak Valid';
           $('#labur_eror').text(eror_konf);
           $('#labur_eror').removeAttr("style").show();
           $('#no_rm').addClass('has-error');
          }else{
            eror_konf = '';
           $('#labur_eror').text(eror_konf);
           $('#labur_eror').removeAttr("style").show();
           $('#no_rm').removeClass('has-error');
          }
         
          if(eror_konf != '' ){
           return false;
          }else{
            $('#labur_eror').removeAttr("style").hide();
            previous_form = $(this).parent();
            next_form = $(this).parent().next();
            next_form.show();
            previous_form.hide();
            setProgressBarValue(++form_count);
            $('#pol_rev').text(hasil1);
            $('#dok_tuj').text(dok2);
            $('#jeneng').text(pas2);
            $('#tugel').text(tgl);
            $('#jenis_bayar').text(jen1);
            $('#jk').text(sebut);
            $('#almate').text(pisah3);/*
            $('#notelp').text(pisah4);*/
            $('#notelp').text(no_hp);
            
          } /*
        }*/
         /* else if (selValue == 'baru'){
            var lahir_error = '';
            var nm_pasien = '';
            var identity = '';
            var jkelmain = '';
            var alamatmu = '';
            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if($.trim($('#lahirmu').val()).length == 0 )
            {
             lahir_error = 'Tanggal Lahir Tidak Boleh kosong';
             $('#lahir_err').text(lahir_error);
             $('#lahir_err').removeAttr("style").show();
             $('#lahirmu').addClass('has-error');
            }else if($.trim($('#nama_pasien').val()).length == 0 ){
              nm_pasien = 'Nama Pasien Tidak Boleh kosong';
             $('#nama_err').text(nm_pasien);
             $('#nama_err').removeAttr("style").show();
             $('#nama_pasien').addClass('has-error');
            }else if($.trim($('#ident').val()).length == 0 ){
              identity = 'Nomor Identitas Tidak Bole Kosong';
             $('#ktp_err').text(identity);
             $('#ktp_err').removeAttr("style").show();
             $('#ident').addClass('has-error');
            }
            else if($.trim($('#jkelmain').val()).length == 0 ){
              jkelmain = 'Jenis Kelamin Tidak Boleh Kosong';
             $('#jenkel_err').text(jkelmain);
             $('#jenkel_err').removeAttr("style").show();
             $('#jkelmain').addClass('has-error');
            }else if($.trim($('#alamat').val()).length == 0 ){
              alamatmu = 'Alamat Tidak Boleh Kosong';
             $('#alamat_err').text(alamatmu);
             $('#alamat_err').removeAttr("style").show();
             $('#alamat').addClass('has-error');
            }
            else
            {
              lahir_error= '';
              nm_pasien= '';
              identity= '';
              jkelmain= '';
              alamatmu= '';
             $('#lahir_err').text(lahir_error);
             $('#lahir_err').removeAttr("style").show();
             $('#lahirmu').removeClass('has-error');

             $('#nama_err').text(nm_pasien);
             $('#nama_err').removeAttr("style").show();
             $('#nama_pasien').removeClass('has-error');

             $('#ktp_err').text(identity);
             $('#ktp_err').removeAttr("style").show();
             $('#ident').removeClass('has-error');

             $('#jenkel_err').text(jkelmain);
             $('#jenkel_err').removeAttr("style").show();
             $('#jkelmain').removeClass('has-error');

             $('#alamat_err').text(alamatmu);
             $('#alamat_err').removeAttr("style").show();
             $('#alamat').removeClass('has-error');

            }
           
            if(lahir_error != '' )
            {
              return false;
            }
            else if (nm_pasien != '') {
                return false;
            }else if (identity != '') {
                return false;
            }else if (jkelmain != '') {
                return false;
            }else if (alamatmu != '') {
                return false;
            }
            else{
              $('#lahir_err').removeAttr("style").hide();
              $('#nama_err').removeAttr("style").hide();
              $('#ktp_err').removeAttr("style").hide();
              $('#jenkel_err').removeAttr("style").hide();
              $('#alamat_err').removeAttr("style").hide();
              previous_form = $(this).parent();
              next_form = $(this).parent().next();
              next_form.show();
              previous_form.hide();
              var lahirmu = $('#lahirmu').val();
              var nama_pasien = $('#nama_pasien').val();
              var ident = $('#ident').val();
              var jkelmain = $('#jkelmain').val();
              var alamat = $('#alamat').val();
              var no_telp = $('#no_telp').val();
              setProgressBarValue(++form_count);
              $('#pol_rev').text(hasil1);
              $('#dok_tuj').text(dok2);
              $('#jeneng').text(nama_pasien);
              $('#tugel').text(tgl);
              $('#jenis_bayar').text(jen1);
              $('#jk').text(jkelmain);
              $('#almate').text(alamat);
              $('#notelp').text(no_telp);
              }
            }
      });
 */
      $("#submitt").click(function(){
        /*var selValue = $('input[name=lama_baru]:checked').val();*/
        var tgl = $('#tgl_per').val();
        var lahirmu = $('#lahirmu').val();
        var nama_pasien = $('#nama_pasien').val();
        var ident = $('#ident').val();
        var jkelmain = $('#jkelmain').val();
        var alamat = $('#alamat').val();
        var no_hp = $('#no_hp').val();

        var pol = $('#kd_poli').val();
        var exploded = pol.split('|');
        var hasil0 =exploded[0];
        var hasil1 =exploded[1];

        var dok = $("#dokter").val();
        var ter = dok.split("|");
        var dok1 = ter[0];
        var dok2 = ter[1];

        var silpa = $('#sil').val();
        var pisah = silpa.split('|');
        var pisah0 =pisah[0];
        var pisah1 =pisah[1];
        var pisah2 =pisah[2];
        var pisah3 =pisah[3];
        var pisah4 =pisah[4];
        var sebut ='';
        if (pisah2 == 'L'){
            sebut = 'Laki - Laki';
        }else{
            sebut = 'Perempuan';
        }
        var kd_prop = $("#kd_prop").val();
        var kd_kab = $("#kd_kab").val();
        var kd_kec=$("#kd_kec").val();
        var kd_kel = $("#kd_kel").val();

        var bay = $("#getFname").val();
        var ar = bay.split('|');
        var jen = ar[0];
        var jen1 = ar[1];

        var jen_k = $("#kelamin").val();
        var pas = $("#sil").val();
        var ien = pas.split("|");
        var pas1 = ien[0];
        var pas2 = ien[1];
        var not = '';
        if (hasil0 == 'U0002') {
          not ='<p>Untuk Spesialis Anak pada hari Rabu dan Jumat didahulukan pemeriksaan pasien bayi (Imunisasi). Mohon maaf atas ketidak nyamanannya.</p>';
        } else{
          not ='';
        }
        /*if (selValue == 'lama'){*/
          $("#sukses").html("<img src='../asset/loader.gif'/>");
                $.ajax({
                    type:"post",
                    url:"save.php",
                    data:{tgl: tgl, hasil0: hasil0,dok1:dok1,pisah0:pisah0,jen:jen,pisah1:pisah1,dok2:dok2,pisah1:pisah1, no_hp:no_hp,not:not},
                    success:function(data){
                      $("#sukses").html(data);
                      $("#back-fish").hide();
                      $('#submitt').hide();
                      swal({
                        type : 'success',
                        showCloseButton: true,
                         html:
                        ' <style>p{font-size:12px;}</style>' +
                        '<p >Anda sudah mencapai tahap akhir</p> ' +
                        '<p>Pada tanggal <b>'+tgl+'</b></p> <p>Poli :  <b>'+hasil1+'</b></p> <p>Dokter : <b>'+dok2+'</b></p>'+not+''+
                  
                        '<p style="color: red;">Pastikan setelah anda menutup notifikasi ini anda melihat kode booking dan tidak ada pesan gagal.</p> '
                      });
                    }
                });
              });
      });
});
