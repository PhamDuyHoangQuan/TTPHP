<?php
    class HandleString {
        private $check1;
        private $check2;
        function readFile($a) {
            $readFile = file_get_contents($a);
            $check = checkvalidString($readFile);
            if($check == true){
                if($a == 'file1.txt'){
                    $check1 = true;
                }if ($a == 'file2.txt'){
                    $check2 = true;
                }
                echo '<br/>Hợp lệ';
            }else {
                if ($a == 'file1.txt'){
                    $check1 = false;
                }if ($a == 'file2.txt'){
                    $check2 = false;
                }
                echo '<br/>Không hợp lệ';
            }
        }
}
    $object1 = new HandleString;
    $object1 -> readFile('file1.txt');
    $object2 = new HandleString;
    $object2 -> readFile('file2.txt');

    function checkvalidString($a){
        $after = "after";
        $before = "before";
           if (empty($a)) {
            return true;
           }else if (strpos($a, $after) === false && strlen($a) > 50){
            return true;
           }else if (strpos($a, $after) === false && strpos($a, $before) !== false){
            return true;
           }else {
            return false;
           }
    }