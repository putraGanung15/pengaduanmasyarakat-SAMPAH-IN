<?php
session_start();
include 'koneksi/koneksi.php';

// Statistik
$totalPengaduan = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM laporan_sampah"))['total'];
$pengaduanSelesai = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM laporan_sampah WHERE status='selesai'"))['total'];
$pengaduanDiproses = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM laporan_sampah WHERE status='diproses'"))['total'];
$jumlahPengguna = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM users"))['total'];

// Laporan terbaru
$laporan = mysqli_query($conn, "SELECT * FROM laporan_sampah ORDER BY tanggal DESC LIMIT 4");

// Berita
$berita = mysqli_query($conn, "SELECT * FROM berita ORDER BY tgl_berita DESC LIMIT 6");

// Galeri
$galeri = mysqli_query($conn, "SELECT * FROM galeri ORDER BY id_galeri DESC LIMIT 6");
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" type="image/png" href="image/footer/logosampahin.png">
<title>Sampah-in - Pengaduan Masyarakat</title>

<link rel="stylesheet" href="css/bootstrap.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>

<style>
/* ---------- BODY ---------- */
body {
    font-family: "Segoe UI", sans-serif;
    margin:0;
    padding-top:60px;
    background-color:#e6f5e6;
}

/* ---------- NAVBAR ---------- */
.navbar-default {
    position:fixed;
    top:0;
    width:100%;
    z-index:1030;
    background-color:#28a745;
    border-color:#28a745;
    padding:10px 0;
}
.navbar-default .navbar-brand {
    font-weight:bold;
    color:#fff;
    font-size:20px;
    display:flex;
    align-items:center;
    gap:10px;
}
.navbar-default .navbar-brand img {
    height:35px;
}
.navbar-default .navbar-nav>li>a {
    color:#fff;
    font-weight:500;
}
.navbar-default .navbar-nav>li>a:hover {
    color:#d4edda;
}
.navbar-default .navbar-nav .dropdown-menu {
    background:#343a40;
    border-radius:5px;
}
.navbar-default .navbar-nav .dropdown-menu>li>a {
    color:#f1f1f1;
}
.navbar-default .navbar-nav .dropdown-menu>li>a:hover {
    background-color:#28a745;
    color:#fff;
}

/* ---------- JUMBOTRON ---------- */
.jumbotron {
    height:450px;
    display:flex;
    justify-content:center;
    align-items:center;
    text-align:center;
    color:white;
    background: url('image/footer/logo.jpg') no-repeat center center;
    background-size:cover;
}
.jumbotron h1 { font-size:50px; font-weight:800; }
.jumbotron p { font-size:20px; }

/* ---------- CONTENT ---------- */
.section-wrapper {
    max-width:1200px;
    margin:auto;
    padding:60px 20px;
}
.section-title { 
    text-align:center; 
    font-weight:700; 
    color:#28a745;
    margin-bottom:40px;
}

/* ---------- TENTANG ---------- */
#tentang p, #tentang ul { font-size:16px; line-height:1.6; }
#tentang ul li { margin-bottom:8px; }

