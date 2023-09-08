<?php
include 'header.php';

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
  }
if ($_SESSION['user_role'] !== 'admin') {
    header("Location: index.php");
    exit(); 
}
$sql = "SELECT * FROM Contact ORDER BY contact_id DESC";
$result = $conn->query($sql);

$responses = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $responses[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form Responses</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Contact Form Responses</h2>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Message</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($responses as $response) {
            echo '<tr>';
            echo '<th scope="row">' . htmlspecialchars($response['contact_id']) . '</th>';
            echo '<td>' . htmlspecialchars($response['name']) . '</td>';
            echo '<td>' . htmlspecialchars($response['email']) . '</td>';
            echo '<td>' . htmlspecialchars($response['message']) . '</td>';
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
