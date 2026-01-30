<?php
session_start();
include '../../koneksi/koneksi.php';  // pastikan path benar

$username = $_POST['username'] ?? '';
$password = $_POST['pass'] ?? '';

if (empty($username) || empty($password)) {
    echo "<script>
    alert('Username dan password wajib diisi!');
    window.location='../loginadmin.php';
    </script>";
    exit;
}

// Cek admin di database
$query = $conn->prepare("SELECT * FROM admin WHERE username = ?");
$query->bind_param("s", $username);
$query->execute();
$result = $query->get_result();

if ($result->num_rows === 1) {
    $admin = $result->fetch_assoc();

    // Password plain text (atau gunakan password_verify kalau pakai hash)
    if ($password === $admin['password']) {
        $_SESSION['login'] = true;
        $_SESSION['role'] = 'admin';
        $_SESSION['id_admin'] = $admin['id_admin'];
        $_SESSION['username'] = $admin['username'];
        $_SESSION['nama_admin'] = $admin['nama_admin'];  // Simpan nama_admin ke session!

        header("Location: ../halaman_utama.php");
        exit;
    } else {
        echo "<script>
        alert('Password salah!');
        window.location='../loginadmin.php';
        </script>";
        exit;
    }
} else {
    echo "<script>
    alert('Username tidak ditemukan!');
    window.location='../loginadmin.php';
    </script>";
    exit;
}
?>
