<<<<<<< HEAD
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$company_edit_id = $_GET["edit_id"];

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
    $newName =  $_POST["new_name"];
    $newUsername = $_POST["new_username"];
    $newEmail =  $_POST["new_email"];
    $newBio =  $_POST["new_bio"];
    $newAddress = $_POST["new_address"];
    $newTel = $_POST["new_tel"];

    // Update the company information in the database
    $updateQuery = "UPDATE `company` SET
                `name` = '$newName',
                `username` = '$newUsername',
                `email` = '$newEmail',
                `bio` = '$newBio',
                `address` = '$newAddress',
                `tel` = '$newTel'
                WHERE `company_id` = $company_edit_id";

    if ($conn->query($updateQuery) === TRUE) {
        // Use JavaScript to redirect after successful update
        echo "Company information updated successfully";
    } else {
        echo "Error updating company information: " . $conn->error;
    }
}

// Retrieve the current company information for pre-filling the form
$companyQuery = "SELECT * FROM `company` WHERE `company_id` = $company_edit_id";
$companyResult = $conn->query($companyQuery);

if ($companyResult->num_rows > 0) {
    $companyData = $companyResult->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit <?php echo $companyData["name"]; ?> Profile</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>

    <!-- Edit Company Profile Form -->
    <form method="post" action="">
        <label for="new_name">Name:</label>
        <input type="text" id="new_name" name="new_name" value="<?php echo $companyData["name"]; ?>" >

        <label for="new_username">Username:</label>
        <input type="text" id="new_username" name="new_username" value="<?php echo $companyData["username"]; ?>" >

        <label for="new_email">Email:</label>
        <input type="email" id="new_email" name="new_email" value="<?php echo $companyData["email"]; ?>">

        <label for="new_bio">Bio:</label>
        <textarea id="new_bio" name="new_bio" rows="4" required><?php echo $companyData["bio"]; ?></textarea>

        <label for="new_address">Address:</label>
        <input type="text" id="new_address" name="new_address" value="<?php echo $companyData["address"]; ?>" >

        <label for="new_tel">Tel:</label>
        <input type="text" id="new_tel" name="new_tel" value="<?php echo $companyData["tel"]; ?>" >

        <button type="submit">Update</button>
    </form>

</body>

</html>

<?php
}

$conn->close();
?>
=======
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$company_edit_id = $_GET["edit_id"];

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
    $newName =  $_POST["new_name"];
    $newUsername = $_POST["new_username"];
    $newEmail =  $_POST["new_email"];
    $newBio =  $_POST["new_bio"];
    $newAddress = $_POST["new_address"];
    $newTel = $_POST["new_tel"];

    // Update the company information in the database
    $updateQuery = "UPDATE `company` SET
                `name` = '$newName',
                `username` = '$newUsername',
                `email` = '$newEmail',
                `bio` = '$newBio',
                `address` = '$newAddress',
                `tel` = '$newTel'
                WHERE `company_id` = $company_edit_id";

    if ($conn->query($updateQuery) === TRUE) {
        // Use JavaScript to redirect after successful update
        echo "Company information updated successfully";
    } else {
        echo "Error updating company information: " . $conn->error;
    }
}

// Retrieve the current company information for pre-filling the form
$companyQuery = "SELECT * FROM `company` WHERE `company_id` = $company_edit_id";
$companyResult = $conn->query($companyQuery);

if ($companyResult->num_rows > 0) {
    $companyData = $companyResult->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit <?php echo $companyData["name"]; ?> Profile</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>

    <!-- Edit Company Profile Form -->
    <form method="post" action="">
        <label for="new_name">Name:</label>
        <input type="text" id="new_name" name="new_name" value="<?php echo $companyData["name"]; ?>" >

        <label for="new_username">Username:</label>
        <input type="text" id="new_username" name="new_username" value="<?php echo $companyData["username"]; ?>" >

        <label for="new_email">Email:</label>
        <input type="email" id="new_email" name="new_email" value="<?php echo $companyData["email"]; ?>">

        <label for="new_bio">Bio:</label>
        <textarea id="new_bio" name="new_bio" rows="4" required><?php echo $companyData["bio"]; ?></textarea>

        <label for="new_address">Address:</label>
        <input type="text" id="new_address" name="new_address" value="<?php echo $companyData["address"]; ?>" >

        <label for="new_tel">Tel:</label>
        <input type="text" id="new_tel" name="new_tel" value="<?php echo $companyData["tel"]; ?>" >

        <button type="submit">Update</button>
    </form>

</body>

</html>

<?php
}

$conn->close();
?>
>>>>>>> 3152ded4569a94262a590e845c34b5ba83ed27a6
