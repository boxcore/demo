<?php
/**
 * 该测试接口已经失效！
 *
 * @author boxcore
 * @date   2014-04-15
 * @param  string     $url  [description]
 * @param  string     $type [description]
 * @return [type]           [description]
 */
function checkICP($url = '', $type = '') {
    $url = trim($url);
    if(empty($url)) {
        return;
    }
    $htmltext = file_get_contents('http://api.befen.net/icp.php?domain='.$url);
    if(empty($htmltext)) {
        return;
    }
    if($type == 'all') {
        return $htmltext;
    } else {
        $icparr = explode(',', $htmltext);
        return $icparr[2];
    }
}
$arr=checkICP('http://www.baidu.com','all');
var_dump($arr);