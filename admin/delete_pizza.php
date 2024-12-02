<?php

session_start();

include('connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "DELETE FROM pizzas WHERE id = $id";
    if ($con->query($sql) === TRUE) {
        echo "<script>alert('Pizza deleted successfully!'); window.location.href='pizzas.php';</script>";
    } else {
        echo "Error: " . $con->error;
    }
}
?>
