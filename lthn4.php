<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Syarat Penerimaan Pegawai</title>
</head>
<body>
    <h1>Syarat Penerimaan Pegawai</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <label for="jenisKelamin">Jenis Kelamin:</label>
        <select id="jenisKelamin" name="jenisKelamin" required>
            <option value="laki-laki">Laki-laki</option>
            <option value="perempuan">Perempuan</option>
        </select><br><br>
    <label for="tinggiBadan">Tinggi Badan (cm):</label>
    <input type="number" id="tinggiBadan" name="tinggiBadan" required><br><br>
    
    <label for="beratBadan">Berat Badan (kg):</label>
    <input type="number" id="beratBadan" name="beratBadan" required><br><br>
    
    <label for="ipk">IPK:</label>
    <input type="number" step="0.01" id="ipk" name="ipk" required><br><br>
    
    <label for="pendidikan">Pendidikan:</label>
    <select id="pendidikan" name="pendidikan" required>
        <option value="D3">D3</option>
        <option value="S1">S1</option>
    </select><br><br>
    
    <button type="submit">Cek Kelayakan</button>
</form>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $jenisKelamin = $_POST["jenisKelamin"];
        $tinggiBadan = intval($_POST["tinggiBadan"]);
        $beratBadan = intval($_POST["beratBadan"]);
        $ipk = floatval($_POST["ipk"]);
        $pendidikan = $_POST["pendidikan"];

        $bbIdeal = $tinggiBadan - 110;

        $layak = false;
        if (($jenisKelamin === "laki-laki" && $tinggiBadan >= 170 && $tinggiBadan <= 179 && $beratBadan == $bbIdeal && $ipk >= 3 && $ipk <= 4 && ($pendidikan === "D3" || $pendidikan === "S1")) ||
            ($jenisKelamin === "perempuan" && $tinggiBadan >= 160 && $tinggiBadan <= 170 && $beratBadan == $bbIdeal && $ipk >= 3 && $ipk <= 4 && ($pendidikan === "D3" || $pendidikan === "S1"))) {
            $layak = true;
        }

        if ($layak) {
            echo "<pre>Selamat! Anda memenuhi syarat penerimaan pegawai.</pre>";
        } else {
            echo "<pre>Maaf, Anda tidak memenuhi syarat penerimaan pegawai.</pre>";
        }
    }
?>
</body>
</html>