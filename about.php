<?php
include 'header.php';
?>


<div style="
  position: relative;
  background-image: url('images/sampah-bg.jpg'); /* ganti sesuai gambar terkait sampah */
  background-size: cover;
  background-position: center;
  background-attachment: fixed;
  padding: 120px 0;
  color: #333;
">

  <div style="
    position: absolute;
    top: 0; left: 0; right: 0; bottom: 0;
    backdrop-filter: blur(8px);
    background-color: rgba(255, 255, 255, 0.6);
    z-index: 0;
  "></div>

  

  <div class="container text-center" style="position: relative; z-index: 1;">
    <h1 style="font-weight: bold; font-size: 48px; color: #28a745;">Pelayanan Masyarakat</h1>
    <p style="font-size: 18px; color: #444; max-width: 750px; margin: 20px auto; line-height: 1.8;">
      Membantu menjaga kebersihan lingkungan melalui pengaduan sampah yang cepat, tepat, dan transparan.
      Layanan ini hadir untuk memastikan setiap aduan warga ditindaklanjuti dengan efektif.
    </p>
  </div>
</div>


<div class="container" style="padding: 80px 0;">
  <div class="row align-items-center">
    <div class="col-md-6" data-aos="fade-right">
      <img src="image/pelayanan/sampah.png" alt="Pengaduan Sampah"
        style="width:100%; border-radius:15px; box-shadow:0 8px 20px rgba(0,0,0,0.1);">
    </div>
    <div class="col-md-6" data-aos="fade-left">
      <h2 style="color:#28a745; font-weight:bold; margin-bottom:20px;">Cerita Kami</h2>
      <p style="font-size:16px; line-height:1.8; text-align:justify;">
        Layanan Pengaduan Sampah didirikan untuk menjawab kebutuhan masyarakat dalam menjaga lingkungan yang bersih dan
        sehat.
        Kami percaya bahwa partisipasi warga sangat penting, dan setiap laporan sampah adalah kontribusi bagi kota yang
        lebih bersih.
        <br><br>
        Tim kami berkomitmen menindaklanjuti setiap aduan dengan cepat, memastikan sampah terkelola dengan baik, dan
        memberi informasi transparan kepada pelapor.
      </p>
    </div>
  </div>
</div>

<div style="background-color:#f0f9f0; padding:80px 0;">
  <div class="container">

    <div class="row" style="margin-bottom:60px;">
      <div class="col-md-6" data-aos="fade-up">
        <h2 style="
          border-left:6px solid #28a745;
          padding-left:15px;
          font-weight:bold;
          margin-bottom:15px;
        ">VISI</h2>
        <p style="font-size:16px; line-height:1.8; text-align:justify;">
          Menjadi layanan pengaduan sampah yang cepat, responsif, dan terpercaya, demi menciptakan lingkungan bersih,
          sehat, dan nyaman bagi seluruh warga.
        </p>
      </div>

      <div class="col-md-6" data-aos="fade-up" data-aos-delay="150">
        <h2 style="
          border-left:6px solid #28a745;
          padding-left:15px;
          font-weight:bold;
          margin-bottom:15px;
        ">MISI</h2>
        <ul style="margin-left:15px; font-size:16px; line-height:1.8; text-align:justify;">
          <li>Menerima aduan sampah secara cepat dan akurat.</li>
          <li>Menindaklanjuti setiap laporan dengan profesional.</li>
          <li>Mengedukasi masyarakat tentang pentingnya kebersihan lingkungan.</li>
          <li>Bekerja sama dengan dinas terkait untuk pengelolaan sampah yang efektif.</li>
          <li>Memberikan transparansi status pengaduan kepada masyarakat.</li>
        </ul>
      </div>
    </div>

  </div>
</div>

<section class="why-choose-us">
  <div class="container text-center">
    <h5 class="subtitle">Mengapa Menggunakan Layanan Kami</h5>
    <h2 class="title">Lingkungan Bersih, Hidup Sehat</h2>

    <div class="row justify-content-center mt-5">

      <div class="col-md-4 mb-4">
        <div class="feature-card">
          <i class="bi bi-clipboard-check feature-icon"></i>
          <h4>Proses Cepat</h4>
          <p>Laporan sampah ditindaklanjuti secepat mungkin.</p>
        </div>
      </div>

      <div class="col-md-4 mb-4">
        <div class="feature-card">
          <i class="bi bi-people feature-icon"></i>
          <h4>Partisipasi Warga</h4>
          <p>Memberi ruang bagi masyarakat berperan aktif menjaga kebersihan.</p>
        </div>
      </div>

      <div class="col-md-4 mb-4">
        <div class="feature-card">
          <i class="bi bi-shield-check feature-icon"></i>
          <h4>Transparan & Terpercaya</h4>
          <p>Status pengaduan dapat dilacak dan dipantau secara jelas.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<style>
  .why-choose-us {
    background-color: #f9f9f9;
    padding: 80px 0;
    font-family: "Poppins", sans-serif;
  }

  .why-choose-us .subtitle {
    color: #28a745;
    font-weight: 600;
    font-size: 18px;
    margin-bottom: 10px;
    letter-spacing: 0.5px;
    animation: fadeInDown 1s ease;
  }

  .why-choose-us .title {
    font-family: "Playfair Display", serif;
    font-size: 36px;
    font-weight: 800;
    color: #333;
    animation: fadeInUp 1.2s ease;
  }

  .feature-card {
    background: #fff;
    border-radius: 12px;
    padding: 40px 25px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
    transition: all 0.4s ease;
    height: 100%;
  }

  .feature-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 6px 25px rgba(40, 167, 69, 0.25);
  }

  .feature-icon {
    font-size: 45px;
    color: #28a745;
    margin-bottom: 20px;
    transition: all 0.3s ease;
  }

  .feature-card:hover .feature-icon {
    color: #1e7e34;
    transform: scale(1.1);
  }

  .feature-card h4 {
    font-weight: 600;
    font-size: 20px;
    color: #333;
    margin-bottom: 10px;
  }

  .feature-card p {
    font-size: 15px;
    color: #666;
    line-height: 1.6;
  }

  @keyframes fadeInDown {
    from {
      opacity: 0;
      transform: translateY(-20px);
    }

    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  @keyframes fadeInUp {
    from {
      opacity: 0;
      transform: translateY(20px);
    }

    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  @media (max-width: 768px) {
    .feature-card {
      margin-bottom: 20px;
    }
  }
</style>

<div class="container text-center" style="padding:80px 0;">
  <h3 style="font-size:24px; color:#444; font-style:italic;">
    “Lingkungan bersih dimulai dari kepedulian setiap individu,
    dan laporan Anda adalah langkah nyata untuk perubahan.”
  </h3>
  <p style="margin-top:20px; color:#28a745; font-weight:bold;">– Tim Pelayanan Pengaduan Sampah</p>
</div>

<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init({ duration: 1000, once: true });
</script>

<?php
include 'footer.php';
?>