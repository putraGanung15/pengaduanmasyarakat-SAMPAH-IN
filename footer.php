<footer class="footer-modern">
  <div class="container py-4">
    <div class="row align-items-center">

      <!-- Kolom 1: Logo & Nama Website -->
      <div class="col-md-4 mb-3 d-flex align-items-center">
        <img src="image/logo_sampah.png" alt="Logo" style="width:50px; height:50px; margin-right:10px;">
        <h4 class="footer-title">Pengaduan Sampah Masyarakat</h4>
      </div>

      <!-- Kolom 2: Menu -->
      <div class="col-md-4 mb-3">
        <h5 class="footer-subtitle">Menu</h5>
        <ul class="footer-links">
          <li><a href="index.php">Beranda</a></li>
          <li><a href="about.php">Tentang Kami</a></li>
          <li><a href="manual.php">Manual Aplikasi</a></li>
          <li><a href="lapor.php">Lapor</a></li>
          <li><a href="semua_laporan.php">Semua Laporan</a></li>
          <li><a href="kontak.php">Kontak & Bantuan</a></li>
        </ul>
      </div>

      <!-- Kolom 3: Ikuti Kami -->
      <div class="col-md-4 mb-3">
        <h5 class="footer-subtitle">Ikuti Kami</h5>
        <div class="social-icons mb-3">
          <a href="#"><i class="bi bi-facebook"></i></a>
          <a href="#"><i class="bi bi-instagram"></i></a>
          <a href="#"><i class="bi bi-twitter"></i></a>
          <a href="#"><i class="bi bi-whatsapp"></i></a>
        </div>
      </div>

    </div>
  </div>

  <div class="copy">
    <span>&copy; <?= date('Y'); ?> Pengaduan Sampah Masyarakat — All Rights Reserved.</span>
  </div>
</footer>

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<style>
  .footer-modern {
    border-top: 4px solid #28a745;
    background-color: #f9fff9;
    color: #333;
    font-family: "Poppins", sans-serif;
  }

  .footer-title {
    color: #28a745;
    font-weight: 700;
    margin-bottom: 0;
  }

  .footer-subtitle {
    font-weight: 600;
    margin-bottom: 10px;
    color: #28a745;
  }

  .footer-links {
    list-style: none;
    padding: 0;
  }

  .footer-links li {
    margin-bottom: 6px;
  }

  .footer-links a {
    color: #000;
    text-decoration: none;
    transition: color 0.3s ease;
  }

  .footer-links a:hover {
    color: #28a745;
  }

  .social-icons a {
    color: #28a745;
    margin-right: 10px;
    font-size: 22px;
    transition: transform 0.3s ease, color 0.3s ease;
  }

  .social-icons a:hover {
    color: #19692c;
    transform: scale(1.2);
  }

  .copy {
    background-color: #28a745;
    color: #fff;
    text-align: center;
    font-size: 14px;
    padding: 10px 0;
    margin-top: 20px;
  }

  @media (max-width: 768px) {
    .footer-modern .row {
      text-align: center;
    }

    .social-icons {
      justify-content: center;
    }
  }
</style>