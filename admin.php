<?php

include "connection.php";
include "admin_navbar.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Library Management System</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>

<body>
    <div class="banner">
        <div class="form">
            <div class="form-container">
                <div class="form-btn">
                    <span onclick="login()">Login</span>
                    <hr id="indicator">
                </div>
                <form action="" id="loginform" method="post">
                    <input type="text" placeholder="User Name" name="username" required>
                    <input type="password" placeholder="Password" name="password" id="adminpass" required>
                    <span class='show-hide-adminpass'><i class="fas fa-eye" id="eye-adminpass"></i></span>
                    <button type="submit" class="btn" name="login">Login</button>
                    <a href="admin_forgot_password.php">Forgot Password?</a>
                </form>
            </div>
        </div>
    </div>

    <?php

    if (isset($_POST['login'])) {
        $res = mysqli_query($db, "SELECT * FROM `admin` WHERE username='$_POST[username]' && password='$_POST[password]';");
        $count = mysqli_num_rows($res);
        $row = mysqli_fetch_assoc($res);
        if ($count == 0) {
            ?>
            <script type="text/javascript">
                alert("The username or password doesn't match.");

            </script>
            <?php
        } else {
            $_SESSION['login_admin_username'] = $_POST['username'];
            $_SESSION['pic1'] = $row['pic'];
            $_SESSION['stdusername'] = '';
            ?>
            <script type="text/javascript">
                window.location = "admin_dashboard.php";
            </script>

            <?php

        }

    }
    ?>
    <div class="footer">
        <div class="footer-row">
            <div class="footer-left">
                <h1>Opening Hours</h1>
                <p><i class="far fa-clock"></i>Monday to Friday - 9am to 9pm</p>
                <p><i class="far fa-clock"></i>Saturday to Sunday - 8am to 11pm</p>
            </div>
            <div class="footer-middle">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m17!1m11!1m3!1d748.525154461293!2d77.28199693518133!3d29.78398590163938!2m2!1f0!2f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390e89171ff47597%3A0x34baffd01c820728!2sShobhit%20University!5e1!3m2!1sen!2sin!4v1718345422961!5m2!1sen!2sin"
                    width="600" height="200" style="border:0;" allowfullscreen="" loading="lazy"
                    aria-hidden="false"></iframe>

            </div>
            <div class="footer-right">
                <h1>Get In Touch</h1>
                <p>Shobhit University Gangoh (SRE)<i class="fas fa-map-marker-alt"></i></p>
                <p>mail@shobhituniversity.ac.in<i class="fas fa-paper-plane"></i></p>
                <p>011-4320 5500<i class="fas fa-phone-alt"></i></p>
            </div>
        </div>
        <div class="social-links">
            <i class="fab fa-facebook-f"></i>
            <i class="fab fa-twitter"></i>
            <i class="fab fa-instagram-square"></i>
            <i class="fab fa-youtube"></i>
            <p>&copy; 2021 Copyright by Vishal Saini</p>
        </div>
    </div>
    <script>
        var pass2 = document.getElementById("adminpass");
        var showbtn2 = document.getElementById("eye-adminpass");
        showbtn2.addEventListener("click", function () {
            if (pass2.type === "password") {
                pass2.type = "text";
                showbtn2.classList.add("hide");
            }
            else {
                pass2.type = "password";
                showbtn2.classList.remove("hide");
            }
        });
    </script>
</body>

</html>