<?php
$hostname = "db";
$username = "root";
$password = "password";
$dbname = "contacts";

$conn = new mysqli($hostname, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create the contact_info table if it doesn't exist
$createTableSQL = "CREATE TABLE IF NOT EXISTS contact_info (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    email VARCHAR(255) NOT NULL
)";

if ($conn->query($createTableSQL) === TRUE) {
    echo "Table created successfully!<br>";
} else {
    echo "Error creating table: " . $conn->error . "<br>";
}

// Insert data into the table
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];

$insertSQL = "INSERT INTO contact_info (name, phone, email) VALUES ('$name', '$phone', '$email')";

if ($conn->query($insertSQL) === TRUE) {
    echo "Contact information submitted successfully!";
} else {
    echo "Error: " . $insertSQL . "<br>" . $conn->error;
}

$conn->close();
?>