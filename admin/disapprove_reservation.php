<?php

session_start();


include('connection.php'); 

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "UPDATE reservation SET status='disapproved' WHERE id=$id";
    if ($con->query($sql) === TRUE) {
        echo "<script>alert('Reservation disapproved!'); window.location.href='reservations.php';</script>";
    } else {
        echo "Error: " . $con->error;
    }
}
