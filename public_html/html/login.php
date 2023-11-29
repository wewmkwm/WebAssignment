<?php
    session_start();
    include 'config.php';
   # error_reporting(0);
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/WebAssignment/public_html/CSS/login.css">
</head>
<body>    
    <div class="container">
        <h1 class="mt-4">MedConnect</h1>
        <form action="login.php" method="post">
            <h2>Login</h2>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>


        <!-- "New User? Sign Up" Link -->
        <p><a href="http://localhost/webAssignment/public_html/html/register.php">New User? Sign Up</a></p>

            <button type="submit" class="btn btn-primary" name="login">Login</button>
        </form>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="/WebAssignment/public_html/javascript/login.js"></script>

</body>
</html>

<?php

if(isset($_POST['login'])) {
        // Collect form data
        $email = $_POST["email"];
        $password = $_POST["password"];

    $sql = "SELECT * FROM user WHERE email='$email'";
        $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        if($user['password'] == $password){
            if($user['role'] == 'User'){
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                $url = "home.php";
                header("location: $url");
                exit();
            }else if($user['role'] == 'Admin'){
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                $url = "adminhome.php";
                header("location: $url");
                exit();
            }else{
                echo '<script>alert("Incorrect Password!")</script>';
            }
        }else{
            echo '<script>alert("Incorrect Password!")</script>';
        }
    }else {
        echo '<script>alert("Sorry, we dont recognise this email address")</script>';
    }}
?>