<?php 
include 'header.php';
?>



<div class="container" style="margin-top: 50px; margin-bottom: 100px;">
  <h2 class="section-title"><b>Manual Aplikasi Pengaduan Sampah</b></h2>

  <div class="manual-wrapper">
    <div class="accordion" id="manualAccordion">

      <div class="accordion-item">
        <h4 class="accordion-header" id="headingOne">
          <button class="accordion-button" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <i class="glyphicon glyphicon-question-sign"></i>&nbsp; Bagaimana Cara Melaporkan Sampah?
          </button>
        </h4>
        <div id="collapseOne" class="accordion-collapse collapse in" aria-labelledby="headingOne" data-parent="#manualAccordion">
          <div class="accordion-body">
            <ol>
              <li>Pastikan Anda sudah <b>Registrasi / Login</b> di aplikasi Pengaduan Sampah.</li>
              <li>Pilih menu <b>Lapor Sampah</b> dan isi detail lokasi serta jenis sampah.</li>
              <li>Unggah foto jika perlu untuk memperjelas laporan.</li>
              <li>Kirim laporan, tim akan menindaklanjuti sesuai prosedur.</li>
            </ol>
          </div>
        </div>
      </div>

    
      <div class="accordion-item">
        <h4 class="accordion-header" id="headingTwo">
          <button class="accordion-button collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            <i class="glyphicon glyphicon-lock"></i>&nbsp; Apakah Data Saya Aman?
          </button>
        </h4>
        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-parent="#manualAccordion">
          <div class="accordion-body">
            <p>Ya, semua data pelapor dijaga kerahasiaannya dan digunakan hanya untuk keperluan penanganan sampah. Sistem juga menggunakan enkripsi untuk keamanan data.</p>
          </div>
        </div>
      </div>


      <div class="accordion-item">
        <h4 class="accordion-header" id="headingThree">
          <button class="accordion-button collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            <i class="glyphicon glyphicon-info-sign"></i>&nbsp; Bagaimana Status Laporan Bisa Dilacak?
          </button>
        </h4>
        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-parent="#manualAccordion">
          <div class="accordion-body">
            <p>Setelah laporan dikirim, Anda akan menerima nomor laporan. Gunakan nomor ini untuk memantau status penanganan laporan melalui aplikasi atau SMS notifikasi.</p>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<div class="container" style="margin-top: 50px; margin-bottom: 100px;">
  <h2 class="section-title"><b>Metode Pelaporan Sampah</b></h2>

  <div class="manual-wrapper">
    <div class="accordion" id="reportAccordion">

      <div class="accordion-item">
        <h4 class="accordion-header" id="headingApp">
          <button class="accordion-button" type="button" data-toggle="collapse" data-target="#collapseApp" aria-expanded="true" aria-controls="collapseApp">
            <i class="bi bi-phone-fill"></i>&nbsp; Melalui Aplikasi Mobile
          </button>
        </h4>
        <div id="collapseApp" class="accordion-collapse collapse in" aria-labelledby="headingApp" data-parent="#reportAccordion">
          <div class="accordion-body">
            <p>Gunakan aplikasi resmi Pengaduan Sampah untuk laporan cepat:</p>
            <ol>
              <li>Buka aplikasi dan pilih menu <b>Lapor Sampah</b>.</li>
              <li>Isi detail lokasi dan jenis sampah.</li>
              <li>Kirim laporan dan simpan nomor tiket untuk tracking.</li>
            </ol>
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h4 class="accordion-header" id="headingWA">
          <button class="accordion-button collapsed" type="button" data-toggle="collapse" data-target="#collapseWA" aria-expanded="false" aria-controls="collapseWA">
            <i class="bi bi-whatsapp"></i>&nbsp; Melalui WhatsApp
          </button>
        </h4>
        <div id="collapseWA" class="accordion-collapse collapse" aria-labelledby="headingWA" data-parent="#reportAccordion">
          <div class="accordion-body">
            <p>Kirim laporan sampah via WhatsApp ke nomor resmi kami. Sertakan:</p>
            <ul>
              <li>Lokasi sampah</li>
              <li>Jenis sampah</li>
              <li>Foto (jika tersedia)</li>
            </ul>
            <p>Tim akan membalas dengan nomor laporan untuk tracking.</p>
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h4 class="accordion-header" id="headingCallCenter">
          <button class="accordion-button collapsed" type="button" data-toggle="collapse" data-target="#collapseCallCenter" aria-expanded="false" aria-controls="collapseCallCenter">
            <i class="bi bi-telephone-fill"></i>&nbsp; Melalui Call Center
          </button>
        </h4>
        <div id="collapseCallCenter" class="accordion-collapse collapse" aria-labelledby="headingCallCenter" data-parent="#reportAccordion">
          <div class="accordion-body">
            <p>Hubungi call center resmi kami untuk laporan langsung. Operator akan mencatat aduan dan memberikan nomor tiket untuk tracking penanganan sampah.</p>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<style>
.section-title {
  border-bottom: 4px solid #28a745;;
  padding-bottom: 10px;
  margin-bottom: 40px;
  text-align: center;
  color:#28a745;
}

.manual-wrapper {
  background: #fff;
  border-radius: 12px;
  padding: 20px 30px;
  box-shadow: 0 4px 15px rgba(0,0,0,0.08);
}

.accordion-item {
  border: none;
  margin-bottom: 15px;
  border-radius: 8px;
  overflow: hidden;
  box-shadow: 0 3px 10px rgba(0,0,0,0.05);
}

.accordion-button {
  width: 100%;
  text-align: left;
  background-color: #fff;
  color: #333;
  padding: 15px 20px;
  border: none;
  font-size: 16px;
  font-weight: 600;
  transition: all 0.3s ease;
}

.accordion-button:hover {
  background-color: #e6f7e6;
  color: #28a745;
}

.accordion-button:not(.collapsed) {
  background-color: #28a745;
  color: #fff;
  box-shadow: inset 0 -2px 5px rgba(0,0,0,0.1);
}

.accordion-body {
  padding: 20px;
  background-color: #f5fff5;
  font-size: 15px;
  color: #444;
}

.accordion-collapse {
  transition: all 0.4s ease;
}

ol li, ul li {
  margin-bottom: 6px;
}
</style>

<?php 
include 'footer.php';
?>  
