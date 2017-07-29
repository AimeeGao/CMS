
<?php
/*$str = <<<Heredoc
  <h2>第一次</h2>成功配置<font style: color="red";>php</font>搭建环境
Heredoc;
echo $str;
*/
/*$name = "aimee";
echo $name; 
*/



$name = "<font size=7 color=red>周更生</font>";
$str = <<<doc
<h2>Heredoc长文本处理</h2>
PHP文件<b>的扩展</b>名：.php<br>
PHP的程序语句必须以分号结束(;)，JS中的结束分号可有可无。<br />
PHP访问的路径上不能出现{$name}中文字符；
asdaskdada
………………
doc;
echo $str;

$age = 11;
$str1 = <<<doc
<h2>我的年龄</h2>
php文件的年龄长达{$age}岁;
doc;
echo $str1;

?>
