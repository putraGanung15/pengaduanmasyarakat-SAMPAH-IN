<?php
session_start();
include '../koneksi/koneksi.php';
include 'header.php';

// cek login admin
if(!isset($_SESSION['login']) || $_SESSION['role'] !== 'admin'){
    header("Location: loginadmin.php");
    exit;
}

// Hitung total pengaduan
$totalQuery = "SELECT COUNT(*) AS total FROM pengaduan";
$totalResult = mysqli_query($conn, $totalQuery);
$totalData = mysqli_fetch_assoc($totalResult)['total'];

// Hitung pengaduan berdasarkan status
$statusQuery = "SELECT status, COUNT(*) AS jumlah FROM pengaduan GROUP BY status";
$statusResult = mysqli_query($conn, $statusQuery);

$statusData = [
    'baru' => 0,
    'proses' => 0,
    'selesai' => 0
];

while($row = mysqli_fetch_assoc($statusResult)){
    $status = strtolower($row['status']);
    $statusData[$status] = $row['jumlah'];
}
?>

<div class="container-statistik">
    <h2 class="title">Statistik Pengaduan</h2>

    <div class="cards">
        <div class="card total">
            <h3>Total Pengaduan</h3>
            <p class="number"><?= $totalData ?></p>
        </div>
        <div class="card chart-card">
            <canvas id="pengaduanChart"></canvas>
        </div>
    </div>
</div>

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('pengaduanChart').getContext('2d');
const pengaduanChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Baru', 'Proses', 'Selesai'],
        datasets: [{
            label: 'Jumlah Pengaduan',
            data: [
                <?= $statusData['baru'] ?>,
                <?= $statusData['proses'] ?>,
                <?= $statusData['selesai'] ?>
            ],
            backgroundColor: [
                'rgba(255, 193, 7, 0.7)',
                'rgba(0, 123, 255, 0.7)',
                'rgba(40, 167, 69, 0.7)'
            ],
            borderColor: [
                'rgba(255, 193, 7, 1)',
                'rgba(0, 123, 255, 1)',
                'rgba(40, 167, 69, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { display: false },
            title: {
                display: true,
                text: 'Jumlah Pengaduan Berdasarkan Status',
                font: { size: 18 }
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                precision: 0
            }
        }
    }
});
</script>

<style>
/* Container utama */
.container-statistik {
    max-width: 1100px;
    margin: 50px auto;
    padding: 0 20px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

/* Judul */
.title {
    text-align: center;
    color: #28a745;
    font-size: 28px;
    font-weight: bold;
    border-bottom: 4px solid #28a745;
    display: inline-block;
    padding-bottom: 10px;
    margin-bottom: 30px;
}

/* Kartu & Chart */
.cards {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
}

/* Kartu total pengaduan */
.card.total {
    background-color: #28a745;
    color: white;
    flex: 0 0 250px;
    border-radius: 15px;
    padding: 25px 20px;
    text-align: center;
    box-shadow: 0 6px 15px rgba(0,0,0,0.2);
    transition: transform 0.3s;
}

.card.total:hover {
    transform: translateY(-5px);
}

.card.total h3 {
    font-size: 20px;
    margin-bottom: 10px;
}

.card.total .number {
    font-size: 36px;
    font-weight: bold;
}

/* Kartu chart */
.card.chart-card {
    flex: 1 1 600px;
    background-color: #f8f9fa;
    border-radius: 15px;
    padding: 20px;
    box-shadow: 0 6px 15px rgba(0,0,0,0.1);
}

/* Responsive */
@media (max-width: 768px) {
    .cards {
        flex-direction: column;
        align-items: center;
    }

    .card.chart-card {
        width: 100%;
    }
}
</style>

<?php include 'footer.php'; ?>
