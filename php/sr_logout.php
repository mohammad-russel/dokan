<?php
session_start();
unset($_SESSION["sid"]);
header("location:../sr/login.php");