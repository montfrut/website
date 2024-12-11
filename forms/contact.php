<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Validar los datos del formulario
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

    if ($name && $email && $subject && $message) {
        // Configurar los detalles del correo
        $to = "pablo.londero88@gmail.com"; // Cambia esto por tu correo electrónico
        $headers = "From: $name <$email>\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
        $emailMessage = "Name: $name\n";
        $emailMessage .= "Email: $email\n";
        $emailMessage .= "Subject: $subject\n";
        $emailMessage .= "Message:\n$message\n";

        // Intentar enviar el correo
        if (mail($to, $subject, $emailMessage, $headers)) {
            echo "success";
        } else {
            echo "error";
        }
    } else {
        echo "validation_error";
    }
} else {
    echo "invalid_request";
}
?>
