<?php
    session_start();
    include 'config.php';
    #error_reporting(0);
    ob_start(); 
    $email=$_SESSION['email'];


    $sql="SELECT * FROM `user` WHERE `email`='$email'";
    $result=mysqli_query($con, $sql);
    $row=mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="/WebAssignment/public_html/CSS/user.css" rel="stylesheet" type="text/css"/>
</head>
<body>

    <!-- Navigation Bar -->
    <div>
        <header>
            <nav>
                <a href="http://localhost/webAssignment/public_html/html/home.php" class="logo">MedConnect</a>
                <div class="search-bar">
                    <input type="text" placeholder="Search...">
                    <button type="button">Search</button>
                </div>
                <button class="nav-toggle">&#9776;</button>
                <ul class="nav-links">
                    <li><a href="http://localhost/webAssignment/public_html/html/user.php">User</a></li>
                    <li><a href="http://localhost/webAssignment/public_html/html/home.php">Home</a></li>
                    <li><a href="http://localhost/webAssignment/public_html/html/logout.php">Log Out</a></li>
                </ul>
            </nav>
        </header>
    </div>

    <!-- User Profile Form -->
    <div class="container mt-4">
        <h2>User Profile</h2>
        <form id="profileForm" action="/path-to-update-profile" method="post">
            <!-- Username -->
            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" class="form-control" id="username" name="username" value="<?php echo $row['username'] ?>" disabled>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email'] ?>" disabled>
            </div>

            <!-- Phone Number -->
            <div class="mb-3">
                <label for="phoneNumber" class="form-label">Phone Number:</label>
                <input type="tel" class="form-control" id="phonenumber" name="phonenumber" value="<?php echo $row['phonenumber'] ?>" disabled>
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="text" class="form-control" id="password" name="password" value="<?php echo $row['password'] ?>" disabled>
            </div>

           
        </form>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="/WebAssignment/public_html/javascript/user.js"></script>

</body>
</html>
