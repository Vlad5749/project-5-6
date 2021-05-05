<?php
namespace task1\Models;

class Line
{
    private $string = "";
    private $arrWords = [];
    private $arrSortWords = [];
    
    public static $alphabet = 
       ['А', 'Б', 'В', 'Г', 'Ґ', 'Д', 'Е', 'Є', 'Ж', 'З', 
        'И', 'І', 'Ї', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 
        'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 
        'Ь', 'Ю', 'Я', 'а', 'б', 'в', 'г', 'ґ', 'д', 'е', 
        'є', 'ж', 'з', 'и', 'і', 'ї', 'й', 'к', 'л', 'м', 
        'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 
        'ч', 'ш', 'щ', 'ь', 'ю', 'я',];
    
    public function __construct($str) {
        $this->string = $str;
        $this->string = trim($this->string);
        $this->arrWords = explode(", ", $this->string);
        $this->sort();
        
    }

    public function sort() {
        for ($i = 0; $i < count($this->arrWords); $i++) {
        array_unshift($this->arrSortWords, $this->arrWords[$i]);
        if (count($this->arrSortWords) > 1) {
            for ($j = 0; $j < count($this->arrSortWords) - 1; $j++) {
                $isNextSmaller = false;
                if (mb_strlen($this->arrSortWords[$j]) < mb_strlen($this->arrSortWords[$j+1])) {
                    $wordLen = mb_strlen($this->arrSortWords[$j]);
                } elseif (mb_strlen($this->arrSortWords[$j+1]) < mb_strlen($this->arrSortWords[$j])){
                    $wordLen = mb_strlen($this->arrSortWords[$j+1]);
                    $isNextSmaller = true;
                } else {
                    $wordLen = mb_strlen($this->arrSortWords[$j]);
                }
                
                for ($k = 0; $k < $wordLen; $k++) {
                    $firstWordLetter = mb_substr($this->arrSortWords[$j], $k, 1);
                    $secondWordLetter = mb_substr($this->arrSortWords[$j+1], $k, 1);
                    
                    if (array_search($firstWordLetter, self::$alphabet) < 
                            array_search($secondWordLetter, self::$alphabet)) {
                        break;
                    }  elseif (array_search($secondWordLetter, self::$alphabet) <
                            array_search($firstWordLetter, self::$alphabet)) {
                            $temp = $this->arrSortWords[$j];
                            $this->arrSortWords[$j] = $this->arrSortWords[$j+1];
                            $this->arrSortWords[$j+1] = $temp;
                            break;
                    }
                    
                    if ($k == $wordLen - 1) {
                        if ($isNextSmaller) {
                            $temp = $this->arrSortWords[$j];
                            $this->arrSortWords[$j] = $this->arrSortWords[$j+1];
                            $this->arrSortWords[$j+1] = $temp;
                        }
                    }
                }
            }
        }
    }
    }
    
    public function getArrSort() {
        return $this->arrSortWords;
    }
}

?>