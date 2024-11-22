<?php
session_start();

$errors = [];

if (empty($_POST['nama']) || strlen($_POST['nama']) < 3) {
    $errors[] = "Nama tidak valid";
}

if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Email tidak valid";
}

if (empty($_POST['telepon']) || !preg_match("/^[0-9]{10,13}$/", $_POST['telepon'])) {
    $errors[] = "Nomor telepon tidak valid";
}

if (empty($_POST['alamat']) || strlen($_POST['alamat']) < 10) {
    $errors[] = "Alamat tidak valid";
}

if (!isset($_FILES['biodata']) || $_FILES['biodata']['error'] != 0) {
    $errors[] = "File biodata wajib diupload";
} else {
    $file = $_FILES['biodata'];
    
    if ($file['size'] > 1024 * 1024) {
        $errors[] = "Ukuran file maksimal 1MB";
    }
    
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if ($ext !== 'txt') {
        $errors[] = "File harus berformat TXT";
    }
}

if (empty($errors)) {
    $fileContent = file_get_contents($_FILES['biodata']['tmp_name']);
    
    $params = http_build_query([
        'nama' => $_POST['nama'],
        'email' => $_POST['email'],
        'telepon' => $_POST['telepon'],
        'alamat' => $_POST['alamat'],
        'biodata_content' => base64_encode($fileContent),
        'user_agent' => $_SERVER['HTTP_USER_AGENT']
    ]);
    
    header("Location: result.php?" . $params);
    exit();
} else {
    $params = http_build_query([
        'error' => implode(', ', $errors),
        'nama' => $_POST['nama'],
        'email' => $_POST['email'],
        'telepon' => $_POST['telepon'],
        'alamat' => $_POST['alamat']
    ]);

    header("Location: index.php?" . $params);
    exit();
}
?>