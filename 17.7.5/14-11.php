<?php
// 显示用户信息的页面
$host = 'localhost';
$user_name = 'root';
$password = 1346;

// 页面中的城市列表将由数组生成

$arr_city = array
	(
		'Beijing'=>'北京',
		'NewYork'=>'纽约',
		'Paris'=>'巴黎',
		'London'=>'伦敦',
		'Rome'=>'罗马'
	);

$conn = mysql_connect($host,$user_name,$password);
if(!$conn){
	die("连接数据库失败：".mysql_error());
}
mysql_select_db('test');

if(!isset($_GET['uid'])){  // 获取所要显示数据的用户的id
	echo '参数错误！';
	exit;
}

$id = $_GET['uid'];
$sql = "select * from users where id=$id";
$result = mysql_query($sql) OR die("<br/>ERROR:<b>".mysql_error()."</b><br/><br/>有问题的SQL：".$sql);
if(!mysql_num_rows($result)){ // 获取用户记录
	echo '用户ID错误！';
	exit;
}
$row = mysql_fetch_array($result);

$name = $_POST['user_name'];
$city = $_POST['city'];

if(!empty($name) || trim($name) != ''){ // 当页面有POST数据传入时，则修改数据库数据
	$sql = "update users set name='".$name."',city='".$city."'where id= $id";
	mysql_query($sql) OR die("<br/>ERROR:<b>".mysql_error()."</b><br/><br/>有问题的SQL：".$sql);
	mysql_close($conn);
	echo '数据修改成功，<a href="14-7.php">查看数据</a>';
	exit;
}
?>
<html>
<head>
<meta charset="UTF-8"/>
<title>14-11.php</title>
</head>

<body>
<b>修改用户信息</b>
<form name="form" method="post" action="14-11.php?uid=<?php echo $id;?>">
<table width="75%" border="0" cellspacing="1" cellpadding="0" >
	<tr>
		<td width="24%" height="29">用户名：</td>
		<td width="76%"><input name="user_name" type="text" id="user_name" size="20" value="<?php echo $row['name'];?>" /></td>
		
	</tr>
	<tr>
		<td height="25">来自城市：</td>
		<td>
			<select name="city">
				<?php 
				 // 通过数组循环、生成页面上城市选项的下拉列表
				 foreach ($arr_city as $k=>$v)
				 {
				 	// 这里根据字段的值和数组中的索引值，使用三目运算符 ? :做用户来自哪个城市的判断，
				 	// 如果city字段的值和数组循环中的某个城市的索引值相等，则将用户的城市在下拉列表中选中
				 	$option = ($row['city'] == $k) ? '<option value="'.$k.'" selected>' .$v.'</option>': '<option value="'.$k.'">'.$v.'</option>';
				 	echo $option.'\n';
				 }
				
				?>
			</select>
		</td>
	</tr>
	
<!-- 	<tr> -->
<!-- 		<td>注册时间：</td> -->
<!--  		<td><?php echo $row['created_time'];?></td>-->
<!-- 	</tr> -->
		<tr>
			<td height="31">
				<input type="submit" name="Submit" value="修改"/>
			</td>
		</tr>
	
</table>
</form>
</body>
</html>