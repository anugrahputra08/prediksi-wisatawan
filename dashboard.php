<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: login.php");
}

include 'config/koneksi.php';

$data = mysqli_query($conn,
"SELECT * FROM wisatawan ORDER BY id ASC");

$bulan = [];
$jumlah = [];

$total = 0;

while($d = mysqli_fetch_array($data)){

    $bulan[] = $d['bulan'];
    $jumlah[] = $d['jumlah'];

    $total += $d['jumlah'];
}

$total_data = count($jumlah);

$rata = 0;

if($total_data > 0){
    $rata = $total / $total_data;
}
?>

<!DOCTYPE html>
<html>
<head>

    <title>Dashboard</title>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>

        body{
            font-family: 'Poppins', sans-serif;
            background: #f1f5f9;
        }

        .sidebar{
            width: 250px;
            height: 100vh;
            position: fixed;
            background: linear-gradient(180deg,#1e3a8a,#2563eb);
            padding-top: 30px;
        }

        .sidebar h3{
            color: white;
            text-align: center;
            margin-bottom: 40px;
            font-weight: 700;
        }

        .sidebar a{
            display: block;
            color: white;
            text-decoration: none;
            padding: 15px 25px;
            transition: 0.3s;
        }

        .sidebar a:hover{
            background: rgba(255,255,255,0.15);
        }

        .main{
            margin-left: 250px;
            padding: 30px;
        }

        .card-custom{
            border: none;
            border-radius: 20px;
            color: white;
            padding: 25px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        .bg1{
            background: linear-gradient(135deg,#2563eb,#1d4ed8);
        }

        .bg2{
            background: linear-gradient(135deg,#0f766e,#14b8a6);
        }

        .bg3{
            background: linear-gradient(135deg,#7c3aed,#9333ea);
        }

        .chart-card{
            background: white;
            border-radius: 20px;
            padding: 20px;
            margin-top: 30px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        }

    </style>

</head>

<body>

<div class="sidebar">

    <h3>📊 Wisatawan</h3>

    <a href="dashboard.php">Dashboard</a>

    <a href="data_wisatawan.php">Data Historis</a>

    <a href="prediksi.php">Prediksi</a>

    <a href="logout.php">Logout</a>

</div>

<div class="main">

    <h2 class="mb-4">
        Dashboard Prediksi Wisatawan
    </h2>

    <div class="row">

        <div class="col-md-4 mb-3">

            <div class="card-custom bg1">

                <h5>Total Data</h5>

                <h2><?= $total_data; ?></h2>

            </div>

        </div>

        <div class="col-md-4 mb-3">

            <div class="card-custom bg2">

                <h5>Total Wisatawan</h5>

                <h2><?= number_format($total); ?></h2>

            </div>

        </div>

        <div class="col-md-4 mb-3">

            <div class="card-custom bg3">

                <h5>Rata-rata</h5>

                <h2><?= round($rata); ?></h2>

            </div>

        </div>

    </div>

    <div class="chart-card">

        <h4 class="mb-4">
            Grafik Jumlah Wisatawan
        </h4>

        <canvas id="grafik"></canvas>

    </div>

</div>

<script>

const ctx = document.getElementById('grafik');

new Chart(ctx, {

    type: 'line',

    data: {

        labels: <?= json_encode($bulan); ?>,

        datasets: [{

            label: 'Jumlah Wisatawan',

            data: <?= json_encode($jumlah); ?>,

            borderWidth: 3,

            tension: 0.3

        }]
    }
});

</script>

</body>
</html>
