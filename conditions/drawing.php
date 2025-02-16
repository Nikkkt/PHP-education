<?php
    $x = 100;
    $y = 200;
    $color = "#4c4c4c";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Div drawing</title>
        <script>
            const blockData = {
                x: <?php echo $x; ?>,
                y: <?php echo $y; ?>,
                color: "<?php echo $color; ?>"
            };
        </script>
        <script defer src="drawing.js"></script>
        <style>
            body {
                position: relative;
                height: 100vh;
            }
        </style>
    </head>

    <body>
    </body>
</html>
