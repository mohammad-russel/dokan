<?php
session_start();
unset($_SESSION["delid"]);
header("location:../delivery_man/login.php");