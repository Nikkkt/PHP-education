<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['subscribe'])) $message = "Thank you for subscribing";
    else {
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="uk">
    <head>
        <meta charset="UTF-8">
        <title>Subscription Form</title>
    </head>
    <body>
        <?php if (!empty($message)) : ?>
            <p><?php echo $message; ?></p>
        <?php endif; ?>

        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>

            <input type="checkbox" id="subscribe" name="subscribe">
            <label for="subscribe">Subscribe</label><br><br>

            <button type="submit">Send</button>
        </form>
    </body>
</html>
