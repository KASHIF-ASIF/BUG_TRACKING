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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Projects</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
        crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">
    <h1 class="float-left">All Projects</h1>

    <a href="add_project.php" class="btn btn-primary float-right mb-3">Add New Project</a>

    <div class="clearfix"></div>
    <br><br>

    <?php
    $query = "SELECT * FROM Project WHERE status <> 'Completed'";

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        echo '<table class="table table-bordered table-striped">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Project ID</th>';
        echo '<th>Project Name</th>';
        echo '<th>Project Description</th>';
        echo '<th>Start Date</th>';
        echo '<th>End Date</th>';
        echo '<th>Status</th>';
        echo '<th>Action</th>'; 
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['project_id'] . '</td>';
            echo '<td>' . $row['project_name'] . '</td>';
            echo '<td>' . $row['project_description'] . '</td>';
            echo '<td>' . $row['start_date'] . '</td>';
            echo '<td>' . $row['end_date'] . '</td>';
            echo '<td>' . $row['status'] . '</td>';
            echo '<td>';
            echo '<form action="update_project_status.php" method="post">';
            echo '<input type="hidden" name="project_id" value="' . $row['project_id'] . '">';
            echo '<select name="status" class="form-control">';
            echo '<option value="Not Started" ' . ($row['status'] === 'Not Started' ? 'selected' : '') . '>Not Started</option>';
            echo '<option value="In Progress" ' . ($row['status'] === 'In Progress' ? 'selected' : '') . '>In Progress</option>';
            echo '<option value="Completed" ' . ($row['status'] === 'Completed' ? 'selected' : '') . '>Completed</option>';
            echo '<option value="On Hold" ' . ($row['status'] === 'On Hold' ? 'selected' : '') . '>On Hold</option>';
            echo '</select>';
            echo '<button type="submit" class="btn btn-primary mt-2">Update</button>';
            echo '</form>';
            echo '</td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
    } else {
        echo 'No projects found.';
    }

    mysqli_close($conn);
    ?>
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
<?php
include 'footer.php';
?>
