<?php
$host = 'localhost';  // 定义服务器
$user_name = 'root';  // 定义用户名
$password = 1346;     // 定义密码
$conn = mysql_connect($host,$user_name,$password);  // 连接MySQL
if(!$conn){
	die("连接数据库失败：".mysql_error());
}
mysql_select_db('test');  // 选择数据库
if(isset($_GET['page'])){  // 由GET方法获得当前页数
	$page = $_GET['page'];
}
else
{
	$page = 1;
}
$page_size = 2;   // 每页显示两条数据

// 获取数据总量

$sql = 'select * from users';
$result = mysql_query($sql);  // 执行SQL语句
$total = mysql_num_rows($result);  // 获得总的记录数目

// 开始计算总页数
if($total){
	// 如果总数据量小于$page_size,那么只有一页
	if($total < $page_size){
		$page_count = 1;
	}	
	// 如果有余数，则总页数等于总记录数除以每页显示的数的结果取整再加1
	if($total % $page_size){
		$page_count = (int)($total/$page_size) + 1;
	}
	// 如果没有余数，则页数等于总记录数除以每页显示的数的结果
	else{
		$page_count = $total / $page_size;
	}
}
else{
	$page_count = 0;
}

// 翻页链接
$turn_page = '';
if($page == 1){
	$turn_page .= '首页 | 上一页|';
}
else{
	$turn_page .= '<a href=14-8.php?page=1>首页</a> | <a href=14-8.php?page='.($page-1).'>上一页</a>|';
}
if($page == $page_count || $page_count == 0){
	$turn_page .= '下一页 | 尾页';
}
else{
	$turn_page .= '<a href=14-8.php?page='.($page+1).'>下一页</a>|<a href= 14-8.php?page='.$page_count.'>尾页</a>';
}

$sql = 'select id,name,city from users limit'.($page-1) * $page_size.','.$page_size;
 $result = mysql_query($sql) OR die("<br/>ERROR:<b>".mysql_error()."</b><br/>产生问题的SQL：".$sql);
?>
<html>
<head>
	<meta charset="UTF-8"/>
	<title>分页显示数据</title>
</head>
<body>
<form>
<table width="75%" border="0" cellspacing="1" cellpadding="0" bgcolor="#7B7B84">
	<tr bgcolor="#8BBCC7">
		<td height='33'><div align="center"><strong>用户ID</strong></div></td>
		<td><div align="center"><strong>用户名称</strong></div></td>
		<td><div align="center"><strong>来自城市</strong></div></td>
	</tr>
	
	<?php 
		if($num = mysql_num_rows($result)){
			while($row = mysql_fetch_array($result,MYSQL_ASSOC)){
				?>
				<tr bgcolor="#FFF">
					<td height="22" align="right"><?php echo $row['id']?>&nbsp;</td>
					<td align="right"><?php echo $row['name']?> &nbsp;</td>
					<td align="right"><?php echo $row['city']?> &nbsp;</td>
				</tr>
				<?php 
			}
		}
		echo $turn_page;  // 将分页字符串输出
		mysql_close($conn);
		?>
</table>
</form>
</body>
</html>


