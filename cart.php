<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remove_id'])) {
    $remove_id = $_POST['remove_id'];

    if (isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array_filter($_SESSION['cart'], function ($item) use ($remove_id) {
            return $item['id'] != $remove_id;
        });
    }

    header("Location: cart.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VERVE PIZZA</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Platypi:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="home.css">
    <style>
        .list-tile {
            display: flex;
            align-items: center;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 10px;
            margin: 10px 10px;
            background-color: #f9f9f9;
        }

        .list-tile img {
            width: 80px;
            height: 80px;
            border-radius: 8px;
            margin-right: 15px;
            object-fit: cover;
        }

        .list-tile .content {
            flex: 1;
        }

        .list-tile .content-right {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            gap: 10px;
        }

        .list-tile .content h5 {
            margin: 0;
            font-size: 18px;
        }

        .list-tile .content p {
            margin: 5px 0;
            color: #666;
        }

        .list-tile .price {
            color: gray;
            font-size: 16px;
            margin-left: 15px;
        }

        .list-tile .remove-btn {
            background-color: #ff4d4d;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .list-tile .remove-btn:hover {
            background-color: #e60000;
        }

        .center-data {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    </style>
</head>

<body>
    <header>
        <div class="container">
            <h1><a href="#">VERVE PIZZA</a></h1>
            <nav>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="index.php">Menu</a></li>
                    <li><a href="index2.php">About Us</a></li>
                    <li><a href="https://wa.me/96176770576">Contact</a></li>
                    <li><a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a></li>

                </ul>
            </nav>
        </div>
    </header>


    <div class="center-data">

        <h1>Your Cart</h1>
        <div class="cart-container">
            <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])): ?>
                <?php foreach ($_SESSION['cart'] as $item): ?>
                    <div class="list-tile">
                        <img src="./images/<?php echo htmlspecialchars($item['title']); ?>" alt="<?php echo htmlspecialchars($item['title']); ?>">
                        <div class="content">
                            <h5><?php echo htmlspecialchars($item['title']); ?></h5>
                            <p><?php echo htmlspecialchars($item['description']); ?></p>
                        </div>
                        <div class="content-right">

                            <span class="price">$<?php echo htmlspecialchars($item['price']); ?></span>
                            <span class="quantity">Quantity: <?php echo htmlspecialchars($item['quantity']); ?></span>
                            <form method="POST">
                                <input type="hidden" name="remove_id" value="<?php echo $item['id']; ?>">
                                <button type="submit" class="remove-btn">Remove</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Your cart is empty.</p>
            <?php endif; ?>
        </div>

    </div>
    <footer>
        <div class="footerContainer">
            <div class="socialIcons">
                <a href="" target=”_blank”><i class="fa-brands fa-facebook"></i></a>
                <a href="" target=”_blank”><i class="fa-brands fa-instagram"></i></a>
                <a href="" target=”_blank”><i class="fa-brands fa-twitter"></i></a>
                <a href="https://wa.me/96176770576" target=”_blank”><i class="fa-brands fa-whatsapp"></i></a>
                <a href="" target=”_blank”><i class="fa-brands fa-google"></i></a>
            </div>
            <div class="footerNav">
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="index2.php">About</a></li>
                    <li><a href="https://wa.me/96176770576">Contact Us</a></li>
                    <li><a href="Reservation.php">Reservation</a></li>
                </ul>
            </div>

        </div>
        <div class="footerBottom">
            <p>Copyright &copy;2023; Designed by <span class="designer">Nahouli</span></p>
        </div>
    </footer>

</body>

</html>