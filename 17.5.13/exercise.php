<?php
// echo "第一题：计算自己的年龄，用当前日期减去你的生日";
// echo "<br/>";
// $day = 5;
// $month = 10;
// $year = 1995;
// $national_unix = mktime(0,0,0,$month,$day,$year);
// $now_unix = time();
// $national_time = $now_unix - $national_unix;
// $national_day_year = floor($national_time/365*60*60*24);
// echo $national_day_year; // 输出值的单位是天数

echo "第二题：判断拥护输入的是否是正确的日期";
$da = $_POST["mydate"];
if(checkdate(substr($da,6,2), substr($da,4,2),substr($da,0,4)))
{
	echo $da."是一个正确的日期格式";
}else{
	echo "这不是一个正确的日期格式";
}
// 第二题做法奇怪