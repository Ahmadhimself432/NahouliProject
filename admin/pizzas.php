<?php
session_start();

echo($_SESSION['loggedin']);
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: admin_panel.php"); 
    exit();
}

include('connection.php'); 

$sql = "SELECT * FROM pizzas";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizzas - Admin Panel</title>
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
        <h1>Pizzas</h1>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><img src="../images/<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['title']); ?>" width="50"></td>
                            <td><?php echo htmlspecialchars($row['title']); ?></td>
                            <td><?php echo htmlspecialchars($row['description']); ?></td>
                            <td><?php echo htmlspecialchars($row['price']); ?>$</td>
                            <td>
                                <a href="edit_pizza.php?id=<?php echo $row['id']; ?>" class="btn-edit">Edit</a>
                                <a href="delete_pizza.php?id=<?php echo $row['id']; ?>" class="btn-delete">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">No pizzas available.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <a href="add_pizza.php" class="btn-add">Add Pizza</a>
    </div>

</body>

</html>
