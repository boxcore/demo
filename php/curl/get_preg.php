<?php
file_put_contents('test.txt', "hey xxoo+".time());

// 打开远程文件 使用fopen获取到的资源
$file = fopen("http://www.5idev.com/p-php_preg_match.shtml", 'r');
if(!$file){
    echo 'can not open remote file. \n';
    exit;
}

var_dump($file);
print_r($file);
echo "\n";
while (!feof ($file)) {
    $line = fgets ($file, 1024);
    /* This only works if the title and its tags are on one line */
    // if (eregi ("<title>(.*)</title>", $line, $out)) {
    //     $title = $out[1];
    //     break;
    // }
    echo $line;
}
