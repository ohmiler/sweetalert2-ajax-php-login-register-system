<?php
session_start();
// Include the database connection code
require 'config.php';
$minLength = 8;

// Retrieve and validate user input
if (isset($_POST['register'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
}
// Perform validation checks on user input
// ...

if (empty($firstname)) {
    $_SESSION['error'] = "Please enter your firstname";
    header('location: register.php');
} else if (empty($lastname)) {
    $_SESSION['error'] = "Please enter your lastname";
    header('location: register.php');
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error'] = "Please enter a valid email address";
    header('location: register.php');
} else if (strlen($password) < $minLength) {
    $_SESSION['error'] = "Please enter a valid password";
    header('location: register.php');
} else if (!preg_match('/[A-Z]/', $password)) {
    $_SESSION['error'] = "Your password must have a capital characters";
    header('location: register.php');
} else if (!preg_match('/[a-z]/', $password)) {
    $_SESSION['error'] = "Your password must have a lowercase characters";
    header('location: register.php');
} else if (!preg_match('/\d/', $password)) {
    $_SESSION['error'] = "Your password must have contain a digit numbers";
    header('location: register.php');
} else {

    $stmt = $pdo->prepare('SELECT COUNT(*) FROM users WHERE email = ?');
    $stmt->execute([$email]);
    $userExists = $stmt->fetchColumn();

    if ($userExists) {
        $_SESSION['error'] = 'Email already exists.';
        // Redirect the email to the registration page or display an error message
        header('Location: register.php');
        exit;
    } else {
        // // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // // Prepare and execute the SQL query
        try {
            $stmt = $pdo->prepare("INSERT INTO users (firstname, lastname, email, password) VALUES (?, ?, ?, ?)");
            $stmt->execute([$firstname, $lastname, $email, $hashedPassword]);

            $_SESSION['success'] = "Registration successfully!";
            header('location: register.php');
        } catch (PDOException $e) {
            $_SESSION['error'] = "Something went wrong, please try again!";
            echo "Registration failed: " . $e->getMessage();
            header('location: register.php');
        }
    }


}

