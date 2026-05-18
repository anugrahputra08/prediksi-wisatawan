<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: login.php");
}

include 'config/koneksi.php';

if(isset($_POST['simpan'])){

    $bulan = $_POST['bulan'];
    $tahun = $_POST['tahun'];
    $jumlah = $_POST['jumlah'];

    $simpan = mysqli_query($conn,
    "INSERT INTO wisatawan(bulan,tahun,jumlah)
    VALUES('$bulan','$tahun','$jumlah')");

    if($simpan){

        echo "
        <script>
            alert('Data berhasil disimpan');
            window.location='data_wisatawan.php';
        </script>
        ";

    }else{

        echo "
        <script>
            alert('Data gagal disimpan');
        </script>
        ";

    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Input Data Wisatawan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>

        body{
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg,#0f172a,#1e3a8a);
            min-height: 100vh;
        }

        .card-custom{
            border: none;
            border-radius: 25px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            animation: fadeIn 0.7s ease;
        }

        .header-custom{
            background: linear-gradient(135deg,#2563eb,#1d4ed8);
            color: white;
            padding: 25px;
        }

        .header-custom h3{
            font-weight: 700;
        }

        .form-control,
        .form-select{
            border-radius: 12px;
            padding: 12px;
        }

        .form-control:focus,
        .form-select:focus{
            box-shadow: 0 0 10px rgba(37,99,235,0.4);
            border-color: #2563eb;
        }

        .btn-primary{
            background: linear-gradient(135deg,#2563eb,#1d4ed8);
            border: none;
            border-radius: 12px;
            padding: 12px 20px;
            font-weight: 600;
        }

        .btn-primary:hover{
            transform: translateY(-2px);
            transition: 0.3s;
        }

        .btn-secondary{
            border-radius: 12px;
            padding: 12px 20px;
            font-weight: 600;
        }

        .icon-box{
            width: 70px;
            height: 70px;
            background: rgba(255,255,255,0.2);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 30px;
            margin-bottom: 10px;
        }

        @keyframes fadeIn{
            from{
                opacity: 0;
                transform: translateY(20px);
            }

            to{
                opacity: 1;
                transform: translateY(0);
            }
        }

    </style>

</head>

<body>

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-7">

            <div class="card card-custom">

                <div class="header-custom text-center">

                    <div class="icon-box mx-auto">
                        📊
                    </div>

                    <h3>Input Data Wisatawan</h3>

                    <p class="mb-0">
                        Sistem Prediksi Jumlah Wisatawan
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

                                <option value="">
                                    -- Pilih Bulan --
                                </option>

                                <option>Januari</option>
                                <option>Februari</option>
                                <option>Maret</option>
                                <option>April</option>
                                <option>Mei</option>
                                <option>Juni</option>
                                <option>Juli</option>
                                <option>Agustus</option>
                                <option>September</option>
                                <option>Oktober</option>
                                <option>November</option>
                                <option>Desember</option>

                            </select>

                        </div>

                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Tahun
                            </label>

                            <input type="number"
                                   name="tahun"
                                   class="form-control"
                                   placeholder="Contoh: 2025"
                                   required>

                        </div>

                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Jumlah Wisatawan
                            </label>

                            <input type="number"
                                   name="jumlah"
                                   class="form-control"
                                   placeholder="Masukkan jumlah wisatawan"
                                   required>

                        </div>

                        <div class="d-flex gap-2">

                            <button type="submit"
                                    name="simpan"
                                    class="btn btn-primary w-100">

                                Simpan Data

                            </button>

                            <a href="data_wisatawan.php"
                               class="btn btn-secondary w-100">

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
