<!--5-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Test</title>
    </head>
    <body>

        <h2>Do the test</h2>

        <form action="" method="post">
            <!-- Q1: 1 answer -->
            <p>1. What is the year PHP was founded?</p>
            <label>
                <input type="radio" name="q1" value="1991">
            </label> 1991
            <br>
            <label>
                <input type="radio" name="q1" value="1994">
            </label> 1994
            <br>
            <label>
                <input type="radio" name="q1" value="1995">
            </label> 1995
            <br>
            <label>
                <input type="radio" name="q1" value="2000">
            </label> 2000
            <br>

            <!-- Q2: some answers -->
            <p>2. Which of the following languages are programming languages?</p>
            <label>
                <input type="checkbox" name="q2[]" value="Python">
            </label> Python
            <br>
            <label>
                <input type="checkbox" name="q2[]" value="HTML">
            </label> HTML
            <br>
            <label>
                <input type="checkbox" name="q2[]" value="JavaScript">
            </label> JavaScript
            <br>
            <label>
                <input type="checkbox" name="q2[]" value="CSS">
            </label> CSS
            <br>

            <!-- Q3: open answer -->
            <p>3. What is a variable in PHP?</p>
            <label>
                <textarea name="q3" rows="4" cols="50"></textarea>
            </label>
            <br>

            <input type="submit" name="submit" value="Send">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "<h2>Your answers:</h2>";

            if (isset($_POST['q1'])) echo "<p><strong>1:</strong> " . htmlspecialchars($_POST['q1']) . "</p>";
            else echo "<p><strong>1:</strong> Does not select</p>";

            if (isset($_POST['q2'])) echo "<p><strong>2:</strong> " . implode(", ", $_POST['q2']) . "</p>";
            else echo "<p><strong>2:</strong> Does not select</p>";

            if (!empty($_POST['q3'])) echo "<p><strong>3:</strong> " . nl2br(htmlspecialchars($_POST['q3'])) . "</p>";
            else echo "<p><strong>3:</strong> Does not select</p>";
        }
        ?>

    </body>
</html>