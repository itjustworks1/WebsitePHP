<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["btn_clear"])) {
    $historyFile = '../content/calculator_history.txt';
    file_put_contents($historyFile, '');
    header('Location: /calc/-');
}
