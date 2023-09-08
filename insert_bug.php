<?php
include'connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $project_id = $_POST['project_id'];
    $user_id = $_POST['user_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $status = $_POST['status'];
    $priority = $_POST['priority'];

    $insert_query = "INSERT INTO Bug (project_id, user_id, title, description, status, priority)
                     VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($insert_query);

    if (!$stmt) {
        die("Error: " . $conn->error);
    }

    $stmt->bind_param("iissss", $project_id, $user_id, $title, $description, $status, $priority);

    if ($stmt->execute()) {
        header("Location: allbug.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
