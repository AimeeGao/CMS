<?php

$int2 =2;

function fun1(){
	$int = 1;
	echo "$int<br>";
}
fun1();
echo "$int2<br>";

echo "===========";
echo "<br/>";

$score = 73;
if($score >=80){
	echo "成绩优秀<br/>";
}
else if($score >=60){
	echo "及格了<br/>";
}else if
($score>=30){
	echo "没有通过考试！<br/>";
}
else{
	echo "成绩有误";
}