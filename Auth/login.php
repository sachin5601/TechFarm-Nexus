<?php
session_start(); // Start the session
include('../Database/db_config.php'); // Include database configuration

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require __DIR__ . '/../vendor/autoload.php'; // Load PHPMailer

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $phone = $_POST["phone"];
    $password = $_POST["password"];

    // Verify phone number and password
    $query = "SELECT * FROM Farmer_login WHERE phone = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $phone);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        // Store the phone number in session
        $_SESSION['phone'] = $phone;

        // Generate OTP
        $otp = rand(100000, 999999);

        // Save OTP in the database
        $update_query = "UPDATE Farmer_login SET otp = ? WHERE phone = ?";
        $update_stmt = mysqli_prepare($conn, $update_query);
        mysqli_stmt_bind_param($update_stmt, "ss", $otp, $phone);
        mysqli_stmt_execute($update_stmt);

        // Send OTP via email
        $mail = new PHPMailer(true);
        try {
            // Server settings for Gmail SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'techfarmnexus@gmail.com'; // Your Gmail address
            $mail->Password = 'zorm itfd qajd akqu'; // Your Gmail App Password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Recipients
            $mail->setFrom('techfarmnexus@gmail.com', 'TechFarm');
            $mail->addAddress($user['email']); // Send OTP to user email

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Your OTP for Login';
            $mail->Body = 'Your OTP is: ' . $otp;

            $mail->send();
            // Redirect to OTP verification page
            header("Location: otp.php"); // Just redirect to OTP verification page
            exit();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "<script>alert('Invalid phone number or password.'); window.location.href='login.html';</script>";
    }
    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
?>
