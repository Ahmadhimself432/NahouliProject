<?php
include "connection.php";

$location = trim($_POST['txt_location']);
$numberofpeople = trim($_POST['txt_numberofpeople']);
$date = trim($_POST['txt_date']);
$time = trim($_POST['txt_time']);



if (empty($location) || empty($numberofpeople) || empty($date) || empty($time)) {
    header("location:Reservation.php?flag=1");
    exit();
}

if (!is_numeric($numberofpeople) || $numberofpeople <= 0) {
    header("location:Reservation.php?flag=4"); 
    exit();
}

$checkSql = "SELECT * FROM reservation WHERE date_stamps = '$date' AND time_stamps = '$time'";
$result = mysqli_query($con, $checkSql);

if (!$result) {
    error_log("MySQL error: " . mysqli_error($con)); 
    header("location:Reservation.php?flag=5"); 
    exit();
}

if (mysqli_num_rows($result) > 0) {
    header("location:Reservation.php?flag=3");
    exit();
} else {
    $sql = "INSERT INTO reservation (location, nbofpeople, date_stamps, time_stamps) VALUES ('$location', '$numberofpeople', '$date', '$time')";
    $insertResult = mysqli_query($con, $sql);

    if ($insertResult) {
        header("location:Reservation.php?flag=2");
    } else {
        error_log("MySQL insert error: " . mysqli_error($con)); 
        header("location:Reservation.php?flag=5"); 
    }
}

mysqli_close($con);
