<?php
include('Models\Calculator.php');
use task3\Models\Calculator;
?>

<a href="../../index.php">НА ГОЛОВНУ</a> <br><br>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    Cписок цілих чисел: <br>
    <textarea rows="10" cols="45" name="numbers"></textarea> <br>
    <input type="submit" value="Обробити">
</form>

<?php

if (!empty($_POST['numbers'])) {
    
    $calculator = new Calculator($_POST['numbers']);
    
    echo 'Введені числа: ' . $_POST['numbers'] . '<br><br>';
    echo 'Сума: ' . $calculator->sum() . '<br>';
    echo 'Середнє значення: ' . $calculator->avr() . '<br>';
    echo 'Кількість парних чисел: ' . $calculator->countPaired() . '<br>';
    echo 'Всі непарні числа: ' . $calculator->allUnpaired();
}


?>