<?php
// 将数据库中的信息，通过HTML页面嵌入PHP代码，显示出来
$host = 'localhost';
$user_name = 'root';
$password = 1346;

$conn = mysql_connect($host,$user_name,$password);
if(!$conn){
	die("数据库连接失败：".mysql_error());
}
mysql_select_db("test");
$sql = "select id,name,age from exercise"; // 出错
$result = mysql_query($sql) OR die("<br/>ERROR：<b>".mysql_error()."</b><br/><br/>有问题的SQL：".$sql);
?>
<html>
<head>
<meta charset="UTF-8"/>
<title>将数据库的信息通过HTML页面显示出来</title>
<script language="javascript"></script>
</head>
<body>
<form>
	<table width="75%" border="0" cellspacing="2" cellpadding="0" bgcolor="#7B7B84">
		<tr bgcolor="#8BBCC7">
			<td height="33"><div align="center"><strong>用户名字</strong></div></td>
			<td height="33"><div align="center"><strong>用户年龄</strong></div></td>
			<td height="33"><div align="center"><strong>操作</strong></div></td>
		</tr>
	<?php 
	if($num = mysql_num_rows($result)){
		while($row = mysql_fetch_array($result,MYSQL_ASSOC)){
	?>
	
		<tr bgcolor="#fff">
			<td height="22" align="right"><?php echo $row['name'];?> &nbsp;</td>
			<td height="22" align="right"><?php echo $row['age'];?> &nbsp;</td>
			<td align="right"><a onclick="javascript:if(confirm('确定要删除用户信息？')) return true; else return false" href="delete_exercise.php?id=<?php echo $row['id']?>">删除</a></td> <!-- 出错 -->
		</tr>
	<?php 
		}
		
		mysql_close($conn);
	}
	
	?>
	</table>
</form>
</body>
</html>



		
	


