<?php
// 1. Database Connection
$servername = "localhost";
$username = "root"; // Default XAMPP user
$password = "";     // Default XAMPP password khali hota hai
$dbname = "luxe_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Connection check karein
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 2. Form Data Receive karna
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $pass = $_POST['password']; // Security ke liye real project mein password hashing use karein

    // 3. Data Insert karna
    $sql = "INSERT INTO login (email, password) VALUES ('$email', '$pass')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Aapka data save ho gaya hai!');
                window.location.href='index.html'; 
              </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
