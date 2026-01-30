<?php
session_start();
include 'koneksi/koneksi.php';

$nama = $_POST['nama'] ?? '';
$email = $_POST['email'] ?? '';
$pesan = $_POST['pesan'] ?? '';

if (!$nama || !$email || !$pesan) {
    echo "<script>
    alert('Semua field wajib diisi!');
    window.location='kontak.php';
    </script>";
    exit;
}

// simpan ke database
$query = $conn->prepare("INSERT INTO kontak (nama, email, pesan) VALUES (?, ?, ?)");
$query->bind_param("sss", $nama, $email, $pesan);
$query->execute();

echo "<script>
alert('Pesan berhasil dikirim!');
window.location='kontak.php';
</script>";
exit;
