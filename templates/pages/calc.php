<?php include_once TEMPLATES_PATH . '/header.php'; ?>
<?php //include_once 'templates/sidebar.php'; ?>
<!--git madhowl-->
    <main>
        <div class="calculate">
            <form method="post" action="">
                <input type="number" name="num1" placeholder="Число 1" required>
                <select name="operator" required>
                    <option value="+">+</option>
                    <option value="-">-</option>
                    <option value="*">*</option>
                    <option value="/">/</option>
                    <option value="^">^</option>
                    <option value="√">√</option>
                </select>
                <input type="number" name="num2" placeholder="Число 2" required>

                <button  type="submit">=</button>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST"){
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
                            if($num2 == 0){
                                $result = "Нельзя делить на ноль";
                            }
                            else{
                                $result = $num1 / $num2;
                            }
                            break;
                        case '√':
                            $result = pow($num2, 1/$num1);
                            break;

                        default:
                            $result = "Неверный оператор!";
                            break;
                    }
                    echo $result;
                    $historyFile = 'content/calculator_history.txt';
                    $historyData = date('Y-m-d H:i:s') . " - $num1 $operator $num2 = $result\n";
                    file_put_contents($historyFile, $historyData . file_get_contents($historyFile));
                }
                ?>
            </form>
        </div>
        <div class="calculate">
            <h3>История</h3>
            <form method="post" action="scripts/clear_history.php">
                <button type="submit" name="btn_clear">Очистить историю</button>
            </form>
            <?php
            if (file_exists('content/calculator_history.txt')) {
                $history = file_get_contents('content/calculator_history.txt');
                echo "<pre>$history</pre>";
            } else {
                echo "История операций пуста.";
            }
            ?>
        </div>
    </main>
<?php include_once TEMPLATES_PATH . '/footer.php'; ?>
