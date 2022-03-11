<?php
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
    function checkfile(){
        $file1 = 'English is a West Germanic language that was first spoken in early medieval England and is now the third most widespread native language in the world, after Standard Chinese and Spanish, as well as the most widely spoken Germanic language. Named after the Angles, one of the Germanic tribes that migrated to England, it ultimately derives its name from the Anglia (Angeln) peninsula in the Baltic Sea';
        $file2 = 'Modern English grammar is the result of a gradual change from a typical Indo-European dependent marking pattern with a rich inflectional morphology and relatively free word order';
        $check1 = checkvalidString($file1);
        $check2 = checkvalidString($file2);
        if ($check1 == true){
            echo 'Chuỗi hợp lệ';
        }else{
            echo 'Chuỗi không hợp lệ';
        }
        if ($check2 == true){
            echo 'Chuỗi hợp lệ';
        }else{
            echo 'Chuỗi không hợp lệ';
        }
    } 
    checkfile();
?>