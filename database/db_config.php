<?php
// Fetch database credentials from environment variables or use defaults for Render
$host = getenv('DB_HOST') ?: 'dpg-cuaujpt6l47c739thvig-a';
$port = getenv('DB_PORT') ?: 5432;
$dbname = getenv('DB_NAME') ?: 'techfarm_nexus';
$username = getenv('DB_USER') ?: 'techfarm_nexus_user';
$password = getenv('DB_PASSWORD') ?: '3VWBl309pZM6hKn0F2LwAch5So9Cd9An';

try {
    // Create a connection to the PostgreSQL database
    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";
    $conn = new PDO($dsn, $username, $password);

    // Set error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
