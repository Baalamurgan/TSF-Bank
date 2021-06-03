<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location:login.php');
}
?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers detail</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/tablee.css" type="text/css">
    <link rel="stylesheet" href="./css/navbarr.css" type="text/css">
    <link rel="stylesheet" href="./css/styleee.css" type="text/css">
    <style type="text/css">
        .btn,
        a {
            background-color: black;
            color: yellowgreen;
            transition: 0.5s;
        }

        #back {
            text-align: center;
        }

        .btn:hover,
        a:hover {
            background-color: green;
            color: red;
            text-decoration: none;
        }

        .back {
            color: black;
            background-color: grey;
            border-radius: 3;
        }

        .back:hover {
            color: white;
            background-color: black;
        }
    </style>
</head>

<body>
    <?php
    include 'config.php';
    include 'navbar.php';
    $to = $_GET["phno"];
    $sql = "SELECT * FROM customers";
    $result = mysqli_query($conn, $sql);
    ?>
    <h1 style="text-align:center;color:blue;">Account Details</h1>
    <div class="row" style="width: 100%;">
        <div class="column" style="width: 100%;">
            <table class="table tablelist table-condensed">
                <thead>
                    <tr>
                        <th scope="col">S.NO</th>
                        <th scope="col">Name</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Phone number</th>
                        <th scope="col">Balance</th>
                        <th scope="col">Transfer</th>
                    </tr>
                </thead>
                <?php
                $sql = "SELECT name,email,number,balance FROM customers  WHERE number=$to";
                $result = $conn->query($sql);
                $i = 0;
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "";
                        $i = $i + 1;
                        echo "<tr><th scope=\"row\">" . $i . "</th><td>" . $row["name"] . "</td><td>" . $row["email"] . "</td><td>" . $row["number"] . "</td><td>" . $row["balance"] . "</td><td><a href=\"userchoice.php?phone=$row[number]\"><button type=\"button\" class=\"btn\">Transfer</button></a></td></tr>";
                    }
                } else {
                    echo "0 results";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <div id="back"><a href="userslist.php?phno="><button class="back">BACK</button></a></div>
    <footer class="text-center mt-5 py-2">
        <p>&copy 2021. Made by <b>Baalamurgan K A</b><br>GRIP TheSparksFoundation.</p>
    </footer>
</body>

</html>