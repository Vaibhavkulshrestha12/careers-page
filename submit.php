<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database configuration
$host = 'localhost'; // e.g., 'localhost' or your Hostinger database host
$dbname = 'u686932376_Careers';
$username = 'u686932376_vaibhav';
$password = '*A1b2c3d4e5f6#';

try {
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare and bind parameters
    $stmt = $pdo->prepare("INSERT INTO registrations (email, name, registration_number, contact_number, program_name, residence_type, t_shirt_size, whatsapp_number, degree_year, known_from, is_willing) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Collect form data
    $email = $_POST['email'] ?? null;
    $name = $_POST['name'] ?? null;
    $registrationNumber = $_POST['registrationNumber'] ?? null;
    $contactNumber = $_POST['contactNumber'] ?? null;
    $programName = $_POST['programName'] ?? null;
    $residenceType = $_POST['residenceType'] ?? null;
    $tShirtSize = $_POST['tShirtSize'] ?? null;
    $whatsappNumber = $_POST['whatsappNumber'] ?? null;
    $degreeYear = $_POST['degreeYear'] ?? null;

    // Check if knownFrom is set and is an array
    $knownFrom = isset($_POST['knownFrom']) && is_array($_POST['knownFrom']) ? implode(", ", $_POST['knownFrom']) : null; // Collecting multiple checkboxes
    $isWilling = $_POST['isWilling'] ?? null;

    // Validate required fields
    if (!$email || !$name || !$registrationNumber || !$contactNumber) {
        throw new Exception("Required fields are missing.");
    }

    // Execute the statement
    $stmt->execute([$email, $name, $registrationNumber, $contactNumber, $programName, $residenceType, $tShirtSize, $whatsappNumber, $degreeYear, $knownFrom, $isWilling]);

    echo "Registration successful!";
} catch (PDOException $e) {
    echo "Database Error: " . $e->getMessage();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

// Close the connection
$pdo = null;
?>