<?php
include("config.php");
// ambil data dari form
$nama = $_POST['name'];
$username = $_POST['username'];
$password = md5($_POST['password']);
// buat query
$sql = "INSERT INTO mydata (name, username, password) VALUES ('$nama', '$username', '$password')";
$query = mysqli_query($sambung, $sql);

if($query) {

echo "Berhasil";
exit;
} else {

echo "gagal";
exit;
}
?>