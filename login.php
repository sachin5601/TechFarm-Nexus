<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "impulse101"; // Changed the database name

// Create a connection to the database
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $phone = $_POST["phone"];
    $password = $_POST["password"];

    // Retrieve the user's data (including the hashed password) from the database based on the provided phone number
    $sql = "SELECT * FROM Farmer_login WHERE phone='$phone'";
    $result = $conn->query($sql);

    if ($result === false) {
        echo "Error: " . $conn->error;
    } else {
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $hashed_password = $row["password"];

            // Verify the entered password against the stored hashed password
            if (password_verify($password, $hashed_password)) {
                // Start a session for the user
                session_start();
                $_SESSION["user_id"] = $row["id"];

                // Redirect to home.html after successful login
                header("Location: home.html");
                exit(); // Make sure to exit after redirection
            } else {
                echo "Incorrect password. Please try again.";
            }
        } else {
            echo "User not found. Please register.";
        }
    }
}

// Close the database connection
$conn->close();
?>
