<?php
// 1. 循环生成1-100之间的15个随机数
echo "随机生成1-100之间的15个随机数：<br/>";
for($i=0; $i<15; ++$i){
	$number = (mt_rand()%100)+1;
	echo "$number<br/>";
}
// 2. 有一个浮点数6.86956，对其进行四舍五入运算，保留4位小数
$a = 6.86956;
echo "round($a,4)=".round($a,4);
// *******************************************************************************************

// 处理由URL传入的字符串参数 post.php
if(!isset($_GET['entry'])){ // 判断是否设置参数
	echo '请求参数错误';
	exit;
}
$path = substr($_GET['entry'], 0,6); // 获取日志的目录名
$entry = substr($_GET['entry'], 7,9); // 获取日志的文件名
$file_name = 'D:/workspace/PHP/blog/content/'.$path.'/'.$entry.'.txt'; // 拼接出完整的文件路径
if(file_exists($file_name)){ // 打开文件之前需要先判断文件是否存在 file_exists判断文件或路径是否存在
	$fp = fopen($file_name, 'r'); // 以只读方式打开判断存在的路径
	if($fp){
		flock($fp, LOCK_SH); // 文件加锁
		$result = fread($fp, 1024); // 读出文件中的内容并赋值
	}
	flock($fp, LOCK_UN); // 文件解锁
	fclose($fp); // 释放文件资源
}
// 将读出的文件内容以'|'的方式分割，并存入数组$content_array
$content_array = explode('|', $result);
// 输出分割后的文件内容
echo '<h1>我的BLOG</h1>';
echo '<b>日志标题：</b>'.$content_array[0]; // 输出日志标题
echo '<br/><b>发布时间：</b>'.date('Y-m-d H:i:s',$content_array[1]);
echo '<hr>';
echo $content_array[2];
echo '<br/>';
echo '<h1>******* 复习 ********</h1>' ;
// 处理由URL传入的字符串参数 分割出各部分所对应的目录 和文件名称 post.php
if(!isset($_GET['entry'])){
	echo '请求参数错误';
	exit;
}
$path= substr($_GET['entry'], 0,6);
$entry = substr($_GET['entry'], 7,9);
// 拼接完整的文件目录地址
$file_name = 'D:/Workspace/PHP/blog/content/'.$path.'/'.$entry.'.txt'; // 注意文件的格式 .txt
// 判断文件目录或文件是否存在
if(file_exists($file_name)){ // 判断文件或文件路径是否存在
	$fp = fopen($file_name, 'r'); // 若存在，则以只读模式打开文件或文件路径
	if($fp){ // 判断打开的文件是否存在
		flock($fp, LOCK_SH); // LOCK_SH读锁定，针对读取的程序 文件加锁
		$result = fread($fp, 1024); // 读取加锁后的文件内容
	}
	flock($fp, LOCK_UN); // 文件解锁
	fclose($fp); // 释放文件空间
}
// 将读取的文件内容以"|"形式分割并传入content_array数组中
$content_array=explode('|', $result);
// 输出分割后的内容
echo "<h1>我的BLOG</h1>";
echo "<b>日志标题：</b>".$content_array[0];
echo "<br/><b>发布时间：</b>".date('Y-m-d H:i:s',$content_array[1]);
echo '<hr/>';
echo $content_array[2];
echo '<br/>';
echo date('Y-m-d H:i:s',1322862787);
echo '<br/>';
echo mktime(21,53,07,12,02,2011); // 将一段时间以 时 分 秒 月 日 年的形式返回UNIX时间戳
echo "<br/>";

echo '---- <b>添加日志文章的完整程序</b> ---- add.php';
$ok = true;
if(isset($_POST['title']) && isset($_POST['content'])){ // 设置文章标题和内容
	$ok = true;
	$title = trim($_POST['title']);
	$content = trim($_POST['content']);
	$date = time();
	$blog_str = $titel.'|'.$date.'|'.$content;
	
	$ym = date('Ym',time());
	$d = date('d',time());
	$time = date('His',time());
	
	$folder = 'content/'.$ym;
	$file = $d.'-'.$time.'.txt';
	$filename = $folder.'/'.$file;
	$entry = $ym.'-'.$d.'-'.$time;
	
	if(file_exists($folder) == false){
		if(!mkdir($folder)){
			$ok = false;
			$msg = '<font>创建目录异常，添加日志失败</font>';
		}
	}
	$fp = @fopen($filename, 'w');
	if($fp){
		flock($fp, LOCK_EX);
		$result = fwrite($fp, $blog_str);
		flock($fp, LOCK_UN);
		fclose($fp);
	}
	if(strlen($result)>0){
		$ok = true;
		$msg = '日志添加成功,<a href="post.php?entry='.$entry.'">查看该日志</a>';
		echo $msg;
	}
}

