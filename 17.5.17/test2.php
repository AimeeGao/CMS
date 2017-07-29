<?php
header('HTTP/1.1 404 Not Found');  // 找不到网页的提示信息
header("status: 404 Not Found");
echo ("hello");

/* 打印结果后，发现只输出了hello,而header的提示的信息并没有出现
 * 网上说法： 1. 不能在header前输入任何语句，否则header的传输就无效了
 * 		  2. 修改配置文件 将output_buffering=0修改成output_buffering=4096
 * 		     或 者在程序中使用缓存函数ob_start()，ob_end_flush() 等
 * */

// header("HTTP/1.1 404 Not Found");

// echo "PHP continues.\n";
// die();
// echo "Not after a die, however.\n";
