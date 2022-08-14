<?php
session_start();
$msg = "";
if (isset($_REQUEST['msg'])) {
    $msg = $_REQUEST['msg'];
}


if ($_SESSION['logged'] != 'true') {
    header("location: ./login.php");
}
include_once('../include/dbConn.inc.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.min.js"></script>

    <title>dTicket</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="./admin.php">dTicket</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link active" href="./admin.php">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="./addRoute.php">Add Route</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../include/logout.inc.php"><span class="btn btn-success">Log Out</span></a>
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

    <section class="lead text-dark">
        <div class="container">
            <br>
            <p class="text-center text-warning"><?php
                                                echo $msg;
                                                ?></p>
            <table class="table" class="print-container" width='100%'>
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">S.N</th>
                        <th scope="col">Name</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Seat Number</th>
                        <th scope="col">Bus Number</th>
                        <th scope="col">Date</th>
                    </tr>
                </thead>
                <?php
                $sn = 1;
                $sql3 = "SELECT * FROM users AS U, book AS B, route AS R WHERE U.uid=B.uid AND B.rid=R.rid;";
                $result3 = mysqli_query($conn, $sql3);
                if (mysqli_num_rows($result3) > 0) {
                    while ($row = mysqli_fetch_assoc($result3)) {
                        echo '
                        <tr>
                            <td scope="col">' . $sn . '</td>
                            <td scope="col">' . $row['name'] . '</td>
                            <td scope="col">' . $row['phone'] . '</td>
                            <td scope="col">' . $row['seatNo'] . '</td>
                            <td scope="col">' . $row['busNo'] . '</td>
                            <td scope="col">' . $row['date'] . '</td>
                            <td scope="col">
                            ';
                        if ($row['status'] == 0) {
                            echo '<a href="../include/editStatus.inc.php?bid=' . $row['bid'] . '&s=0" class="btn btn-danger">Pending</a>';
                        } else {
                            echo '<a href="../include/editStatus.inc.php?bid=' . $row['bid'] . '&s=1" class="btn btn-success">Confirmed</a>';
                        }
                        echo '
                        <a href="../include/deleteBook.inc.php?bid=' . $row['bid'] . '" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        ';
                        $sn = $sn + 1;
                    }
                } else {
                ?>
                    <tr>
                        <td colspan="6" scope="col">
                            <span class="text-danger lead">No Bookings</span>
                        </td>
                    </tr>
                <?php
                }
                ?>

            </table><br>

        </div>
    </section>
</body>

</html>