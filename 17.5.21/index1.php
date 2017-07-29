<?php
// *********************  练习      *********************
// $login = false;
// session_start();

// if(!empty($_SESSION['user']) && $_SESSION['user'] == 'admin'){ // 这个地方的用户名应该如何设置以使得所有注册的用户都可以登陆？
// 	$login = true;
	
// 	$file_array = array(); // 文件数组
// 	$folder_array = array(); // 目录数组
	
// 	$dir = 'D:/Workspace/PHP/blog/content';
// 	$dh = opendir($dir);
	
// 	if($dh){
// 		$filename = readdir($dh); // 读取目录下的文件
		
// 		while ($filename){ // 循环 201706 类似文件
// 			if($filename != '.' && $filename != '..'){ // 略过linux系统
// 				$folder_name = $filename;
// 				array_push($folder_array, $folder_name);
// 			}
// 			$filename = readdir($dh);
// 		}
// 	}
// 	rsort($folder_array); // 对目录排序
// 	$post_data = array();
// 	foreach ($folder_array as $folder){
// 		$dh = opendir($dir.'/'.$folder); // $dh的文件位置已经改变
// 		while (($filename = readdir($dh)) !== FALSE){ 
// 			if(is_file($dir.'/'.$folder.'/'.$filename)){
// 				$file = $filename;
// 				$file_name = $dir.'/'.$folder.'/'.$file;
				
// 				if(file_exists($file_name)){
// 					$fp = @fopen($file_name, 'r');
// 					if($fp){
// 						flock($fp, LOCK_SH);
// 						$result = fread($fp, filesize($file_name));
// 					}
// 					flock($fp, LOCK_UN);
// 					fclose($fp);
// 				}
// 				$temp_data = array();
// 				$content_array = explode('|', $result);
				
// 				$temp_data['SUBJECT'] = $content_array[0];
// 				$temp_data['DATE'] = date('Y-m-d H:i:s',$content_array[1]);
// 				$temp_data['CONTENT'] = $content_array[2];
// 				$file = substr($file, 0,9);
// 				$temp_data['FILENAME'] = $folder.'-'.$file;
// 				array_push($post_data, $temp_data);
// 			}
// 		}
// 	}
// }

// // 对首页功能的复习 index.php
// // 首页是基于登陆与否来进行判断页面的展示情况 故先设置一个登陆变量
// // 并且因为登陆页面已设置了$_SESSION变量，故首页通过$_SESSION的存储值来判断用户是否已经登陆过
// $login = false;
// session_start(); // 开启session_start功能

// if(!empty($_SESSION['user']) && $_SESSION['user'] == 'aim')
// { 
// 	$login = true;
	
// 	// 准备工作 新建一个文件数组和目录数组
// 	$file_array = array();
// 	$folder_array = array();
	
// 	// 打开文件所在目录
// 	$dir = "D:/Workspace/PHP/blog/content";
// 	$dh = opendir($dir); // $dh 打开目录句柄
	
// 	if($dh)
// 	{
// 		$filename = readdir($dh); // 读取该目录下的文件
// 		while ($filename)
// 		{ // 循环处理按年月归档的日志文章
// 			if($filename != '.' && $filename != '..') // ??? 打开目录 列出目录中的所有文件并去掉 . 和 .. 
// 			{
// 				$folder_name = $filename;
// 				array_push($folder_array, $folder_name);
// 			}
// 			$filename = readdir($dh); // 这句话重复执行的意义 不仅仅有一个年月文件 此处应该是循环跳出的条件
// 		}
// 	}
// 	rsort($folder_array);
// 	// 以上是对年月文件的处理
	
// 	$post_data = array();
// 	foreach ($folder_array as $folder)
// 	{
// 		$dh = opendir($dir.'/'.$folder);
// 		while(($filename = readdir($dh)) !== FALSE)
// 		{
// 			if(is_file($dir.'/'.$folder.'/'.$filename))
// 			{
// 				$file = $filename; // 02-190805
// 				$file_name = $dir.'/'.$folder.'/'.$file;
				
