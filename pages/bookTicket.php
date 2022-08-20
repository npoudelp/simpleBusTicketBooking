<?php
$msg = "";
if (isset($_REQUEST['msg'])) {
    $msg = $_REQUEST['msg'];
}

session_start();
if ($_SESSION['logged'] != 'true') {
    header("location: ./login.php");
}

$uid = $_SESSION['uid'];
include_once('../include/dbConn.inc.php');
$sql = "SELECT * FROM route;";
$res = mysqli_query($conn, $sql);

$seatNo = array();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.min.js"></script>

    <title>dTicket</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="./profile.php">dTicket</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="./profile.php">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="./bookTicket.php">Book Ticket</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../include/logout.inc.php"><span class="btn btn-success">Log Out</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="lead text-dark">
        <div class="container">
            <p class="text-center text-warning"><?php
                                                echo $msg;
                                                ?></p>
            <div class="container">
                <form method="POST" action="#">
                    <div class="form-group">
                        <select name="rid" class="form-control" id="rid">
                            <?php
                            while ($row = mysqli_fetch_assoc($res)) {
                                echo "<option value='" . $row['rid'] . "'>" . $row['initial'] . " to " . $row['final'] . " For Rs: " . $row['rate'] . "</option>";
                            }
                            ?>
                        </select>

                    </div><br>


                    <div class="form-group">
                        <label for="exampleFormControlInput1">Date</label>
                        <input type="date" name="date" class="form-control" id="exampleFormControlInput1" placeholder="date">
                    </div><br>
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-success">
                    </div>

                    <?php

                    if (isset($_POST['submit'])) {
                        $rid = $_POST['rid'];
                        $date = $_POST['date'];
                    ?>

                        <div class="container">
                            <div class="row">
                                <div class="col-6">
                                    <div class="row">
                                        <?php
                                        $sql1 = "SELECT * FROM book WHERE rid=$rid AND date='$date';";
                                        $res1 = mysqli_query($conn, $sql1);

                                        if (mysqli_num_rows($res1) > 0) {
                                            while ($row1 = mysqli_fetch_assoc($res1)) {
                                                array_push($seatNo, $row1['seatNo']);
                                            }
                                            for ($i = 1; $i < 33; $i++) {
                                                for ($j = 0; $j < sizeof($seatNo); $j++) {
                                                    if ($i == $seatNo[$j]) {
                                                        echo '
                                                             <div class="col-3 p-2">
                                                             <button class="btn btn-danger disabled">
                                                             <i class=" display-3 bi bi-tv-fill"></i></button>
                                                             </div>';
                                                             break;
                                                    }
                                                    $arrayEnd = sizeof($seatNo)-1;
                                                    if ($j == $arrayEnd && $i != $seatNo[$j]) {
                                                        echo '
                                                          <div class="col-3 p-2">
                                                            <a href="../include/book.inc.php?rid=' . $rid . '&date=' . $date . '&seat=' . $i . '" class="btn btn-success">
                                                         <i class=" display-3 bi bi-tv-fill"></i></a>
                                                            </div>';
                                                    }
                                                }
                                            }
                                        } else {
                                            for ($i = 1; $i < 33; $i++) {
                                                echo '
                                                       <div class="col-3 p-2">
                                                         <a href="../include/book.inc.php?rid=' . $rid . '&date=' . $date . '&seat=' . $i . '" class="btn btn-success">
                                                      <i class=" display-3 bi bi-tv-fill"></i></a>
                                                        </div>';
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>


                    <?php

                    }

                    ?>





                </form>



            </div>
        </div>
    </section>

</body>

<!-- 

                    <div class="container">
                        <div class="row">
                            <div class="col-6">
                                <div class="row">
                                <?php
                                // for ($i = 1; $i < 32; $i++) {
                                //     echo '
                                //     <div class="col-3 p-3" onclick="seat('.$i.')">
                                //     <button class="btn btn-success">
                                //     <i class=" display-3 bi bi-tv-fill"></i>
                                //     </div>';
                                // }
                                // 
                                ?>
                                </div>
                            </div>
                        </div>
                    </div>
 -->

</html>