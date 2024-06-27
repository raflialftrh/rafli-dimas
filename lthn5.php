<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body >
    <div class="detik">
        
        <form id="detikForm" method="POST">
            <h2>Input Pemakaian</h2>
            <label for="detikInput">Masukkan jumlah detik pemakaian:</label><br>
            <input type="number" id="detikInput" name="detikInput" required><br><br>
            <button class="button" type="submit" name="hitung">Hitung</button>
            
             <br>
            
             <label for="totalDetik">Total detik:</label><br>
            <input type="text" id="totalDetik" name="totalDetik" value="<?php echo isset($_POST['detikInput']) ? $_POST['detikInput'] . ' detik' : ''; ?>" disabled><br>
            
            <label for="jam">Jam:</label><br>
            <input type="text" id="jam" name="jam" value="<?php echo isset($jam) ? $jam . ' jam' : ''; ?>" disabled><br>
            
            <label for="menit">Menit:</label><br>
            <input type="text" id="menit" name="menit" value="<?php echo isset($menit) ? $menit . ' menit' : ''; ?>" disabled><br>
            
            <label for="detik">Detik:</label><br>
            <input type="text" id="detik" name="detik" value="<?php echo isset($sisaDetikAkhir) ? $sisaDetikAkhir . ' detik' : ''; ?>" disabled><br>
            
            <label for="biaya">Total biaya:</label><br>
            <input type="text" id="biaya" name="biaya" value="<?php echo isset($biaya) ? 'Rp ' . number_format($biaya, 2) : ''; ?>" disabled><br>
        </form>


        
    </div>
    <?php
    if (isset($_POST["hitung"])) {
    $secondsInput = isset($_POST["detikInput"]) ? (int)$_POST["detikInput"] : 0;
    $pulsa = 30 / 45;
    $biaya = $secondsInput * $pulsa;

    // Mendapatkan jumlah jam
    $jam = floor($secondsInput / 3600); // 3600 detik dalam satu jam

    // Mendapatkan sisa detik setelah diubah menjadi jam
    $sisaDetikSetelahJam = $secondsInput % 3600;

    // Mendapatkan jumlah menit
    $menit = floor($sisaDetikSetelahJam / 60); // 60 detik dalam satu menit

    // Mendapatkan sisa detik setelah diubah menjadi menit
    $sisaDetikSetelahMenit = $sisaDetikSetelahJam % 60;

    // Sisa detik setelah diubah menjadi jam dan menit
    $sisaDetikAkhir = $sisaDetikSetelahMenit;
?>

<script>
        // Menampilkan hasil di input yang disable
        document.getElementById("totalDetik").value = "<?php echo $secondsInput ?> detik";
        document.getElementById("jam").value = "<?php echo $jam ?> jam";
        document.getElementById("menit").value = "<?php echo $menit ?> menit";
        document.getElementById("detik").value = "<?php echo $sisaDetikAkhir ?> detik";
        document.getElementById("biaya").value = "Rp <?php echo number_format($biaya, 2) ?>";
    </script>
            <?php
        }
        ?>
    
</body>
</html>