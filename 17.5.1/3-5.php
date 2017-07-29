<?php
session_start();
echo $_SESSION['user']."<br/>";
echo $_SESSION['explain']."<br/>";
echo '<a href="3-4.php">返回3-4.php</a>';
// 3-4行读取、输出之前3-4.php注册的session变量 
// 程序3-5.php通过session取得了3-4.php中注册的session变量，实现了数据的跨页面传递
// 该功能的实现要基于客户端浏览器支持cookie. cookie是由服务器端产生的并保存在客户端的一些文件，里面存放了一些用户信息和数据
// php的session机制是通过cookie实现的 若浏览器不支持cookie，则上述的示例程序就无法看到预期的效果