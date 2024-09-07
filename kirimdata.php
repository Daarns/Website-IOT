<?php
$koneksi = mysqli_connect("localhost", "root", "", "project_iot_vokasi");

if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

// Periksa jika variabel sudah ada sebelum digunakan
if (isset($_GET['suhu']) && isset($_GET['kelembaban'])) {
    $suhus = $_GET['suhu'];
    $kelembabans = $_GET['kelembaban'];

    mysqli_query($koneksi, "ALTER TABLE tabel_sensor AUTO_INCREMENT=1");

    $simpan = "INSERT INTO tabel_sensor(suhu, kelembaban) VALUES ('$suhus', '$kelembabans')";

    // Eksekusi query
    if (mysqli_query($koneksi, $simpan)) {
        echo "Data berhasil disimpan";
    } else {
        echo "Error: " . $simpan . "<br>" . mysqli_error($koneksi);
    }
} else {
    echo "Data suhu dan kelembaban tidak tersedia.";
}

mysqli_close($koneksi);
?>
