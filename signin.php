<?php
$file = 'users.json';

// Check if file exists
if (!file_exists($file)) {
    echo "No users found. Please sign up first.";
    exit;
}

// Get user data from JSON file
$users = json_decode(file_get_contents($file), true);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if username exists
    foreach ($users as $user) {
        if ($user['username'] == $username && password_verify($password, $user['password'])) {
            echo "Sign-in successful! Welcome, $username.";
            exit;
        }
    }

    echo "Incorrect username or password.";
}
?>
