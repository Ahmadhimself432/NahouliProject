<?php

session_start();


include('connection.php'); 

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM pizzas WHERE id = $id";
    $result = $con->query($sql);
    $pizza = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];

    if ($image) {
        $target_dir = "images/";
        $target_file = $target_dir . basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
        $image = ", image='$image'";
    }

    $sql = "UPDATE pizzas SET title='$title', description='$description', price='$price' $image WHERE id=$id";
    if ($con->query($sql) === TRUE) {
        echo "<script>alert('Pizza updated successfully!'); window.location.href='pizzas.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pizza - Admin Panel</title>
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
        <h1>Edit Pizza</h1>
        <form action="edit_pizza.php?id=<?php echo $pizza['id']; ?>" method="POST" enctype="multipart/form-data">
            <label for="name">Pizza Name:</label>
            <input type="text" name="title" value="<?php echo htmlspecialchars($pizza['title']); ?>" required><br><br>

            <label for="description">Description:</label>
            <textarea name="description" required><?php echo htmlspecialchars($pizza['description']); ?></textarea><br><br>

            <label for="price">Price:</label>
            <input type="number" name="price" value="<?php echo htmlspecialchars($pizza['price']); ?>" required><br><br>

            <label for="image">Image (optional):</label>
            <input type="file" name="image" accept="image/*"><br><br>

            <button type="submit" class="btn-add">Update Pizza</button>
        </form>
    </div>

</body>

</html>