<?php
session_start();
if (!isset($_SESSION["rid"])) {
    header("location:../deller/login.php");
}
$rid = $_SESSION["rid"];
date_default_timezone_set("Asia/dhaka");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@40,600,1,200" />
    <title>Retailer</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            width: 100%;
            height: 100%;
        }

        .room {
            width: 100%;
            height: 100%;
        }

        .head {
            height: 100px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .head a {
            text-decoration: none;
            margin: 0px 20px;
            background: #00000012;
            width: max-content;
            height: max-content;
            padding: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            color: #00000080;
        }

        .head a span {}

        .contant_box {
            /* border: 1px solid black; */
            margin: 0px 40px;
            margin-top: 40px;
        }

        .header {
            text-align: center;
        }

        .header h1 {
            color: #4E5D78;
        }

        .header h1 span {
            color: rgba(0, 122, 255, 1);
        }

        .link_box {
            margin-top: 50px;
            background: #FAFBFC;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 100px 20px;
            width: 100%;
            max-width: 800px;
            margin: 30px auto;
        }

        a {
            text-decoration: none;
            color: #4E5D78;
            font-weight: 600;
        }

        .box {
            padding: 10px;
            background: #FFFFFF;
            text-align: center;
            margin: 0px 15px;
            border-radius: 10px;
            width: 200px;
            height: 150px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;

        }

        .box:hover {
            color: rgba(0, 122, 255, 1);
        }

        .icon {
            margin: 10px 0px;
        }

        .icon span {}

        .text {}

        @media only screen and (max-width: 600px) {
            .link_box {
                flex-direction: column;
            }

            .box {
                margin: 20px 0px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        @include "../../php/config.php";
        $sql = "SELECT * FROM retailer WHERE id = $rid";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);

        ?>
        <div class="room">
            <div class="head">
                <a href="../../">
                    <span class="material-symbols-outlined">
                        arrow_back
                    </span>
                </a>
                <a href="../../php/deller_logout.php">
                    <span class="material-symbols-outlined">
                        logout
                    </span>
                </a>
            </div>
            <div class="contant_box">
                <div class="header">
                    <h1> <span><?php echo $row['nam'] ?> সাহেব</span> আপনাকে স্বাগতম</h1>
                </div>
                <div class="link_box">
                    <a href="../retailer.php">
                        <div class="box">
                            <div class="icon">
                                <span class="material-symbols-outlined">
                                    dashboard
                                </span>
                            </div>
                            <div class="text">ড্যাশবোর্ড</div>
                        </div>
                    </a>
                    <a href="../../retailer/homepage.php">
                        <div class="box">
                            <div class="icon">
                                <span class="material-symbols-outlined">
                                    shopping_bag
                                </span>
                            </div>
                            <div class="text">পণ্য</div>
                        </div>
                    </a>


                </div>
            </div>
        </div>
    </div>
</body>

</html>