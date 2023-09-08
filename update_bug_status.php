<?php
include 'header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $bug_id = $_POST['bug_id'];
    $new_status = $_POST['status'];

    $query = "UPDATE Bug SET status = '$new_status' WHERE bug_id = $bug_id";

    if (mysqli_query($conn, $query)) {
        mysqli_close($conn);
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
          }if (isset($_SESSION['user_role'])) {
            $userRole = $_SESSION['user_role'];
        
            if ($userRole === 'admin') {
                header("Location: allbug.php");
                exit();
            } elseif ($userRole === 'developer') {
                header("Location: developer_dashboard.php");
                exit();
            } else {
                echo "Invalid user role or access denied.";
            }
        } else {
            header("Location: login.php");
            exit();
        }
        exit;
    } else {
        echo "Error updating bug status: " . mysqli_error($connection);
    }

    mysqli_close($conn);
} else {
    echo "Invalid request.";
}
?>