// 添加日志文章的完整程序 add.php
$ok = true;
if(isset($_POST['title']) && isset($_POST['content'])){
	$ok = true;
	// 准备工作第一步  获取文件的标题、发布事件、发布内容、并将其以'|'字符串的形式组合为写入文件做准备
	$title = trim($_POST['title']);
	$content = trim($_POST['content']);
	$date = time(); // time() 主要用来获取当前时间的时间戳
	$blog_str = $title.'|'.$date.'|'.$content; // 写入文件的内容
	
	//  准备工作第二步  获取文件的目录、文档的各个部分，并将其拼接成所需要的目录 和文件名、文件地址
	$ym = date('Ym',time()); // date() 主要用来格式化某个时间戳
	$d = date('d',time());
	$time = date('His',time());
	
	// 拼接部分 注意文件地址为完整的电脑地址
	$folder = "D:/Workspace/PHP/blog/content/".$ym;
	$file = $d.'-'.$time.'.txt';
	$filename = $folder.'/'.$file; // 整合一下作为文件打开的地址
	$entry = $ym.'-'.$d.'-'.$time; // 用URL方式传入参数所需要的参数值
	
	// 判断文件或文件地址是否存在，准备打开文件并向文件内写入拼接的内容
	// 先考虑文件创建失败的情况
	if(file_exists($folder) == false){
		if(!mkdir($folder)){
			$ok = false;
			$msg = '<font>创建目录异常，添加日志失败</font>' ;
			echo $msg;
		}
	}
	$fp = fopen($filename, 'w'); // 打开文件或文件的地址
	if($fp){ // 判断是否打开了文件
		flock($fp, LOCK_EX); // 文件加锁
		$result = fwrite($fp, $blog_str); // 将拼接的内容写入文件内部
		flock($fp, LOCK_UN);
		fclose($fp);
	}
	if(strlen($result)>0){
		$ok = true;
		$msg = '<font>日志添加成功，<a href= "post.php?='.$entry.'">查看该日志</a></font>';
		echo $msg;
	}
}
// 添加日志文章的完整程序复习 add.php
$ok = true; // 存储一个判断变量
if(isset($_POST['title']) && isset($_POST['content'])){
	$ok = true;
	$title = trim($_POST['title']);
	$content = trim($_POST['content']);
	$date = time();
	$blog_str = $title.'|'.$date.'|'.$content;
	
	$ym = date('ym',$date);
	$d = date('d',$date);
	$time = date('His',$date);
	
	$folder = "D:/Workspace/PHP/blog/content/".$ym;
	$file = $d.'-'.$time.'.txt';
	$filename = $folder.'/'.$file;
	$entry = $ym.'-'.$d.'-'.$time;
	
	if(file_exists($folder) == FALSE){
		if(!mkdir($folder)){
			$ok = false;
			$msg = "<font>创建目录异常，添加日志失败！</font>";
			echo $msg;
		}
	}
	$fp = fopen($filename, 'w');
	if($fp){
		flock($fp, LOCK_EX);
		$result = fwrite($fp, $blog_str);
		flock($fp, LOCK_UN);
		fclose($fp);
	}
	if(strlen($result) > 0){
		$ok = true;
		$msg = '日志添加成功，<a href = post.php?='.$entry.'>查看该日志</a>';
		echo $msg;
	}
}
echo "<br/>";
echo "<br/>";
// ************** md5()函数测试    ***************
echo '123';
echo "<br/>";
echo md5(123);
echo "<br/>";

// 登陆功能实现复习 login.php
include 'D:/Workspace/PHP/blog/config/auth.php'; // 包含配置文件 将用户输入的用户名和密码与配置文件中存入的进行比对
session_start();
if(isset($_POST['user']) && isset($_POST['passwd'])){ // 判断用户输入是否输入用户名和密码
	$user = $_POST['user'];
	$passwd = $_POST['passwd'];
	$passwd = md5($passwd); // 对密码使用md5加密
	if($user != $AUTH['user'] || $passwd != $AUTH['passwd']){ // 验证失败
		echo '<strong><font color="red">用户名或密码错误！</font></strong>';
	}else{
		$_SESSION['user'] = $user;
		header("location: index.php");
	}
}

include 'D:/Workspace/PHP/blog/config/auth.php';
session_start();

