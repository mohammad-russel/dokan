<?php
session_start();
if (isset($_SESSION["delid"])) {
    header("location:../delivery_man/d_home.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>delivery_man Login</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>

    <div class="container fnew">
        <div class="head_login">
            <h2>স্বাগতম !</h2>
            <p>
                আপনাকে happy-র পক্ষ থেকে স্বাগত জানাই. আপনি আপনার পাসওয়ার্ড এর জন্য একটি ভালো পাসওয়ার্ড ব্যাবহার করুন, যদি করে থাকেন তাহলে ভালো ভাবে সংরক্ষণ করুন কারণ পাসওয়ার্ড সতর্কতা ফিশিং আক্রমণ থেকে রক্ষা করতে সাহায্য করে।
                আর যে কোনো সমস্যাই happy-র সাথে যোগাযোগ করুন ।
            </p>
        </div>
        <div class="form_new">
            <div class="logo_box">
                <img src="../logo/file.png" alt="">
            </div>
            <div class="login_box">
                <form action="../php/dm_login.php" method="post">
                    <h1>সরবারহকারী প্রবেশ পথ</h1>
                    <p>আপনার ফোন নম্বর এবং পাসওয়ার্ড দিন</p>
                    <div class="input">
                        <span class="material-symbols-outlined">
                            phone_in_talk
                        </span>
                        <input type="number" name="number" id="number" placeholder="মোবাইল নম্বর" required>
                    </div>
                    <div class="input">
                        <span class="material-symbols-outlined">
                            mail
                        </span>
                        <input type="password" name="password" id="password" placeholder="পাসওয়ার্ড" required>
                    </div>
                    <a href="">
                        Forget Password?
                    </a>
                    <div class="btn_box">
                        <button type="submit" id="login" name="login">
                            <span class="material-symbols-outlined">
                                arrow_right_alt
                            </span>
                            <span class="txt">প্রবেশ করুন</span>
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</body>

</html>