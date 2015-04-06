<?php
/**
 * 前导零字符串生成
 */

$num = range('01', '10');

$new_num = prefix_zero($num, 3);
print_r($new_num);

function prefix_zero($arr = array() , $leng=0) {
    if($leng>1){
        $base_num = pow(10, $leng);

        if(is_array($arr)){
            foreach($arr as $v){
                $str = $base_num + $v;
                $list_num[] = substr( $str, 1 );
            }
        }
        return $list_num;
    }
}