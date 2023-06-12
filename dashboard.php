<?php 

    session_start();
    include('config.php'); 

    if (!isset($_SESSION['user_login'])) {
        header("location: index.php");
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <!-- Navbar section -->
    <?php include('nav.php'); ?>
    <!-- Navbar section -->


    <div class="px-4 py-5 my-5 text-center">
        <img class="d-block mx-auto mb-4" src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
        <?php if (isset($_SESSION['success'])) { ?>
            <div class="alert alert-success">
                <?php 
                    echo $_SESSION['success']; 
                    unset($_SESSION['success']);
                ?>
            </div>   
        <?php } ?>
        <h1 class="display-5 fw-bold">Dashboard Page</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">
                <?php 

                    if (isset($_SESSION['user_login'])) {
                        $userId = $_SESSION['user_login'];

                        // Prepare and execute the SQL query
                        try {
                            $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
                            $stmt->execute([$userId]);

                            // Fetch and display the data
                            while ($row = $stmt->fetch()) {
                                echo "User ID: " . $row['id'] . "<br>";
                                echo "Firstname: " . $row['firstname'] . " Lastname: " . $row['lastname'] . "<br>";
                                echo "Email: " . $row['email'] . "<br>";
                                // Display other desired data from the database
                            }
                        } catch (PDOException $e) {
                            // Handle any errors
                            echo "Error: " . $e->getMessage();
                        }
                    }
                
                ?>
            </p>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>