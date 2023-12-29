<?php


$servername = "localhost";
$dbusername = "root";
$dbpassword = "omarayman12345";
$dbname = "flight_booking";

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle the form submission to update the company information

    // Sanitize inputs to prevent SQL injection (you can add more fields as needed)
    $Name =  $_POST["name"];
}

// Retrieve the current company information for pre-filling the form
$flightQuery = "SELECT * FROM `flights` WHERE `name` LIKE '$Name'";
$flightResult = $conn->query($flightQuery);

if ($flightResult->num_rows > 0) {
    $flightData = $flightResult->fetch_assoc();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<body>

    <!-- Edit Company Profile Form -->
    <form method="post" action="">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $companyData["name"]; ?>">
        <button type="submit">search</button>
    </form>

    <form class="search">

        <!-- Passenger Picture -->
        <!-- <img src="<?php echo $passengerData["logo_url"]; ?>" alt="Passenger Picture" class="passenger-picture"> -->

        <!-- Passenger Details -->
        <p><strong>Name:</strong> <?php echo $flightData["name"]; ?></p>
        <p><strong>From:</strong> <?php echo $flightData["from"]; ?></p>
        <p><strong>To:</strong> <?php echo $flightData["to"]; ?></p>
        <p><strong>Time:</strong> <?php echo $flightData["time"]; ?></p>
        <p><strong>fees:</strong> <?php echo $flightData["fees"]; ?></p>
      <?php
        // Check if the flight is completed or not
        if ($flightData["iscompleted"] == '1') {
            echo "<p><strong>Status:</strong> Completed</p>";
        } else {
            echo "<p><strong>Status:</strong> Not Completed</p>";
        }
        ?>



    </form>

</body>

</html>

<?php


$conn->close();
?>