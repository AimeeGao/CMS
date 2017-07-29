<?php
// 1.设置一个cookie来保存登陆的用户名和密码并输出
setcookie("username","aimme");
setcookie("password",'123456');
echo "用户名为：".$_COOKIE["username"]."<br/>";
echo "密码为：".$_COOKIE["password"]."<br/>";

// 2.保存两个cookie，用户名和密码，设置其中一个“用户名”，有效期到2012年1月1日，另一个密码，在关闭浏览器时即刻失效
setcookie("username","aim",mktime(0,0,0,1,1,2012));
setcookie('password','123',0);
echo 'username:'.$_COOKIE["username"].'<br/>';
echo 'password:'.$_COOKIE["password"].'<br/>';