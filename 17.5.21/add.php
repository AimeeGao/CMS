
<?php
// 实现blog文章的添加功能
$ok = true;
if(isset($_POST['title']) && isset($_POST['content'])){ // 判断变量$_POST['content']和$_POST['title']
	$ok = true;
	$title = trim($_POST['title']); // 获取日志标题
	$content = trim($_POST['content']); // 获取日志内容
	$date = time(); // 获取日志时间
	$blog_str = $title.'|'.$date.'|'.$content; // 将上述内容合并成字符串 写入文档的内容
	
	$ym = date('Ym',time()); // 获取日期中的年和月
	$d = date('d',time()); // 获取日期中的日
	$time = date('His',time()); // 获取日期中的时间
	
	$folder = 'D:/Workspace/PHP/blog/content/'.$ym; // 根据年和月设置目录名 需要完整路径
	$file = $d.'-'.$time.'.txt'; // 获取时间和日来设置文件名 
	$filename = $folder.'/'.$file; 
	$entry = $ym.'-'.$d.'-'.$time; // post.php文件中传入的参数
	if(file_exists($folder) == false){
		if(!mkdir($folder)){
			$ok = false;
			$msg='<font color=red>创建目录异常，添加日志失败</font>';
		}
	}

$fp = @fopen($filename, 'w'); // 打开文件
if($fp){
	flock($fp, LOCK_EX); // 文件加锁
	$result = fwrite($fp, $blog_str); // 写入文件
	$lock = flock($fp, LOCK_UN); // 文件解锁
	fclose($fp); // 关闭文件
}
if(strlen($result)>0){ // 判断写入是否成功
	// $ok = false;
	$msg='日志添加成功,<a href="post.php?entry='.$entry.'">查看该日志文章</a>'; // 怎么让这句话在本页面显示？？？
	echo $msg;
}
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>基于文本的简易BLOG</title>
<link href="style.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div id="container">
	<div id="header">
		<h1>我的BLOG</h1>
	</div>
</div>
<div id="title">---- I have a dream ----</div>
<div id="content">
	<div id="left">
		<div id="blog_entry">
			<div id="blog_title">添加一篇新日志</div>
			<div id="blog_body">
			<div id="blog_date"></div>
			<form action="add.php" method="POST" name="form">
				<table>
					<tr><td>日志标题：</td></tr>
					<tr><td><input type="text" name="title" size="50"/></td></tr>
					<tr><td>日志内容：</td></tr>
					<tr><td><textarea name="content" cols="49" rows="10"></textarea></td></tr>
					<tr><td><input type="submit" name="Submit" value="提交"/></td></tr>
				</table>
			</form>
			</div>
		</div>
	</div>
	<div id="right">
		<div id="sidebar">
			<div id="menu_title">关于我</div>
			<div id="menu_body">我是个PHP爱好者！</div>
		</div>
	</div>
</div>
<div id="footer">
	CopyRight 2011-2017
</div>
</body>
</html>

