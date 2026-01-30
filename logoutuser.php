<?php
session_start();

// Hapus semua session user
session_unset();
session_destroy();

// Tampilkan notifikasi dan redirect ke login user
echo "<script>
    alert('Berhasil logout');
    window.location = 'user_login.php';
</script>";
exit;
?>
