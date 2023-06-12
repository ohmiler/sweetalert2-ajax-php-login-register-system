<?php 

    $host = 'localhost'; // Database host
    $dbname = 'login_system'; // Database name
    $user = 'root'; // Database username
    $pass = 'root'; // Database password

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
        // Set PDO attributes if needed
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected successfully";
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

?>