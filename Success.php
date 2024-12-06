<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success - User Auth</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="success-container">
        <?php
            if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
                echo "<h1>Welcome, " . htmlspecialchars($_SESSION["username"]) . "!</h1>";
                echo "<p>You have successfully logged in to our website. Enjoy your stay!</p>";
            } else {
                header("Location: index.php");
                exit;
            }
        ?>
        <p><a href="logout.php" class="btn">Logout</a></p>
    </div>
</body>
</html>
