<?php
session_start();
unset($_SESSION["delid"]);
header("location:../login/dm.php");