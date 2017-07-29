<?php
// 基于文本的简易blog系统
// 1.--- 处理由URL传入的字符串参数   --- ?=
if(!isset($_GET['entry'])){
	echo "请求参数错误";
	exit;
}
$path = substr($_GET['entry'], 0,6);
$entry = substr($_GET['entry'], 7,9);
$file_name='D:/workspace/PHP/blog/content/'.$path.'/'.$entry.'.txt'; // 存储日志内容的文件  注意文件的格式
if(file_exists($file_name)){ // 判断文件是否存在
	$fp = fopen($file_name, 'r'); // 以只读方式打开文件
	if($fp){
		flock($fp, LOCK_SH); // 文件加锁
		$result = fread($fp, 1024); // 读出文件的内容，并以字符串形势赋给变量$result
	}
	flock($fp, LOCK_UN); // 文件解锁
	fclose($fp); // 释放空间
}
// 将字符串$result的内容按“|”分割后存入数组$content_array
$content_array = explode("|", $result);
// 以下代码将日志内容输出至浏览器
echo "<h1>我的BLOG</h1>";
echo "<b>日志标题：</b>".$content_array[0];
echo "<br/><b>发布时间：</b>".date('Y-m-d H:i:s', $content_array[1]); // 时间戳格式化date();
echo "<hr>";
echo $content_array[2];
// URL中entry参数的值存放在PHP的预定义变量$_GET中 substr()将该参数的值分割，分别分割成日志的存储目录和日志文件名
// 字符串201112-02-215307的前6位代表的是日志的存储目录，后几位代表日志文件名

// 2.---- 添加日志文章的 完整程序  ----
$ok = true;
if(isset($_POST['title']) && isset($_POTSTS['content'])){ // 判断变量$_POST['content']和$_POST['title']
	$ok = true;
	$title = trim($_POST['title']); // 获取日志标题
	$content = trim($_POST['content']); // 获取日志内容
	$date = time(); // 获取日志时间　 time()函数专用于返回当前日期和时间的UNIX时间戳，不需传入任何参数
	$blog_str = $title.'|'.$date.'|'.$content; // 将上述内容合并成字符串 '.'可实现字符串的拼接
	$ym = date('Ym',time()); // 将UNIX时间戳格式化 获取日期中的年和月
	$d = date('d',time()); // 获取日期中的日
	$time = date('His',time()); // 获取日期中的时间
// 	echo "$ym";
	$folder = 'content/'.$ym;    // 根据年和月设置目录名
	$file = $d.'-'.$time.'.txt'; // 获取时间和日来设置文件名
	$filename = $folder.'/'.$file;
	$entry = $ym.'-'.$d.'-'.$time; // $entry 为获取到的现在的 年月日时间
	if(file_exists($folder)== false){ // 判断文件路径或文件是否存在
		if(!mkdir($folder)){ // mkdir($pathname)指创建的目录的路径或名称
			// $ok = false;
			// $msg = '<font color= red>创建目录异常，添加日志失败</font>';
		}
	}
}
// 3. ----实现登录功能----
/* 通常一个系统只有允许用户登陆后，才能完成该系统相应的管理操作
 * 用户登录需要用户名和密码，**完成登陆页面时需要首先将用户名和密码配置到.php文件中**，登陆程序将用户输入的用户名和密码与该php文件中设置的用户名和密码进行比较
 * 若完全匹配，则登陆成功，否则提示用户名或密码错误
 * 配置文件的设置：
 * 建立一个名为 autu.php的文件，存放在BLOG系统的config目录下，用来设置用户名和密码
 * */

// 4. ---- 实现BLOG首页 ----
/* 用户成功登陆后，会转向BLOG首页
 * 因为用户登录后，可完成对BLOG的各项管理操作，所以如果用户已经登陆，就在首页的日志文章后添加 “编辑” 和 “删除” 链接，以便用户完成对日志文章的编辑和删除
 * 并且 因为登录程序设置了 session,所以可在首页中使用session对用户是否已经登陆进行判断
 * ** 登陆前和登陆后的首页显示稍有不同。 登陆后显示，“编辑”、“删除”和“退出”链接，没有登陆的情况下，用户只能看到登陆链接
 * 并且BLOG首页除了显示日志文章外，还将显示日志文章按年月归档的导航列表，故首页还应该实现日志文章的归档处理
 * */

// 5. ---- 实现blog文章的编辑功能 ----
/* 用户单击编辑后，进入日志文章的编辑界面 该界面可以修改日志文章的标题、文章内容、修改后提交，完成对日志文章的编辑
 * 编辑日志文章的实现，应先判断用户是否登陆，只有登陆的用户才能执行日志文章的修改操作，判断登陆可通过session完成
 * 同时，还需要将编辑的日志内容显示出来，以供用户修改
 * */

