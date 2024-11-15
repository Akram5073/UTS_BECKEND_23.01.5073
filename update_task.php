<?php
require "./config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama = $_POST['nama'];
    $tugas1 = $_POST['tugas1'];
    $tugas2 = $_POST['tugas2'];
    $tugas3 = $_POST['tugas3'];
    $tugas4 = $_POST['tugas4'];
    $UTS = $_POST['UTS'];
    $UAS = $_POST['UAS'];

    $sqlUpdate = "UPDATE responsi SET tugas1 = '$tugas1', tugas2 = '$tugas2', tugas3 = '$tugas3', tugas4 = '$tugas4', UTS = '$UTS', UAS = '$UAS' WHERE nama = '$nama'";
    $result = mysqli_query($sambung, $sqlUpdate);

    if ($result) {
        header("Location: dosen.php");
    } else {
        echo "Gagal mengupdate data";
    }
}
?>
