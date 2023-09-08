<?php
include 'header.php';

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if ($_SESSION['user_role'] !== 'admin') {
    header("Location: index.php");
    exit();
}

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$searchKeyword = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
    $searchKeyword = mysqli_real_escape_string($conn, $_POST["searchKeyword"]);
    $query = "SELECT Bug.*, Project.project_name, User.username 
              FROM Bug
              INNER JOIN Project ON Bug.project_id = Project.project_id
              INNER JOIN User ON Bug.user_id = User.user_id
              WHERE Bug.title LIKE '%$searchKeyword%' OR Bug.description LIKE '%$searchKeyword%'";
} else {
    $query = "SELECT Bug.*, Project.project_name, User.username 
              FROM Bug
              INNER JOIN Project ON Bug.project_id = Project.project_id
              INNER JOIN User ON Bug.user_id = User.user_id";
}

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Bugs</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
        crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">
    <h1 class="float-left">All Bugs</h1>

    <a href="add_bug.php" class="btn btn-primary float-right mb-3">Add New Bug</a>

    <form class="float-right mr-3" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-group">
            <input type="text" class="form-control" name="searchKeyword" placeholder="Search by Title or Description"
                   value="<?php echo $searchKeyword; ?>">
        </div>
        <button type="submit" name="search" class="btn btn-primary">Search</button>
    </form>

    <div class="clearfix"></div>
    <br><br>

    <?php
    if (mysqli_num_rows($result) > 0) {
        echo '<table class="table table-bordered table-striped">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Bug ID</th>';
        echo '<th>Project Name</th>';
        echo '<th>User Name</th>';
        echo '<th>Title</th>';
        echo '<th>Description</th>';
        echo '<th>Status</th>';
        echo '<th>Priority</th>';
        echo '<th>Created At</th>';
        echo '<th>Updated At</th>';
        echo '<th>Action</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['bug_id'] . '</td>';
            echo '<td>' . $row['project_name'] . '</td>';
            echo '<td>' . $row['username'] . '</td>';
            echo '<td>' . $row['title'] . '</td>';
            echo '<td>' . $row['description'] . '</td>';
            echo '<td>' . $row['status'] . '</td>';
            echo '<td>' . $row['priority'] . '</td>';
            echo '<td>' . $row['created_at'] . '</td>';
            echo '<td>' . $row['updated_at'] . '</td>';
            echo '<td>';
            echo '<form action="update_bug_status.php" method="post">';
            echo '<input type="hidden" name="bug_id" value="' . $row['bug_id'] . '">';
            echo '<select name="status" class="form-control">';
            echo '<option value="Open" ' . ($row['status'] === 'Open' ? 'selected' : '') . '>Open</option>';
            echo '<option value="In Progress" ' . ($row['status'] === 'In Progress' ? 'selected' : '') . '>In Progress</option>';
            echo '<option value="Resolved" ' . ($row['status'] === 'Resolved' ? 'selected' : '') . '>Resolved</option>';
            echo '<option value="Closed" ' . ($row['status'] === 'Closed' ? 'selected' : '') . '>Closed</option>';
            echo '</select>';
            echo '<button type="submit" class="btn btn-primary mt-2">Update</button>';
            echo '</form>';
            echo '</td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
    } else {
        echo 'No bugs found.';
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
