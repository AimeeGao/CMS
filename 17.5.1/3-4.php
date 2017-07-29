<?php
session_start();  // 使用session前必须调用该函数 即第一个输出语句
$_SESSION['user'] = 'KingKong'; // 注册一个session变量，变量值为'KingKong'
$_SESSION['explain'] = '这是3-4.php的session变量'; 
echo '这个页面已经通过session保存了一些变量'; 
echo '<br/><a href = "3-5.php">进入3-5.php</a>查看这些变量值';
// 3-4行注册了两个session变量