<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "techfarm_nexus";
// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $fullName = $conn->real_escape_string($_POST['fullName']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $address = $conn->real_escape_string($_POST['address']);
    $propertyAddress = $conn->real_escape_string($_POST['propertyAddress']);
    $propertySize = $conn->real_escape_string($_POST['propertySize']);
    $weatherConditions = $conn->real_escape_string($_POST['weatherConditions']);
    $cropType = $conn->real_escape_string($_POST['cropType']);
    $cropSeason = $conn->real_escape_string($_POST['Crop_Season']);
    $previousCrops = $conn->real_escape_string($_POST['previousCrops']);
    $fertilizerUsed = $conn->real_escape_string($_POST['fertilizerUsed']);
    $pH = $conn->real_escape_string($_POST['pH']);
    $texture = $conn->real_escape_string($_POST['texture']);

    // Insert data into database
    $sql = "INSERT INTO soil_analysis_survey (full_name, email, phone, address, property_address, property_size, weather_conditions, crop_type, crop_season, previous_crops, fertilizer_used, ph_level, soil_texture)
    VALUES ('$fullName', '$email', '$phone', '$address', '$propertyAddress', '$propertySize', '$weatherConditions', '$cropType', '$cropSeason', '$previousCrops', '$fertilizerUsed', '$pH', '$texture')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
