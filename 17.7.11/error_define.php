<?php
set_error_handler('myHandler'); // 自定义错误处理函数
function myHandler($code,$msg,$file,$line)
{
	echo '<br/>';
	echo "程序<b>$file</b>执行过程中，在第<b>$line</b>行，产生一个错误";
	echo '<br/>';
	echo "错误代码为：<b>$code</b>,错误的原因是：<b>$msg</b>";
}

echo $uvar;