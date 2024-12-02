<?php
session_start();



if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: admin_panel.php"); 
    exit();
}

include('connection.php'); 

$sql = "SELECT * FROM reservation";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservations - Admin Panel</title>
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
<?php
echo($_SESSION['loggedin'])
?>
    <div class="main-content">
        <h1>Reservations</h1>
        <div class="table-container">
            <table class="table-reservations">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Location</th>
                        <th>No. of People</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['id']); ?></td>
                                <td><?php echo htmlspecialchars($row['location']); ?></td>
                                <td><?php echo htmlspecialchars($row['nbofpeople']); ?></td>
                                <td><?php echo htmlspecialchars($row['date_stamps']); ?></td>
                                <td><?php echo htmlspecialchars($row['time_stamps']); ?></td>
                                <td><?php echo htmlspecialchars($row['status']); ?></td>
                                <td>
                                    <a href="approve_reservation.php?id=<?php echo $row['id']; ?>" class="btn-approve">Approve</a>
                                    <a href="disapprove_reservation.php?id=<?php echo $row['id']; ?>" class="btn-disapprove">Disapprove</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7">No reservations found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>
