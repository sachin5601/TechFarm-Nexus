<?php
// Include database configuration file
include('../Database/db_config.php'); // Adjusted path

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the input values
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $new_password = $_POST['new_password'];

    // Create a prepared statement to check if the phone number and email exist
    $stmt = $conn->prepare("SELECT * FROM farmer_login WHERE phone = ? AND email = ?");
    if ($stmt === false) {
        die("Prepare failed: " . htmlspecialchars($conn->error)); // Output the error
    }

    $stmt->bind_param("ss", $phone, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Phone number and email match, proceed to reset the password
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        // Update the password in the database
        $update_stmt = $conn->prepare("UPDATE farmer_login SET password = ? WHERE phone = ? AND email = ?");
        if ($update_stmt === false) {
            die("Prepare failed: " . htmlspecialchars($conn->error)); // Output the error
        }

        $update_stmt->bind_param("sss", $hashed_password, $phone, $email);

        if ($update_stmt->execute()) {
            // Password reset successful, redirect to login page
            header("Location: login.html?success=password_reset");
            exit();
        } else {
            echo "Error updating password.";
        }
    } else {
        // Phone number and email do not match
        echo "<script>
                alert('The phone number and email do not match. Please try again.');
                window.location.href = 'login.html#forgot-password-form';
              </script>";
    }
}

// Close the database connection
$conn->close();
?>
