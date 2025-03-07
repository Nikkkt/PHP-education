<?php

    session_start();

    if (isset($_GET['action']) && $_GET['action'] === 'restart') {
        session_destroy();
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }

    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

    $questions1 = [
        1 => [
            'question' => 'Яка столиця Франції?',
            'options'  => ['Berlin', 'Madrid', 'Paris', 'Rome'],
            'answer'   => 2
        ],
        2 => [
            'question' => 'Скільки планет у Сонячній системі?',
            'options'  => ['7', '8', '9', '10'],
            'answer'   => 1
        ],
        3 => [
            'question' => 'Який океан найбільший?',
            'options'  => ['Атлантичний', 'Індійський', 'Тихий', 'Північний Льодовитий'],
            'answer'   => 2
        ],
        4 => [
            'question' => 'Хто написав "Гамлета"?',
            'options'  => ['Чехов', 'Шекспір', 'Достоєвський', 'Толстой'],
            'answer'   => 1
        ],
        5 => [
            'question' => 'Яка мова програмування використовується для розробки web-додатків?',
            'options'  => ['Python', 'PHP', 'Java', 'C++'],
            'answer'   => 1
        ],
        6 => [
            'question' => 'Яка валюта використовується в Японії?',
            'options'  => ['Євро', 'Долар', 'Йєна', 'Фунт'],
            'answer'   => 2
        ],
        7 => [
            'question' => 'Який континент найбільший за площею?',
            'options'  => ['Азія', 'Африка', 'Європа', 'Північна Америка'],
            'answer'   => 0
        ],
        8 => [
            'question' => 'Скільки кольорів у веселки?',
            'options'  => ['5', '6', '7', '8'],
            'answer'   => 2
        ],
        9 => [
            'question' => 'Який газ складає більшу частину атмосфери Землі?',
            'options'  => ['Кисень', 'Азот', 'Вуглекислий газ', 'Аргон'],
            'answer'   => 1
        ],
        10 => [
            'question' => 'Який рік вважається початком Нового тисячоліття?',
            'options'  => ['1999', '2000', '2001', '2010'],
            'answer'   => 1
        ],
    ];

    $questions2 = [
        1 => [
            'question' => 'Виберіть кольори національного прапора України:',
            'options'  => ['Червоний', 'Синій', 'Жовтий', 'Блакитний'],
            'answer'   => [2, 3]
        ],
        2 => [
            'question' => 'Які з наступних мов є мовами програмування?',
            'options'  => ['HTML', 'JavaScript', 'CSS', 'PHP'],
            'answer'   => [1, 3]
        ],
        3 => [
            'question' => 'Виберіть планети, які мають кільця:',
            'options'  => ['Сатурн', 'Юпітер', 'Уран', 'Меркурій'],
            'answer'   => [0, 2]
        ],
        4 => [
            'question' => 'Які континенти знаходяться повністю в південній півкулі?',
            'options'  => ['Африка', 'Південна Америка', 'Австралія', 'Антарктида'],
            'answer'   => [1, 3]
        ],
        5 => [
            'question' => 'Виберіть мови, які використовуються для web-розробки:',
            'options'  => ['PHP', 'HTML', 'C#', 'CSS'],
            'answer'   => [0, 1, 3]
        ],
        6 => [
            'question' => 'Які з наступних країн входять до Європейського Союзу?',
            'options'  => ['Норвегія', 'Польща', 'Швейцарія', 'Італія'],
            'answer'   => [1, 3]
        ],
        7 => [
            'question' => 'Виберіть правильні твердження про HTTP протокол:',
            'options'  => ['Безпечний за замовчуванням', 'Статeless', 'Використовує TCP', 'Працює через UDP'],
            'answer'   => [1, 2]
        ],
        8 => [
            'question' => 'Які з цих чисел є простими?',
            'options'  => ['2', '4', '7', '9'],
            'answer'   => [0, 2]
        ],
        9 => [
            'question' => 'Виберіть елементи HTML-форм:',
            'options'  => ['input', 'table', 'form', 'div'],
            'answer'   => [0, 2]
        ],
        10 => [
            'question' => 'Які з наступних є операційними системами?',
            'options'  => ['Linux', 'Oracle', 'Windows', 'MySQL'],
            'answer'   => [0, 2]
        ],
    ];

    $questions3 = [
        1 => [
            'question' => 'Назвіть столицю Італії:',
            'answer'   => 'Rome'
        ],
        2 => [
            'question' => 'Як називається найбільший океан Землі?',
            'answer'   => 'Pacific'
        ],
        3 => [
            'question' => 'Хто є автором "Війни і миру"?',
            'answer'   => 'Tolstoy'
        ],
        4 => [
            'question' => 'Назвіть мову, якою пишуться PHP-скрипти:',
            'answer'   => 'PHP'
        ],
        5 => [
            'question' => 'Який континент має найбільшу площу?',
            'answer'   => 'Asia'
        ],
        6 => [
            'question' => 'Назвіть найбільшу планету Сонячної системи:',
            'answer'   => 'Jupiter'
        ],
        7 => [
            'question' => 'Як називається процес перетворення даних у форму, що підходить для збереження або передачі?',
            'answer'   => 'encoding'
        ],
        8 => [
            'question' => 'Який рік вважається початком нового тисячоліття?',
            'answer'   => '2000'
        ],
        9 => [
            'question' => 'Назвіть мову розмітки для створення web-сторінок:',
            'answer'   => 'HTML'
        ],
        10 => [
            'question' => 'Яка планета є найближчою до Сонця?',
            'answer'   => 'Mercury'
        ],
    ];

    function checkAnswers1($userAnswers, $questions) {
        $score = 0;
        foreach ($questions as $id => $q) if (isset($userAnswers[$id]) && (int)$userAnswers[$id] === $q['answer']) $score++;
        return $score;
    }

    function checkAnswers2($userAnswers, $questions) {
        $score = 0;
        foreach ($questions as $id => $q) {
            if (isset($userAnswers[$id]) && is_array($userAnswers[$id])) {
                $userAns = $userAnswers[$id];
                sort($userAns);

                $correct = $q['answer'];
                sort($correct);

                if ($userAns === $correct) $score++;
            }
        }
        return $score;
    }

    function checkAnswers3($userAnswers, $questions) {
        $score = 0;
        foreach ($questions as $id => $q) {
            if (isset($userAnswers[$id]) &&
                strtolower(trim($userAnswers[$id])) === strtolower(trim($q['answer']))) {
                $score++;
            }
        }
        return $score;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if ($page === 1) {
            if (count($_POST['q']) < count($questions1)) echo "<script>alert('Будь ласка, дайте відповідь на всі питання.');</script>";
            else {
                $score1 = checkAnswers1($_POST['q'], $questions1);
                $_SESSION['score1'] = $score1;
                header("Location: " . $_SERVER['PHP_SELF'] . "?page=2");
                exit;
            }
        }
        elseif ($page === 2) {
            if (!isset($_POST['q']) || count($_POST['q']) < count($questions2)) echo "<script>alert('Будь ласка, дайте відповідь на всі питання.');</script>";
            else {
                $score2 = checkAnswers2($_POST['q'], $questions2);
                $_SESSION['score2'] = $score2;
                header("Location: " . $_SERVER['PHP_SELF'] . "?page=3");
                exit;
            }
        } elseif ($page === 3) {
            if (!isset($_POST['q']) || count($_POST['q']) < count($questions3)) echo "<script>alert('Будь ласка, дайте відповідь на всі питання.');</script>";
            else {
                $score3 = checkAnswers3($_POST['q'], $questions3);
                $_SESSION['score3'] = $score3;
                header("Location: " . $_SERVER['PHP_SELF'] . "?page=results");
                exit;
            }
        }
    }

    function getRandomQuestions($questions, $sessionKey) {
        if (!isset($_SESSION[$sessionKey])) {
            $qids = array_keys($questions);
            shuffle($qids);
            $_SESSION[$sessionKey] = $qids;
        }
        $ordered = [];
        foreach ($_SESSION[$sessionKey] as $qid) $ordered[$qid] = $questions[$qid];
        return $ordered;
    }

