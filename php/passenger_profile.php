<<<<<<< HEAD
<?php
$passenger_temp_id = $_GET["profile_id"];

$servername = "localhost";
$dbusername = "root";
$dbpassword = "omarayman12345";
$dbname = "flight_booking";

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$passengerQuery = "SELECT * FROM `passenger` WHERE `passenger_id` = $passenger_temp_id";
$passengerResult = $conn->query($passengerQuery);

if ($passengerResult->num_rows > 0) {
    $passengerData = $passengerResult->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $passengerData["name"]; ?> Profile</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
  
</head>

<body>
    <header>
        <h1>Flight Booking</h1>
    </header>

    <!-- Passenger Profile Section -->
    <form class="passenger-profile">
        <h2><?php echo $passengerData["name"]; ?> (Profile)</h2>

        <!-- Passenger Picture -->
        <!-- <img src="<?php echo $passengerData["logo_url"]; ?>" alt="Passenger Picture" class="passenger-picture"> -->

        <!-- Passenger Details -->
        <p><strong>Name:</strong> <?php echo $passengerData["name"]; ?></p>
        <p><strong>Email:</strong> <?php echo $passengerData["email"]; ?></p>
        <p><strong>Tel:</strong> <?php echo $passengerData["tel"]; ?></p>

        <!-- Flights List (Assuming you have a flights table associated with the passenger) -->
        <div class="flights-list">
            <h3>Flights List</h3>
            <?php
            $flightsQuery = "SELECT * FROM `flights` WHERE `company_id` = $company_temp_id";
            $flightsResult = $conn->query($flightsQuery);

            if ($flightsResult->num_rows > 0) {
                while ($flightData = $flightsResult->fetch_assoc()) {
                    echo "<p>{$flightData['name']}</p>";
                }
            } else {
                echo "<p>No flights available</p>";
            }
            ?>
        </div>

        <!-- Edit Link -->
        <a href="edit_passenger_profile.php?edit_id=<?php echo $passenger_temp_id; ?>" class="edit-link">Edit</a>
        </form>

    <footer>
        &copy; <?php echo date("Y"); ?> Flight Booking. All rights reserved.
    </footer>
</body>

</html>


<?php
}

$conn->close();
?>
=======
<?php
$passenger_temp_id = $_GET["profile_id"];

$servername = "localhost";
$dbusername = "root";
$dbpassword = "omarayman12345";
$dbname = "flight_booking";

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$passengerQuery = "SELECT * FROM `passenger` WHERE `passenger_id` = $passenger_temp_id";
$passengerResult = $conn->query($passengerQuery);

if ($passengerResult->num_rows > 0) {
    $passengerData = $passengerResult->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $passengerData["name"]; ?> Profile</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
  
</head>

<body>
    <header>
        <h1>Flight Booking</h1>
    </header>

    <!-- Passenger Profile Section -->
    <form class="passenger-profile">
        <h2><?php echo $passengerData["name"]; ?> (Profile)</h2>

        <!-- Passenger Picture -->
        <!-- <img src="<?php echo $passengerData["logo_url"]; ?>" alt="Passenger Picture" class="passenger-picture"> -->

        <!-- Passenger Details -->
        <p><strong>Name:</strong> <?php echo $passengerData["name"]; ?></p>
        <p><strong>Email:</strong> <?php echo $passengerData["email"]; ?></p>
        <p><strong>Tel:</strong> <?php echo $passengerData["tel"]; ?></p>

        <!-- Flights List (Assuming you have a flights table associated with the passenger) -->
        <div class="flights-list">
            <h3>Flights List</h3>
            <?php
            $flightsQuery = "SELECT * FROM `flights` WHERE `company_id` = $company_temp_id";
            $flightsResult = $conn->query($flightsQuery);

            if ($flightsResult->num_rows > 0) {
                while ($flightData = $flightsResult->fetch_assoc()) {
                    echo "<p>{$flightData['name']}</p>";
                }
            } else {
                echo "<p>No flights available</p>";
            }
            ?>
        </div>

        <!-- Edit Link -->
        <a href="edit_passenger_profile.php?edit_id=<?php echo $passenger_temp_id; ?>" class="edit-link">Edit</a>
        </form>

    <footer>
        &copy; <?php echo date("Y"); ?> Flight Booking. All rights reserved.
    </footer>
</body>

</html>


<?php
}

$conn->close();
?>
>>>>>>> 3152ded4569a94262a590e845c34b5ba83ed27a6
