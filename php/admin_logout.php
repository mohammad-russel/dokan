<?php
session_start();
unset($_SESSION["aid"]);
header("location:../admin/login.php");