<?php
$login = false; // 设置一个存储变量
session_start();

if(!empty($_SESSION['user']) && $_SESSION['user'] == 'aim'){ // 判断用户是否登陆
	$login = true;
	
	$file_array = array(); // 文件数组
	$folder_array = array(); // 目录数组
	
	$dir = 'D:/Workspace/PHP/blog/content'; 
	$dh = opendir($dir); // 目录句柄 $dh 文件句柄 $fp 打开保存日志的目录 

	if($dh){
		$filename = readdir($dh); // 读取目录下的文件
		while($filename){ // 循环处理按年月归档的日志文章
			if($filename != '.' && $filename != ".."){
				$folder_name = $filename;
				array_push($folder_array, $folder_name); // 各个年月的目录文件夹 组成的数组集合
			}
			$filename = readdir($dh);
		}
	}
	rsort($folder_array);  // 对目录排序
	$post_data = array();  // 新建了一个数组
	foreach ($folder_array as $folder){
		$dh = opendir($dir.'/'.$folder); // 打开D盘下各个年月的目录文件
		while(($filename = readdir($dh)) !== FALSE){ // readdir 返回目录中下一个文件的文件名
			if(is_file($dir.'/'.$folder.'/'.$filename)){ // 判断是否是文件
				$file = $filename;
				$file_name = $dir.'/'.$folder.'/'.$file;
				
				if(file_exists($file_name)){
					$fp = @fopen($file_name, 'r');  // 添加@是为了隐藏错误输出
					if($fp){
						flock($fp, LOCK_SH);
						$result = fread($fp, filesize($file_name)); // 读取文件内容 filesize() 函数返回指定文件的大小。
						// 若成功，则返回文件大小的字节数。若失败，则返回 false 并生成一条 E_WARNING 级的错误。
					}
					flock($fp, LOCK_UN);
					fclose($fp);
				}
				
				$temp_data = array(); // 暂时存放数据的数组
				$content_array = explode('|', $result); // 数组内容按一定分割方式后组成的集合
				$temp_data['SUBJECT'] = $content_array[0]; // 文章标题
				$temp_data['DATE'] = date('Y-m-d H:i:s',$content_array[1]); // 发表时间
				$temp_data['CONTENT'] = $content_array[2]; // 文章内容
				$file = substr($file, 0,9); // 日志文章所在文件夹名
				$temp_data['FILENAME'] = $folder.'-'.$file;
				array_push($post_data, $temp_data);
				
			}
		}
	}
}
else{
	header('location:index-next.php');
	
}
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>基于文本的简易BLOG</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<div id="container">
<div id="header">
    <h1>我的BLOG</h1>
</div>
<div id="title">
    ---- I have a dream ----
</div>
<div id="content">
    <div id="left"> <!-- 需要加一个判断显示不同的页面 现在的页面不科学 -->
    <!-- 满足这一段的要求是用户登录 若用户没有登陆应显示正常页面 -->
    <?php 
    foreach ($post_data as $post)
    { // 显示所有日志文章
    ?>
    
    		<div id="blog_entry">
            <div id="blog_title"><?php echo $post['SUBJECT']; ?></div>
            <div id="blog_body">
                <div id="blog_date"><?php echo $post['DATE']; ?></div>
                <?php echo $post['CONTENT']; ?>
            <div>
            	<?php 
            	if($login){
            		echo '<a href= "edit.php?entry='.$post['FILENAME'].'">编辑</a> &nbsp; <a href="delete.php?entry='.$post['FILENAME'].'">删除</a>';  
            	} // 输出日志文章的“编辑”和“删除”链接
            	?>
            </div>
            </div>
         </div>
         <?php } ?>
    </div>
    <div id="right">
        <div id="sidebar">
            <div id="menu_title">关于我</div>
            <div id="menu_body">
            	我是个PHP爱好者
            	<br/><br/>
				<?php 
					if($login){
					echo '<a href="logout.php">退出</a>';
				}else{
					echo '<a href="login.php">登陆</a>';
				}
				?>            
            </div>
        </div>
        <br/>
        <div id="sidebar">
            <div id="menu_title">日志归档</div>
            <?php 
            	foreach ($folder_array as $ym){ // 输出日志按年月的归档
            		$entry = $ym;
            		$ym = substr($ym, 0,4).'-'.substr($ym, 4,2);
            		echo '<div id=menu_body><a href="archives.php?ym='.$entry.'">'.$ym.'</a></div>';
            	}
            ?>

        </div>
        <br/>
        <div id="sidebar">
            <div id="menu_title">添加日志</div>
            <div id="menu_body">
            	<?php echo '<a href="add.php">添加日志</a>'?>
            </div>
            

        </div>
    </div>
</div>
<div id="footer">
    CopyRight 2011-2017
</div>
</div>
</body>
</html>

