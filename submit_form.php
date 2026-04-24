<?php
// Error reporting on (testing ke liye)
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "luxe_db";

// Connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check Connection
if ($conn->connect_error) {
    die("Database Connection Fail ho gaya: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    $sql = "INSERT INTO requests (full_name, email, message) VALUES ('$full_name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert( '! Aapka message humein mil gaya hai. Luxe Table team jald hi aap se rabta karegi.');
                window.location.href='home.html';
              </script>";
    } else {
        echo "Database Error: " . $conn->error;
    }
} else {
    echo "Form submit nahi hua. Button ka name 'submit' hona chahiye.";
}

$conn->close();
?>