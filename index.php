<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
include_once("config.php");

$result = mysqli_query($mysqli, "SELECT * FROM buku ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Buku Perpustakaan</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f7fc;
            color: #333;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #007bff;
            color: #fff;
            padding: 15px 30px;
            text-align: center;
        }
        header h1 {
            margin: 0;
            font-size: 2.5em;
        }
        nav {
            text-align: right;
            padding: 10px 30px;
        }
        nav a {
            color: #fff;
            font-weight: bold;
            text-decoration: none;
            margin: 0 15px;
            background-color: #28a745;
            padding: 8px 16px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        nav a:hover {
            background-color: #218838;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            overflow: hidden;
        }
        .add-book-btn {
            background-color: #28a745;
            padding: 10px 20px;
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            border-radius: 5px;
            display: inline-block;
            transition: background-color 0.3s ease;
        }
        .add-book-btn:hover {
            background-color: #218838;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        table th, table td {
            padding: 12px 15px;
            text-align: left;
        }
        table th {
            background-color: #007bff;
            color: #fff;
            font-weight: 500;
        }
        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        table tr:hover {
            background-color: #f1f1f1;
        }
        table td a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
            margin-right: 10px;
        }
        table td a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>

<header>
    <h1>Manajemen Buku Perpustakaan</h1>
</header>

<nav>
    <a href="logout.php">Logout</a>
</nav>

<div class="container">
    <div>
        <a href="add.php" class="add-book-btn">Tambah Buku</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Tahun Terbit</th>
                <th>Genre</th>
                <th>Lokasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            while ($data = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $i . "</td>";
                echo "<td>" . $data['judul_buku'] . "</td>";
                echo "<td>" . $data['penulis'] . "</td>";
                echo "<td>" . $data['tahun_terbit'] . "</td>";
                echo "<td>" . $data['genre'] . "</td>";
                echo "<td>" . $data['lokasi_simpan'] . "</td>";
                echo "<td><a href='edit.php?id=$data[id]'>Edit</a> | <a href='delete.php?id=$data[id]'>Delete</a></td>";
                echo "</tr>";
                $i++;
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>
