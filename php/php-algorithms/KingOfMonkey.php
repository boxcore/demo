<?php
/**
 * 约瑟夫斯置换问题 （Josephus Problem）
 * 
 * 有m只猴子，从1开始数到n，第n只猴子退出，如此循环执行下去，直到剩下最后一只猴子，求该猴子的编号？
 * 
 * 递归算法
 * @param int $m 猴子数
 * @param int $n 出局数
 * @param int $current 指针
 */

/**
 * 方法一
 * @param int $n 出局数
 * @param int $m 猴子数
 * 
 */
function king($n, $m){
  $mo = range(1, $m); // 生成1到m的猴子

  $i = 0;
  while( count($mo)>1 ){
    $i += 1;
    $h = array_shift($mo);

    // 如果不是n的倍数，放回到猴子群中
    if($i%$n != 0){
      array_push($mo, $h);
    }
  }

  return $mo[0];
}

echo '剩余'.king(7, 5).'号猴子';

