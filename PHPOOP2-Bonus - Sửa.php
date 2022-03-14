<?php


abstract class Supervisor
{
	use Active;
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
        $before = "before";
        $after = "after";

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
        $before = "before";
        $after = "after";

        return strpos($this->slogan, $before) !== false && strpos($this->slogan, $after) !== false;
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

 Trait Active{
 	public function defindYourSelf(){
 		return get_class($this);
 	}
 }
$easyBoss = new EasyBoss();
$uglyBoss = new UglyBoss();

 echo 'I am ' . $easyBoss->defindYourSelf(); 
 echo "<br>";