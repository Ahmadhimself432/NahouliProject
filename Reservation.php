<!DOCTYPE html>
<html lang="en">

<head>


    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Platypi:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link href="reservation.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style media="screen">
        *,
        *:before,
        *:after {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #080710;
        }

        .background {
            width: 430px;
            height: 520px;
            position: absolute;
            transform: translate(-50%, -50%);
            left: 50%;
            top: 50%;
        }

        .background .shape {
            height: 200px;
            width: 200px;
            position: absolute;
            border-radius: 50%;
        }

        .shape:first-child {
            background: linear-gradient(#1845ad,
                    #23a2f6);
            left: -80px;
            top: -80px;
        }

        .shape:last-child {
            background: linear-gradient(to right,
                    #ff512f,
                    #f09819);
            right: -30px;
            bottom: -80px;
        }

        form {
            height: 520px;
            width: 400px;
            background-color: rgba(255, 255, 255, 0.13);
            position: absolute;
            transform: translate(-50%, -50%);
            top: 50%;
            left: 50%;
            border-radius: 10px;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
            padding: 50px 35px;
        }

        form * {
            font-family: 'Poppins', sans-serif;
            color: #000000;
            letter-spacing: 0.5px;
            outline: none;
            border: none;
        }

        form h3 {
            font-size: 32px;
            font-weight: 500;
            line-height: 42px;
            text-align: center;
        }

        label {
            display: block;
            margin-top: 30px;
            font-size: 16px;
            font-weight: 500;
        }

        input {
            display: block;
            height: 50px;
            width: 100%;
            background-color: rgba(255, 255, 255, 0.07);
            border-radius: 3px;
            padding: 0 10px;
            margin-top: 8px;
            font-size: 14px;
            font-weight: 300;
        }

        ::placeholder {
            color: #e5e5e5;
        }

        button {
            margin-top: 50px;
            width: 100%;
            background-color: #ffffff;
            color: #080710;
            padding: 15px 0;
            font-size: 18px;
            font-weight: 600;
            border-radius: 5px;
            cursor: pointer;
        }

        .social {
            margin-top: 30px;
            display: flex;
        }

        .social div {
            background: red;
            width: 150px;
            border-radius: 3px;
            padding: 5px 10px 10px 5px;
            background-color: rgba(255, 255, 255, 0.27);
            color: #eaf0fb;
            text-align: center;
        }

        .social div:hover {
            background-color: rgba(255, 255, 255, 0.47);
        }

        .social .fb {
            margin-left: 25px;
        }

        .social i {
            margin-right: 4px;
        }
    </style>
</head>

<body>
    <div>
        <div class="background">
            <div class="shape"></div>
            <div class="shape"></div>
        </div>

        <form method="post" action="Reservation_action.php">
            <table>
                <tr>
                    <td>Location</td>
                </tr>
                <tr>
                    <td><select name="txt_location" id="" required>
                            <option value="" disabled selected>Location</option>
                            <option value="Beirut">Beirut</option>
                            <option value="Tripoli">Tripoli</option>
                            <option value="Saida">Saida</option>
                        </select></td>
                </tr>
                <tr>
                    <td>Number of people</td>
                </tr>
                <tr>
                    <td><select name="txt_numberofpeople" id="">
                            <option value="" disabled selected>number of people</option>
                            <option value="1">1 person</option>
                            <option value="2">2 person</option>
                            <option value="3">3 person</option>
                            <option value="4">4 person</option>
                            <option value="5">5 person</option>
                            <option value="6">6 person</option>
                            <option value="7">7 person</option>
                            <option value="8">8+ person</option>
                        </select></td>
                </tr>
                <tr>
                    <td>Date</td>
                </tr>
                <tr>
                    <td><input name="txt_date" type="date"></td>
                </tr>
                <tr>
                    <td>Time</td>
                </tr>
                <tr>
                    <td><input name="txt_time" type="time"></td>
                </tr>
                <tr class="last">
                    <td><input id="findTableBtn" type="submit" onclick=""></td>
                </tr>
            </table>
            <?php
            if (isset($_GET['flag'])) {
                $f = $_GET['flag'];
                if ($f == 1)
                    echo "<h5 style=color:red;text-align:center;>All Fields are Required</h5>";
                if ($f == 2) {
                    echo "<h5 style=color:green;text-align:center>Reservation Added Successfully</h5>";
                    $url = "index.php";
                    $linkText = "go to home";
                    echo "<div style=\"text-align: center;margin-top:15px\"><a style=\"color:orange\" href=\"$url\">$linkText</a></div>";
                }
                if ($f == 3) {
                    echo "<h5 style=color:red;text-align:center;>This date and time is already reserved. Please choose a different slot.</h5>";
                }
            }
            ?>
        </form>
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
                    <li><a href="index2.php" target=”_blank”>About</a></li>
                    <li><a href="https://wa.me/96176770576" target=”_blank”>Contact Us</a></li>
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