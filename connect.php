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

// Prepare and execute SQL statement to insert values
$sql = "INSERT INTO your_table_name (column1, column2, column3) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $value1, $value2, $value3); // Replace 'sss' with appropriate data types

// Assign values to variables
$value1 = "value1";
$value2 = "value2";
$value3 = "value3";

$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
-+
