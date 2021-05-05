
<a href="../../index.php">НА ГОЛОВНУ</a> <br><br>
<?php
include('Models/Generate.php');
use task4\Models\Generate;

$x = 20;

$fibonacci = new Generate();
$fibonacci->WithoutRecursion($x);
echo '<br>';

$i = 1;
while($i <= $x) {
    echo $fibonacci->fib($i) . '<br>';
    $i++;
}
?>