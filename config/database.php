<?php

// Load environment variables
function loadEnv() {
    $envFile = __DIR__ . '/../.env';
    if (file_exists($envFile)) {
        $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            if (strpos($line, '=') !== false && strpos($line, '#') !== 0) {
                list($key, $value) = explode('=', $line, 2);
                $_ENV[trim($key)] = trim($value);
                putenv(sprintf('%s=%s', trim($key), trim($value)));
            }
        }
    }
}

// Load environment variables
loadEnv();

// Database connection configuration
$DB_HOST = getenv('DB_HOST') ?: 'localhost';
$DB_USER = getenv('DB_USER') ?: 'root';
$DB_PASS = getenv('DB_PASS') ?: '';
$DB_NAME = getenv('DB_NAME') ?: 'g-arat';

// Create connection
function getConnection() {
    global $DB_HOST, $DB_USER, $DB_PASS, $DB_NAME;
    
    static $conn = null;
    
    if ($conn === null) {
        $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
        
        if (!$conn) {
            error_log("Database Connection Error: " . mysqli_connect_error());
            die("Connection failed: Database is currently unavailable.");
        }
        
        // Set charset to utf8mb4
        mysqli_set_charset($conn, 'utf8mb4');
    }
    
    return $conn;
}

// Get database connection
$conn = getConnection();

// Improved role confirmation function with prepared statements
function roleConfirm($loggedin, $email) {
    if (!isset($loggedin) || $loggedin !== true) {
        session_destroy();
        header("Location: login.php");
        exit();
    }

    $conn = getConnection();
    $stmt = $conn->prepare("SELECT role FROM users WHERE email = ?");
    
    if (!$stmt) {
        error_log("Prepare failed: " . $conn->error);
        die("An error occurred while checking permissions.");
    }
    
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($row = $result->fetch_assoc()) {
        if ($row['role'] !== "Admin") {
            header("Location: index.php");
            exit("Insufficient privileges");
        }
    } else {
        header("Location: login.php");
        exit("User not found");
    }
    
    $stmt->close();
}

?>