<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "grip";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Couldn't connect to Database" . mysqli_connect_error());
}
?>