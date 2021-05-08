<!DOCTYPE html>
/** 
*TODO: Home page not aligned
*/ 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/tablee.css" type="text/css">
    <link rel="stylesheet" href="./css/navbarr.css" type="text/css">
    <link rel="stylesheet" href="./css/styleee.css" type="text/css">
    <style type="text/css">
        a {
            color: black;
            transition: 1.0s;
        }

        a:hover {
            color: black;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <?php
    include 'config.php';
    include 'navbar.php';
    ?>
    <br>
    <div id="homebtn"><a href="index.php"><button class="home">HOME</button></a></div><br>
    <h1 style="text-align:center;color:blue;">CUSTOMERS</h1>
    <div class="row" style="width: 100%;">
        <div class="column" style="width: 100%;">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th scope="col">S.NO</th>
                        <th scope="col">Name</th>
                        <th scope="col">View details</th>
                    </tr>
                </thead>
                <?php
                $sql = "SELECT name,email,number,balance FROM customers ORDER BY name";
                $result = $conn->query($sql);
                $i = 0;
                echo "";
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "";
                        $i = $i + 1;
                        $e = $row["email"];
                        $n = $row["number"];
                        $b = $row["balance"];
                        echo "<tr><th>" . $i . "</th><td>" . $row["name"] . "</td><td><a id=\"show\" href=\"transfermoney.php?phno=$row[number]\"><button>View</button></a></td></tr>";
                    }
                    echo '';
                } else {
                    echo "0 results";
                }
                ?>
                </tbody>
            </table>
        </div>
        <!-- <div class="column">
                    <table id="second">
                        <thead>
                            <tr>
                                <th scope="col">E-mail:</th>
                                <td id="email">
                                </td>
                            </tr>
                            <tr>
                                <th scope="col">Phone number:</th>
                                <td id="number">
                                </td>
                            </tr>
                            <tr>
                                <th scope="col">Balance:</th>
                                <td id="balance">
                                </td>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="column">
                    <table id="third">
                        <thead>
                            <tr>
                                <th>Want to </th>
                                <td><a href="selecteduserdetail.php?phno=$row[number]"><button type="button" id="tr">Transfer</button></a></td>
                            </tr>
                        </thead>
                    </table>
                </div> -->
    </div>
    <script>
        function expand(e, n, b) {
            document.getElementById("email").innerHTML = e;
            document.getElementById("number").innerHTML = n;
            document.getElementById("balance").innerHTML = b;
            // var x = document.getElementById("email");
            // var y = document.getElementById("number");
            // var z = document.getElementById("balance");
            // if (x.style.display == "none") {
            //     x.style.display = "block";
            // } else {
            //     x.style.display = "none";
            // }
            // if (y.style.display == "none") {
            //     y.style.display = "block";
            // } else {
            //     y.style.display = "none";
            // }
            // if (z.style.display == "none") {
            //     z.style.display = "block";
            // } else {
            //     z.style.display = "none";
            // }
        }
    </script>

    <footer class="text-center mt-5 py-2">
        <p>&copy 2021. Made by <b>Baalamurgan K A</b><br>GRIP TheSparksFoundation.</p>
    </footer>
</body>

</html>