// 判断是否填写了用户名和密码
if(isset($_POST['user']) && isset($_POST['passwd'])){
	$user = $_POST['user'];
	$passwd = $_POST['passwd'];
	$passwd = md5($passwd);
	
	if($user != $AUTH['user'] || $passwd != $AUTH['passwd']){
		echo '<strong><font color="red">用户名或密码错误！</font></strong>';
	}else{
		$_SESSION['user'] = $user;
		header("location: index.php");
	}
}
// 登陆功能实现复习
include 'D:/Workspace/PHP/blog/config/auth.php';
session_start();

if(isset($_POST['user']) && isset($_POST['passwd'])){
	$user = $_POST['user'];
	$passwd = $_POST['passwd'];
	$passwd = md5($passwd);
	
	if($user != $AUTH['user'] || $passwd != $AUTH['passwd']){
		echo '<strong><font color= "red">登录名或密码错误！</font></strong>';
	}else{
		$_SESSION['user'] = $user;
		header("location:index.php");
	}
}

// 编辑日志文章
// 编辑日志的功能是基于用户登录后，只有登陆后才能实现编辑，故先判断是否登陆
session_start();
$ok = false;
// 获取传入的参数地址 才可以针对特定的日志，进行修改
if(!isset($_GET['entry'])){
	echo '请求参数错误！';
	exit;
}
if(empty($_SESSION['user']) && $_SESSION['user']!= 'aim'){
	echo '请<a href="login.php">登陆</a>后执行该操作。';
	exit;
}

// 获取对应编辑文件的存储目录和文件名称
$path = substr($_GET['entry'], 0,6); // 日志存储目录
$entry = substr($_GET['entry'], 7,9); // 日志文件名称
$file_name = "D:/Workspace/PHP/blog/content/".$path.'/'.$entry.'.txt';
// 获取该目录下日志的内容
if(file_exists($file_name)){
	$fp = @fopen($file_name, 'r');
	if($fp){
		flock($fp, LOCK_SH);
		$result = fread($fp, filesize($file_name));
	}
	flock($fp, LOCK_UN);
	fclose($fp);
	$content_array = explode('|', $result);
}
// 获取文件原本的标题和日志内容
if(isset($_POST['title']) && isset($_POST['content'])){
	$title = trim($_post['title']); // 获取日志主题
	$content = trim($_POST['content']); // 获取日志内容
	if(file_exists($file_name)){ // 判断文件是否存在
		// 根据拥护修改时提交的内容，替换现有文件的对应内容
		$blog_temp = str_replace($content_array[0], $title, $result);
		$blog_str = str_replace($content_array[2], $content, $blog_temp);
		// 把替换的内容重新写入文件中
		$fp = @fopen($file_name, 'w');
		if($fp){
			flock($fp, LOCK_SH);
			$result = fwrite($fp, $blog_str);
			
		}
		$lock = flock($fp, LOCK_UN);
		fclose($fp);
		
	}
}
if(strlen($result)>0){
	$ok = true;
	$msg = '日志修改成功，<a href="post.php?entry='.$_GET['entry'].'">查看该日志文章</a>';
}

// 编辑功能实现复习
session_start();
$ok = false; 
if(!isset($_GET['entry'])){
	echo '请求参数错误';
	exit;
}
if(empty($_SESSION['user']) && $_SESSION['user'] != 'aim'){
	echo '请<a href="login.php">登陆</a>后执行该操作。';
}
$path = substr($_GET['entry'], 0,6); // 获取日志存储目录
$entry = substr($_GET['entry'], 7,9); // 获取日志文件
$file_name = 'D:/Workspace/PHP/blog/content'.'/'.$path.'/'.$entry.'.txt';
if(file_exists($file_name)){
	$fp = @fopen($file_name, 'r');
	if($fp){
		flock($fp, LOCK_SH);
		$result = fread($fp, filesize($file_name));
	}
	flock($fp, LOCK_UN);
	fclose($fp);
	
	$content_array = explode('|', $result);
}
if(isset($_POST['title']) && $_POST['content']){
	$title = trim($_POST['title']);
	$content = trim($_POST['content']);
	$date = date("Y-m-d H:i:s", time());
	if(file_exists($file_name)){ // 替代时，采用递进的关系 这个方法实现了时间的及时更新
		$blog_temp = str_replace($content_array[0], $title, $result);
		$blog_str = str_replace($content_array[2], $content, $blog_temp);
		$blog_time = str_replace($content_array[1], $date, $blog_str);
		
		$fp = @fopen($file_name, 'w');
		if($fp){
			flock($fp, LOCK_EX);
			$result = fwrite($fp, $blog_time);
		}
		$lock = flock($fp, LOCK_UN);
		fclose($fp);
	}
}
if(strlen($result> 0)){
	$ok = true;
	$msg = '日志修改成功，<a href="post.php?entry='.$_GET['entry'].'">查看该文章</a>';
}

