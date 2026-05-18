<?php
include 'config/koneksi.php';
include 'includes/header.php';
include 'includes/navbar.php';

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

<div class="container mt-4">

    <div class="card shadow">
        <div class="card-body">

            <h3>Hasil Prediksi Wisatawan</h3>

            <table class="table table-bordered">

                <tr>
                    <th>Nilai A</th>
                    <td><?= round($a,2); ?></td>
                </tr>

                <tr>
                    <th>Nilai B</th>
                    <td><?= round($b,2); ?></td>
                </tr>

                <tr>
                    <th>Prediksi Bulan Berikutnya</th>
                    <td>
                        <h4><?= round($prediksi); ?> Wisatawan</h4>
                    </td>
                </tr>

            </table>

        </div>
    </div>

</div>

<?php include 'includes/footer.php'; ?>