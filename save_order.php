<?php

$conn = new mysqli("localhost", "root", "", "luxe_db");

if($conn->connect_error){
    die("Connection Failed: " . $conn->connect_error);
}

$product = $_POST['product_name'];
$price = $_POST['price'];
$qty = $_POST['qty'];
$total = $_POST['total'];

$sql = "INSERT INTO orders (product_name, price, quantity, total)
VALUES ('$product', '$price', '$qty', '$total')";

if($conn->query($sql) === TRUE){
    echo "<script>
    alert('Order Submitted Successfully!');
    window.location.href='index.html';
    </script>";
}else{
    echo "Error: " . $conn->error;
}

$conn->close();
?>