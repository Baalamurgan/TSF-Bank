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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styleee.css" type="text/css">
    <link rel="stylesheet" href="css/navbarr.css" type="text/css">
    <title>Basic Banking System</title>
    <style>
        button:hover {
            transition: 0.5s;
            font-size: 20px;
        }
    </style>
</head>

<body>
    <?php
    include 'navbar.php';
    ?>
    <div class="container-fluid" style="background-color: black;">
        <div class="row py-1">
            <div class="col-sm-12 col-md">
                <div class="text-center">
                    <h1>Welcome to</h1>
                    <h1>TSF Bank</h1>
                </div>
            </div>

            <div class="row activity text-center">
                <div class="col-md act">
                    <br><img src="img/newuser.png" alt="newuserimg" class="img-fluid">
                    <br>
                    <a href="create.php"><br><button>New customer</button></a><br><br>
                </div>
                <div class="col-md act">
                    <br><img src="img/users.png" alt="usersimg" class="img-fluid">
                    <br>
                    <a href="userslist.php?phno="><br><button>View all customers</button></a>
                </div>
                <div class="col-md act">
                    <img src="img/transaction.jpg" alt="transferimg" class="img-fluid">
                    <br>
                    <a href="transactionhistory.php"><br><button>Transaction History</button></a>
                </div>
            </div>

        </div>
    </div>
    <footer class="text-center mt-5 py-2">
        <p>&copy 2021. Made by <b>Baalamurgan K A</b><br>GRIP TheSparksFoundation.</p>
    </footer>

</body>

</html>