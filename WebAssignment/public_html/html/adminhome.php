<?php
    session_start();
    include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="../CSS/adminhome.css" rel="stylesheet" type="text/css"/>
</head>
<body>

<!-- Navigation Bar -->
<div>
    <header>
        <nav>
            <a href="http://localhost/webAssignment/public_html/html/adminhome.php" class="logo">MedConnect</a>
            <div class="search-bar">
                <input type="text" placeholder="Search...">
                <button type="button">Search</button>
            </div>
            <button class="nav-toggle">&#9776;</button>
            <ul class="nav-links">
                <li><a href="http://localhost/webAssignment/public_html/html/adminhome.php">Home</a></li>
                <li><a href="http://localhost/webAssignment/public_html/html/addevent.php">Add Event</a></li>
                <li><a href="http://localhost/webAssignment/public_html/html/logout.php">Log Out</a></li>
            </ul>
        </nav>
    </header>
    <div class="pngg">
        <img src="../image/med2.png"/>
        <div class="top-left">Upcoming Events</div>
        <p class="sub-title ">Exciting events for you to visit</p>
    </div>
</div>

<!-- Bottom Row with Containers -->
<div class="container mt-5">
    <div class="row">
        <?php
            // Fetch events from the database
            $query = "SELECT * FROM `event`";
            $result = mysqli_query($con, $query);

            while ($row = mysqli_fetch_assoc($result)) {
                // Display event information in a container
                echo '<div class="col-md-4">';
                echo '<div class="container-box">';
                echo '<div class="event-container">';
                echo '<h3>' . $row['eventname'] . '</h3>';
                echo '<p>Date: ' . $row['date'] . '</p>';
                echo '<p>Time: ' . $row['time'] . '</p>';
                echo '<p>Location: ' . $row['location'] . '</p>';
                echo '<p>Organizer: ' . $row['organizer'] . '</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="/WebAssignment/public_html/javascript/adminhome.js"></script>

</body>
</html>