// 再次复习
session_start();
$ok = false;
if(!isset($_GET['entry'])){
	echo '请求参数错误';
	exit;
}
if(empty($_SESSION['user']) || $_SESSION['user'] != 'aim'){
	echo '请<a href="login.php">登陆</a>后，再执行该操作。';
	exit;
}
$path = substr($_GET['entry'], 0,6); // 获取日志的目录
$entry = substr($_GET['entry'], 7,9); // 获取日志的文件名
$file_name = 'D:/Wokrspace/PHP/blog/content'.'/'.$path.'/'.$entry;
if(file_exists($file_name)){
	$fp = @fopen($file_name, 'r');
	if($fp){
		flock($fp, LOCK_SH);
		$result = fread($fp, filesize($file_name));
	}
	flock($fp, LOCK_UN);
	fclose($fp);
	$content_array = explode('|', $result);
}

// 获取用户编辑后的标题、内容、时间
if(isset($_POST['title']) && $_POST['content']){
	$title = trim($_POST['title']);
	$content = trim($_POST['content']);
	$date = time();
	
	$blog_temp = str_replace($content_array[0], $title, $result);   // 写在哪里都一样，但若是写在判断后面则更为严谨
	$blog_date = str_replace($content_array[1], $date, $blog_temp);
	$blog_str = str_replace($content_array[2], $content, $blog_date);
	// 再次判断是为了写入替代新的内容
	if(file_exists($file_name)){  // 存在是为了打开 打开后要判断是否打开
		$fp = @fopen($file_name, 'w');
		if($fp){
			flock($fp, LOCK_EX);
			$result = fwrite($fp, $blog_str);
		}
		$lock = flock($fp, LOCK_UN);
		fclose($fp);
	}
	
}
if(strlen($result>0)){
	$ok = true; // 该变量为html页面中，做判断准备
	$msg = '日志修改成功，<a href="post.php?entry='.$_GET['entry'].'">查看该日志</a>';
}

// 删除页面功能实现

session_start();
$ok = false;

if(empty($_SESSION['user']) || $_SESSION['user'] != 'aim')
{ // 判断用户是否登陆
	echo '请<a>登陆</a>后执行该操作.';
	exit;
}
if(!isset($_GET['entry']))
{
	if(!isset($_POST['id']))
	{
		$ok = true;
		$msg = '请求参数错误！<a href="index.php">返回首页</a>';
	}
	else
	{
	// 做删除操作
	$path = substr($_POST['id'], 0,6);
	$entry = substr($_POST['id'], 7,9);
	$file_name = 'D:/Workspace/PHP/blog/content'.'/'.$path.'/'.$entry.'.txt';
	if(unlink($file_name)){
		$ok = true;
		$msg ='日志删除成功！<a href="index.php">返回首页</a>';
	}
	else{
		$ok = true;
		$msg ='该日志删除失败！<a href="index.php">返回首页</a>';
	}
  }
}
else
{
	$form_data = '';
	$path = substr($_GET['entry'], 0,6);
	$entry = substr($_GET['entry'], 7,9);
	$file_name = 'D:/Workspace/PHP/blog/content/'.$path.'/'.$entry.'.txt';
	if(file_exists($file_name)){
		$form_data = '<input type="hidden" name="id" value="'.$_GET['entry'].'"/>';
	}
	else{
		$ok = true;
		$msg = '所要删除的日志不存在！<a href="index.php">返回首页</a>';
	}
}

// 再次练习
session_start();
$ok = false;

