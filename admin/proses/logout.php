<?php
session_start();
session_destroy();

// Tampilkan alert lalu redirect
echo "<script>
    alert('Berhasil logout');
    window.location = 'login.php';
</script>";
exit;
?>
