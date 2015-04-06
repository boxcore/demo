<?php
/**
 * namespace前面如果有输出会报declare 致命错误
 * "Fatal error: Namespace declaration statement has to be the very first statement "
 * 
 */
// echo '11';
namespace Boxcore;

define(__NAMESPACE__.'\foo', '111');
define('foo', '222');

echo foo."\n\r";
echo \foo."\n\r";
echo \Boxcore\foo."\n\r";
// echo Boxcore\foo."\n\r"