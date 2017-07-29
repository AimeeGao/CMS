<?php
// 第二种输出方式 为什么无法打开？？有问题啊！！
$dir = "D:/Workspace/PHP/17.5.15/tmp";
if($fp = opendir($dir)){
	$file = readdir($fp);
	while(!feof($file)){
		$line = fgetss($file);
		echo $line;
	}
	fclose($fp);
}
// 盘符错了？？
