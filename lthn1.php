<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.cdnfonts.com/css/rog-lyonstype" rel="stylesheet">
    <title>Document</title>
    
</head>
<body>
    <div class="nilai">
        <form method="POST" action="">
                <label for="nilaiInput">Masukkan Nilai:</label><br>
                <input type="text" id="nilaiInput" name="nilai"/><br>
                
                <br><label for="namaInput" style="margin-top: 30px;">Masukkan Nama:</label><br>
                <input type="text" id="namaInput" name="nama"/><br>

                <button type="submit">Simpan</button>

                <p style="margin-bottom: 0px;">Nama</p>
                <input id="namaOutput" disabled value="<?php echo isset($nama) ? htmlspecialchars($nama) : ''; ?>"></input><br>
                <br>
                <p style="margin-bottom: 0px;">Hasil</p>
                <input id="nilaiOutput" disabled value="<?php echo isset($nilai) ? htmlspecialchars($nilai) : ''; ?>"></input><br>
                <br>
                <p style="margin-bottom: 0px;">Grade</p>
                <input id="gradeOutput" disabled value="<?php echo isset($hasil) ? htmlspecialchars($hasil) : ''; ?>"></input>
        </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nilai = isset($_POST['nilai']) ? (int)$_POST['nilai'] : 0;
        $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
        $hasil = "";

        if ($nilai >= 80 && $nilai <= 100) {
            $hasil = "A";
        } else if ($nilai >= 70 && $nilai <= 79) {
            $hasil = "B";
        } else if ($nilai >= 60 && $nilai <= 69) {
            $hasil = "C";
        } else if ($nilai >= 50 && $nilai <= 59) {
            $hasil = "D";
        } else if ($nilai >= 40 && $nilai <= 49) {
            $hasil = "E";
        } else if ($nilai >= 10 && $nilai <= 39) {
            $hasil = "F";
        }

        echo "<script>
            document.getElementById('namaOutput').value = '$nama';
            document.getElementById('nilaiOutput').value = '$nilai';
            document.getElementById('gradeOutput').value = '$hasil';
        </script>";
    }
    ?>
</body>
</html>
