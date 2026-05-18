<?php
include 'config/koneksi.php';

$id = $_GET['id'];

mysqli_query($conn,
"DELETE FROM wisatawan WHERE id='$id'");

header("Location: data_wisatawan.php");
?>