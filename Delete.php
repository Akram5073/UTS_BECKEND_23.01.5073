<?php
# Tambahkan file konfigurasi
require "./config.php";

# Mulai sesi PHP
session_start();

# Periksa apakah user sudah login
if (!isset($_SESSION["akses"]) || $_SESSION["akses"] !== true) {
    header("location:./index.php?error=Anda harus login untuk mengakses halaman ini");
    exit;
}

# Periksa apakah data 'nama' telah dikirim melalui POST
if (isset($_POST['nama'])) {
    # Filter dan ambil data dari form
    $nama = mysqli_real_escape_string($sambung, $_POST['nama']);

    # Query untuk menghapus data
    $sql = "DELETE FROM responsi WHERE nama = '$nama'";
    if (mysqli_query($sambung, $sql)) {
        # Redirect kembali ke halaman dashboard dengan pesan sukses
        header("location:dosen.php?message=Data berhasil dihapus");
        exit;
    } else {
        # Jika gagal, tampilkan pesan error
        echo "Error: " . mysqli_error($sambung);
    }
} else {
    echo "Data tidak lengkap untuk menghapus.";
}

# Tutup koneksi
mysqli_close($sambung);
?>
