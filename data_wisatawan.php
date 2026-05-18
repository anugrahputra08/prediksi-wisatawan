<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: login.php");
}

include 'config/koneksi.php';

$data = mysqli_query($conn,
"SELECT * FROM wisatawan ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>

    <title>Data Historis</title>

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

        .card-table{
            background: white;
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        }

        table{
            vertical-align: middle !important;
        }

        .btn-custom{
            border-radius: 10px;
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

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>Data Historis Wisatawan</h2>

        <a href="tambah_data.php"
           class="btn btn-primary btn-custom">

           + Tambah Data

        </a>

    </div>

    <div class="card-table">

        <table class="table table-hover">

            <thead class="table-primary">

                <tr>

                    <th>No</th>
                    <th>Bulan</th>
                    <th>Tahun</th>
                    <th>Jumlah Wisatawan</th>
                    <th>Aksi</th>

                </tr>

            </thead>

            <tbody>

                <?php
                $no = 1;

                while($d = mysqli_fetch_array($data)){
                ?>

                <tr>

                    <td><?= $no++; ?></td>

                    <td><?= $d['bulan']; ?></td>

                    <td><?= $d['tahun']; ?></td>

                    <td>
                        <?= number_format($d['jumlah']); ?>
                    </td>

                    <td>

                        <a href="edit_data.php?id=<?= $d['id']; ?>"
                           class="btn btn-warning btn-sm btn-custom">

                           Edit

                        </a>

                        <a href="hapus_data.php?id=<?= $d['id']; ?>"
                           class="btn btn-danger btn-sm btn-custom"
                           onclick="return confirm('Yakin ingin menghapus data?')">

                           Hapus

                        </a>

                    </td>

                </tr>

                <?php } ?>

            </tbody>

        </table>

    </div>

</div>

</body>
</html>
