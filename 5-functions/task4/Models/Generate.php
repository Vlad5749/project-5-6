<?php
namespace task4\Models;

class Generate
{
    public function WithoutRecursion($len) 
    {
        $n2 = 1;
        for ($i = 1; $i < $len; $i++) {
            if($i === 2) {
                echo $n2 . '<br>';
            }
            $next = $n1 + $n2;
            $n1 = $n2;
            $n2 = $next;
            
            echo $next . '<br>';
        }
    }
    
    public function fib($len) 
    {
        if($len === 1) {
            return($len);
        } elseif($len > 1) {
            return($this->fib($len-1) + $this->fib($len-2));
        }
    }
}

?>