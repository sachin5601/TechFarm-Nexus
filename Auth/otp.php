<?php
session_start(); // Start the session

include('../Database/db_config.php'); // Include your database configuration

// Include PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require __DIR__ . '/../vendor/autoload.php'; // Load PHPMailer

// Initialize error message and success message
$error_message = '';
$success_message = '';

// Check if the phone number exists in the session
if (!isset($_SESSION['phone'])) {
    die("Phone number not found in session. Please log in again.");
}

// Fetch user email based on the phone number
$phone = $_SESSION['phone']; // Retrieve phone number from session
$query = "SELECT email FROM Farmer_login WHERE phone = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "s", $phone);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);

// Check if the user exists and fetch email
if (!$user) {
    die("No user found with the provided phone number.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the resend request was made
    if (isset($_POST['resend'])) {
        // Handle OTP Resend
        $otp = rand(100000, 999999); // Generate new OTP

        // Save the new OTP in the database
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

            // Provide feedback to the user
            $success_message = "A new OTP has been sent to your email.";
        } catch (Exception $e) {
            $error_message = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

        mysqli_stmt_close($update_stmt);
    } else {
        // Handle OTP verification
        $entered_otp = implode('', $_POST['otp']); // Combine the array of OTP inputs

        // Fetch the OTP stored in the database for the provided phone number
        $query = "SELECT otp FROM Farmer_login WHERE phone = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "s", $phone);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $user = mysqli_fetch_assoc($result);

        // Check if the user exists
        if ($user) {
            // Check if the OTP matches
            if ($entered_otp == $user['otp']) {
                // OTP is correct, clear the OTP and redirect to home
                $update_query = "UPDATE Farmer_login SET otp = NULL WHERE phone = ?";
                $update_stmt = mysqli_prepare($conn, $update_query);
                mysqli_stmt_bind_param($update_stmt, "s", $phone);
                mysqli_stmt_execute($update_stmt);
                mysqli_stmt_close($update_stmt);

                // Redirect to the home page after login
                header("Location: ../Home/home.html"); // Adjusted path to the home.html file
                exit();
            } else {
                // OTP is incorrect, show an error message
                $error_message = "Invalid OTP. Please try again.";
            }
        } else {
            // User not found
            $error_message = "No user found with the provided phone number.";
        }

        // Close the database statement
        mysqli_stmt_close($stmt);
    }
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>

    <!-- Bootstrap 5 stylesheet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css" integrity="sha512-Ez0cGzNzHR1tYAv56860NLspgUGuQw16GiOOp/I2LuTmpSK9xDXlgJz3XN4cnpXWDmkNBKXR/VDMTCnAaEooxA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- FontAwesome 6 stylesheet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body {
            background-color: #ebecf0;
        }
        .otp-letter-input {
            max-width: 100%;
            height: 90px;
            border: 1px solid #198754;
            border-radius: 10px;
            color: #198754;
            font-size: 60px;
            text-align: center;
            font-weight: bold;
        }
        .btn {
            height: 50px;
        }
    </style>
</head>
<body>
    <div class="container p-5">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-5 mt-5">
                <div class="bg-white p-5 rounded-3 shadow-sm border">
                    <div>
                        <p class="text-center text-success" style="font-size: 5.5rem;">
                            <i class="fa-solid fa-envelope-circle-check"></i>
                        </p>
                        <p class="text-center h5">Please enter the one-time password to verify your account</p>
                        <?php if (isset($user['email'])): ?>
                            <?php
                            // Mask the email to show the first character and last two characters
                            $email_parts = explode('@', $user['email']);
                            $username = $email_parts[0];
                            $masked_username = substr($username, 0, 1) . str_repeat('*', max(0, strlen($username) - 3)) . substr($username, -2);
                            $masked_email = $masked_username . '@' . $email_parts[1];
                            ?>
                            <p class="text-muted text-center">A code has been sent to <strong><?php echo htmlspecialchars($masked_email); ?></strong></p>
                        <?php endif; ?>
                        <form action="otp.php" method="post">
                            <div class="row pt-4 pb-2">
                                <div class="col-2">
                                    <input class="otp-letter-input" type="text" name="otp[]" maxlength="1" required>
                                </div>
                                <div class="col-2">
                                    <input class="otp-letter-input" type="text" name="otp[]" maxlength="1" required>
                                </div>
                                <div class="col-2">
                                    <input class="otp-letter-input" type="text" name="otp[]" maxlength="1" required>
                                </div>
                                <div class="col-2">
                                    <input class="otp-letter-input" type="text" name="otp[]" maxlength="1" required>
                                </div>
                                <div class="col-2">
                                    <input class="otp-letter-input" type="text" name="otp[]" maxlength="1" required>
                                </div>
                                <div class="col-2">
                                    <input class="otp-letter-input" type="text" name="otp[]" maxlength="1" required>
                                </div>
                            </div>
                            <p class="text-muted text-center"><?php echo $error_message; ?></p>
                            <div class="row pt-5">
                                <div class="col-6">
                                    <button class="btn btn-outline-secondary w-100" type="button" onclick="window.location.href='login.html'">Cancel</button>
                                </div>
                                <div class="col-6">
                                    <button class="btn btn-success w-100" type="submit">Verify</button>
                                </div>
                            </div>
                        </form>
                        <form action="otp.php" method="post" class="mt-3">
                            <input type="hidden" name="resend" value="1"> <!-- Indicate this is a resend request -->
                            <p class="text-muted text-center">Didn't get the code? <button type="submit" class="btn btn-link text-success">Click to resend.</button></p>
                        </form>
                        <p class="text-muted text-center"><?php echo $success_message; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            const inputs = document.querySelectorAll('.otp-letter-input');

            // Function to handle input
            inputs.forEach((input, index) => {
                input.addEventListener('input', function() {
                    if (input.value.length === 1 && index < inputs.length - 1) {
                        inputs[index + 1].focus();
                    }
                });

                input.addEventListener('keydown', function(event) {
                    if (event.key === "Backspace" && index > 0) {
                        inputs[index - 1].focus();
                    }
                });
            });
        });
    </script>
</body>
</html>
