<?php
session_start();

// Cek login
if(!isset($_SESSION['kd_cs'])){
    header("Location: user_login.php");
    exit;
}

// Set timezone sesuai lokasi
date_default_timezone_set('Asia/Jakarta');

// Include koneksi
include 'koneksi/koneksi.php';

// Ambil data dari form
$id_user = $_SESSION['kd_cs'];
$judul = mysqli_real_escape_string($conn, $_POST['judul']);
$deskripsi = mysqli_real_escape_string($conn, $_POST['isi']); 
$lokasi = mysqli_real_escape_string($conn, $_POST['lokasi']);
$klasifikasi = mysqli_real_escape_string($conn, $_POST['klasifikasi']);
$anonim = isset($_POST['anonim']) ? 1 : 0;

// Tanggal pengaduan otomatis sesuai waktu sekarang
$tanggal_pengaduan = date('Y-m-d H:i:s');

// Upload lampiran
$lampiran = null;
$upload_dir = 'uploads/';
if(!is_dir($upload_dir)){
    mkdir($upload_dir, 0777, true);
}

if(isset($_FILES['lampiran']) && $_FILES['lampiran']['error'] == 0){
    $filename = time().'_'.basename($_FILES['lampiran']['name']);
    move_uploaded_file($_FILES['lampiran']['tmp_name'], $upload_dir.$filename);
    $lampiran = $filename;
}

// Insert ke database
$query = "INSERT INTO pengaduan 
(id_user, judul, deskripsi, lokasi, tanggal_pengaduan, klasifikasi, anonim, lampiran, status) 
VALUES ('$id_user', '$judul', '$deskripsi', '$lokasi', '$tanggal_pengaduan', '$klasifikasi', '$anonim', '$lampiran', 'Menunggu')";

if(mysqli_query($conn, $query)){
    // Pop-up alert berhasil, lalu redirect
    echo "<script>
        alert('Berhasil mengirim pengaduan!');
        window.location = 'index.php';
    </script>";
    exit;
} else {
    // Jika error
    echo "Error: " . mysqli_error($conn);
    exit;
}
?>
