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
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Dashboard Wisatawan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body{
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            overflow-x: hidden;
            background:
            linear-gradient(rgba(15,23,42,0.85),
            rgba(30,58,138,0.85)),
            url('data:image/jpeg;base64,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');

            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        .sidebar{
            width: 260px;
            height: 100vh;
            position: fixed;
            background: rgba(255,255,255,0.08);
            backdrop-filter: blur(15px);
            border-right: 1px solid rgba(255,255,255,0.1);
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
            margin: 8px 15px;
            border-radius: 12px;
            transition: 0.3s;
        }

        .sidebar a:hover{
            background: rgba(255,255,255,0.15);
            transform: translateX(5px);
        }

        .main{
            margin-left: 260px;
            padding: 35px;
        }

        .title{
            color: white;
            font-weight: 700;
            margin-bottom: 30px;
        }

        .glass-card{
            background: rgba(255,255,255,0.12);
            backdrop-filter: blur(12px);
            border-radius: 25px;
            padding: 25px;
            color: white;
            box-shadow: 0 8px 32px rgba(0,0,0,0.2);
            border: 1px solid rgba(255,255,255,0.1);
            transition: 0.3s;
        }

        .glass-card:hover{
            transform: translateY(-5px);
        }

        .glass-card h5{
            font-size: 18px;
            font-weight: 500;
        }

        .glass-card h2{
            font-size: 35px;
            font-weight: 700;
        }

        .chart-container{
            margin-top: 30px;
            background: rgba(255,255,255,0.12);
            backdrop-filter: blur(12px);
            border-radius: 25px;
            padding: 30px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.2);
            border: 1px solid rgba(255,255,255,0.1);
        }

        .chart-title{
            color: white;
            margin-bottom: 20px;
            font-weight: 600;
        }

        canvas{
            background: rgba(255,255,255,0.95);
            border-radius: 20px;
            padding: 15px;
        }

        @media(max-width:768px){

            .sidebar{
                width: 100%;
                height: auto;
                position: relative;
            }

            .main{
                margin-left: 0;
            }

        }

    </style>

</head>

<body>

<div class="sidebar">

    <h3>📊 Wisatawan</h3>

    <a href="dashboard.php">🏠 Dashboard</a>

    <a href="data_wisatawan.php">📁 Data Historis</a>

    <a href="prediksi.php">📈 Prediksi</a>

    <a href="logout.php">🚪 Logout</a>

</div>

<div class="main">

    <h1 class="title">
        Dashboard Prediksi Wisatawan
    </h1>

    <div class="row">

        <div class="col-md-4 mb-4">

            <div class="glass-card">

                <h5>Total Data</h5>

                <h2><?= $total_data; ?></h2>

            </div>

        </div>

        <div class="col-md-4 mb-4">

            <div class="glass-card">

                <h5>Total Wisatawan</h5>

                <h2><?= number_format($total); ?></h2>

            </div>

        </div>

        <div class="col-md-4 mb-4">

            <div class="glass-card">

                <h5>Rata-rata</h5>

                <h2><?= round($rata); ?></h2>

            </div>

        </div>

    </div>

    <div class="chart-container">

        <h4 class="chart-title">
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

            tension: 0.4,
            fill: true

        }]
    },

    options: {

        responsive: true

    }

});

</script>

</body>
</html>
