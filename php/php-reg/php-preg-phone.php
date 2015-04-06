<?php
/**
 * 同时匹配电话和手机的正则
 * @var string
 */
$tel_pattern = '#\b(0[0-9]{2,3})(\-)?([2-9][0-9]{6,7})+(\-[0-9]{1,4})?\b|\b1[3|4|5|8]{1,1}\d{9,9}\b#';
$tel_pattern2 = '##';
$tel= '  好是 02021007979等等 ';
if(preg_match($tel_pattern, $tel, $out)){
    print_r($out);
}
