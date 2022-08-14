<?php
session_start();
if ($_SESSION['logged'] != 'true') {
    header("location: ./login.php");
}

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
                        <a class="nav-link" href="./admin.php">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link active" href="./addRoute.php">Add Route</a>
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
            <form method="POST" action="../include/addRoute.inc.php">
                <div class="form-group">
                    <label for="exampleFormControlInput1">From</label>
                    <input type="text" name="initial" class="form-control" id="exampleFormControlInput1" placeholder="Starting point">
                </div><br>
                <div class="form-group">
                    <label for="exampleFormControlInput1">To</label>
                    <input type="text" name="final" class="form-control" id="exampleFormControlInput1" placeholder="Destination">
                </div><br>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Bus Number</label>
                    <input type="text" name="busNo" class="form-control" id="exampleFormControlInput1" placeholder="Bus Number">
                </div><br>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Rate</label>
                    <input type="text" name="rate" class="form-control" id="exampleFormControlInput1" placeholder="Rate">
                </div><br>
                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-success">
                </div>
            </form>
        </div>
    </section>


</body>

</html>