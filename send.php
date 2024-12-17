<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);

    // Email settings
    $to = "sonalijogi07@gmail.com";
    $subject = "New Form Submission";
    $message = "
        <html>
        <head>
            <title>New Form Submission</title>
        </head>
        <body>
            <h2>Form Data:</h2>
            <p><strong>Full Name:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Phone:</strong> $phone</p>
        </body>
        </html>
    ";
    
    // Set headers for HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: $email" . "\r\n";

    // Send email
    if (mail($to, $subject, $message, $headers)) {
        echo "Your form has been submitted successfully!";
    } else {
        echo "There was a problem sending the email. Please try again.";
    }
} else {
    echo "Invalid request.";
}
?>
