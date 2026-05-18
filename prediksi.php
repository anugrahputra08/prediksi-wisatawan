<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: login.php");
}

include 'config/koneksi.php';

$data = mysqli_query($conn,
"SELECT * FROM wisatawan ORDER BY id ASC");

$x = [];
$y = [];

$no = 1;

while($d = mysqli_fetch_array($data)){

    $x[] = $no++;
    $y[] = $d['jumlah'];
}

$n = count($x);

$sumX = array_sum($x);
$sumY = array_sum($y);

$sumXY = 0;
$sumX2 = 0;

for($i=0; $i<$n; $i++){

    $sumXY += $x[$i] * $y[$i];
    $sumX2 += $x[$i] * $x[$i];
}

$b = (($n * $sumXY) - ($sumX * $sumY)) /
(($n * $sumX2) - ($sumX * $sumX));

$a = ($sumY - ($b * $sumX)) / $n;

$nextX = $n + 1;

$prediksi = $a + ($b * $nextX);
?>

<!DOCTYPE html>
<html>
<head>

    <title>Prediksi Wisatawan</title>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

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

        .prediksi-card{
            border: none;
            border-radius: 25px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .header-card{
            background: linear-gradient(135deg,#2563eb,#1d4ed8);
            color: white;
            padding: 30px;
        }

        .hasil{
            font-size: 45px;
            font-weight: 700;
            color: #2563eb;
        }

        .box{
            background: #f8fafc;
            border-radius: 15px;
            padding: 20px;
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

    <div class="card prediksi-card">

        <div class="header-card">

            <h2>Prediksi Jumlah Wisatawan</h2>

            <p>
                Menggunakan metode Linear Regression
            </p>

        </div>

        <div class="card-body p-5">

            <div class="row">

                <div class="col-md-4 mb-3">

                    <div class="box text-center">

                        <h5>Nilai A</h5>

                        <h3><?= round($a,2); ?></h3>

                    </div>

                </div>

                <div class="col-md-4 mb-3">

                    <div class="box text-center">

                        <h5>Nilai B</h5>

                        <h3><?= round($b,2); ?></h3>

                    </div>

                </div>

                <div class="col-md-4 mb-3">

                    <div class="box text-center">

                        <h5>Total Data</h5>

                        <h3><?= $n; ?></h3>

                    </div>

                </div>

            </div>

            <div class="text-center mt-5">

                <h4>
                    Prediksi Bulan Berikutnya
                </h4>

                <div class="hasil">

                    <?= round($prediksi); ?>

                </div>

                <p>
                    Wisatawan
                </p>

            </div>

        </div>

    </div>

</div>

</body>
</html>
