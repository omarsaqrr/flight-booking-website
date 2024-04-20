<?php
session_start();

// Function to check if a string consists of only digits
function isDigits($str) {
    return ctype_digit($str);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $email = $_POST["email"];
    $usernameform = $_POST["username"]; 
    $name = $_POST["name"];
    $passwordform = $_POST["password"]; 
    $telephone = $_POST["telephone"];
    $userType = $_POST["userType"];
    
    // Validate password length and telephone format
    if (strlen($passwordform) < 6) {
        die("Password must be at least 6 characters long.");
    }
    if (!isDigits($telephone)) {
        die("Telephone number must contain only digits.");
    }

    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "omarayman12345";
    $dbname = "flight_booking";

    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Hash the password before storing it
    $hashedPassword = password_hash($passwordform, PASSWORD_DEFAULT);

    // Prepare and bind parameterized insert queries to prevent SQL injection
    if ($userType === "company") {
        $companyName=$_POST["companyName"];
        $sql = "INSERT INTO `company` (`company_id`, `name`, `bio`, `address`, `location`, `username`, `password`, `email`, `tel`) 
        VALUES (NULL, ?, '', '', '', ?, ?, ?, ?)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $companyName, $usernameform, $hashedPassword, $email, $telephone);
    } else {
        $sql = "INSERT INTO `passenger` (`passenger_id`, `name`, `email`, `password`, `tel`) 
        VALUES (NULL, ?, ?, ?, ?)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $name, $email, $hashedPassword, $telephone);
    }

    if ($stmt->execute()) {
        header("Location: ../pages/login_page.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>