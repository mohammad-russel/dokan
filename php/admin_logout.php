<?php
session_start();
unset($_SESSION["aid"]);
header("location:../login/admin.php");