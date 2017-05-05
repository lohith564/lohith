<?php
session_start();
unset($_SESSION["username"]);
unset($_SESSION["movie"]);
header("Location: main.php");
?>