if(empty($_SESSION['user']) || $_SESSION['user'] != 'aim'){
	echo '请<a>登陆</a>后执行该功能！';
	exit;
}
if(!isset($_GET['entry']))
{
	if(!isset($_POST['id'])){
		$ok = true;
		$msg = '请求参数错误，<a href="index.php">返回首页</a>';
	}
	else
	{
		$path = substr($_GET['entry'], 0,6);
		$entry = substr($_GET['entry'], 7,9);
		$file_name = 'D:/Workspace/PHP/blog/content/'.$path.'/'.$entry.'.txt';
		if(unlink($file_name)){
			$ok = true;
			$msg = '删除日志成功，<a>返回首页</a>';
		}
		else
		{
			$ok = true;
			$msg = '删除日志失败！<a>返回首页</a>';
		}
	}
}
else
{
	$fomr_data = "";
	$path = substr($_GET['entry'], 0,6);
	$entry = substr($_GET['entry'], 7,9);
	$file_name = 'D:/Workspace/PHP/blog/content/'.$path.'/'.$entry.'.txt';
	if(file_exists($file_name)){
		$form_data = '<input type="hidden" name="id" value="'.$_GET['entry'].'"/>'; // 起到删除提示的作用
	}
	else
	{
		$ok = true;
		$msg = '所要删除的文件不存在！<a href="index.php">返回首页</a>';
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>基于文本的简易BLOG</title>
		<link type="text/css" rel="stylesheet" href="style.css"/>
	</head>
	<body>
		<div id="container">
			<div id="head">
				<h1>我的BLOG</h1>
			</div>
			<div id="title">
				---- i have a dream ----
			</div>
			<div id="content">
				<div id="left">
					<div id="blog_entry">
						<div id="blog_title">删除日志</div>
						<div id="blog_body">
							<?php if($ok == false){ ?>
							<form action="delete.php" method="post">
								<font>删除的日志无法恢复，确定要删除吗？</font>
								<input type="submit" value="确定"/>
								<?php echo $form_data; ?>
							</form>
							<?php } ?>
							<?php if($ok == true){ echo $msg;}?>
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
			<div id="footer"></div>
		</div>
	</body>
</html>

<?php 
// 归档显示日志文章程序
$ok = false;
if(!isset($_GET['ym']) || empty($_GET['ym'])){ // 请求参数中的目录信息
	$ok = true;
	$msg = '请求参数错误！<a href="index.php">返回首页</a>';
}
$folder_array = array();
$dir = 'D:/Workspace/PHP/blog/content';
$folder = $_GET['ym'];
if(!is_dir($dir.'/'.$folder)){
	$ok = true;
	$msg = '请求参数错误！<a href="index.php">返回首页</a>';
}
$dh = opendir($dir);
if($dh){
	$filename = readdir($dh);
	while($filename){
		if($filename !='.' && $filename != '..'){
			$folder_name = $filename;
			array_push($folder_array, $folder_name);
		}
		$filename = readdir($dh);
	}
}
rsort($folder_array);
$post_data = array();
$dh = opendir($dir.'/'.$folder);
while(($filename = readdir($dh)) !== FALSE){
	if(is_file($dir.'/'.$folder.'/'.$filename)){
		$file = $filename;
		$file_name = $dir.'/'.$folder.'/'.$file;
		if(file_exists($file_name)){
			$fp = @fopen($file_name, 'r');
			if ($fp){
				flock($fp, LOCK_SH);
				$result = fread($fp, filesize($file_name)); // 读取文件
			}
			flock($fp, LOCK_UN);
			fclose($fp);
		}
		$temp_data = array();
		$content_array = explode('|', $result);
		$temp_data['SUBJECT'] = $content_array[0];
		$temp_data['DATE'] = date('Y-m-d H:i:s', $content_array[1]);
		$temp_data['CONTENT'] = $content_array[2];
		array_push($post_data, $temp_data);
	}
}

// 再次练习

$ok = false;
if(!isset($_GET['ym']) || empty($_GET['ym'])){
	$ok = true;
	$msg = '请求参数错误，<a href="index.php">返回首页</a>';
}

$folder_array = array();
$dir = 'D:/Workspace/PHP/blog/content';
$folder = $_GET['ym'];
if(!is_dir($dir.'/'.$folder)){
	$ok = true;
	$msg = '请求参数错误，<a href="index.php">返回首页</a>';
}
$dh = opendir($dir);
if($dh){
	$filename = readdir($dh);
	while($filename){
		if($filename != '.' && $filename != '..'){
			$folder_name = $filename;
			array_push($folder_array, $folder_name);
		}
		$filename = readdir($dh);
	}
}
rsort($folder_array);
$post_data = array();
$dh = opendir($dir.'/'.$folder);
while(($filename = readdir($dh)) !== FALSE){
	if(is_file($dir.'/'.$folder.'/'.$filename)){
		$file = $filename;
		$file_name = $dir.'/'.$folder.'/'.$file;
		if(file_exists($file_name)){
			$fp = @fopen($file_name, 'r');
			if($fp){
				flock($fp, LOCK_SH);
				$result = fread($fp, filesize($file_name));
			}
			flock($fp, LOCK_UN);
			fclose($fp);
		}
		$content_array = explode('|', $result);
		$temp_data = array();
		$temp_data['SUBJECT'] = $content_array[0];
		$temp_data['DATE'] = date('Y-m-d H:i:s', $content_array[1]);
		$temt_data['CONTENT'] = $content_array[2];
		array_push($post_data, $temp_data);
	}
}

?>
