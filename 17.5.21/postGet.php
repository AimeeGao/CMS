 <?php
// $name = $_GET['name'];
// var_dump($name);
// $pass = $_GET['pass'];
// echo "<br/>";
// echo 'pass='.$pass;
// echo '<hr>';
 ?>
<form method="post" name="form" action="postGet.php">
  <table >
  	<tr>
  	 <td>用户名：</td>
  	 <td><input type="text" name="username"/></td>
  	</tr>
  	<tr>
  	 <td>密码：</td>
  	 <td><input type="password" name="psw"/></td>
  	</tr>
  	<tr>
  	 <td><input type="submit" name="Submit" value="提交"/></td>
  	</tr>
  </table>
</form>

 <?php 
	$username = $_POST['username'];
	echo "用户名：".$username;
	echo "<br/>";
	$password = $_POST['psw'];
	echo "密码：".$password;
// 	echo $_SERVER['HTTP_HOST'];
?>
