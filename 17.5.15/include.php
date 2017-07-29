<?php
include ("test.php");
echo $str;
echo "<br/>";
echo "<br/>";
$area = cal_area($rad);
echo "在test.php中计算半径为".$rad."圆面积是：".$area;
/* 代码首先使用include()语句，将先前创建额文件test.php包含在当前程序include.php中
 * 此时，在test.php中定义的变量、函数都将在include.php中生效。但这些变量和函数的作用域是全局的
 * */