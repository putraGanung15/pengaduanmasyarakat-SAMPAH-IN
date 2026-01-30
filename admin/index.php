<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: loginadmin.php");
    exit;
}
?>

<h2>Selamat Datang Admin</h2>
<p>Halo, <?= $_SESSION['nama_admin']; ?></p>

<a href="pengaduan.php">Kelola Pengaduan</a> |
<a href="logout.php">Logout</a>
