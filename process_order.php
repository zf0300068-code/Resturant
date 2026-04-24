<?php
// Connection error reporting on karein taake pata chale masla kya hai
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = new mysqli("localhost", "root", "", "luxe_db");

if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}

if (isset($_POST['place_order'])) {
    // Data receive karein
    $name = $_POST['customer_name'];
    $phone = $_POST['phone_number'];
    $address = $_POST['address'];
    $item = $_POST['item_name'];
    $qty = $_POST['quantity'];
    $total = $_POST['total_price'];

    // SQL Query
    $sql = "INSERT INTO orders (customer_name, phone_number, address, item_name, quantity, total_price) 
            VALUES ('$name', '$phone', '$address', '$item', '$qty', '$total')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Order Placed Successfully!');
                window.location.href='index.html';
              </script>";
    } else {
        echo "SQL Error: " . $conn->error;
    }
} else {
    echo "Form submit nahi hua! Button ka name 'place_order' check karein.";
}

$conn->close();
?>