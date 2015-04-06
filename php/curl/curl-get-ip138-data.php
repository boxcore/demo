<?php

// 设置php超时时间 单位秒
ini_set("max_execution_time", "2");

header("Content-type:text/html; charset=utf-8");

// 初始cURL对象
$curl = curl_init();

// sleep(3);

// 设置需要抓取的URL
curl_setopt($curl, CURLOPT_URL, 'http://20140507.ip138.com/ic.asp');

// 设置header
curl_setopt($curl, CURLOPT_HEADER, false);

// 设置cURL 参数，要求结果保存到字符串中还是输出到屏幕上。
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);


/**
 * curl 代理设置
 *
 */
// curl_setopt($curl, CURLOPT_HTTPPROXYTUNNEL, TRUE);
// curl_setopt($curl, CURLOPT_PROXY, "14.102.111.186:80" );
// curl_setopt($curl, CURLOPT_PROXY, "60.18.147.109:8085" );
 //url_setopt($curl, CURLOPT_PROXYUSERPWD, 'user:password');如果要密码的话，加上这个



// 运行cURL，请求网页
$data = curl_exec($curl);

//数据转码成urf8
$data = iconv('GB2312', 'UTF-8', $data);

// 关闭URL请求
curl_close($curl);

// echo $data;

$preg = '#<center>您的IP是：\[([\d\.]+)\] 来自：(.*?)</center>#'; 
preg_match($preg, $data, $arr); 
print_r($arr); 
echo "IP：{$arr[1]}({$arr[2]})";

// echo $citys; 