<?php
session_start();
// 调用session函数
$user = $_POST['user_name'];
if(!empty($user)) // empty — 检查一个变量是否为空 
{
	$_SESSION['user'] = $user;
	$welcome = "您好,".$user."!请录入一下信息后提交。<br/>";
}
?>
<!DOCTYPE html5>
<html>
<head>
	<title>3-9.php用户信息录入</title>
</head>

<body>
<?php 
	echo $welcome;
?>
<form name = "info" action="" method = "post">
	<table border= "0">
		<tr>
			<td>性别：</td>
			<td>
				<input type = "radio" name = "gender" value = "男"/> 男
				<input type = "radio" name = "gender" value = "女"/>	女
						
			</td>		
		</tr>
		<tr>
			<td>年龄：</td>
			<td>
				<input name = "age" type = "input" size = "3"/>
			</td>
		</tr>
		
		<tr>
			<td>血型：</td>
			<td>
				<select name = "blood_type">
					<option value = "A">A型</option>
					<option value = "B">B型</option>
					<option value = "O">O型</option>
					<option value = "AB">AB型</option>
					<option value = "其他">其他血型</option>
				</select>
			</td>		
		</tr>
		<tr>
			<td>
				<input type = "submit" value = "提交"/>
			</td>
		</tr>
	</table>
</form>
</body>
</html>

<!--  
	1-10行php代码。通过4行的$_POST['user_name']来获取用户输入的姓名，然后通过7行的$_SESSION['user']保存住该用户名
	当用户输入用户名并提交后，页面跳转到第二个页面，显示问候语，和信息录入界面
	对3-9加入表单数据是否提交的验证判断，实现完整功能

-->