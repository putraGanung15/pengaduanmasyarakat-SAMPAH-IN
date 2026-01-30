<?php
session_start();
include '../koneksi/koneksi.php';

// Pastikan user sudah login
if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'user') {
    header("Location: ../user_login.php");
    exit;
}

// Ambil data dari form dan sanitasi
$judul = mysqli_real_escape_string($conn, $_POST['judul']);
$isi = mysqli_real_escape_string($conn, $_POST['isi']);
$klasifikasi = mysqli_real_escape_string($conn, $_POST['klasifikasi']);
$tanggal_kejadian = $_POST['tanggal_kejadian'];
$lokasi = mysqli_real_escape_string($conn, $_POST['lokasi']);
$instansi = mysqli_real_escape_string($conn, $_POST['instansi']);
$anonim = isset($_POST['anonim']) ? 1 : 0;

$id_user = $_SESSION['id_user']; // Ambil ID user dari session

// Generate kode pengaduan otomatis (misal P0001, P0002,...)
$kode_query = mysqli_query($conn, "SELECT kode_pengaduan FROM pengaduan ORDER BY id_pengaduan DESC LIMIT 1");
$data = mysqli_fetch_assoc($kode_query);
$num = isset($data['kode_pengaduan']) ? (int)substr($data['kode_pengaduan'],1) + 1 : 1;
$kode_pengaduan = 'P' . str_pad($num, 4, '0', STR_PAD_LEFT);

// Handle upload lampiran
$lampiran = NULL;
if (isset($_FILES['lampiran']) && $_FILES['lampiran']['error'] === 0) {
    $ext = pathinfo($_FILES['lampiran']['name'], PATHINFO_EXTENSION);
    $nama_file = 'lampiran_' . time() . '.' . $ext;
    $target = '../uploads/' . $nama_file;
    if (move_uploaded_file($_FILES['lampiran']['tmp_name'], $target)) {
        $lampiran = $nama_file;
    }
}

// Insert data ke tabel pengaduan
$stmt = mysqli_prepare($conn, "INSERT INTO pengaduan 
    (kode_pengaduan, id_user, judul, isi, klasifikasi, tanggal_kejadian, lokasi, instansi, anonim, lampiran, status) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'baru')");

mysqli_stmt_bind_param($stmt, "ssssssssss", 
    $kode_pengaduan, $id_user, $judul, $isi, $klasifikasi, $tanggal_kejadian, $lokasi, $instansi, $anonim, $lampiran
);

if (mysqli_stmt_execute($stmt)) {
    echo "<script>
            alert('Laporan berhasil dikirim!');
            window.location = 'lapor1.php';
          </script>";
} else {
    echo "<script>
            alert('Terjadi kesalahan, silahkan coba lagi!');
            window.location = 'lapor1.php';
          </script>";
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
