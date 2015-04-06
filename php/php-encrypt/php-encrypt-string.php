<?php


$article1 = '```dfaf```dfadfa```dafadfadfadfadbabafaefae';
$article2 = '```dfaf```dfadfa`8`dafadfadfadfadbabafaefae';

echo md5($article1);
echo "\n";
echo md5($article2);