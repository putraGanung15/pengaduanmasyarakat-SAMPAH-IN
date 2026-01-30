<!-- footer.php -->
<footer class="footer" style="background-color:#f8f8f8; padding:20px 0; border-top:1px solid #ddd; margin-top:50px;">
    <div class="container text-center">
        <p style="margin:0; color:#555;">
            &copy; <?php echo date("Y"); ?> Sampah-in Admin. Semua hak dilindungi.
        </p>
        <p style="margin:5px 0 0 0;">
            <a href="halaman_utama.php" style="color:#28a745; text-decoration:none;">Dashboard</a> |
            <a href="kontak_bantuan.php" style="color:#28a745; text-decoration:none;">Kontak & Bantuan</a>
        </p>
    </div>
</footer>

<!-- Script opsional -->
<script>
    // Bisa tambahkan fungsi footer khusus jika dibutuhkan
    console.log("Footer admin loaded");
</script>
</body>
</html>

<style>
	/* Reset minimal height halaman agar footer selalu di bawah */
html, body {
    height: 100%;
    margin: 0;
    padding: 0;
}

/* Bungkus semua konten halaman */
.wrapper {
    min-height: 100%;          /* agar footer selalu di bawah */
    display: flex;
    flex-direction: column;
}

/* Konten utama halaman */
.content {
    flex: 1;                   /* isi halaman menempati ruang yang tersedia */
}

/* Style footer */
.footer {
    background-color: #f8f8f8;
    padding: 20px 0;
    border-top: 1px solid #ddd;
    color: #555;
    text-align: center;
}
.footer a {
    color: #28a745;
    text-decoration: none;
}
.footer a:hover {
    text-decoration: underline;
}

</style>