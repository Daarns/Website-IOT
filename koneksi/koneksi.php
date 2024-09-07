<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "project_iot_vokasi";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
