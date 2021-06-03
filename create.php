<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New customer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/tablee.css">
    <link rel="stylesheet" type="text/css" href="css/navbarr.css">
    <style>
        #button {
            text-align: center;
        }

        #cr:hover {
            color: white;
            background-color: black;
            font-size: 20px;
        }
    </style>
</head>
<?php
session_start();
include 'config.php';
include 'navbar.php';
echo "<br><form method=\"POST\" id=\"create\">";
echo "<label style=\"font-size:25px;\" for=\"name\">Name:</label><input class=\"form-control\" type=\"text\" id=\"name\" name=\"name\" required><br>";
echo "<label style=\"font-size:25px;\" for=\"email\">E-mail:</label><input class=\"form-control\" type=\"text\" id=\"email\" name=\"email\" form=\"create\" required><br>";
echo "<label style=\"font-size:25px;\" for=\"number\">Phone number:</label><input class=\"form-control\" type=\"text\" id=\"number\" name=\"number\" form=\"create\" required><br>";
echo "<label style=\"font-size:25px;\" for=\"balance\">Deposit amount:</label><input class=\"form-control\" type=\"number\" id=\"balance\" name=\"balance\" form=\"create\" required><br>";
echo "<div id=\"button\"><button class=\"btn btn-primary\" id=\"cr\" name=\"submit\">Create</button></div>";
echo "</form>";
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $balance = $_POST['balance'];
    $sql = "INSERT INTO customers (name,email,number,balance) VALUES ('$name','$email','$number','$balance')";
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully !";
        echo "<script> alert('New user created successfully'); window.location='userslist.php?phno=$number'; </script>";
    } else {
        echo "Error: " . $sql . " " . mysqli_error($conn);
    }
}
?>