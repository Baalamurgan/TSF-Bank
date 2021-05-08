<!DOCTYPE html>
<html lang="en">
/** 
*TODO: date not ordered
*/ 
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/tablee.css" type="text/css">
    <link rel="stylesheet" href="./css/navbarr.css" type="text/css">
    <link rel="stylesheet" href="./css/styleee.css" type="text/css">
    <title>Transaction History</title>
    <style type="text/css">
        #home{
            background-color: pink;
            color: black;
            transition: 0.5s;
        }

        #back {
            text-align: center;
        }

        #home:hover{
            background-color: black;
            color: red;
        }
    </style>
</head>

<body>

    <?php
    include 'navbar.php';
    ?>

    <div class="container">
        <h2 class="text-center pt-4" style="color: black;">Transaction History</h2>

        <br>
        <div class="table-responsive-sm">
            <table class="table table-condensed">
                <thead style="color: black;">
                    <tr>
                        <th class="text-center">S.No</S></th>
                        <th class="text-center">Sender</th>
                        <th class="text-center">Receiver</th>
                        <th class="text-center">Amount</th>
                        <th class="text-center">Date & Time</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    include 'config.php';
                    $sql = "SELECT * FROM 'transaction' ORDER BY dt";
                    $query = mysqli_query($conn, $sql);
                    $i = 0;
                    while ($rows = mysqli_fetch_assoc($query)) {
                        $i = $i + 1;
                    ?>
                        <tr style="color: black;">
                            <td class="py-2"><?php echo $i; ?></td>
                            <td class="py-2"><?php echo $rows['sender']; ?></td>
                            <td class="py-2"><?php echo $rows['receiver']; ?></td>
                            <td class="py-2"><?php echo $rows['amount']; ?></td>
                            <td class="py-2"><?php echo $rows['dt']; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div id="homebtn"><a href="index.php"><button class="home">HOME</button></a></div>

    <footer class="text-center mt-5 py-2">
        <p>&copy 2021. Made by <b>Baalamurgan K A</b><br>GRIP TheSparksFoundation.</p>
    </footer>

</body>

</html>