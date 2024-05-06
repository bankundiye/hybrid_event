<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define your database connection details
    $servername = "localhost";
    $username = "username";
    $password = "password";
    $dbname = "UserRegistration";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO attendees (name, email, organization) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $organization);

    // Set parameters and execute
    $name = $_POST["name"];
    $email = $_POST["email"];
    $organization = $_POST["organization"];

    $stmt->execute();

    echo "Registration successful! Thank you for registering.";

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    // Redirect to the registration page if accessed directly
    header("Location: registration.html");
    exit();
}
?>
