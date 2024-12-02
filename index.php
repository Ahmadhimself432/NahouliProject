<?php

include "connection.php";

$sql = "SELECT id, title, price, description, image FROM pizzas";
mysqli_query($con,$sql);
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verve Pizza Menu</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <header>
        <div class="container">
            <h1><a href="#">VERVE PIZZA</a></h1>
            <nav>
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="index.php">Menu</a></li>
                    <li><a href="index2.php">About Us</a></li>
                    <li><a href="https://wa.me/96176770576">Contact</a></li>
                    <li><a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="menu">
        <?php if ($result && $result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="food-items">
                    <img src="./images/<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['title']); ?>" loading="lazy">
                    <div class="details">
                        <div class="details-pizza">
                            <h5><?php echo htmlspecialchars($row['title']); ?></h5>
                            <h5 class="price"><?php echo htmlspecialchars($row['price']); ?>$</h5>
                        </div>
                        <p class="ingred"><?php echo htmlspecialchars($row['description']); ?></p>
                        <button class="button-62 add-to-cart" data-id="<?php echo $row['id']; ?>" data-title="<?php echo htmlspecialchars($row['title']); ?>" data-description="<?php echo htmlspecialchars($row['description']); ?>" data-image="<?php echo htmlspecialchars($row['image']); ?>" data-price="<?php echo htmlspecialchars($row['price']); ?>">Add to Cart</button>

                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No items available in the menu.</p>
        <?php endif; ?>
    </div>
    <footer>
        <div class="footerContainer">
            <div class="socialIcons">
                <a href=""><i class="fa-brands fa-facebook"></i></a>
                <a href=""><i class="fa-brands fa-instagram"></i></a>
                <a href=""><i class="fa-brands fa-twitter"></i></a>
                <a href="https://wa.me/96176770576"><i class="fa-brands fa-whatsapp"></i></a>
                <a href=""><i class="fa-brands fa-google"></i></a>
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
<script>
    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', () => {
            const id = button.getAttribute('data-id');
            const title = button.getAttribute('data-title');
            const image = button.getAttribute('data-image');
            const description = button.getAttribute('data-description');
            const price = button.getAttribute('data-price');

           
            fetch('add_to_cart.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: `id=${id}&title=${title}&description=${description}&image=${image}&price=${price}`
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        alert('Item added to cart');
                    } else {
                        alert('Failed to add item to cart: ' + data.message);
                    }
                });
        });
    });
</script>

</html>
<?php
$con->close();
?>