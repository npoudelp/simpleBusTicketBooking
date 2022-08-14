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
            <a class="navbar-brand" href="#">dTicket</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./login.php"><span class="btn btn-success">Login</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <section class="lead text-dark py-5">
        <div class="container">
            <form method="POST" action="../include/signup.inc.php">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Name</label>
                    <input required type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Full name">
                </div><br>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Phone</label>
                    <input required type="text" name="phone" class="form-control" id="exampleFormControlInput1" placeholder="Phone">
                </div><br>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Address</label>
                    <input required type="text" name="address" class="form-control" id="exampleFormControlInput1" placeholder="Address">
                </div><br>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Password</label>
                    <input required type="password" name="password" class="form-control" id="exampleFormControlInput1" placeholder="Password">
                </div><br>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Confirm Password</label>
                    <input required type="password" name="passwordR" class="form-control" id="exampleFormControlInput1" placeholder="Password">
                </div><br>
                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-success">
                </div>
            </form>


        </div>
    </section>

</body>

</html>