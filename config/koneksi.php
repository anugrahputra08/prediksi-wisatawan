<?php
$conn = mysqli_connect("localhost", "root", "", "wisatawan_db");

if(!$conn){
    die("Koneksi gagal : " . mysqli_connect_error());
}
?>