<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="title">Form Pendaftaran</div>
        <form id="registrationForm" action="process.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" minlength="1" maxlength="50" required>
                <div class="error" id="nama-error"></div>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
                <div class="error" id="email-error"></div>
            </div>

            <div class="form-group">
                <label for="telepon">Nomor Telepon</label>
                <input type="tel" id="telepon" name="telepon" pattern="[0-9]{10,13}" required>
                <div class="error" id="telepon-error"></div>
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" id="alamat" name="alamat" minlength="10" maxlength="200" required>
                <div class="error" id="alamat-error"></div>
            </div>

            <div class="form-group">
                <label for="biodata">File Biodata (TXT, Max 1MB)</label>
                <input type="file" id="biodata" name="biodata" accept=".txt" required>
                <div class="error" id="biodata-error"></div>
            </div>

            <input type="submit" value="Daftar" class="button">
            <i>Joshua Palti Sinaga | Pemweb RA | 122140141 | Tugas 4</i>
        </form>
    </div>

    <script>
        function validateForm() {
            return true

            let isValid = true;
            const nama = document.getElementById('nama');
            const email = document.getElementById('email');
            const telepon = document.getElementById('telepon');
            const alamat = document.getElementById('alamat');
            const biodata = document.getElementById('biodata');

            document.querySelectorAll('.error').forEach(error => error.textContent = '');

            if (nama.value.length < 3) {
                document.getElementById('nama-error').textContent = 'Nama minimal 3 karakter';
                isValid = false;
            }

            if (!email.value.match(/^[^\s@]+@[^\s@]+\.[^\s@]+$/)) {
                document.getElementById('email-error').textContent = 'Email tidak valid';
                isValid = false;
            }

            if (!telepon.value.match(/^[0-9]{10,13}$/)) {
                document.getElementById('telepon-error').textContent = 'Nomor telepon harus 10-13 digit';
                isValid = false;
            }

            if (alamat.value.length < 10) {
                document.getElementById('alamat-error').textContent = 'Alamat minimal 10 karakter';
                isValid = false;
            }

            if (biodata.files.length > 0) {
                const file = biodata.files[0];
                if (file.size > 1024 * 1024) { // 1MB
                    document.getElementById('biodata-error').textContent = 'Ukuran file maksimal 1MB';
                    isValid = false;
                }
                if (!file.name.endsWith('.txt')) {
                    document.getElementById('biodata-error').textContent = 'File harus berformat TXT';
                    isValid = false;
                }
            }

            return isValid;
        }
    </script>
</body>
</html>