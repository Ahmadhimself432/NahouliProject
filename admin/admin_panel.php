<?php
session_start();
$_SESSION['loggedin'] = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = "admin";
    $password = "admin@admin";

    $input_username = $_POST['username'];
    $input_password = $_POST['password'];
    if ($input_username === $username && $input_password === $password) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("Location: pizzas.php");
        exit();
    } else {
        $error_message = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <style>.loginForm {
  background-color: white;
  border: 1px solid #ccc;
  width: 300px;
  margin: 20px auto;
  padding: 20px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.loginForm label {
  display: block;
  font-weight: bold;
  margin: 10px 0 5px;
}

.loginForm input {
  width: 90%;
  padding: 10px;
  margin-bottom: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

.loginForm input[type="text"], .loginForm input[type="password"] {
  font-size: 16px;
}

.loginForm button {
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 16px;
}</style>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="admin_style.css">
</head>
<body>
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <ul>
            <li><a href="pizzas.php">Pizzas</a></li>
            <li><a href="reservations.php">Reservations</a></li>
        </ul>
    </div>

    <div class="main-content">
        <h1>Welcome to the Admin Panel</h1>
        <p>Select a section from the sidebar to manage pizzas or reservations.</p>
        
        <?php if (isset($error_message)): ?>
            <p style="color: red;"><?php echo $error_message;?></p>
            
        <?php endif; ?>

        <div class="loginForm">
            <form method="POST" action="">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="Username" required>
                
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Password" required>
                
                <button type="submit">Login</button>
            </form>
        </div>
    </div>


    <script></script>
</body>
</html>
