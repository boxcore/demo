<?php
/**
 * 浏览器兼容性和对如果文件名是中文的话出现异常bug 修复写法
 * @var [type]
 */
$ua = $_SERVER["HTTP_USER_AGENT"];  
$filename = "文件名.txt";  
$encoded_filename = urlencode($filename);  
$encoded_filename = str_replace("+", "%20", $encoded_filename);  
header('Content-Type: application/octet-stream');  
if (preg_match("/MSIE/", $ua)) {  
   header('Content-Disposition: attachment; filename="' . $encoded_filename . '"');  
} else if (preg_match("/Firefox/", $ua)) {  
   header('Content-Disposition: attachment; filename*="utf8\'\'' . $filename . '"');  
} else {  
   header('Content-Disposition: attachment; filename="' . $filename . '"');  
}  
print 'ABC';  
?>