/* ---------- ALUR HORIZONTAL ---------- */
.alur-container {
    display:flex;
    overflow-x:auto;
    gap:20px;
    padding:0 10px;
}
.alur-step {
    flex:0 0 220px;
    background:#f0fff0;
    border-radius:15px;
    padding:20px;
    text-align:center;
    box-shadow:0 4px 10px rgba(0,0,0,0.05);
    transition: transform 0.3s;
}
.alur-step:hover { transform:translateY(-5px); }
.alur-step i { font-size:40px; color:#28a745; margin-bottom:10px; }

/* ---------- BERITA ---------- */
.card { border-radius:15px; margin-bottom:20px; }
.card img { border-radius:15px 15px 0 0; }

/* ---------- FOOTER ---------- */
.footer-modern {
    border-top:4px solid #28a745;
    background:#f9fff9;
    font-family:"Poppins", sans-serif;
    color:#333;
}
.footer-title { color:#28a745; font-weight:700; margin-bottom:0; }
.footer-subtitle { color:#28a745; font-weight:600; margin-bottom:10px; }
.footer-links { list-style:none; padding:0; }
.footer-links li { margin-bottom:6px; }
.footer-links a { text-decoration:none; color:#000; transition:color 0.3s; }
.footer-links a:hover { color:#28a745; }
.social-icons a { color:#28a745; margin-right:10px; font-size:22px; transition:0.3s; }
.social-icons a:hover { transform:scale(1.2); color:#19692c; }
.copy { background:#28a745; color:#fff; text-align:center; font-size:14px; padding:10px 0; margin-top:20px; }

/* ---------- RESPONSIVE ---------- */
@media (max-width:768px){
    .alur-step { flex:0 0 180px; }
}
</style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">
        <img src="image/footer/logosampahin.png" alt="Sampah-in"> Sampah-in
      </a>
    </div>
    <div class="collapse navbar-collapse" id="navbar-collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php">Beranda</a></li>
        <li><a href="about.php">Tentang Kami</a></li>
        <li><a href="manual.php">Manual Aplikasi</a></li>
        <li><a href="lapor1.php">Lapor</a></li>
        <li><a href="kontak.php">Kontak & Bantuan</a></li>
        <?php if(!isset($_SESSION['user'])) { ?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i> Akun <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="user_login.php">Login</a></li>
            <li><a href="register.php">Register</a></li>
          </ul>
        </li>
        <?php } else { ?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i> <?= $_SESSION['user']; ?> <span class="caret"></span></a>
          <ul class="dropdown-menu"><li><a href="proses/logout.php">Log Out</a></li></ul>
        </li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>

<!-- JUMBOTRON -->
<div class="jumbotron">
  <div>
    <h1>Selamat Datang di Sampah-in</h1>
    <p>Sistem Pengaduan Masyarakat</p>
  </div>
</div>

<!-- TENTANG -->
<section id="tentang" class="section-wrapper" style="background-color:#f0fff0;">
  <h2 class="section-title">Apa itu website Sampah-in?</h2>
  <div style="display:flex; flex-wrap:wrap; gap:30px; align-items:center;">
    <div style="flex:1; min-width:300px;">
      <p>Sampah-in adalah platform pengaduan masyarakat berbasis web yang memudahkan warga untuk melaporkan masalah sampah dan pelayanan publik. Bisa diakses kapan saja dan di mana saja dari perangkat apa pun.</p>
      <ul>
        <li>Membuat laporan pengaduan online.</li>
        <li>Memantau status laporan real-time.</li>
        <li>Mendapatkan balasan dari petugas.</li>
        <li>Galeri dan berita terkait pengelolaan sampah.</li>
        <li>Proteksi data aman dengan Cloudflare.</li>
      </ul>
    </div>
    <div style="flex:1; min-width:300px; text-align:center;">
      <i class="bi bi-people-fill" style="font-size:100px; color:#28a745;"></i>
    </div>
  </div>
</section>

<!-- ALUR PENGADUAN HORIZONTAL -->
<section class="section-wrapper" style="background-color:#ffffff;">
  <h2 class="section-title">Alur Pengaduan</h2>
  <div class="alur-container">
    <?php
    $alur = [
      ['icon'=>'bi-person-check-fill','title'=>'Daftar/Masuk','desc'=>'Daftar atau masuk akun Anda.'],
      ['icon'=>'bi-pencil-square','title'=>'Tulis Laporan','desc'=>'Laporkan keluhan Anda.'],
      ['icon'=>'bi-clock-fill','title'=>'Tindak Lanjut','desc'=>'Laporan diverifikasi petugas.'],
      ['icon'=>'bi-chat-dots-fill','title'=>'Tanggapan','desc'=>'Dapatkan balasan dari petugas.'],
      ['icon'=>'bi-cloud-fill','title'=>'Proteksi Cloudflare','desc'=>'Data Anda aman dengan Cloudflare.'],
      ['icon'=>'bi-check-circle-fill','title'=>'Selesai','desc'=>'Laporan ditindaklanjuti hingga selesai.']
    ];
    foreach($alur as $step){ ?>
      <div class="alur-step">
        <i class="bi <?= $step['icon']; ?>"></i>
        <h5 class="fw-bold pt-2"><?= $step['title']; ?></h5>
        <p style="font-size:14px;"><?= $step['desc']; ?></p>
      </div>
    <?php } ?>
  </div>
</section>

<!-- FOOTER -->
<footer class="footer-modern">
  <div class="container py-4">
    <div class="row align-items-center">
      <div class="col-md-4 mb-3 d-flex align-items-center">
        <img src="image/footer/logosampahin.png" alt="Sampah-in" style="width:50px;height:50px;margin-right:10px;">
        <h4 class="footer-title">Sampah-in</h4>
      </div>
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
      <div class="col-md-4 mb-3">
        <h5 class="footer-subtitle">Ikuti Kami</h5>
        <div class="social-icons">
          <a href="#"><i class="bi bi-facebook"></i></a>
          <a href="#"><i class="bi bi-instagram"></i></a>
          <a href="#"><i class="bi bi-twitter"></i></a>
          <a href="#"><i class="bi bi-whatsapp"></i></a>
        </div>
      </div>
    </div>
  </div>
  <div class="copy">&copy; <?= date('Y'); ?> Sampah-in — All Rights Reserved.</div>
</footer>

</body>
</html>
