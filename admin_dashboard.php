<?php
include 'header.php';
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
  }
if ($_SESSION['user_role'] !== 'admin') {
    header("Location: index.php");
    exit(); 
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
        crossorigin="anonymous">

    <title>Admin</title>
    <style>
        .card {
            width: 100%;
            margin-bottom: 20px; 
        }
        .card-img-top {
            height: 200px; 
            object-fit: cover;
        }
    </style>
</head>
<body>
<br><br><br>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <img class="card-img-top"
                    src="https://static.vecteezy.com/system/resources/thumbnails/005/545/335/small/user-sign-icon-person-symbol-human-avatar-isolated-on-white-backogrund-vector.jpg"
                    alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">User's</h5>
                    <p class="card-text">Seamlessly handle user accounts and permissions.</p><center>
                    <a href="manageuser.php" class="btn btn-primary">Manage user</a>
    </center></div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <img class="card-img-top" src="https://images.unsplash.com/photo-1572177812156-58036aae439c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8cHJvamVjdHxlbnwwfHwwfHx8MA%3D%3D&w=1000&q=80" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Project's</h5>
                    <p class="card-text">Effectively organize project tasks and resources.</p><center>
                    <a href="allproject.php" class="btn btn-primary">Manage Project's</a></center>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <img class="card-img-top" src="https://wallpaperaccess.com/full/4631973.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Bug's</h5>
                    <p class="card-text">Efficiently track and resolve software issues.</p><center>
                    <a href="allbug.php" class="btn btn-primary">Manage Bug's</a>
    </center>   </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <img class="card-img-top" src="https://thumbs.dreamstime.com/b/feedback-concept-image-arrows-blue-chalkboard-background-40378284.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Feedback</h5>
                    <p class="card-text">User Detected Bugs: Bugs which is identified by users.</p><center>
                    <a href="response_contact_us.php" class="btn btn-primary">Review Them</a></center>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYyfoRSJoZ+n"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
</body>
</html>