// 				if(file_exists($file_name))
// 				{
// 					$fp = @fopen($file_name, 'r');
// 					if($fp)
// 					{
// 						flock($fp, LOCK_SH);
// 						$result = fread($fp, filesize($file_name)); // 读取文件内容
// 					}
// 					flock($fp, LOCK_UN);
// 					fclose($fp);
// 				}
// 				// 以上是对天时分秒文件的处理 
				
// 				$temp_data= array();
// 				$content_array = explode('|', $result);
				
// 				$temp_data['SUBJECT'] = $content_array[0];
// 				$temp_data['DATE'] = date('Y-m-d H:i:s',$content_array[1]);
// 				$temp_data['CONTENT'] = $content_array[2];
// 				$file = substr($file, 0,9);
// 				$temp_data['FILENAME'] = $folder.'-'.$file;
// 				array_push($post_data, $temp_data);
// 			}
// 		}
// 	}
// }

// // 首页功能 共有三： 1.列出所有日志文章 2.对日志文章按年月归档 3.根据用户登录与否显示不同链接
// $login = false;
// session_start();
// if(!empty($_SESSION['user']) && $_SESSION['user'] == 'aim'){
// 	$login = true;
	
// 	$file_array = array();
// 	$folder_array = array();
	
// 	$dir = 'D:/Workspace/PHP/blog/content';
// 	$dh = opendir($dir);
	
// 	if($dh)
// 	{
// 		while($filename = readdir($dh) !== FALSE){
// 			if($filename != '.' && $filename != '..'){
// 				$folder_name = $filename;
// 				array_push($folder_array, $folder_name);
// 			}
// 			$filename = readdir($dh); // 此处应该没必要了 因为$filename的值写在一个循环内部
// 		}
// 	}
// 	rsort($folder_array); // 对年月文件夹排序
	
// 	// 对年月文件夹下的文件进行处理
// 	$post_data = array();
// 	foreach ($folder_array as $folder){
// 		$dh =  opendir($dir.'/'.$folder); // 打开循环模式下各个年月文件夹 为循环文件做准备
// 		while(($filename = readdir($dh)) !== FALSE){ // 读取文件
// 			// 判断读取的文件是否是文件格式
// 			if(is_file($dir.'/'.$folder.'/'.$filename)){
// 				$file = $filename;
// 				$file_name = $dir.'/'.$folder.'/'.$file;
// 				// 判断文件或文件路径是否存在
// 				if(file_exists($file_name)){ // 为啥用 $file_name 而不用 $file？？
// 					$fp = @fopen($file_name, 'r');
// 					if($fp){
// 						flock($fp, LOCK_SH);
// 						$result = fread($fp, filesize($file_name));
// 					}
// 					flock($fp, LOCK_UN);
// 					fclose($fp);
// 				}
// 				$temp_data = array();
// 				$content_array = explode('|', $result);
// 				$temp_data['SUBJECT'] = $content_array[0];
// 				$temp_data['DATE'] = date('Y-m-d H:i:s',$content_array[1]);
// 				$temp_data['CONTENT'] = $content_array[2];
// 				$file = substr($file, 0,9);                  //1 不懂
// 				$temp_data['FILENAME'] = $folder.'/'.$file;  //2
// 				array_push($post_data, $temp_data);          //3 
// 			}
// 		}
// 	}
// }
?>
<?php 
$login = false;
session_start(); 

