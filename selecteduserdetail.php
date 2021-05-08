<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/tablee.css">
    <link rel="stylesheet" type="text/css" href="css/navbarr.css">
    <style>
        .btn {
            background-color: black;
            color: red;
            padding: 15px;
            font-size: 20px;
        }

        .btn:hover {
            background-color: black;
            color: rgb(151, 245, 29);
        }

        input {
            width: 150px;
            margin-left: 10px;
        }
    </style>
</head>
<?php
include 'config.php';
include 'navbar.php';
$to = $_GET["to"];
$from = $_GET["from"];
$sql1 = "SELECT name,email,number,balance FROM customers WHERE number=$to";
$result1 = $conn->query($sql1);
$query1 = mysqli_query($conn, $sql1);
$sqlto = mysqli_fetch_array($query1);
$sql2 = "SELECT name,email,number,balance FROM customers WHERE number=$from";
$result2 = $conn->query($sql2);
$query2 = mysqli_query($conn, $sql2);
$sqlfrom = mysqli_fetch_array($query2);
$i = 0;
echo "<h2 style=\"color:blue;\">Customer details you want to transfer to:</h2><table class=\"table\"><thead><tr><th scope=\"col\">S.NO</th><th scope=\"col\">Name</th><th scope=\"col\">E-mail</th><th scope=\"col\">Phone number</th></tr></thead>";
if ($result1->num_rows > 0) {
    while ($row = $result1->fetch_assoc()) {
        echo "";
        $i = $i + 1;
        echo "<tr><th scope=\"row\">" . $i . "</th><td>" . $row["name"] . "</td><td>" . $row["email"] . "</td><td>" . $row["number"] . "</td></tr>";
    }
} else {
    echo "0 results";
}

if ($result2->num_rows > 0) {
    while ($row = $result2->fetch_assoc()) {
        echo "<tr><td colspan=4><div id=\"back\"><a href=\"userchoice.php?phone=$row[number]\"><button class=\"back\">BACK</button></a></div></td></tr>";
    }
} else {
    echo "0 results";
}

echo "</tbody></table>";
echo "<div style=\"text-align:center; align-items:center;\">";
echo "<form method=\"post\" name=\"tcredit\" class=\"tabletext\"><br><label style=\"color : black;\"><b>Amount:</b></label><input type=\"number\"  name=\"amount\" required><br><br><div class=\"text-center\"><button class=\"btn mt-3\" name=\"submit\" type=\"submit\" id=\"myBtn\">Send</button></div>";
$i = 0;
if (isset($_POST['submit'])) {
    $amount = $_POST['amount'];
    if ($amount < 0) {
        echo '<script type="text/javascript">';
        echo ' alert(\'Negative values cannot be transferred\')';
        echo '</script>';
    } else if ($amount > $sqlfrom['balance']) {
        echo '<script type="text/javascript">';
        echo ' alert(\'Insufficient Balance\')';
        echo '</script>';
    } else if ($amount == 0) {
        echo '<script type=\'text/javascript\'>';
        echo 'alert(\'Zero value cannot be transferred\')';
        echo '</script>';
    } else {
        $sender = $sqlfrom['name'];
        $senderno = $sqlfrom['number'];
        $receiver = $sqlto['name'];
        $sql = "INSERT INTO transaction(sender,receiver,amount,dt) VALUES ('$sender','$receiver','$amount',now())";
        if (mysqli_query($conn, $sql)) {
            $newbalance = $sqlfrom['balance'] - $amount;
            $sqla = "UPDATE customers set balance=$newbalance WHERE number=$from";
            mysqli_query($conn, $sqla);
            $newbalance = $sqlto['balance'] + $amount;
            $sqlb = "UPDATE customers set balance=$newbalance WHERE number=$to";
            mysqli_query($conn, $sqlb);
            $sqlr = "SELECT name,number FROM customers WHERE number=$senderno ORDER BY name";
            $resultr = $conn->query($sqlr);
            while ($row = $resultr->fetch_assoc()) {
                echo "<script> alert('Transaction Successful'); window.location='transfermoney.php?phno=$row[number]'; </script>";
            }
        }

        $newbalance = 0;
        $amount = 0;
    }
    echo "</>";
}
?>