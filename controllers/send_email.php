<?php
require_once __DIR__ . "/../config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $subject = strip_tags(trim($_POST["subject"]));
    $message = trim($_POST["message"]);

    // Validation
    if (empty($name) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Handle error - redirect back with error code
        header("Location: " . BASE_URL . "index.php?mail_status=error&message=invalid_input");
        exit;
    }

    // Email content
    $recipient = "envolpaqslp@hotmail.com";
    $email_subject = "Nuevo mensaje de contacto: $subject";
    $email_content = "Nombre: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Mensaje:\n$message\n";

    // Email headers
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    // Send email
    if (mail($recipient, $email_subject, $email_content, $headers)) {
        header("Location: " . BASE_URL . "index.php?mail_status=success");
    } else {
        header("Location: " . BASE_URL . "index.php?mail_status=error&message=send_failed");
    }
} else {
    // Not a POST request, redirect home
    header("Location: " . BASE_URL . "index.php");
}
?>