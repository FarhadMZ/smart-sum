<?php
function findCombinations($numbers, $target) {
    $result = [];
    $combination = [];
    combinationSum($numbers, $target, 0, $combination, $result);
    return $result;
}

function combinationSum($numbers, $target, $start, &$combination, &$result) {
    $epsilon = 1e-9; 
    
    if (abs($target) < $epsilon) { 
        $result[] = $combination;
        return;
    }

    if ($target < 0) {
        return;
    }

    for ($i = $start; $i < count($numbers); $i++) {
        $combination[] = $numbers[$i];

        $newTarget = (float) bcsub((string) $target, (string) $numbers[$i], 10);

        combinationSum($numbers, $newTarget, $i + 1, $combination, $result);
        array_pop($combination);
    }
}

$numbers = [3, 0.1, 5, 2.4, 1.4, 1.6, 0.05, 1.1, 1, 2, 0.5, 2.5];
$target = 3;

$combinations = findCombinations($numbers, $target);

?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ترکیب‌های عددی</title>
    <style>
        body {
            font-family: Tahoma, sans-serif;
            background-color: #222;
            color: #fff;
            text-align: center;
            margin: 20px;
            direction: rtl;
        }
        h2 {
            color: #ff9900;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            background: #333;
            border: 1px solid #ff9900;
            border-radius: 8px;
            display: inline-block;
            padding: 10px 15px;
            margin: 5px;
            font-size: 18px;
        }
    </style>
</head>
<body>

    <h2>لیست ترکیب‌های عددی که مجموعشان <?= $target ?> است:</h2>
    
    <ul>
        <?php foreach ($combinations as $combination): ?>
            <li><?= implode(" + ", $combination) ?></li>
        <?php endforeach; ?>
    </ul>

</body>
</html>
