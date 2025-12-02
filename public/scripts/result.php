<?php

use \App\Traits\Helper;
if ($_SERVER["REQUEST_METHOD"] == "POST"&& isset($_POST["btn_result"])) {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $operator = $_POST['operator'];
    switch ($operator) {
        case '+':
            $result = $num1 + $num2;
            break;
        case '-':
            $result = $num1 - $num2;
            break;
        case '*':
            $result = $num1 * $num2;
            break;
        case '^':
            $result = $num1 ** $num2;
            break;
        case '/':
            if ($num2 == 0) {
                $result = "Нельзя делить на ноль";
            } else {
                $result = $num1 / $num2;
            }
            break;
        case '√':
            $result = pow($num2, 1 / $num1);
            break;

        default:
            $result = "Неверный оператор!";
            break;
    }
    $historyFile = '../content/calculator_history.txt';
    $historyData = date('Y-m-d H:i:s') . " - $num1 $operator $num2 = $result\n";
    file_put_contents($historyFile, $historyData . file_get_contents($historyFile));
    header('Location: /calc/'.$result);
}

