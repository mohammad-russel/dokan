<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "../components/head2.php"; ?>
    <title>SR Homepage</title>
    <style>

    </style>
</head>

<body>
    <div class="container">
        <div class="landing_page">
            <div class="header">
                <div class="logo">
                    <img src="../logo/file.png" alt="">
                </div>
                <div class="link">
                    <a href="#">Contact</a>
                    <a href="other/faq.php">FAQ</a>
                </div>
            </div>
        </div>
        <div class="faq">
            <ul>
                <li class="box">
                    <div class="quetion"><span>what is your name?</span> <span>
                            <ion-icon name="chevron-forward-outline"></ion-icon>
                        </span></div>
                    <div class="ans">My name Is rasel.My name Is rasel.My name Is rasel.My name Is rasel.My name Is rasel.My name Is rasel.</div>
                </li>
                <li class="box">
                    <div class="quetion"><span>what is your name?</span> <span>
                            <ion-icon name="chevron-forward-outline"></ion-icon>
                        </span></div>
                    <div class="ans">My name Is rasel.My name Is rasel.My name Is rasel.My name Is rasel.My name Is rasel.My name Is rasel.</div>
                </li>
                <li class="box">
                    <div class="quetion"><span>what is your name?</span> <span>
                            <ion-icon name="chevron-forward-outline"></ion-icon>
                        </span></div>
                    <div class="ans">My name Is rasel.My name Is rasel.My name Is rasel.My name Is rasel.My name Is rasel.My name Is rasel.</div>
                </li>
                <li class="box">
                    <div class="quetion"><span>what is your name?</span> <span>
                            <ion-icon name="chevron-forward-outline"></ion-icon>
                        </span></div>
                    <div class="ans">My name Is rasel.My name Is rasel.My name Is rasel.My name Is rasel.My name Is rasel.My name Is rasel.</div>
                </li>
            </ul>
        </div>

    </div>
</body>

<script>
    $(document).ready(function() {
        $(".ans").hide()
        $(".box").click(function() {
            $(this).children(".quetion").children("span").children("ion-icon").toggleClass("bal")
            $(this).children(".ans").slideToggle()
        })
    })
</script>

</html>