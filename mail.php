<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "babatundemoyo05@gmail.com";
    $subject = "New Contact Message from Your Website";

    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);
    $budget = $_POST["budget"];
    $subjectInput = trim($_POST["subject"]);

    $emailContent = "You have received a new message:\n\n";
    $emailContent .= "Name: $name\n";
    $emailContent .= "Email: $email\n";
    $emailContent .= "Subject: $subjectInput\n";
    $emailContent .= "Budget: $budget\n\n";
    $emailContent .= "Message:\n$message\n";

    $headers = "From: $name <$email>";

    if (mail($to, $subject, $emailContent, $headers)) {
        echo "<script>alert('Message sent successfully!'); window.history.back();</script>";
    } else {
        echo "<script>alert('Sorry, something went wrong. Please try again later.'); window.history.back();</script>";
    }
}
?>
