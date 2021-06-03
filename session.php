<?php
session_start();
if(isset($_SESSION["username"]) && $_SESSION["password"] === true)
    header("location: index.php");
    exit;
?>