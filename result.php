
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pendaftaran</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1 class="title">Hasil Pendaftaran</h1>

        <h2 class="section-title">Data Pendaftar</h2>
        <table>
            <tr>
                <th>Field</th>
                <th>Isi</th>
            </tr>
            <tr>
                <td>Nama</td>
                <td><?php echo htmlspecialchars($_GET['nama']); ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?php echo htmlspecialchars($_GET['email']); ?></td>
            </tr>
            <tr>
                <td>Telepon</td>
                <td><?php echo htmlspecialchars($_GET['telepon']); ?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><?php echo htmlspecialchars($_GET['alamat']); ?></td>
            </tr>
        </table>

        <h2 class="section-title">Isi File Biodata</h2>
        <table>
            <tr>
                <th>Isi File</th>
            </tr>
            <tr>
                <td><?php echo nl2br(htmlspecialchars(base64_decode($_GET['biodata_content']))); ?></td>
            </tr>
        </table>

        <h2 class="section-title">Informasi Browser</h2>
        <table>
            <tr>
            <th>Header</th>
            <th>Value</th>
            </tr>
            <?php
            $headers = getallheaders();
            foreach ($headers as $header => $value) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($header) . "</td>";
            echo "<td>" . htmlspecialchars($value) . "</td>";
            echo "</tr>";
            }
            ?>
        </table>

        <a href="index.php" class="button">Kembali ke Form</a>
        <br>
        <i>Joshua Palti Sinaga | Pemweb RA | 122140141 | Tugas 4</i>
    </div>
</body>
</html>

<?php
// Clear session data after displaying
unset($_SESSION['registration_data']);
?>