<?php
namespace task3\Models;

class Calculator 
{
    private $numArr = [];

    public function __construct($str) 
    {
        $num = $str;
        $num = trim($num);
        $this->numArr = explode(" ", $num);
    }
    
    public function sum() 
    {
        foreach ($this->numArr as $value) {
            $sum += $value;
        }
        return $sum;
    }
    
    public function avr() 
    {
        return $this->sum() / count($this->numArr);
    }
    
    public function countPaired() 
    {
        $countPaired = 0;
        foreach ($this->numArr as $value) {
            if ($value % 2 === 0) {
                $countPaired++;
            }
        }
        return $countPaired;
    }
    
    public function allUnpaired() 
    {
        $allUnpaired = "";
        foreach ($this->numArr as $value) {
            if ($value % 2 != 0) {
                $allUnpaired .=$value . ' ';
            }
        }
        return $allUnpaired;
    }
}


?>