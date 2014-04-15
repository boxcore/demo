<?php  
$filename = "document.txt";  
header('Content-Type: application/octet-stream');  
header('Content-Disposition: attachment; filename=' . $filename);  
print "Hello!\r";
echo '\t你好哈';
echo "\r\r来咯\t haha "
?>