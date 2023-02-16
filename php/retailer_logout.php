<?php
session_start();
unset($_SESSION["rid"]);
header("location:../login/retailer.php");