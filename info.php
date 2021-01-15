<?php $info = $_POST['info'];?>
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-info">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#Book" aria-expanded="false" aria-controls="collapseOne">
          Menu Booking Periksa
        </a>
      </h4>
    </div>
    <div id="Book" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
      	<h4>Menu Booking Periksa digunakan untuk melakukan booking (reservasi) pendaftaran pasien periksa</h4>
      	<p><b>Booking dapat dilakukan pasien secepat-cepatnya H-30 dan selambat-lambatnya H-1 sebelum periksa.</b></p>
      	<p>Berikut ini tata cara booking mandiri :</p>
      	<p>1. Pilih Menu Booking Online dengan cara <b>Klik</b> gambar Booking Online. Seperti gambar dibawah ini</p>
        <img src="asset/1.png" class="img-responsive" alt="daftar online asyifa">
        <p>2. Lalu muncul halaman alur booking periksa. kemudian tekan tombol lanjut</p>
        <img src="asset/2.png" class="img-responsive" alt="daftar online asyifa">
        <p>3. Kemudian isikan data Tanggal periksa (wajib), Dokter yang dituju (wajib), cara pembayaran (wajib). Untuk jenis bayar <b>BPJS PBI (BPJS bantuan dari pemerintah) dan untuk BPJS NON PBI (BPJS Mandiri)</b> . Setelah semua terisi <b>tekan</b> tombol lanjut. berikut ini visualisasi halaman </p>
        <img src="asset/3.png" class="img-responsive" alt="daftar online asyifa">
        <p>4. Setelah itu isikan detail diri anda, Masukan Nomor Rekam Medis (Wajib) berjumlah 6(enam) Digit Angka, Tanggal Lahir (wajib dan Nomor Telepon yang aktif (wajib). setelah semua data terisi tekan tombol cari untuk mencari data anda apakah sudah tersimpan di database kami. setelah data anda muncul kemudian lanjutkan dengan meng Klik tombol Lanjut. berikut ini visualisasi halaman pencarian data anda :</p>
        <img src="asset/4.png" class="img-responsive" alt="daftar online asyifa">
        <p>5. Setelah tahap 4 selesai, maka akan muncul halaman Konfirmasi. Cek apakah data yang anda masukan sudah benar, jika data yang anda masukan silahkan tekan tombol submit. berikut visualisasi halaman konfirmasi :</p>
        <img src="asset/5.png" class="img-responsive" alt="daftar online asyifa">
        <p>6. Setelah anda mengkonfirmasi halaman konfirmasi , maka anda sudah selesai melakukan booking online dengan ditandai dengan anda melihat <b>Kode Booking </b> dan <b>No antrian</b>. Apabila anda tidak melihat Kode booking maupun no antrian atau anda mendapat pesan gagal(gagal disebabkan berbagai faktor) maka dapat disimpulkan anda belum berhasil melakukan booking online .  berikut visualisasi halaman selesai :</p>
        <img src="asset/7.png" class="img-responsive" alt="daftar online asyifa">
      </div>
    </div>
  </div>
  <div class="panel panel-success">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#jdwalDokter" aria-expanded="false" aria-controls="collapseTwo">
          Menu Jadwal Dokter
        </a>
      </h4>
    </div>
    <div id="jdwalDokter" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
       <p>Menu Jadwal Dokter digunakan untuk melihat jadwal praktek dokter spesialis RSU Asy Syifa Sambi</p>
       <p>1. Pilih menu jadwal dokter . berikut visualisasi : </p>
        <img src="asset/dok.png" class="img-responsive" alt="daftar online asyifa">
        <p>2. Kemudian anda akan melihat halaman jadwal dokter. silahkan pilih metode untuk melihat jadwal dokter. Hasil pengecekan anda akan terlihat di kolom hasil pencarian. Berikut ini visualisasi : </p>
         <img src="asset/jadwal.png" class="img-responsive" alt="daftar online asyifa">
      </div>
    </div>
  </div>
  <div class="panel panel-warning">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#manageBooking" aria-expanded="false" aria-controls="collapseThree">
          Menu Manage Booking
        </a>
      </h4>
    </div>
    <div id="manageBooking" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">
        <h4>Pada Menu Manage booking digunakan untuk mengecek detail booking dan membatalkan booking</h4>
        <p>1. Pilih Menu manage booking seperti gambar berikut :</p>
        <img src="asset/m_book.png" class="img-responsive" alt="daftar online asyifa">
        <p>2. Setelah anda memilih menu tersebut , maka akan menampilkan halaman detail booking anda. terdapat tombol <b>Batalkan Periksa</b> untuk membatalkan periksa anda</p>
        <img src="asset/h_book.png" class="img-responsive" alt="daftar online asyifa">
      </div>
    </div>
  </div>
</div>
<div class="panel panel-primary">
    <div class="panel-heading" role="tab" id="headingFour">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#cardu" aria-expanded="false" aria-controls="collapseThree">
          Kartu Elektronik (E-Card)
        </a>
      </h4>
    </div>
    <div id="cardu" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
      <div class="panel-body">
        <h4>Pada Menu E-card anda dapat mencetak kartu pasien anda secara elektronik</h4>
        <p>1. Pilih Menu E-Card seperti gambar berikut :</p>
        <img src="asset/ecard.png" class="img-responsive" alt="daftar online asyifa">
        <p>2. Setelah anda memilih menu tersebut , maka akan menampilkan halaman input data anda. isikan nomor rekam medis dan tanggal lahir anda dengan Format YYYY-MM-DD , contoh : 1991-02-17 (tanggal tujuh belas bulan dua tahun seribu sembilan ratus sembilan puluh satu). Setelah itu tekan tombol cetak kartu </p>
        <img src="asset/ecard_in.png" class="img-responsive" alt="daftar online asyifa">
        <p>3. Berikut ini hasil cetak kartu digital anda: </p>
        <img src="asset/h_card.png" class="img-responsive" alt="daftar online asyifa">
        <p>4. Untuk mengunduh klik kanan lalu pilih unduh gambar. jika melalui smartphone sentuh dan tahan pada gambar lalu unduh gambar</p>
      </div>
    </div>
  </div>
</div>