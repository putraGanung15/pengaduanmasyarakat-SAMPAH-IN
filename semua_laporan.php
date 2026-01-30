<?php
include 'header.php';
include 'koneksi/koneksi.php';
?>

<div class="container" style="margin-top:60px; margin-bottom:80px;">
    <h2 class="text-center"
        style="color:#28a745; border-bottom:4px solid #28a745; display:inline-block; padding-bottom:8px; margin-bottom:40px;">
        Semua Laporan Sampah
    </h2>

    <div class="row">
        <?php
        $query = "SELECT * FROM laporan_sampah ORDER BY tanggal DESC"; // sesuaikan dengan nama kolom di database
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $status_color = "#ffc107"; // default: diproses
                if ($row['status'] == "selesai")
                    $status_color = "#28a745";
                elseif ($row['status'] == "dibatalkan")
                    $status_color = "#dc3545";

                echo "
                <div class='col-md-6 mb-4'>
                    <div class='card laporan-card h-100' style='border-left:5px solid $status_color;'>
                        <div class='card-body'>
                            <h5 style='color:#28a745; margin-bottom:10px;'>" . $row['nama'] . "</h5>
                            <small class='text-muted'>" . date('d M Y H:i', strtotime($row['tanggal'])) . "</small>
                            <p><strong>Lokasi:</strong> " . $row['lokasi'] . "</p>
                            <p><strong>Keterangan:</strong> " . $row['keterangan'] . "</p>
                            <p><strong>Status:</strong> <span style='color:$status_color; font-weight:bold;'>" . $row['status'] . "</span></p>
                        </div>
                    </div>
                </div>
                ";
            }
        } else {
            echo "<p class='text-center' style='width:100%;'>Belum ada laporan sampah.</p>";
        }
        ?>
    </div>
</div>

<style>
    .laporan-card {
        border-radius: 15px;
        background-color: #e6f4ea;
        box-shadow: 0 3px 8px rgba(40, 167, 69, 0.2);
        transition: all 0.3s ease;
        padding: 15px;
    }

    .laporan-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 18px rgba(40, 167, 69, 0.3);
    }
</style>

<?php
include 'footer.php';
?>