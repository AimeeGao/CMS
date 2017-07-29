<?php
// 首页 根据登陆与否（session记录）显示不同的页面 实现显示日志文章、完整日志归档、对日志进行编辑、删除的三项功能
$login = false; // 重要 为后来页面中插入的php代码做登陆判断基础
session_start();

if(!empty($_SESSION['user']) && $_SESSION['user'] == 'aim')
{
	$login = true;
	
	$file_array = array();
	$folder_array = array();
	
	$dir = "D:/Workspace/PHP/blog/content";
	$dh = opendir($dir);
	
	if($dh)
	{
		while(($filename = readdir($dh)) !==FALSE){
			if($filename != '.' && $filename != '..'){
				$folder_name = $filename;
				array_push($folder_array, $folder_name);
			}
		}
	}
	rsort($folder_array);
	
	$post_data = array(); // 存储显示日志内容的数组
	foreach ($folder_array as $folder){
		$dh = opendir($dir.'/'.$folder);
		if($dh){
			while(($filename = readdir($dh)) !== FALSE){
				if(is_file($dir.'/'.$folder.'/'.$filename)){
					$file = $filename;
					$file_name = $dir.'/'.$folder.'/'.$file;
					
					if(file_exists($file_name)){
						$fp = @fopen($file_name, r);
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
					$temp_data['DATE'] = date('Y-m-d H:i:s',$content_array[1]);
					$temp_data['CONTENT'] = $content_array[2];
					$file = substr($file, 0,9); // 文件名
					$temp_data['FILENAME'] = $folder.'-'.$file; // 注意这里的文件表达格式 2011-02-215307
					array_push($post_data, $temp_data);
				}
			}
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"/>
	<title>基于文本的简易blog</title>
	<link type="text/css" rel="stylesheet" href="style.css" />
</head>
<body>
	<div id="container">
		<div id="header">
			<h1>我的BLOG</h1>
		</div>
		
		<div id="title">
			---- I have a Dream ----
		</div>
		<div id="content">
			<div id="left">
			<?php 
				foreach ($post_data as $post)
				{
			?>
				<div id="blog_entry">
					<div id="blog_title"><?php echo $post['SUBJECT']; ?></div>
					<div id="blog_body">
						<div id="blog_date"><?php echo $post['DATE']; ?></div>
						<div id="blog_content"><?php echo $post['CONTENT']; ?></div>
						<div>
							<?php 
								if($login)
								{
									echo '<a href="edit.php?entry='.$post['FILENAME'].'">编辑</a> |
									<a href="delete.php?entry='.$post['FILENAME'].'">删除</a>';
								}
							?>
						</div>
					</div>
				</div>
			<?php 
				}
			?>
			</div>
			<div id="right">
				<div id="sidebar">
					<div id="menu_title">关于我</div>
					<div id="menu_body">我是一个php爱好者</div>
					<br/>
					<?php 
						if($login){
							echo '<a href="logout.php">退出</a>';
						}
						else{
							echo '<a href="login.php">登陆</a>';
						}
					?>
				</div>
				<br/>
				<div id="sidebar">
					<div id="menu_title">日志归档</div>
					<?php 
						foreach ($folder_array as $ym){
							$entry = $ym;
							$ym = substr($ym, 0,4).'-'.substr($ym, 4,2);
							echo '<div id="menu_body"><a href="archives.php?ym='.$entry.'">'.$ym.'</a></div>';
						}
					?>				
				</div>
			</div>
		</div>
		<div id="footer">
			2011-2017
		</div>
		
	</div>
</body>
</html>



