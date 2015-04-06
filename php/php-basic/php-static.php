<?php
$a = 'hello';
function test_static() {
    static $a = 0;
    echo $a."\n";
    ++$a;
}

test_static();
test_static();
test_static();
echo $a."\n";
test_static();
