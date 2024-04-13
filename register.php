<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "impulse101"; // Changed the database name

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

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
        // Phone number already in use, display a message to the user
        echo "Phone number is already in use. Please use a different phone number.";
    } else {
        // Insert the new user if the phone number is not already in use
        $insert_query = "INSERT INTO Farmer_login (name, phone, email, password) VALUES (?, ?, ?, ?)";
        $insert_stmt = mysqli_prepare($conn, $insert_query);
        mysqli_stmt_bind_param($insert_stmt, "ssss", $name, $phone, $email, $password);

        if (mysqli_stmt_execute($insert_stmt)) {
            // Registration successful
            echo "Registration successful.";
            header("Location: login.html"); // Redirect to login page after successful registration
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
