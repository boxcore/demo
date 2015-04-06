<?php

/**
 * 获取外网IP( 无效.. )
 *
 * @author boxcore
 * @date   2014-06-06
 * @return [type]     [description]
 */
function get_onlineip() {
    $onlineip = '';
    if(getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), 'unknown')) {
        $onlineip = getenv('HTTP_CLIENT_IP');
    } elseif(getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), 'unknown')) {
        $onlineip = getenv('HTTP_X_FORWARDED_FOR');
    } elseif(getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'), 'unknown')) {
        $onlineip = getenv('REMOTE_ADDR');
    } elseif(isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], 'unknown')) {
        $onlineip = $_SERVER['REMOTE_ADDR'];
    }
    return $onlineip;
}

function get_onlineip_by_138() {
    $ch = curl_init('http://20140507.ip138.com/ic.asp');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $a  = curl_exec($ch);
    preg_match('/\[(.*)\]/', $a, $ip);
    return $ip[1];
}

function get_ip_info($ip) {
    // if( isset($_GET('ip')) && !empty($_GET('ip')) ) {
    //     $ip = $_GET('ip');
    // } else {
    //     return null;
    // }

    $ip = trim($ip);
    $ip_info = array();
    $ip_info['addr'] = $ip;
    $ip_info['from'] = 'http://ip138.com/ips138.asp?ip='.$ip;

    $ch = curl_init($ip_info['from']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $html  = curl_exec($ch);
    $html = iconv('gb2312', 'utf-8', $html);

    $pattern1 = "#<li>(本站主数据)：(.*?)</li>#i";
    $pattern2 = "#<li>(参考数据一)：(.*?)</li>#i";
    $pattern3 = "#<li>(网友提交的IP)：(.*?)</li>#i";
    preg_match($pattern1, $html, $matches1);
    if($matches1){
        $ip_info['info'][] = array(
            'name'=> !empty($matches1[1])? $matches1[1] : '',
            'detail'=> !empty($matches1[2])? $matches1[2] : '',
            );
    }
    preg_match($pattern2, $html, $matches);
    if($matches){
        $ip_info['info'][] = array(
            'name'=> !empty($matches[1])? $matches[1] : '',
            'detail'=> !empty($matches[2])? $matches[2] : '',
            );
    }
    preg_match($pattern3, $html, $matches);
    if($matches){
        $ip_info['info'][] = array(
            'name'=> !empty($matches[1])? $matches[1] : '',
            'detail'=> !empty($matches[2])? $matches[2] : '',
            );
    }
    
    return $ip_info;
}

/**
 * 从ip138中获取IP
 *
 * @author boxcore
 * @date   2014-06-06
 * @param  [type]     $ip [description]
 * @return [type]         [description]
 */
function get_138_ip($ip) {

    $ip = trim($ip);
    $ip_info = array();
    $ip_info['addr'] = $ip;
    $ip_info['from'] = 'http://ip138.com/ips138.asp?ip='.$ip;

    $ch = curl_init($ip_info['from']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $html  = curl_exec($ch);
    $html = iconv('gb2312', 'utf-8', $html);

    $pattern1 = "#<li>(本站主数据)：(.*?)</li>#i";
    $pattern2 = "#<li>(参考数据一)：(.*?)</li>#i";
    $pattern3 = "#<li>(网友提交的IP)：(.*?)</li>#i";
    preg_match($pattern1, $html, $matches1);
    if($matches1){
        $ip_info['info'][] = array(
            'name'=> !empty($matches1[1])? $matches1[1] : '',
            'detail'=> !empty($matches1[2])? $matches1[2] : '',
            );
    }
    preg_match($pattern2, $html, $matches);
    if($matches){
        $ip_info['info'][] = array(
            'name'=> !empty($matches[1])? $matches[1] : '',
            'detail'=> !empty($matches[2])? $matches[2] : '',
            );
    }
    preg_match($pattern3, $html, $matches);
    if($matches){
        $ip_info['info'][] = array(
            'name'=> !empty($matches[1])? $matches[1] : '',
            'detail'=> !empty($matches[2])? $matches[2] : '',
            );
    }
    
    return $ip_info;
}

/**
 * 从chinaz中获取ip数据
 *
 * @author boxcore
 * @date   2014-06-06
 * @param  [type]     $ip [description]
 * @return [type]         [description]
 */
function get_chinaz_ip($ip){
    // $sybo = '<strong class="red">查询结果[1]: 123.125.114.144 ==>> 2071818896 ==>> 北京亦庄联通机房</strong>';
    $ip_info['from'] = 'http://ip.chinaz.com/?IP='.$ip;

    $ch = curl_init($ip_info['from']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $html  = curl_exec($ch);

    $pattern = '#<strong class="red">查询结果\[1\]\:\s+(.*?)\s+==>>\s+(.*?) ==>>\s+(.*?)</strong>#i';
    preg_match($pattern, $html, $matches);
    if($matches){
        $ip_info['info'] = array(
            'ip'=> !empty($matches[1])? $matches[1] : '',
            'ip_log'=> !empty($matches[2])? $matches[2] : '',
            'detail'=> !empty($matches[3])? $matches[3] : '',
            );
    }

    return $ip_info;
}

$info['chinaz'] = get_chinaz_ip('123.125.114.144');
$info['ip138'] = get_138_ip('123.125.114.144');
$myip = get_onlineip_by_138();
echo "本机IP:{$myip}\n要查询的IP信息为:\n";
print_r($info);
