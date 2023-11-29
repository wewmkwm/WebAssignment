<?php
    session_start();
    include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Event</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="../CSS/addevent.css" rel="stylesheet" type="text/css"/>
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
    </div>

    <!-- Event Form -->
    <div class="container mt-4">
        <h2>Add Event</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            <!-- Event Name -->
            <div class="mb-3">
                <label for="eventname" class="form-label">Event Name:</label>
                <input type="text" class="form-control" id="eventname" name="eventname" required>
            </div>

            <!-- Date -->
            <div class="mb-3">
                <label for="eventdate" class="form-label">Date:</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>

            <!-- Time -->
            <div class="mb-3">
                <label for="eventtime" class="form-label">Time:</label>
                <input type="time" class="form-control" id="time" name="time" required>
            </div>

            <!-- Location -->
            <div class="mb-3">
                <label for="eventlocation" class="form-label">Location:</label>
                <input type="text" class="form-control" id="location" name="location" required>
            </div>

            <!-- Organizer -->
            <div class="mb-3">
                <label for="eventOrganizer" class="form-label">Organizer:</label>
                <input type="text" class="form-control" id="organizer" name="organizer" required>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="/WebAssignment/public_html/javascript/addevent.js"></script>

</body>
</html>

<?php
// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Get form data
    $eventname = $_POST["eventname"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $location = $_POST["location"];
    $organizer = $_POST["organizer"];

    // Insert the event into the database
    $query = "INSERT INTO `event` (`id`, `eventname`, `date`, `time`, `location`, `organizer`)"
             . "VALUES ('', '$eventname', '$date', '$time', '$location', '$organizer')";

    $result = mysqli_query($con, $query);

    if ($result) {
        // Event added successfully, you can redirect to a success page if needed
        header("Location: adminhome.php");
        exit;
    } else {
        // Handle the error if the query fails
        echo "Error: " . mysqli_error($con);
    }
}

// Fetch events for display on the user home page
$query = "SELECT * FROM `event` ";
$result = mysqli_query($con, $query);

$events = [];
while ($row = mysqli_fetch_assoc($result)) {
    $events[] = $row;
}

// Close the database connection if you're not using persistent connections
mysqli_close($con);
?>
