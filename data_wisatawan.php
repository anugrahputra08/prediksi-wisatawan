<?php
session_start();
include 'config/koneksi.php';
include 'includes/header.php';
include 'includes/navbar.php';
?>

<div class="container mt-4">

    <div class="card shadow">

        <div class="card-body">

            <div class="d-flex justify-content-between mb-3">
                <h3>Data Historis Wisatawan</h3>

                <a href="tambah_data.php" class="btn btn-primary">
                    Tambah Data
                </a>
            </div>

            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Bulan</th>
                    <th>Tahun</th>
                    <th>Jumlah</th>
                    <th>Aksi</th>
                </tr>

                <?php
                $no = 1;
                $data = mysqli_query($conn,
                "SELECT * FROM wisatawan");

                while($d = mysqli_fetch_array($data)){
                ?>

                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $d['bulan']; ?></td>
                    <td><?= $d['tahun']; ?></td>
                    <td><?= $d['jumlah']; ?></td>

                    <td>
                        <a href="edit_data.php?id=<?= $d['id']; ?>"
                        class="btn btn-warning btn-sm">
                        Edit
                        </a>

                        <a href="hapus_data.php?id=<?= $d['id']; ?>"
                        class="btn btn-danger btn-sm">
                        Hapus
                        </a>
                    </td>
                </tr>

                <?php } ?>

            </table>

        </div>
    </div>

</div>

<?php include 'includes/footer.php'; ?>