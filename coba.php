<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perhitungan Gaji</title>
</head>
<body>
    <h1>Perhitungan Gaji</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="jumlahHariKerja">Jumlah Hari Kerja:</label>
        <input type="number" id="jumlahHariKerja" name="jumlahHariKerja" required><br><br>
    <label for="jumlahJamLembur">Jumlah Jam Lembur:</label>
    <input type="number" id="jumlahJamLembur" name="jumlahJamLembur" required><br><br>
    
    <button type="submit">Hitung Gaji</button>
</form>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $jumlahHariKerja = intval($_POST["jumlahHariKerja"]);
        $jumlahJamLembur = intval($_POST["jumlahJamLembur"]);

        $gajiPerHari = 50000;
        $totalGaji = $gajiPerHari * $jumlahHariKerja;

        $uangLembur = 0;
        if ($jumlahJamLembur > 0) {
            if ($jumlahJamLembur >= 3) {
                $uangLembur = 2 * 25000 + ($jumlahJamLembur - 2) * 35000;
            } else {
                $uangLembur = $jumlahJamLembur * 25000;
            }
        }

        $uangMakan = 0;
        if ($jumlahHariKerja >= 20) {
            $uangMakan = 5000 * $jumlahHariKerja;
        }

        $totalGaji += $uangLembur + $uangMakan;

        echo "<p><input type='text' value='Gaji Pokok: Rp" . number_format($gajiPerHari * $jumlahHariKerja, 2, ',', '.') . "' readonly></p>";
        echo "<p><input type='text' value='Uang Lembur: Rp" . number_format($uangLembur, 2, ',', '.') . "' readonly></p>";
        echo "<p><input type='text' value='Uang Makan: Rp" . number_format($uangMakan, 2, ',', '.') . "' readonly></p>";
        echo "<p><input type='text' value='Total Gaji: Rp" . number_format($totalGaji, 2, ',', '.') . "' readonly></p>";
    }
?>
</body>
</html>