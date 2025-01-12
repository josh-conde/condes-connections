<?php
session_start();

// Load admin data from JSON
$adminData = file_get_contents('/secure/path/admin.json');
$admins = json_decode($adminData, true);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Authenticate user
    foreach ($admins as $admin) {
        if ($admin['username'] === $username && password_verify($password, $admin['password'])) {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            header("Location: admin_dashboard.php");
            exit;
        }
    }

    echo "Invalid username or password.";
}
?>