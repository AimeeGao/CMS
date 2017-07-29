<?php
$file = './test/readme.txt'; // 指定文件地址
try {
	if(is_dir($file)){
		echo '检测到目录';
	}
	else{
		// 创建异常对象，错误信息将由Exception类的成员函数getMessage()返回
		throw new Exception('未找到该目录或文件');
	}
}
catch (Exception $e){
	echo '捕获异常：'.$e->getMessage();
	echo '<br/><br/>';
	echo '错误所在文件：'.$e->getFile();
	echo '<br/><br/>';
	echo '错误所在行号：'.$e->getLine();
	echo '<br/>================';
	echo '<br/>';
}
echo '程序执行完毕';
