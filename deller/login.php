<?php
session_start();
if (isset($_SESSION["did"])) {
    header("location:../new_dashboard/deller.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deller Login</title>
    <?php include "../components/head2.php"; ?>
</head>

<body>

    <div class="container fnew">
        <div class="form_new">
            <div class="logo_box">
                <img src="../logo/file.png" alt="">
            </div>
            <div class="login_box">
                <form action="../php/deller_login.php" method="post">
                    <h1>Deller Login</h1>
                    <p>Enter your phone number & password</p>
                    <input type="number" name="number" id="number" placeholder="Number" required>
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