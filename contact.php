<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Alamat email admin
    $to = "blazhrh@gmail.com"; // Ganti dengan alamat email Anda
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Subjek email
    $email_subject = "New message from: $name - $subject";

    // Isi email
    $email_body = "You have received a new message from the contact form.\n\n";
    $email_body .= "Name: $name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Subject: $subject\n";
    $email_body .= "Message:\n$message\n";

    // Kirim email
    if (mail($to, $email_subject, $email_body, $headers)) {
        // Kirim respons sukses
        echo "Your message has been sent. Thank you!";
    } else {
        // Kirim respons error
        echo "There was a problem sending your message. Please try again.";
    }
} else {
    // Jika bukan permintaan POST
    echo "Invalid request.";
}
