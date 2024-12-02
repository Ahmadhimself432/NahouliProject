<?php


session_start();


include('connection.php'); 


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];

    
    if ($image) {
        $target_dir = "images/";
        $target_file = $target_dir . basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
    }

    
    $sql = "INSERT INTO pizzas (title, description, price, image) VALUES ('$title', '$description', '$price', '$image')";
    if ($con->query($sql) === TRUE) {
        echo "<script>alert('Pizza added successfully!'); window.location.href='pizzas.php';</script>";
    } else {
        echo "Error: " . $con->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Pizza - Admin Panel</title>
    <link rel="stylesheet" href="admin_style.css">
</head>

<body>

    <div class="sidebar">
        <h2>Admin Panel</h2>
        <ul>
            <li><a href="admin_panel.php">Logout</a></li>
            <li><a href="pizzas.php">Pizzas</a></li>
            <li><a href="reservations.php">Reservations</a></li>
        </ul>
    </div>

    <div class="main-content">
        <h1>Add New Pizza</h1>
        <form action="add_pizza.php" method="POST" enctype="multipart/form-data">
            <label for="name">Pizza Name:</label>
            <input type="text" name="name" required><br><br>

            <label for="description">Description:</label>
            <textarea name="description" required></textarea><br><br>

            <label for="price">Price:</label>
            <input type="number" name="price" required><br><br>

            <label for="image">Image:</label>
            <input type="file" name="image" accept="image/*" required><br><br>

            <button type="submit" class="btn-add">Add Pizza</button>
        </form>
    </div>

</body>

</html>