<?php
session_start();
if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'admin') {
    header("Location: loginadmin.php");
    exit;
}
include '../koneksi/koneksi.php';
include 'header.php'; // memanggil header yang sudah ada

// Statistik
$pengaduan_baru = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM pengaduan WHERE status='baru'"))['total'] ?? 0;
$pengaduan_selesai = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM pengaduan WHERE status='selesai'"))['total'] ?? 0;
$total_user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM customer"))['total'] ?? 0;
?>

<div class="container" style="padding-top: 20px;">
    <div class="row">
        <div class="col-md-12">
            <h3>Selamat datang, <?= $_SESSION['nama_admin'] ?>!</h3>
            <p>Ini adalah dashboard admin layanan pengaduan sampah.</p>
        </div>
    </div>

    <div class="row" style="margin-top: 20px;">
        <div class="col-md-4">
            <div class="card text-center" style="padding:20px; background:#fff; border-radius:8px; box-shadow:0 5px 15px rgba(0,0,0,0.1);">
                <h2 style="color:#3a8b5f;"><?= $pengaduan_baru ?></h2>
                <p>Pengaduan Baru</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center" style="padding:20px; background:#fff; border-radius:8px; box-shadow:0 5px 15px rgba(0,0,0,0.1);">
                <h2 style="color:#3a8b5f;"><?= $pengaduan_selesai ?></h2>
                <p>Pengaduan Selesai</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center" style="padding:20px; background:#fff; border-radius:8px; box-shadow:0 5px 15px rgba(0,0,0,0.1);">
                <h2 style="color:#3a8b5f;"><?= $total_user ?></h2>
                <p>Total User Terdaftar</p>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
