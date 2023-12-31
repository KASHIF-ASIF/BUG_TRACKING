<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}
include 'connection.php';
?>
<?php
function determineHomeURL() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (isset($_SESSION['user_role'])) {
        if ($_SESSION['user_role'] === 'admin') {
            return 'admin_dashboard.php';
        } elseif ($_SESSION['user_role'] === 'developer') {
            return 'developer_dashboard.php';
        } else {
            return 'index.php';
        }
    } else {
        return 'index.php';
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php" style="color: black;font-weight: bold;">BUG TRACKER</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
          <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="<?php echo determineHomeURL(); ?>">Home</a>
</li>

            <li class="nav-item">
              <a class="nav-link" href="about.php">About Us</a>
            </li>
            <?php
            if (!isset($_SESSION['username']))  {
              echo '<li class="nav-item">';
              echo '<a class="nav-link" href="login.php">Login</a>';
              echo '</li>';
            }
            ?>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact Us</a>
            </li>
            <?php
            if (isset($_SESSION['username'])) {
              echo '<li class="nav-item">';
              echo '<a class="nav-link">Welcome, ' . $_SESSION['username'] . '</a>';
              echo '</li>';
              echo '<li class="nav-item">';
              echo '<a class="nav-link" href="logout.php">Logout</a>';
              echo '</li>';
            }
            ?>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYyfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
<?php
include 'footer.php';
?>