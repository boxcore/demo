<?php
/**
 * __set() & __get()
 */

class Test
{
    public $key = 'aa';
    protected $pt = 11;
    private $pr = 22;

    public function __set($name, $value){
        echo "setting $name to $value\r\n";
        $this->$name = $value;
    }

    public function __get($name){
        if(!isset($this->$name)){
            echo 'unsetting';
            $this->$name = 'setting for default';
        }

        return $this->$name;
    }

}

$obj = new Test();
echo $obj->key;

$obj->pt = 'test protected';
echo $obj->pt;
echo "\r\n";

$obj->pr = 'test private';
echo $obj->pr;
echo "\r\n";

echo $obj->none;


