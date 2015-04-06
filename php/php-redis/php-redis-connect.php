<?php

$redis = new Redis();
$redis->connect("127.0.0.1","6379");
$redis->set("test","Hello World");
echo $redis->get("test");
