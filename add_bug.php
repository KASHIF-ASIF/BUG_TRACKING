<?php
include 'header.php';

$project_query = "SELECT project_id, project_name FROM Project WHERE status != 'Completed'";
$project_result = mysqli_query($conn, $project_query);

$user_query = "SELECT user_id, username FROM User WHERE user_role = 'developer'";
$user_result = mysqli_query($conn, $user_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Bug</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
        crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">
<center><h1>Add New Bug</h1></center>

    <form action="insert_bug.php" method="POST">
        <div class="form-group">
            <label for="project_id">Project:</label>
            <select class="form-control" id="project_id" name="project_id" required>
                <?php
                while ($row = mysqli_fetch_assoc($project_result)) {
                    echo '<option value="' . $row['project_id'] . '">' . $row['project_name'] . '</option>';
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="user_id">Assign Developer:</label>
            <select class="form-control" id="user_id" name="user_id" required>
                <?php
                while ($row = mysqli_fetch_assoc($user_result)) {
                    echo '<option value="' . $row['user_id'] . '">' . $row['username'] . '</option>';
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" rows="4"></textarea>
        </div>

        <div class="form-group">
            <label for="status">Status:</label>
            <select class="form-control" id="status" name="status">
                <option value="Open">Open</option>
                <option value="In Progress">In Progress</option>
                <option value="Resolved">Resolved</option>
                <option value="Closed">Closed</option>
            </select>
        </div>

        <div class="form-group">
            <label for="priority">Priority:</label>
            <select class="form-control" id="priority" name="priority">
                <option value="Low">Low</option>
                <option value="Medium">Medium</option>
                <option value="High">High</option>
            </select>
        </div>

       <center> <button type="submit" class="btn btn-primary">Submit</button>
            </center></form>
</div>
<br><br><br>
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

<?php
include 'footer.php';
?>
