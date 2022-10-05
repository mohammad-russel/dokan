<?php
session_start();
unset($_SESSION["rid"]);
header("location:../retailer/login.php");