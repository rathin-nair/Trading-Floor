<?php require_once 'make_db.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>NMIMS - Portal</title>
    <link rel="stylesheet" href="../CSS/login.css">
</head>
<body>
    <main>
        <div class="erpass">
            Incorrect password
        </div>

        <div class="eruser">
            User not found!
        </div>
        <div class="login-container">
            <div class="login-logo">
                <img src="../Images/nm.png" alt="logo">
            </div>
            <div class="login-desc">
                Student Attendence Manager
            </div>
                                
            <div class="login">
                <p class="title">Login</p>
                <form class="login-form" method="POST" action="validate.php">
                    <label id="email-lab" for="email">Email</label>
                    
                    <input type="email" id="email" name="email" required placeholder="Your email">
                    <div class="input-error">
                        <!--Div for email errors-->
                    </div>
                    <label id="pass-lab" for="pass">Password</label>
                    
                    <input type="password" id="pass" name="pass" required placeholder="Your password">

                    <input type="submit" id="log-submit" name="log-submit" value="Login">
                </form>              
            </div>
        </div>

        <?php
            $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            if(strpos($url, "error=eruser") == true){
                echo "<script> document.querySelector('.eruser').style.display = 'flex' </script>";
            }
            if(strpos($url, "error=erpass") == true){
                echo "<script> document.querySelector('.erpass').style.display = 'flex' </script>";
            }
        ?>
    </main>
</body>
</html>