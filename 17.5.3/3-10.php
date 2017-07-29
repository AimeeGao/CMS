<?php
session_start();
$user = $_POST['user_name'];
if(!empty($user))
{
	$_SESSION['user'] = $user;
	$welcome = "您好".$user."!请录入一下信息后提交。<br/>";
}
$gender = $_POST['gender'];
$age = $_POST['age'];
$blood_type = $_POST['blood_type'];

// 如果当前用户提交了数据，则输出这些数据
if(!empty($gender) && !empty($age) && !empty($blood_type))
{
	echo "性别：".$gender."<br/>";
	echo "年龄：".$age."<br/>";
	echo "血型：".$blood_type."<br/>";
}
// 如果用户没有提交数据，则显示信息录入界面
else{
?>
	
<html>
<head>
	<title>3-9.php 用户信息录入</title>
	<style type="text/css"></style>
</head>
<body>
<?php 
	echo $welcome;
?>
<form name = "info" method = "post" action = "">
	<table border = "0">
		<tr>
			<td>性别：</td>
			<td>
				<input name = "gender" type = "radio" value = "男"/>男
				<input name = "gender" type = "radio" value = "女">女
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
<?php
}
?>