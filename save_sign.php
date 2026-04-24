<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "luxe_db";

// Connection banana
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['full_name'];
    $email = $_POST['email'];
    $pass = $_POST['password'];

    // Data insert karne ki query
    // Note: Humein check karna hoga ke table mein 'name' column hai ya nahi
    $sql = "INSERT INTO login (name, email, password) VALUES ('$name', '$email', '$pass')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Account ban gaya! Ab aap login kar sakte hain.');
                window.location.href='login.php'; 
              </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
