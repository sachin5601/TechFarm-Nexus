<?php
include('../Database/db_config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash the password

    // Check if the phone number already exists in the database
    $check_query = "SELECT phone FROM Farmer_login WHERE phone = ?";
    $check_stmt = mysqli_prepare($conn, $check_query);
    mysqli_stmt_bind_param($check_stmt, "s", $phone);
    mysqli_stmt_execute($check_stmt);
    mysqli_stmt_store_result($check_stmt);

    if (mysqli_stmt_num_rows($check_stmt) > 0) {
        // Phone number already in use
        echo "<script>
        alert('Phone number is already in use. Please use a different phone number.');
        window.location.href = 'login.html';
    </script>";
    } else {
        // Insert new user
        $insert_query = "INSERT INTO Farmer_login (name, phone, email, password) VALUES (?, ?, ?, ?)";
        $insert_stmt = mysqli_prepare($conn, $insert_query);
        mysqli_stmt_bind_param($insert_stmt, "ssss", $name, $phone, $email, $password);

        if (mysqli_stmt_execute($insert_stmt)) {
            echo "Registration successful.";
            header("Location: login.html"); // Redirect to login page
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
        mysqli_stmt_close($insert_stmt);
    }
    mysqli_stmt_close($check_stmt);
}

mysqli_close($conn);
?>
