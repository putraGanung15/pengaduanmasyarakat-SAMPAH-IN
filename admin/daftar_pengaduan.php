<?php
session_start();
if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'admin') {
    header("Location: loginadmin.php");
    exit;
}

include '../koneksi/koneksi.php';
include 'header.php';
?>

<div class="container" style="margin-top:20px; margin-bottom:50px;">
    <h2 class="text-center"
        style="color:#28a745; font-weight:bold; border-bottom:4px solid #28a745; display:inline-block; padding-bottom:8px;">
        Daftar Pengaduan
    </h2>

    <div class="table-responsive mt-4">
        <table class="table table-bordered table-hover">
            <thead style="background-color:#28a745; color:white;">
                <tr>
                    <th>No</th>
                    <th>Judul Laporan</th>
                    <th>Isi Laporan</th>
                    <th>Lokasi</th>
                    <th>Pengirim</th>
                    <th>Tanggal Pengaduan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;

                // Query final sesuai struktur tabel
                $query = "
                    SELECT p.*, c.username
                    FROM pengaduan p
                    LEFT JOIN customer c ON p.id_user = c.kode_customer
                    ORDER BY p.id_pengaduan DESC
                ";
                $result = mysqli_query($conn, $query);

                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= htmlspecialchars($row['judul']); ?></td>
                            <td><?= htmlspecialchars($row['deskripsi']); ?></td>
                            <td><?= htmlspecialchars($row['lokasi']); ?></td>
                            <td><?= $row['anonim'] == 1 ? 'Anonim' : htmlspecialchars($row['username']); ?></td>
                            <td><?= htmlspecialchars($row['tanggal_pengaduan']); ?></td>
                            <td>
                                <?php
                                if ($row['status'] == 'Menunggu') {
                                    echo "<span class='label label-warning'>Menunggu</span>";
                                } elseif ($row['status'] == 'Proses') {
                                    echo "<span class='label label-info'>Proses</span>";
                                } else {
                                    echo "<span class='label label-success'>Selesai</span>";
                                }
                                ?>
                            </td>
                            <td>
                                <a href="detail_pengaduan.php?id=<?= $row['id_pengaduan']; ?>"
                                   class="btn btn-primary btn-sm">Detail</a>

                                <a href="proses/hapus_pengaduan.php?id=<?= $row['id_pengaduan']; ?>"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Yakin ingin menghapus pengaduan ini?')">
                                   Hapus
                                </a>
                            </td>
                        </tr>
                <?php
                    }
                } else {
                    echo "<tr><td colspan='8' class='text-center'>Belum ada pengaduan</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'footer.php'; ?>
