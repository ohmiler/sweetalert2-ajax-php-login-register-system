<?php
session_start();
// Include the database connection code
require 'config.php';
// Retrieve and validate user input
// if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
// }

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(array("status" => "error", "msg" => "Please enter a valid email address"));
    // $_SESSION['error'] = "Please enter a valid email address";
    // header('location: register.php');
} else {

    // Prepare and execute the SQL query
    try {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch();
            $hashedPassword = $row['password'];

            // Verify the password
            if (password_verify($password, $hashedPassword)) {
                echo json_encode(array("status" => "success", "msg" => "Login successful!"));
                // $_SESSION['success'] = "Login successful!";
                $_SESSION['user_login'] = $row['id'];
                // header('location: dashboard.php');
                // Perform additional actions, such as setting session variables or redirecting the user
            } else {
                echo json_encode(array("status" => "error", "msg" => "Invalid credentials"));
                // $_SESSION['error'] = "Invalid credentials";
                // header('location: login.php');
            }
        } else {
            // Invalid username
            echo json_encode(array("status" => "error", "msg" => "Invalid credentials"));
            // $_SESSION['error'] = "Invalid credentials";
            // header('location: login.php');
        }
    } catch (PDOException $e) {
        // Login failed
        echo json_encode(array("status" => "error", "msg" => "Invalid credentials"));
        // echo "Login failed: " . $e->getMessage();
        // $_SESSION['error'] = "Invalid credentials";
        // header('location: login.php');
    }
}


?>
