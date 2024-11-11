<?php
$file = 'users.json';

// Check if file exists, otherwise create it
if (!file_exists($file)) {
    file_put_contents($file, json_encode([]));
}

// Get user data from JSON file
$users = json_decode(file_get_contents($file), true);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if username already exists
    foreach ($users as $user) {
        if ($user['username'] == $username) {
            echo "Username already taken. Please try another.";
            exit;
        }
    }

    // Add new user to array
    $users[] = [
        'username' => $username,
        'password' => $password
    ];

    // Save the updated user list to JSON file
    file_put_contents($file, json_encode($users));

    echo "Sign-up successful! You can now sign in.";
}
?>
