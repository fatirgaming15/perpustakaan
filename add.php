<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
include_once("config.php");

if (isset($_POST['submit'])) {
    $judul_buku = $_POST['judul_buku'];
    $penulis = $_POST['penulis'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $genre = $_POST['genre'];
    $lokasi_simpan = $_POST['lokasi_simpan'];

    $result = mysqli_query($mysqli, "INSERT INTO buku(judul_buku, penulis, tahun_terbit, genre, lokasi_simpan) VALUES('$judul_buku','$penulis','$tahun_terbit','$genre','$lokasi_simpan')");
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Buku</title>
</head>
<body>
    <h2>Tambah Buku</h2>
    <form action="add.php" method="post">
        <label>Judul Buku</label><br>
        <input type="text" name="judul_buku" required><br>
        <label>Penulis</label><br>
        <input type="text" name="penulis" required><br>
        <label>Tahun Terbit</label><br>
        <input type="number" name="tahun_terbit" required><br>
        <label>Genre</label><br>
        <input type="text" name="genre" required><br>
        <label>Lokasi Simpan</label><br>
        <input type="text" name="lokasi_simpan" required><br><br>
        <button type="submit" name="submit">Simpan</button>
    </form>
</body>
</html>
