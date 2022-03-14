<?php

abstract class Supervisor
{
    protected $slogan ;

    abstract public function saySloganOutLoud();

    public function setSlogan ($slogan) {
        $this->slogan = $slogan;
    }
}

interface Boss {
  public function checkValidSlogan();
}

class EasyBoss extends Supervisor implements Boss
{
    public function saySloganOutLoud() {
        $before = 'before';
        $after = 'after';

        return strpos($this->slogan, $before) !== false || strpos($this->slogan, $after) !== false;

    }
    public function checkValidSlogan(){
        if($this->saySloganOutLoud() !== false){
            return true;
        }
        else{
            return false;
        }

    }
}


class UglyBoss extends Supervisor implements Boss {
    public function saySloganOutLoud() {
        $before = 'before';
        $after = 'after';

       return strpos($this->slogan, $before) === false || strpos($this->slogan, $after) === false;
    }
    public function checkValidSlogan(){
        if($this->saySloganOutLoud() !== false){
            return true;
        }
        else{
            return false;
        }

    }
}
$easyBoss = new EasyBoss();
$uglyBoss = new UglyBoss();

$easyBoss->setSlogan('Do NOT push anything to master branch before reviewed by supervisor(s)');

$uglyBoss->setSlogan('Do NOT push anything to master branch before reviewed by supervisor(s). Only they can do it after check it all!');

$easyBoss->saySloganOutLoud(); 
echo "<br>";
$uglyBoss->saySloganOutLoud(); 

echo "<br>";

var_dump($easyBoss->checkValidSlogan()); 
echo "<br>";
var_dump($uglyBoss->checkValidSlogan()); 
