<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $message = htmlspecialchars($_POST['message']);

    // Simpan data ke file
    $dataToSave = "Nama: $name\nEmail: $email\nPassword: $password\nSaran: $message\n\n";
    file_put_contents('submissions.txt', $dataToSave, FILE_APPEND);

    // Tampilkan pesan sukses
    echo "<h1>Terima kasih atas saran Anda!</h1>";
} else {
    echo "<h1>Metode pengiriman tidak valid.</h1>";
}
?>