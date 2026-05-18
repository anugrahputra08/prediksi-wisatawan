<?php
include 'config/koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($conn,
"SELECT * FROM wisatawan WHERE id='$id'");
$d = mysqli_fetch_array($data);

if(isset($_POST['update'])){

    $bulan = $_POST['bulan'];
    $tahun = $_POST['tahun'];
    $jumlah = $_POST['jumlah'];

    mysqli_query($conn,
    "UPDATE wisatawan SET
    bulan='$bulan',
    tahun='$tahun',
    jumlah='$jumlah'
    WHERE id='$id'");

    header("Location: data_wisatawan.php");
}

include 'includes/header.php';
include 'includes/navbar.php';
?>

<div class="container mt-4">

    <div class="card shadow">
        <div class="card-body">

            <h3>Edit Data</h3>

            <form method="POST">

                <div class="mb-3">
                    <label>Bulan</label>
                    <input type="text"
                    name="bulan"
                    value="<?= $d['bulan']; ?>"
                    class="form-control">
                </div>

                <div class="mb-3">
                    <label>Tahun</label>
                    <input type="number"
                    name="tahun"
                    value="<?= $d['tahun']; ?>"
                    class="form-control">
                </div>

                <div class="mb-3">
                    <label>Jumlah</label>
                    <input type="number"
                    name="jumlah"
                    value="<?= $d['jumlah']; ?>"
                    class="form-control">
                </div>

                <button class="btn btn-success" name="update">
                    Update
                </button>

            </form>

        </div>
    </div>

</div>

<?php include 'includes/footer.php'; ?>