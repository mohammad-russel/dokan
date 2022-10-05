<?php
session_start();
unset($_SESSION["did"]);
header("location:../deller/login.php");