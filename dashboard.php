<?php
session_start();
if(!isset($_SESSION['login'])){
    header("Location: login.php");
}

include 'config/koneksi.php';
include 'includes/header.php';
include 'includes/navbar.php';

$data = mysqli_query($conn, "SELECT * FROM wisatawan");

$bulan = [];
$jumlah = [];

while($d = mysqli_fetch_array($data)){
    $bulan[] = $d['bulan'];
    $jumlah[] = $d['jumlah'];
}
?>

<div class="container mt-4">

    <div class="card shadow">
        <div class="card-body">

            <h3>Grafik Jumlah Wisatawan</h3>

            <canvas id="grafik"></canvas>

        </div>
    </div>

</div>

<script>
const ctx = document.getElementById('grafik');

new Chart(ctx, {
    type: 'line',
    data: {
        labels: <?php echo json_encode($bulan); ?>,
        datasets: [{
            label: 'Jumlah Wisatawan',
            data: <?php echo json_encode($jumlah); ?>,
            borderWidth: 2
        }]
    }
});
</script>

<?php include 'includes/footer.php'; ?>