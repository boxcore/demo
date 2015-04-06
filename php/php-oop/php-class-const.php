<?php

$GLOBALS['app']['name'] = 'hey';

abstract class ConstModel {
    const NEWS_A = 12;
    const NEWS_B = 45;
    public $cs_name = $GLOBALS['app']['name'];
}

class doit extends ConstModel {
    public function __constructor() {
        parent::__constructor();
    }

    public function say() {
        echo 'I say '. ConstModel::NEWS_A;
    }
}

$obj = new doit();

$obj->say();

// echo  ConstModel::$cs_name;