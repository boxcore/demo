<?php
/**
 * 获取文件MD5
 */

$filename = 'test.pdf';
$md5file = md5_file($filename);
echo $md5file;
if(!is_file($md5file)){
    copy("test.pdf",$md5file);
    echo 'create new file '.dirname($  ).'/'.$md5file;
}else{
    echo 'file exist!';
}
