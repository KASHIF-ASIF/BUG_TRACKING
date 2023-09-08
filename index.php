<?php
include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bug Tracking System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
        crossorigin="anonymous">
    <style>
        /* Custom styles go here */
        body {
            background-color: #f8f9fa;
        }
        .header {
            background-color: #007bff;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }
        .container {
            margin-top: 30px;
        }
        .hero-image {
            width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Welcome to Bug Tracking System</h1>
        <p>Your solution for tracking and managing software bugs</p>
    </div>
    
    <br><center>
    <img src="https://media.istockphoto.com/id/478528437/photo/computer-bug.jpg?s=612x612&w=0&k=20&c=osLd_rtUE5Ffvz7w-1FVLOyNMRxE8RRw5vMhzf_taJY=" alt="Bug Tracking System" style="max-height:40vh;max-width:70vw;" class="hero-image">
      </center>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="card-title">Report Bugs</h2>
                        <p class="card-text">Report bugs and issues you encounter during software testing.</p>
                        <a href="contact.php" class="btn btn-primary btn-block">Report a Bug</a>
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
