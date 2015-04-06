<?php
$haystack = "Hello worldaa, aa is bb, I am aa?";
$handle = "aa";
$count = substr_count($haystack, $handle);
echo "aa 共出现次数: ".$count;