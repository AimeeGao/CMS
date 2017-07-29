<?php
try
{
	$error = '抛出异常信息，并且跳出try块<br/>';
	if(is_dir('./test')){
		echo '检测到../ch16是一个目录';
		echo '<br/>';
		echo '可能继续做其他一些操作';
		echo '<br/>';
		echo '...';
		echo '<br/>';
	}
	else{
		throw new Exception($error,12345); // 抛出异常
	}
	echo '上面throw异常的话，这行代码不会执行，转而执行catch块<br/>';
}
catch(Exception $e)  // 获取异常
{
	echo '捕获异常:'.$e->getMessage()."<br/>错误代码：".$e->getCode().'<br/>'; // 显示$error 和 12345
	echo '<br/>';
}

echo '继续执行';
