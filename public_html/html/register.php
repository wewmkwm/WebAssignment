<?php
    session_start();
    include 'config.php';
   # error_reporting(0);
    

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registration Page</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="/WebAssignment/public_html/CSS/register.css" type="text/css"/>
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 mt-5">
                    <h1 class="text-center mb-4">Register</h1>
                    <form action="register.php" method="post" class="custom-form">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>

                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>

                        <div class="form-group">
                            <label for="PhoneNumebr">Phone Number:</label>
                            <input type="text" class="form-control" id="phonenumber" name="phonenumber" required>
                        </div>

                        <button type="submit" name="register" class="btn btn-primary btn-block mt-4">Register</button>
                        
                                <p><a href="http://localhost/webAssignment/public_html/html/login.php">Login</a></p>

                    </form>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    </body>
</html>
<?php 
if(isset($_POST['register'])) {
    // Collect form data
    $email = $_POST["email"];
    $password = $_POST["password"];
    $username = $_POST["username"];
    $phonenumber = $_POST["phonenumber"];

    $sql11 = "SELECT * FROM `user` WHERE `email`='$email'";
    $result11 = mysqli_query($con, $sql11);
    $X = mysqli_num_rows($result11);

    if ($X > 0) {
        echo '<script>alert("The email address has been used")</script>';
    } else {
        $query2 = "INSERT INTO `user`(`id`, `email`, `username`, `password`, `phonenumber`, `role`) "
            . "VALUES ('','$email','$username','$password','$phonenumber','User')";
        $result2 = mysqli_query($con, $query2);
        echo '<script>alert("Register Successfully")</script>';
        header("Location: home.php");
        exit();
    }
}
?>