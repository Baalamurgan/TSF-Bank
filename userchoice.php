<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/tablee.css">
    <link rel="stylesheet" type="text/css" href="css/navbarr.css">
    <link rel="stylesheet" type="text/css" href="css/styleee.css">
    <style type="text/css">
        .btn,
        a {
            background-color: black;
            color: yellowgreen;
            transition: 1s;
        }

        .btn:hover,
        a:hover {
            background-color: green;
            color: red;
        }
    </style>
</head>
<?php
include 'config.php';
include 'navbar.php';
$from = $_GET["phone"];
$sql = "SELECT name,email,number,balance FROM customers WHERE number!=$from ORDER BY name";
$result = $conn->query($sql);
$i = 0;
echo "<h2 style=\"color:blue;\">Select customer to tranfer to(Receiver):</h2><table class=\"table tablelist table-condensed\"><thead><tr><th scope=\"col\">S.NO</th><th scope=\"col\">Name</th><th scope=\"col\">E-mail</th><th scope=\"col\">Phone number</th><th scope=\"col\">Transfer</th></tr></thead>";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "";
        $i = $i + 1;
        echo "<tr><th scope=\"row\">" . $i . "</th><td>" . $row["name"] . "</td><td>" . $row["email"] . "</td><td>" . $row["number"] . "</td><td><a href=\"selecteduserdetail.php?to=$row[number]&from=$from\"><button type=\"button\" class=\"btn\">Transfer</button></a></td></tr>";
    }
} else {
    echo "0 results";
}
echo "</tbody></table>";
$sqlb = "SELECT name,email,number,balance FROM customers WHERE number=$from ORDER BY name";
$resultb = $conn->query($sqlb);
if ($resultb->num_rows > 0) {
    while ($row = $resultb->fetch_assoc()) {
        echo "<div style=\"text-align: center;\"><a href=\"transfermoney.php?phno=$row[number]\"><button class=\"home\">BACK</button></a></div>";
    }
} else {
    echo "0 results";
}
?>
<footer class="text-center mt-5 py-2">
    <p>&copy 2021. Made by <b>Baalamurgan K A</b><br>GRIP TheSparksFoundation.</p>
</footer>

</body>

</html>