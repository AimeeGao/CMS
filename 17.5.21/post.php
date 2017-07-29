<?php
// 处理由URL传入的字符串参数
if(!isset($_GET['entry'])){
	echo '请求参数错误';
	exit;
}
$path = substr($_GET['entry'], 0,6); // 获取日志的存储目录
$entry = substr($_GET['entry'], 7,9); // 获取日志的文件名
$file_name = 'D:/workspace/PHP/blog/content/'.$path.'/'.$entry.'.txt'; // 拼接出完整的日志路径
if(file_exists($file_name)){ // 打开文件前需要判断文件是否存在 file_exists() 检查文件或路径是否存在
	$fp = fopen($file_name, 'r'); // 以只读方式打开路径下的文件
	if($fp){ // 如果文件存在
		flock($fp, LOCK_SH); // 文件加锁
		$result = fread($fp, 1024); // 读出加锁后的文件内容
	}
	flock($fp, LOCK_UN); // 文件解锁
	fclose($fp);
}
// 将字符串$result的内容按'|'分割后存入数组$content_array 该步骤是实现数据传输获取的重点！！！ 一定要深刻理解
$content_array = explode("|", $result); 
// 输出日志内容
// echo '<h1>我的BLOG</h1>';
// echo '<b>日志标题：<b/>'.$content_array[0];
// echo '<br/><b>发布时间：</b>'.date('Y-m-d H:i:s',$content_array[1]);
// echo '<hr>';
// echo $content_array[2];
//从文件中获取blog内容的基本功能已实现
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>基于文本的BLOG</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<body>
<div id="container">
    <div id="header">
        <h1>我的BLOG</h1>
    </div>
</div>
<div id="title">
    ---- I have a dream ----
</div>
<div id="content">
    <div id="left">
        <div id="blog_entry">
            <div id="blog_title">
                日志标题：<?php echo $content_array[0]?>
            </div>
            <div id="blog_body">
            <div id="blog_date">发布时间：<?php echo date('Y-m-d H:i:s',$content_array[1]); ?>  </div>
                <form action="add.php" method="post" name="form">
                    <table>
<!--                         <tr><td>日志标题：</td></tr> -->
<!--                         <tr><td><input type="text" size="50" name="title"/></td></tr> -->
<!--                         <tr><td>日志内容：</td></tr> -->
<!--                         <tr><td><textarea name="content"  cols="50" rows="10"></textarea></td></tr> -->
<!--                         <tr><td><input type='submit' name="Submit" value="提交"/></td></tr> -->
						<div><?php echo '日志内容：'.$content_array[2];?></div>
						<br/>
						<?php echo '<a href="index.php">返回首页</a>';?>
                    </table>
                </form>
            </div>
        </div>
    </div>
    <div id="right">
        <div id="sidebar">
            <div id="menu_title">关于我</div>
            <div id="menu_body">我是个php爱好者</div>
        </div>
    </div>
</div>
<div id="footer">
    CopyRight 2011-2017
</div>
</body>
</html>