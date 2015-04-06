<?php
/**
 * __set() & __get()
 */

class Test
{
    public $key = 'aa';
    public $value = 55;
    protected $pt = 11;
    private $pr = 22;

}

$obj = new Test();
echo $obj->key;

$obj->value = 66;
echo $obj->value;

echo $obj->pt;
echo $obj->pr;
