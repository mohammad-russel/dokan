<?php
session_start();
unset($_SESSION["did"]);
header("location:../login/deller.php");