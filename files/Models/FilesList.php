<?php

namespace files\Models;

class FilesList
{
    private $files = [];
    private $dir = "";
    
    public function __construct($dir) 
    {
        $this->files = scandir($dir);
        $this->dir = $dir;
    }
    
    function backupFiles($backupDir, $backupTime)
    {
        if (!file_exists("$this->dir/$backupDir")) {
            mkdir("$this->dir/$backupDir");
        }
        
        foreach ($this->files as $filename) {
        $createTimeInSeconds = 
                strtotime(date("r", filectime("$this->dir/$filename")));
        $timeDiff = time() - $createTimeInSeconds;

        if ($filename !== "." && $filename !== ".." 
                && $filename !== "backup" && $timeDiff >= $backupTime){
            rename("$this->dir/$filename", "$this->dir/$backupDir/$filename");
            }
        }
    }

    function printFiles() 
    {
        foreach ($this->files as $filename) {
            if($filename !== "." && $filename !== ".." && $filename !== "backup"
                    && !preg_match("/^.{0,}\.txt$/", $filename)) {
                echo '<img src="' . "$this->dir/$filename" . '"><br><br>';
            }
        }
    }
    
    function deleteTextFilesWith($str)
    {
        foreach ($this->files as $filename) {
            if(preg_match("/^.{0,}\.txt$/", $filename)){
                $content = file_get_contents("$this->dir/$filename");
                if (strpos($content, "тест") !== false) {
                    unlink("$this->dir/$filename");
                }
            }
        }
    }
    
    function reverseWords($file)
    {
        $x = array_search($file, $this->files);
        if ($x !== false) {
            $strArr = file("$this->dir/$file");
            foreach ($strArr as &$str) {
                $words = explode(" ", $str);
                foreach ($words as &$word) {
                    $wordLen = strlen($word);
                    $reverseWord = "";
                    $isWithNewLine = false;
                    if (strpos($word, "\n") !== false) {
                        $wordLen -= 2;
                        $isWithNewLine = true;
                    }
                    for ($j = $wordLen - 1; $j > -1; $j--) {
                        $reverseWord .= substr($word, $j, 1);
                    }
                    if ($isWithNewLine) {
                        $reverseWord .= substr($word, $wordLen, 2);
                    }
                    $word = $reverseWord;
                }
                unset($word);
                $str = implode(" ", $words);
            }
            unset($str);
            foreach ($strArr as $str) {
                file_put_contents("$this->dir/dest.txt", $str, FILE_APPEND);
            }
        }  
    }
}

?>