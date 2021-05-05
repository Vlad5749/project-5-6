<?php
include ('Models\Line.php');
use task1\Models\Line;
?>
<a href="../../index.php">НА ГОЛОВНУ</a> <br><br> 
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    Список імен: <br>
    <textarea rows="10" cols="45" name="names"></textarea> <br>
    <input type="submit" value="Відсортувати">
</form>

<?php
if (!empty($_POST['names'])) {
    $names = $_POST['names'];
    $line = new Line($names);
    $arr = $line->getArrSort();
    foreach ($arr as $value) {
        $str .= $value . ', ';
    }
    $str = mb_substr($str, 0, -2);
    echo $str;
}
?>
