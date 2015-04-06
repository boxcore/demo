<?php

// $arr1 = 'aasddd';
// foreach($arr1 as $v){
//     echo $v;
// }


$arr1 = array( array('a'=>12, 'b'=>34), array('aa','bb') );
$arr2 = array('aa'=> 12, 'bb'=>45);

echo count($arr2);
if(isset($arr2[0])){
    echo 'yes';
} else {
    echo 'no';
}

$attr = array('aa'=>2,'bb'=>4,'tt'=>9);
if(in_array(4, $attr)) {
    echo 12112;
}

echo "\n\n测试数组键值交换和数组倒序:\n";
$attr_rev = array_flip($attr);
$attr_rev = array_reverse($attr_rev);
print_r($attr_rev);

echo "\n\n测试数组引用传值:\n";
print_r($attr);
foreach($attr as $k=>&$v) {
    if($v==4){
        $v = 'do it';
    }
    if($k=='tt'){
        $k = 'zz';
    }
}


echo "\n\n测试array-merg:\n";
shuffle($attr);
print_r($attr);
$tmp = array_rand($attr);
print_r($tmp);