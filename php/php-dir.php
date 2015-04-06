<?php

/**
 * getcwd — 取得当前工作目录
 * 语法: string getcwd ( void )
 */
echo getcwd(). "\n";
echo dirname(__FILE__). "\n";

/**
 * chdir — 改变目录
 * bool chdir ( string $directory )
 */
chdir('..');
echo getcwd() . "\n";

/**
 * chmod — 改变文件模式
 * bool chmod ( string $filename , int $mode )
 */
// chmod('text.txt', 0600);

// // 例子:
// // Read and write for owner, nothing for everybody else
// chmod("text.txt", 0600);

// // Read and write for owner, read for everybody else
// chmod("text.txt", 0644);

// // Everything for owner, read and execute for others
// chmod("text.txt", 0755);

// // Everything for owner, read and execute for owner's group
// chmod("text.txt", 0750);


