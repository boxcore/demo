<?php




/**
 * 替换链接为带域名的相对链接
 *
 * @author chunze.huang
 * @date   2014-05-28
 * @param  string     $str
 * @param  string     $url
 * @return string
 */
function get_full_url($str, $url) {
    $url_info = pathinfo($url);
    $url_parse = parse_url($url);

    $host = $url_parse['scheme'].'://'.$url_parse['host'];
    $url_arr = array_shift(explode('/', $url_parse['path']));

    $pattern = '#<(img|a).*?(src|href)="(.*?)".*?>#i';

    preg_match_all($pattern, $str, $out);
    $a = '';
    foreach($out[3] as $v){
        if(preg_match('#^https?://.*?#', $v)){
            $a = $v;
        } elseif (preg_match('#^/.*?#', $v)) {
            $a = $host.$v;
        } else {
            $a = $url_info['dirname'].'/'.$v;
        }
        $out_str[$v] = $a;
    }

    $out = strtr($str, $out_str);

    return $out;
}

$str = '<div><img height="600" width="400" alt="" src="/upfile/0(9).jpeg" /></div>
<div>&nbsp;</div><div><img height="600" width="400" alt="" src="/upfile/0 (1)(10).jpeg" /></div><a href="../../b.html"><a href="./b.html"><a href="http://b.com/b.html">';
$url = 'http://www.boxcore.org/aa/bb/123.php?id=34&u=11#title';

print_r(get_full_url($str, $url));


// $host = preg_match('#https?(.*?)/#i', subject)







// $url_dir = $url_info['dirname'].'/';


// preg_match_all($pattern, $str, $out);
// foreach($out[3] as $v) {

// }
// print_r($out);
