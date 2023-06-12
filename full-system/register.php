<?php 

    session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">
</head>

<body>

    <!-- Navbar section -->
    <?php include('nav.php'); ?>
    <!-- Navbar section -->

    <main class="form-signin text-center">
        <form action="register_db.php" id="registerForm" method="POST">
            <h1 class="h3 mb-3 fw-normal">Register</h1>
            <?php if (isset($_SESSION['error'])) { ?>
                <div class="alert alert-danger">
                    <?php 
                        echo $_SESSION['error']; 
                        unset($_SESSION['error']);
                    ?>
                </div>   
            <?php } ?>

            <?php if (isset($_SESSION['success'])) { ?>
                <div class="alert alert-success">
                    <?php 
                        echo $_SESSION['success']; 
                        unset($_SESSION['success']);
                    ?>
                </div>   
            <?php } ?>
            <div class="form-floating">
                <input type="text" class="form-control" name="firstname" placeholder="Enter your firstname">
                <label for="floatingInput">Firstname</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" name="lastname" placeholder="Enter your lastname">
                <label for="floatingInput">Lastname</label>
            </div>
            <div class="form-floating">
                <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" id="myPass" class="form-control" name="password" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>

            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox"  onclick="showPass()"> Show password
                </label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" name="register" type="submit">Sign Up</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
        </form>
    </main>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        function showPass() {
            let myPass = document.getElementById('myPass');
            if (myPass.type === "password") {
                myPass.type = "text";
            } else {
                myPass.type = "password";
            }
        }

        $(document).ready(function () {
            $("#registerForm").submit(function (e) {
                e.preventDefault();

                let formUrl = $(this).attr("action");
                let reqMethod = $(this).attr("method");
                let formData = $(this).serialize();

                $.ajax({
                    url: formUrl,
                    type: reqMethod,
                    data: formData,
                    success: function(data) {
                        let result = JSON.parse(data);
                        if (result.status == "success") {
                            console.log("Success", result)
                            Swal.fire("สำเร็จ!", result.msg, result.status).then(function() {
                                window.location.reload();
                            });
                        } else {
                            console.log("Error", result)
                            Swal.fire("ล้มเหลว!", result.msg, result.status);
                        }
                    }
                })
            })
        })
    </script>
</body>

</html>