<?php

class Sort
{
    private $arr = [];
    
    public function __construct(&$arr)
    {
        $this->arr = &$arr;
    }
    
    public function sort($order) 
    {
        if ($order == 0) {
            function call($a, $b){
                if ($a['price'] - (int)($a['price'] * ($a['discount']/100)) == 
                    $b['price'] - (int)($b['price'] * ($b['discount']/100))) {
                    return 0;
                }
                return ($a['price'] - (int)($a['price'] * ($a['discount']/100)) < 
                        $b['price'] - (int)($b['price'] * ($b['discount']/100))) ? 
                        -1 : 1;
            }   
        } elseif ($order == 1) {
            function call($a, $b){
                if ($a['price'] - (int)($a['price'] * ($a['discount']/100)) == 
                    $b['price'] - (int)($b['price'] * ($b['discount']/100))) {
                    return 0;
                }
                return ($a['price'] - (int)($a['price'] * ($a['discount']/100)) > 
                        $b['price'] - (int)($b['price'] * ($b['discount']/100))) ? 
                        -1 : 1;
            }
        }
        usort($this->arr, "call");
    }
}

?>