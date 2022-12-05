<?php
session_start();
if (isset($_SESSION["aid"])) {
    header("location:admin_home.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <?php include "../components/head2.php"; ?>
</head>

<body>

    <div class="container fnew">

        <div class="form_new">
            <!-- <h4 class="lt">Admin Login</h4>
            <p>Enter your number & password</p>
            <form class="login_form" action="../php/admin_login.php" method="post">
                <input type="number" name="number" id="number" placeholder="number" required>
                <input type="password" name="password" id="password" placeholder="password" required>
                <a href="">
                    Forget Password?
                </a>
                <div class="btn">
                    <ion-icon name="lock-open-outline"></ion-icon>
                    <input type="submit" id="login" name="login" value="Login">
                </div>
            </form> -->
            <div class="logo_box">

                <img src="../logo/perfect.png" alt="">
            </div>
            <div class="login_box">
            
                <form action="../php/admin_login.php" method="post">
                    <h1>Admin Login</h1>
                    <p>Enter your phone number & password</p>
                    <input type="number" name="number" id="number" placeholder="Number " required>
                    <input type="password" name="password" id="password" placeholder="Password" required>
                    <a href="">
                        Forget Password?
                    </a>
                    <div class="btn_box">
                        <button type="submit" id="login" name="login">
                            <ion-icon name="lock-open-outline"></ion-icon>
                            <span class="txt">Login</span>
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>

</body>

</html>