if(!empty($_SESSION['user']) && $_SESSION['user'] == 'aim'){
	$login = true;
	
	$file_array = array();
	$folder_array = array();
	
	$dir = "D:/Workspace/PHP/blog/content";
	$dh = opendir($dir);
	
// 	if($dh)
// 	{
// 		$filename = readdir($dh);
// 		while($filename)
// 		{
// 			if($filename != '.' && $filename != '..'){
// 				$folder_name = $filename;
// 				array_push($folder_array, $folder_name);
// 			}
// 			$filename = readdir($dh);
// 		}
// 	}
	if($dh)
	{
		while (($filename = readdir($dh)) !== FALSE){
			if($filename != '.' && $filename != '..'){
				$folder_name = $filename;
				array_push($folder_array, $folder_name);
			}
		}
	}
	rsort($folder_array);
	$post_data = array();
	foreach ($folder_array as $folder){
		$dh = opendir($dir.'/'.$folder);
		while(($filename = readdir($dh)) !== FALSE){  // bug 要么整体括号少一个 要么逻辑出错
			if(is_file($dir.'/'.$folder.'/'.$filename))
			{ // 判断是否是文件
				$file = $filename;
				$file_name = $dir.'/'.$folder.'/'.$file;
				
				if(file_exists($file_name))
				{
					$fp = @fopen($file_name, 'r');
					if($fp)
					{
						flock($fp, LOCK_SH);
						$result = fread($fp, filesize($file_name));
					}
					flock($fp, LOCK_UN);
					fclose($fp);
				}
				
				$temp_data = array();
				$content_array = explode('|', $result);
				$temp_data['SUBJECT'] = $content_array[0];
				$temp_data['DATE'] = date('Y-m-d H:i:s', $content_array[1]);
				$temp_data['CONTENT'] = $content_array[2];
				$file = substr($file, 0,9);
				$temp_data['FILENAME'] = $folder.'-'.$file; // 不包含.txt格式
				array_push($post_data, $temp_data);
			
			}
			
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>基于文本的简易BLOG</title>
	<link rel = "stylesheet" type="text/css" href="style.css" />
</head>
<body>
 <div id ="container">
 	<div id="header">
 		<h1>我的BLOG</h1>
 	</div>
 	<div id="title">
 		---- I Have a Dream ----
 	</div>
 	<div id="content">
 		<div id="left">
 		<?php 
 		foreach ($post_data as $post)
 		{	// 显示所有日志文章 
 		?> 
 		
 			<div id="blog_entry">
 				<div id="blog_title"><?php echo $post['SUBJECT']; ?></div>
 				<div id="blog_body">
 					<div id="blog_date"><?php echo $post['DATE']; ?></div>
 					<?php echo $post['CONTENT']; ?>
 				<div>
 						<?php 
 						if($login)
 							{
 				echo '<a href="edit.php?entry='.$post['FILENAME'].'">编辑</a> &nbsp; 
 				<a href="delete.php?entry='.$post['FILENAME'].'">删除</a>';
 						// 注意这段代码的编写方式
 							}
 						?>	
 					</div>
 				</div> <!-- blog_body-->
 			</div><!-- blog_entry -->
 			<?php }?>
 		</div>
 		<div id="right">
 			<div id=sidebar>
 				<div id="menu_title">关于我</div>
 				<div id="menu_body">
 				我是个PHP爱好者
 				<br/><br/>
 				<?php 
 					if($login)
 					{
 						echo '<a href="logout.php">退出</a>';
 					}
 					else
 					{
 						echo '<a href="login.php">登陆</a>';
 					}
 				?>
 				</div>
 			</div>
 			<br/>
 			<div id="sidebar">
 				<div id="menu_title">日志归档</div>
 				<?php 
 					foreach($folder_array as $ym){
 						$entry = $ym;
 						$ym = substr($ym, 0,4).'-'.substr($ym, 4,2); // 2011-12
 						echo '<div id="menu_body"><a href="archives.php?entry='.$entry.'">'.$ym.'</a></div>';
 					}
 				?>
 			</div>
 		</div>
 	</div>
 	<div id="footer">
 		copyright 2011-2017
 	</div>
 </div>
</body>
</html>