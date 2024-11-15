<?php
# Add file config
require "./config.php";
session_start();
$akses = @$_SESSION["akses"];

# Check if user has access
if ($akses != true) {
    header("location:./index.php?error=Halaman Dashboard Harus Login");
}

$sql = "SELECT * FROM responsi";
$query = mysqli_query($sambung, $sql);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="shortcut icon" href="https://amikom.ac.id/theme/material/img/amikom_icon_pack/favicon-16x16.png"
        type="image/x-icon">
    <link rel="stylesheet" href="home.css">
    <style>
        .add {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
            max-width: 100%;
        }

        .add input[type="text"] {
            flex-grow: 1;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        .add input[type="text"]:focus {
            border-color: #7b2cbf;
            box-shadow: 0 0 5px rgba(123, 44, 191, 0.5);
        }

        .add button {
            background: linear-gradient(to right, #ac2cde, #bc51e6, #d35de0);
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            cursor: pointer;
            transition: background 0.3s ease;

        }

        .add button:hover {
            background: #000000
        }

        /* Table Styling */
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            margin-left: 0px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            overflow: hidden;
        }

        .table th,
        .table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .table th {
            background: linear-gradient(to right, #ac2cde, #bc51e6, #d35de0);
            color: #fff;
            font-weight: bold;
        }

        .table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .table tr:hover {
            background-color: #f1f1f1;
        }

        .table td {
            color: #333;
        }

        .table a {
            padding: 6px 12px;
            background-color: #007BFF;
            color: white;
            border-radius: 5px;
            text-decoration: none;
        }

        .table a:hover {
            background-color: #0056b3;
        }

        .table button {
            padding: 6px 12px;
            background-color: #d9534f;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .table button:hover {
            background-color: #c9302c;
        }

        /* Modal Background */
        .modal {
            display: none;
            /* Hidden by default, shown when active */
            position: fixed;
            z-index: 1;
            /* On top */
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black with opacity */
        }

        /* Active Modal */
        .modal-active {
            display: block;
        }

        /* Modal Content Box */
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            /* Center the modal */
            padding: 20px;
            border: 1px solid #888;
            width: 40%;
            /* Width of the modal */
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        /* Close Button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        /* Form inside modal */
        .modal-content form {
            display: flex;
            flex-direction: column;
        }

        .modal-content label {
            font-weight: bold;
            margin-top: 10px;
            color: #4b39ed;
        }

        .modal-content input {
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #b81ef6;
            margin-top: 5px;
        }

        .modal-content button {
            margin-top: 15px;
            padding: 10px;
            background: linear-gradient(to right, #ac2cde, #bc51e6, #d35de0);
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }

        .modal-content button:hover {
            background-color: #000;
            color: white;
        }
    </style>
</head>

<body>
    <header>
        <h1>AMIKOM</h1>
        <div class="p">
            <button onclick="location.href='logout.php'">Log Out</button>
            <img src=".png">
            <a>nama</a>
        </div>
    </header>
    <nav>
        <ul>
            <li><a href="./home.php">Dashboard</a></li>
            <li><a>Presensi</a></li>
            <li><a>Jadwal</a></li>
            <li><a>Rekapitulasi Nilai</a></li>
            <li><a>Panduan</a></li>
        </ul>
    </nav>
    <main>
        <form class="add" action="add_data.php" method="POST">
            <input type="text" id="nama" name="nama" placeholder="Masukkan Nama" required>
            <button type="submit">Tambah Data</button>
        </form>

        <table class="table" border="1">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Tugas 1</th>
                    <th>Tugas 2</th>
                    <th>Tugas 3</th>
                    <th>Tugas 4</th>
                    <th>UTS</th>
                    <th>UAS</th>
                    <th>Edit Nilai</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($datauser = mysqli_fetch_array($query)) {
                    echo "<tr>";
                    echo "<td>" . $datauser["nama"] . "</td>";
                    echo "<td>" . $datauser["tugas1"] . "</td>";
                    echo "<td>" . $datauser["tugas2"] . "</td>";
                    echo "<td>" . $datauser["tugas3"] . "</td>";
                    echo "<td>" . $datauser["tugas4"] . "</td>";
                    echo "<td>" . $datauser["UTS"] . "</td>"; // UTS
                    echo "<td>" . $datauser["UAS"] . "</td>"; // UAS
                    echo "<td>";
                    // Add a link to open the modal for the selected user
                    echo "<a href='?nama=" . $datauser['nama'] . "' style='padding: 10px; background-color: #007BFF; color: white; border-radius: 5px;'>Edit</a>";
                    echo "</form>";
                    echo "<form action='Delete.php' method='POST' style='display:inline-block;'>";
                    echo "<input type='hidden' name='nama' value='" . $datauser["nama"] . "'>";
                    echo "<button type='submit' onclick='return confirm(\"Apakah delete nama mahasiswa?\")'>Delete</button>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <?php
        if (isset($_GET['nama'])) {
            $nama = $_GET['nama'];
            $sqlUser = "SELECT * FROM responsi WHERE nama = '$nama'";
            $queryUser = mysqli_query($sambung, $sqlUser);
            $datauser = mysqli_fetch_array($queryUser);

            if ($datauser) {
                echo "<div class='modal modal-active'>";
                echo "<div class='modal-content'>";
                echo "<span class='close' onclick='window.location.href=\"dosen.php\"'>&times;</span>";
                echo "<h2>Update Nilai Tugas</h2>";
                echo "<form action='update_task.php' method='POST'>";

                // Memperbaiki kesalahan pada penulisan value input
                echo "<input type='hidden' name='nama' value='" . htmlspecialchars($datauser["nama"]) . "'>";
                echo "<label>Tugas 1: </label><input type='text' name='tugas1' value='" . htmlspecialchars($datauser["tugas1"]) . "'><br>";
                echo "<label>Tugas 2: </label><input type='text' name='tugas2' value='" . htmlspecialchars($datauser["tugas2"]) . "'><br>";
                echo "<label>Tugas 3: </label><input type='text' name='tugas3' value='" . htmlspecialchars($datauser["tugas3"]) . "'><br>";
                echo "<label>Tugas 4: </label><input type='text' name='tugas4' value='" . htmlspecialchars($datauser["tugas4"]) . "'><br>";
                echo "<label>UTS: </label><input type='text' name='UTS' value='" . htmlspecialchars($datauser["UTS"]) . "'><br>";
                echo "<label>UAS: </label><input type='text' name='UAS' value='" . htmlspecialchars($datauser["UAS"]) . "'><br>";

                echo "<button type='submit'>Update</button>";
                echo "</form>";
                echo "</div>";
                echo "</div>";
            }
        }
        ?>

    </main>
</body>

</html>