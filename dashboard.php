<?php
session_start();
if(!$_SESSION['idUser']){
    header ("location:login.php");
}
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <title>Dashboard</title>
    </head>
    <body>
        <div class="container" style="margin-top:50px;">
            <div class="row">
                <div class="col-md-3">
                    <ul class="list-group">
                        <li class="list-group-item active">Main Menu</li>
                        <a href="dashboard.php" class="list-group-item" style="color:#212529;">Dashboard</a>
                        <li class="list-group-item">Profile</li>
                        <a href="logout.php" class="list-group-item" style="color:#212529;">Logout</a>
                    </ul>
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <label for="">Dashboard</label>
                            <hr>
                            Selamat Datang <?= $_SESSION['namaLengkap'] ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/sweetalert2.all.min.js"></script>
    </body>
    </html>   
