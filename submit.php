<?php
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
    $email = $_POST['email'];
    $name = $_POST['name'];
    $registrationNumber = $_POST['registrationNumber'];
    $contactNumber = $_POST['contactNumber'];
    $programName = $_POST['programName'];
    $residenceType = $_POST['residenceType'];
    $tShirtSize = $_POST['tShirtSize'];
    $whatsappNumber = $_POST['whatsappNumber'];
    $degreeYear = $_POST['degreeYear'];
    $knownFrom = implode(", ", $_POST['knownFrom']); // Collecting multiple checkboxes
    $isWilling = $_POST['isWilling'];

    // Execute the statement
    $stmt->execute([$email, $name, $registrationNumber, $contactNumber, $programName, $residenceType, $tShirtSize, $whatsappNumber, $degreeYear, $knownFrom, $isWilling]);

    echo "Registration successful!";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close the connection
$pdo = null;
?>
