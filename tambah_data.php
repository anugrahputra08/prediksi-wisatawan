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

include 'includes/header.php';
include 'includes/navbar.php';
?>

<div class="container mt-4">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card shadow">

                <div class="card-header bg-primary text-white">
                    <h4>Input Data Wisatawan</h4>
                </div>

                <div class="card-body">

                    <form method="POST">

                        <div class="mb-3">
                            <label class="form-label">
                                Bulan
                            </label>

                            <select name="bulan" class="form-control" required>

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

                        <div class="mb-3">

                            <label class="form-label">
                                Tahun
                            </label>

                            <input type="number"
                                   name="tahun"
                                   class="form-control"
                                   placeholder="Masukkan Tahun"
                                   required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Jumlah Wisatawan
                            </label>

                            <input type="number"
                                   name="jumlah"
                                   class="form-control"
                                   placeholder="Masukkan Jumlah Wisatawan"
                                   required>

                        </div>

                        <button type="submit"
                                name="simpan"
                                class="btn btn-primary">

                            Simpan Data

                        </button>

                        <a href="data_wisatawan.php"
                           class="btn btn-secondary">

                           Kembali

                        </a>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<?php include 'includes/footer.php'; ?>