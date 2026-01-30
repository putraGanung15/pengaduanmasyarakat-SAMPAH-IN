<?php
session_start();
if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'admin') {
    header("Location: loginadmin.php");
    exit;
}

include '../koneksi/koneksi.php';
include 'header.php';

// Ambil id dari URL
if(!isset($_GET['id'])){
    echo "<script>alert('ID pengaduan tidak ditemukan'); window.location='daftar_pengaduan.php';</script>";
    exit;
}

$id = intval($_GET['id']);

// Ambil data pengaduan
$query = "
    SELECT p.*, c.username
    FROM pengaduan p
    LEFT JOIN customer c ON p.id_user = c.kode_customer
    WHERE p.id_pengaduan = $id
";
$result = mysqli_query($conn, $query);

if(!$result || mysqli_num_rows($result) == 0){
    echo "<script>alert('Pengaduan tidak ditemukan'); window.location='daftar_pengaduan.php';</script>";
    exit;
}

$row = mysqli_fetch_assoc($result);
?>

<div class="container" style="margin-top:20px; margin-bottom:50px;">
    <h2 class="text-center" style="color:#28a745; font-weight:bold; border-bottom:4px solid #28a745; display:inline-block; padding-bottom:8px;">
        Detail Pengaduan
    </h2>

    <div class="card mt-4" style="border-radius:15px; border:1px solid #28a745;">
        <div class="card-body">
            <h4>Judul Laporan:</h4>
            <p><?= htmlspecialchars($row['judul']); ?></p>

            <h4>Deskripsi / Isi Laporan:</h4>
            <p><?= nl2br(htmlspecialchars($row['deskripsi'])); ?></p>

            <h4>Klasifikasi:</h4>
            <p><?= isset($row['klasifikasi']) ? htmlspecialchars($row['klasifikasi']) : '-'; ?></p>

            <h4>Lokasi Kejadian:</h4>
            <p><?= htmlspecialchars($row['lokasi']); ?></p>

            <h4>Tanggal Pengaduan:</h4>
            <p><?= htmlspecialchars($row['tanggal_pengaduan']); ?></p>

            <h4>Pengirim:</h4>
            <p><?= isset($row['anonim']) && $row['anonim']==1 ? 'Anonim' : htmlspecialchars($row['username']); ?></p>

            <h4>Lampiran:</h4>
            <?php if(isset($row['lampiran']) && $row['lampiran'] != null): ?>
                <a href="../uploads/<?= $row['lampiran']; ?>" target="_blank">Lihat Lampiran</a>
            <?php else: ?>
                <p>-</p>
            <?php endif; ?>

            <h4>Status:</h4>
            <p>
                <?php
                if($row['status']=='Menunggu'){
                    echo "<span class='label label-warning'>Menunggu</span>";
                } elseif($row['status']=='Proses'){
                    echo "<span class='label label-info'>Proses</span>";
                } else{
                    echo "<span class='label label-success'>Selesai</span>";
                }
                ?>
            </p>

            <a href="daftar_pengaduan.php" class="btn btn-secondary mt-3">Kembali</a>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>

<style>
    /* ---------- Container ---------- */
.container {
    font-family: "Segoe UI", sans-serif;
    background-color: #f4fdf4;
}

/* ---------- Card ---------- */
.card {
    background-color: #fff;
    border-radius: 15px;
    border: 1px solid #28a745;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    padding: 25px;
}

/* ---------- Heading ---------- */
h2.text-center {
    color: #28a745;
    font-weight: bold;
    border-bottom: 4px solid #28a745;
    display: inline-block;
    padding-bottom: 8px;
    margin-bottom: 30px;
}

.card h4 {
    color: #19692c;
    margin-top: 20px;
    font-weight: 600;
}

/* ---------- Paragraph / Content ---------- */
.card p {
    font-size: 16px;
    color: #333;
    line-height: 1.6;
    padding-left: 10px;
}

/* ---------- Lampiran ---------- */
.card a {
    color: #28a745;
    text-decoration: none;
    font-weight: 500;
}

.card a:hover {
    text-decoration: underline;
}

/* ---------- Status Label ---------- */
.label {
    padding: 5px 12px;
    border-radius: 12px;
    font-size: 14px;
    font-weight: 600;
    color: #fff;
}

.label-warning {
    background-color: #ffc107;
}

.label-info {
    background-color: #17a2b8;
}

.label-success {
    background-color: #28a745;
}

/* ---------- Button ---------- */
.btn-secondary {
    background-color: #6c757d;
    border: none;
    padding: 10px 20px;
    border-radius: 25px;
    font-weight: 500;
    margin-top: 20px;
    transition: 0.3s;
}

.btn-secondary:hover {
    background-color: #5a6268;
    color: #fff;
}

/* ---------- Responsive ---------- */
@media (max-width: 768px) {
    .card {
        padding: 15px;
    }

    .card p, .card h4 {
        font-size: 14px;
    }
}

</style>