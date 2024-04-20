<?php
session_start(); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $email = $_POST["email"];
    $password = $_POST["password"];

    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "omarayman12345";
    $dbname = "flight_booking";

    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind parameterized queries to prevent SQL injection
    $passengerSql = "SELECT * FROM `passenger` WHERE `email`=?";
    $companySql = "SELECT * FROM `company` WHERE `email`=?";
    
    $passengerStmt = $conn->prepare($passengerSql);
    $passengerStmt->bind_param("s", $email);
    $passengerStmt->execute();
    $passengerResult = $passengerStmt->get_result();

    if ($passengerResult->num_rows > 0) {
        $passengerData = $passengerResult->fetch_assoc();
        // Verify the entered password against the hashed password stored in the database
        if (password_verify($password, $passengerData["password"])) {
            $_SESSION["user_type"] = "passenger";
            $_SESSION["passenger_id"] = $passengerData["passenger_id"];
            header("Location: passenger_home.php");
            exit();
        }
    }

    // Prepare and bind parameterized queries for company
    $companyStmt = $conn->prepare($companySql);
    $companyStmt->bind_param("s", $email);
    $companyStmt->execute();
    $companyResult = $companyStmt->get_result();

    if ($companyResult->num_rows > 0) {
        $companyData = $companyResult->fetch_assoc();
        // Verify the entered password against the hashed password stored in the database
        if (password_verify($password, $companyData["password"])) {
            $_SESSION["user_type"] = "company";
            $_SESSION["company_id"] = $companyData["company_id"];
            $_SESSION["company_name"] = $companyData["name"];
            header("Location: company_home.php");
            exit();
        }
    }

    // If no user is found or password doesn't match, display error message
    echo "Invalid credentials. Please try again.";

    $conn->close();
}
?>