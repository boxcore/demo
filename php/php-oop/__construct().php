<?php

class test
{
    public $key;
    public $value;

    public function __construct($key,$value){
        $this->key = $key;
        $this->value = $value;

    }

    public function __toString()
    {
        return (string) $this->key;
    }
}

$obj = new test('aa','bb');
echo $obj;