<?php

/**
 * 正则提取图片地址
 *
 * @author boxcore
 * @date   2014-05-28
 * @param  string     $str 要获取图片的dom节点
 * @return array      返回图片地址集
 */
function get_str_imgs($str) {
    $pattern = '#<img.*?src="(.*?)".*?>#i';
    preg_match_all($pattern, $str, $out);
    return $out[1];
}

$str = '<div><img height="600" width="400" alt="" src="/upfile/0(9).jpeg" /></div>
<div>&nbsp;</div><div><img height="600" width="400" alt="" src="/upfile/0 (1)(10).jpeg" /></div><div>&nbsp;</div>
<p>
 asdfasdfadfa
</p>
<p>
 <p align="center">
  <img src="{IMG_URL}article/20140530/14014157871084.jpg" alt="" />
 </p>
</p>

';

print_r(get_str_imgs($str));

