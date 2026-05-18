<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: login.php");
}

include 'config/koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($conn,
"SELECT * FROM wisatawan WHERE id='$id'");

$d = mysqli_fetch_array($data);

if(isset($_POST['update'])){

    $bulan = $_POST['bulan'];
    $tahun = $_POST['tahun'];
    $jumlah = $_POST['jumlah'];

    $update = mysqli_query($conn,
    "UPDATE wisatawan SET
    bulan='$bulan',
    tahun='$tahun',
    jumlah='$jumlah'
    WHERE id='$id'");

    if($update){

        echo "
        <script>
            alert('Data berhasil diupdate');
            window.location='data_wisatawan.php';
        </script>
        ";

    }else{

        echo "
        <script>
            alert('Data gagal diupdate');
        </script>
        ";

    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Edit Data Wisatawan</title>

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
            padding: 40px;
        }

        .card-custom{
            border: none;
            border-radius: 25px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        }

        .header-card{
            background: linear-gradient(135deg,#2563eb,#1d4ed8);
            color: white;
            padding: 30px;
        }

        .header-card h2{
            font-weight: 700;
        }

        .form-control,
        .form-select{
            border-radius: 12px;
            padding: 12px;
        }

        .form-control:focus,
        .form-select:focus{
            border-color: #2563eb;
            box-shadow: 0 0 10px rgba(37,99,235,0.3);
        }

        .btn-update{
            background: linear-gradient(135deg,#2563eb,#1d4ed8);
            border: none;
            border-radius: 12px;
            padding: 12px 20px;
            font-weight: 600;
            color: white;
        }

        .btn-update:hover{
            transform: translateY(-2px);
            transition: 0.3s;
        }

        .btn-kembali{
            border-radius: 12px;
            padding: 12px 20px;
            font-weight: 600;
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

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card card-custom">

                <div class="header-card">

                    <h2>Edit Data Wisatawan</h2>

                    <p class="mb-0">
                        Ubah data historis wisatawan
                    </p>

                </div>

                <div class="card-body p-4">

                    <form method="POST">

                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Bulan
                            </label>

                            <select name="bulan"
                                    class="form-select"
                                    required>

                                <option <?= ($d['bulan']=='Januari') ? 'selected' : ''; ?>>
                                    Januari
                                </option>

                                <option <?= ($d['bulan']=='Februari') ? 'selected' : ''; ?>>
                                    Februari
                                </option>

                                <option <?= ($d['bulan']=='Maret') ? 'selected' : ''; ?>>
                                    Maret
                                </option>

                                <option <?= ($d['bulan']=='April') ? 'selected' : ''; ?>>
                                    April
                                </option>

                                <option <?= ($d['bulan']=='Mei') ? 'selected' : ''; ?>>
                                    Mei
                                </option>

                                <option <?= ($d['bulan']=='Juni') ? 'selected' : ''; ?>>
                                    Juni
                                </option>

                                <option <?= ($d['bulan']=='Juli') ? 'selected' : ''; ?>>
                                    Juli
                                </option>

                                <option <?= ($d['bulan']=='Agustus') ? 'selected' : ''; ?>>
                                    Agustus
                                </option>

                                <option <?= ($d['bulan']=='September') ? 'selected' : ''; ?>>
                                    September
                                </option>

                                <option <?= ($d['bulan']=='Oktober') ? 'selected' : ''; ?>>
                                    Oktober
                                </option>

                                <option <?= ($d['bulan']=='November') ? 'selected' : ''; ?>>
                                    November
                                </option>

                                <option <?= ($d['bulan']=='Desember') ? 'selected' : ''; ?>>
                                    Desember
                                </option>

                            </select>

                        </div>

                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Tahun
                            </label>

                            <input type="number"
                                   name="tahun"
                                   value="<?= $d['tahun']; ?>"
                                   class="form-control"
                                   required>

                        </div>

                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Jumlah Wisatawan
                            </label>

                            <input type="number"
                                   name="jumlah"
                                   value="<?= $d['jumlah']; ?>"
                                   class="form-control"
                                   required>

                        </div>

                        <div class="d-flex gap-2">

                            <button type="submit"
                                    name="update"
                                    class="btn btn-update w-100">

                                Update Data

                            </button>

                            <a href="data_wisatawan.php"
                               class="btn btn-secondary btn-kembali w-100">

                               Kembali

                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>
