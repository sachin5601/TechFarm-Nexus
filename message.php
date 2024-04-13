<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Create a database connection
    $conn = new mysqli("localhost", "root", "", "impulse101"); // Changed the database name

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute an SQL INSERT statement
    $sql = "INSERT INTO user_message (fullname, email, message) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $fullname, $email, $message);

    if ($stmt->execute()) {
        echo "Message sent successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}
?>
