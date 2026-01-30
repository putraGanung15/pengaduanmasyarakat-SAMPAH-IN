<?php
session_start();
include '../koneksi/koneksi.php';
include 'header.php';

// cek session admin
if(!isset($_SESSION['login']) || $_SESSION['role'] !== 'admin'){
    header("Location: loginadmin.php");
    exit;
}



$admin_username = $_SESSION['login'] ?? '';

// ambil data admin dari database
$stmt = $conn->prepare("SELECT username, password FROM admin WHERE username = ?");
$stmt->bind_param("s", $admin_username);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows === 1){
    $admin = $result->fetch_assoc();
} else {
    // jika data tidak ditemukan
    echo "<script>alert('Data admin tidak ditemukan'); window.location='loginadmin.php';</script>";
    exit;
}
?>

<div class="container" style="margin-top:50px;">
    <h2>Profil Admin</h2>
    <div class="card" style="width: 400px; padding: 20px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.2);">
        <p><strong>Username:</strong> <?= htmlspecialchars($admin['username']) ?></p>
        <p><strong>Password:</strong> <?= htmlspecialchars($admin['password']) ?></p>
    </div>
</div>

<?php include 'footer.php'; ?>
