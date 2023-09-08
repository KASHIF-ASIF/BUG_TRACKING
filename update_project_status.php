<?php
include 'header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["project_id"]) && isset($_POST["status"])) {
        $project_id = mysqli_real_escape_string($conn, $_POST["project_id"]);
        $status = mysqli_real_escape_string($conn, $_POST["status"]);

        $update_query = "UPDATE Project SET status = '$status' WHERE project_id = $project_id";

        if (mysqli_query($conn, $update_query)) {
            header("Location: allproject.php");
            exit();
        } else {
            echo '<div class="container mt-5">';
            echo '<div class="alert alert-danger" role="alert">';
            echo 'Error updating project status: ' . mysqli_error($conn);
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo '<div class="container mt-5">';
        echo '<div class="alert alert-danger" role="alert">';
        echo 'Invalid input data.';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo '<div class="container mt-5">';
    echo '<div class="alert alert-danger" role="alert">';
    echo 'Invalid request method.';
    echo '</div>';
    echo '</div>';
}

mysqli_close($conn);

include 'footer.php';
?>
