<?php
include'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $projectName = $_POST["project_name"];
    $projectDescription = $_POST["project_description"];
    $startDate = $_POST["start_date"];
    $endDate = $_POST["end_date"];
    $status = $_POST["status"];

    $query = "INSERT INTO Project (project_name, project_description, start_date, end_date, status)
              VALUES ('$projectName', '$projectDescription', '$startDate', '$endDate', '$status')";

   


    if (mysqli_query($conn, $query)) {
        header("Location: allproject.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
