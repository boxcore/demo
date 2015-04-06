<?php
/**
 * get band list
 */

$str_list = <<<EOF
; Summary: Example Rule List
; Author: Mhd Hejazi (my@email)
; Date: 2010-01-20
; URL: http://samabox.com/projects/chrome/switchy/switchyrules.txt

#BEGIN

[Wildcard]
*://chrome.google.com/*
*://*.samabox.com/*

[RegExp]
^http://code\.google\.com/.*
youtube

#END
EOF;

$encry_str_list = base64_encode($str_list);
echo $encry_str_list;