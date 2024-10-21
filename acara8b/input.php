<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kecamatan - Valorant Theme</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #2A2A2A;
            color: #FFFFFF;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #FF4654; /* Warna merah Valorant */
        }
        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            background-color: #1E1E1E;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }
        label {
            display: block;
            margin: 15px 0 5px;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #333333;
            color: #FFFFFF;
        }
        input[type="submit"] {
            background-color: #FF4654; /* Warna merah Valorant */
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #FF1C24;
        }
        .message {
            text-align: center;
            margin-top: 20px;
            font-size: 18px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Input Data Kecamatan</h1>
    <form method="POST" action="">
        <label for="kecamatan">Kecamatan:</label>
        <input type="text" id="kecamatan" name="kecamatan" required>

        <label for="luas">Luas (ha):</label>
        <input type="number" id="luas" name="luas" required>

        <label for="jumlah_penduduk">Jumlah Penduduk:</label>
        <input type="number" id="jumlah_penduduk" name="jumlah_penduduk" required>

        <label for="longitude">Longitude:</label>
        <input type="text" id="longitude" name="longitude" required>

        <label for="latitude">Latitude:</label>
        <input type="text" id="latitude" name="latitude" required>

        <input type="submit" value="Kirim Data">
    </form>

    <div class="message">
        <?php
        // Koneksi ke database
        $conn = new mysqli('localhost', 'root', '', 'pgweb8');

        // Cek koneksi
        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        // Tangkap data dari form
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $kecamatan = $_POST['kecamatan'];
            $luas = $_POST['luas'];
            $jumlah_penduduk = $_POST['jumlah_penduduk'];
            $longitude = $_POST['longitude'];
            $latitude = $_POST['latitude'];

            // Query untuk memasukkan data ke dalam tabel kecamatan_data
            $sql = "INSERT INTO kecamatan_data (kecamatan, luas, jumlah_penduduk, longitude, latitude)
                    VALUES ('$kecamatan', '$luas', '$jumlah_penduduk', '$longitude', '$latitude')";

            if ($conn->query($sql) === TRUE) {
                echo "Alhamduillah bisa, syukuran dulu lah";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        // Tutup koneksi
        $conn->close();
        ?>
    </div>
</div>

</body>
</html>