?>

<!DOCTYPE html>
<html lang="uk">
    <head>
        <meta charset="UTF-8">
        <title>Тестування</title>
        <script src="main.js"></script>
    </head>
    <body>
        <h1>Тестування</h1>
        <?php if ($page === 1):
            $orderedQuestions = getRandomQuestions($questions1, 'order1');
            ?>
            <h2>Сторінка 1 (1 бал за питання)</h2>
            <form method="post" onsubmit="return validateForm(this, <?php echo count($questions1); ?>);">
                <?php foreach ($orderedQuestions as $id => $q): ?>
                    <p>
                        <?php echo $q['question']; ?><br>
                        <?php foreach ($q['options'] as $idx => $option): ?>
                            <input type="radio" name="q[<?php echo $id; ?>]" value="<?php echo $idx; ?>"> <?php echo $option; ?><br>
                        <?php endforeach; ?>
                    </p>
                <?php endforeach; ?>
                <button type="submit">Next</button>
            </form>
        <?php elseif ($page === 2):
            $orderedQuestions = getRandomQuestions($questions2, 'order2');
            ?>
            <h2>Сторінка 2 (3 бали за питання)</h2>
            <form method="post" onsubmit="return validateForm(this, <?php echo count($questions2); ?>);">
                <?php foreach ($orderedQuestions as $id => $q): ?>
                    <p>
                        <?php echo $q['question']; ?><br>
                        <?php foreach ($q['options'] as $idx => $option): ?>
                            <input type="checkbox" name="q[<?php echo $id; ?>][]" value="<?php echo $idx; ?>"> <?php echo $option; ?><br>
                        <?php endforeach; ?>
                    </p>
                <?php endforeach; ?>
                <button type="submit">Next</button>
            </form>
        <?php elseif ($page === 3):
            $orderedQuestions = getRandomQuestions($questions3, 'order3');
            ?>
            <h2>Сторінка 3 (5 балів за питання)</h2>
            <form method="post" onsubmit="return validateForm(this, <?php echo count($questions3); ?>);">
                <?php foreach ($orderedQuestions as $id => $q): ?>
                    <p>
                        <?php echo $q['question']; ?><br>
                        <input type="text" name="q[<?php echo $id; ?>]">
                    </p>
                <?php endforeach; ?>
                <button type="submit">Finish</button>
            </form>
        <?php elseif ($page === 'results'):
            $score1 = $_SESSION['score1'] ?? 0;
            $score2 = $_SESSION['score2'] ?? 0;
            $score3 = $_SESSION['score3'] ?? 0;
            $total = $score1 * 1 + $score2 * 3 + $score3 * 5;

            $resultData = [
                'score_page1' => $score1,
                'score_page2' => $score2,
                'score_page3' => $score3,
                'total'       => $total,
                'date'        => date('Y-m-d H:i:s')
            ];

            $resultsFile = 'results.json';
            if (file_exists($resultsFile)) {
                $jsonData = file_get_contents($resultsFile);
                $resultsArray = json_decode($jsonData, true);
                if (!is_array($resultsArray)) $resultsArray = [];
            }
            else $resultsArray = [];

            $resultsArray[] = $resultData;
            file_put_contents($resultsFile, json_encode($resultsArray, JSON_PRETTY_PRINT));
            ?>
            <h2>Результати тесту</h2>
            <p>Сторінка 1: <?php echo $score1; ?> правильних відповідей (<?php echo $score1 * 1; ?> балів)</p>
            <p>Сторінка 2: <?php echo $score2; ?> правильних відповідей (<?php echo $score2 * 3; ?> балів)</p>
            <p>Сторінка 3: <?php echo $score3; ?> правильних відповідей (<?php echo $score3 * 5; ?> балів)</p>
            <hr>
            <p><strong>Загальний результат: <?php echo $total; ?> балів</strong></p>
            <p><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=restart">Пройти тест заново</a></p>
        <?php endif; ?>
    </body>
</html>
