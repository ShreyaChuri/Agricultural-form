<?php
// Database connection details
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $temperature = $_POST["temperature"];
    $soil_type = $_POST["soil_type"];
    $humidity = $_POST["humidity"];
    $rainfall = $_POST["rainfall"];
    $soil_ph = $_POST["soil_ph"];

    // Prepare and execute SQL statement
    $sql = "INSERT INTO crop_data (temperature, soil_type, humidity, rainfall, soil_ph) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isddd", $temperature, $soil_type, $humidity, $rainfall, $soil_ph);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
