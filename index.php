<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- --------------------- -->
    <?php include "components/head.php"; ?>
    <!--  -->
    <title>Landing Page</title>
</head>

<body>
    <div class="container">
        <div class="landing-page-new">
            <div class="landing-page-header">
                <div class="logo">
                    <img src="logo/fav.png" alt="">
                </div>
                <div class="menu">
                    <div class="box">
                        <a href="admin/admin_home.php">
                            <ion-icon name="person-circle"></ion-icon>
                            <span>Admin</span>
                        </a>
                        <a href="deller/deller_home.php">
                            <ion-icon name="thumbs-up"></ion-icon>
                            <span>Deller</span>
                        </a>
                        <a href="retailer/homepage.php">
                            <ion-icon name="storefront"></ion-icon>
                            <span>Retailer</span>
                        </a>
                        <a href="sr/sr_home.php">
                            <ion-icon name="people"></ion-icon>
                            <span>SR</span>
                        </a>
                        <a href="delivery_man/d_home.php">
                            <ion-icon name="bicycle"></ion-icon>
                            <span>Delivery</span>
                        </a>
                    </div>
                </div>
                <div class="toggle">
                    <div class="hide">
                        <ion-icon class="icon" name="close-outline"></ion-icon>
                    </div>
                    <div class="show">
                        <ion-icon class="icon" name="apps-outline"></ion-icon>
                    </div>
                </div>
            </div>
            <section class="open">
                <div class="slogan">
                    <img src="image/slogan/4.jpg" alt="">
                </div>
                <div class="box-room">
                    <div class="box">
                        <div class="text">Save more time</div>
                        <div class="icon">
                            <ion-icon name="time-outline"></ion-icon>
                        </div>
                    </div>
                    <div class="box">
                        <div class="text">make more money</div>
                        <div class="icon">
                           <h1>৳</h1>
                        </div>
                    </div>
                    <div class="box">
                        <div class="text">save more money</div>
                        <div class="icon">
                            <ion-icon name="wallet-outline"></ion-icon>
                        </div>
                    </div>
                </div>
            </section>
            <section class="faqs">
                <h1>FAQ</h1>
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
            </section>
            <section class="about">
                <div class="box">
                    <h2>About Us</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis at eaque natus nemo a culpa!Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis at eaque natus nemo a culpa!</p>
                </div>
            </section>
            <section class="contact">
                <div class="contact-box">
                    <form action="" method="post">
                        <input type="text" name="name" id="name">
                        <input type="email" name="email" id="email">
                        <textarea name="message" id="message">Write message...</textarea>
                        <button type="submit">Send</button>
                    </form>
                </div>
                <div class="social-link">
                    <a href="">
                        <ion-icon name="logo-facebook"></ion-icon>
                        <p>Facebook</p>
                    </a>
                    <a href="">
                        <ion-icon name="logo-linkedin"></ion-icon>
                        <p>Linkedin</p>
                    </a>
                    <a href="">
                        <ion-icon name="logo-whatsapp"></ion-icon>
                        <p>Whatsapp</p>
                    </a>
                </div>
            </section>
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
        $(".hide").hide()
        $(".show").click(function() {
            $(this).fadeOut()
            $(".menu").css({
                "height": "500px"
            })
            setTimeout(s, 500);

            function s() {
                $(".hide").fadeIn()
            }
        })
        $(".hide").click(function() {
            $(this).fadeOut()
            $(".menu").css({
                "height": "0px"
            })
            setTimeout(s, 500);

            function s() {
                $(".show").fadeIn()
            }
        })
    })
</script>

</html>