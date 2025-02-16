<!--6-->
<?php
    $tag = "div";
    $backgroundColor = "#555555";
    $color = "#eeeeee";
    $width = "200px";
    $height = "100px";

    $style = "background-color: $backgroundColor; 
                color: $color; 
                width: $width; 
                height: $height; 
                display: flex; 
                align-items: center; 
                justify-content: center; 
                border: 1px solid #000;
                border-radius: 10px;";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dynamic tag</title>
    </head>
    <body>
        <?php
            echo "<h4>background-color: $backgroundColor</h4>";
            echo "<h4>color: $color</h4>";
            echo "<h4>width: $width</h4>";
            echo "<h4>height: $height</h4>";
            echo "<$tag style='$style'>Dynamic tag</$tag>";
        ?>
    </body>
</html>
