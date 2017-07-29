<?php
session_start();
$user = $_POST['user_name'];
if(!empty($user))
{
	$_SESSION['user'] = $user;
	$welcome = "您好,".$user."!请录入以下信息进行登陆。<br/>";
}
$psw = $_POST['psw'];
if(!empty($user) && !empty($psw))
{
	echo "用户名：".$user."<br/>";
	echo "密码：".$psw."<br/>";
}
else{
?>
<!DOCTYPE html5>
<html>
<head>
	<title>显示用户原来录入的信息</title>
</head>
<body>
	<?php 
		echo $welcome;
	?>
	<form name= "info" method= "post">
		<table>
			<tr>
				<td>用户名：</td>
				<td>
					<input type= "text" name= "user_name"/>
				</td>
			</tr>
			<tr>
				<td>密码：</td>
				<td>
					<input type= "password" name= "psw"/>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>
<?php 
}
?>