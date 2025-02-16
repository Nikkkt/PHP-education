<?php
    session_start();
    $_SESSION['session_id'] = 0;
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Session check</title>
    </head>
    <body>
        <?php
            if ($_SESSION['session_id'] == 0) {
                echo "<h1>Please register</h1>";
                echo "<p>Session ID: {$_SESSION['session_id']}</p>";
                echo '<input type="text" name="login" placeholder="Login"><br>';
                echo '<input type="text" name="password" placeholder="Password">';
            }
            else {
                echo "<h1>You are already registered</h1>";
                echo "<p>Session ID: {$_SESSION['session_id']}</p>";
                echo '<br><a href="/main.php">Login</a>';
            }
        ?>
    </body>
</html>
