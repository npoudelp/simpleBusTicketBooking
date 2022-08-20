<?php
session_start();
if ($_SESSION['logged'] != 'true') {
    header("location: ./login.php");
}


if (isset($_REQUEST['id']) == 28) {
    $bid = $_REQUEST['id'];
    include_once("../include/dbConn.inc.php");
    $sql = "SELECT * FROM book, route, users WHERE route.rid=book.rid AND book.uid=users.uid AND book.bid=$bid;";
    $res = mysqli_query($conn, $sql);
} ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.min.js"></script>

    <title>dTicket</title>

    <style>
        @media print {
            .toHide {
                visibility: hidden;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light toHide">
        <div class="container">
            <a class="navbar-brand" href="./profile.php">dTicket</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link active" href="./profile.php">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="./bookTicket.php">Book Ticket</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../include/logout.inc.php"><span class="btn btn-success">Log Out</span></a>
                    </li>
                    <li class="nav-item">
                        <button onclick="printTicket()"><span class="btn btn-success">Print Ticket</span></button class="btn btn-primary">
                    </li>
                    <?php
                    if (isset($_REQUEST['q'])) {
                        echo '
                            <li class="nav-item">
                            <span class="lead text-success">Hello ' . $_REQUEST['q'] . '!</span></a>
                            </li>
                            ';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <section class="p-1 lead">
        <div class="container border">
            <?php
            while ($row = mysqli_fetch_assoc($res)) {
            ?>

                <div class="py-2 row border-bottom">
                    <div class="py-2 col-12">
                        <span class="py-2  h1">Travel Ticket</span> <span class="py-2 lead"> _Booked from dTicket</span>
                    </div>
                </div>
                <div class="py-2 row">
                    <div class="py-2 col-6">
                        <span class="py-2 lead">Name: <?php echo $row['name'] ?></span>
                    </div>
                    <div class="py-2 col-6">
                        <span class="py-2 lead">Contact: <?php echo $row['phone'] ?></span>
                    </div>
                </div>
                <div class="py-2 row">
                    <div class="py-2 col-6">
                        <span class="py-2 lead">Bus Number: <?php echo $row['busNo'] ?></span>
                    </div>
                    <div class="py-2 col-6">
                        <span class="py-2 lead">Seat Number: <?php echo $row['seatNo'] ?></span>
                    </div>
                </div>
                <div class="py-2 row">
                    <div class="py-2 col-6">
                        <span class="py-2 lead">From: <?php echo $row['initial'] ?></span>
                    </div>
                    <div class="py-2 col-6">
                        <span class="py-2 lead">To: <?php echo $row['final'] ?></span>
                    </div>
                </div>
                <div class="py-2 row">
                    <div class="py-2 col-6">
                        <span class="py-2 lead">Date: <?php echo $row['date'] ?></span>
                    </div>
                    <div class="py-2 col-6">
                        <span class="py-2 lead">Customer Sign:<br> ___________________</span>
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col-12">
                        <span class="lead">Helpline: 9812345678  Email: counter@dticket.com </span>
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col-12">
                        <small class="text-muted">This is a computer generated invoice and does not require authorised signature.</small>
                    </div>
                </div>

            <?php
            }
            ?>
            </table>
        </div>
    </section>

    <script>
        printTicket = () => {
            window.print();
        }
    </script>

</body>

</html>