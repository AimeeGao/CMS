<?php
$user_name = $_POST["user_name"];
$gender = $_POST["gender"];
$hobby = $_POST["hobby"][0]."、".$_POST["hobby"][1]."、".$_POST["hobby"][2]."、".$_POST["hobby"][3];
$prof = $_POST["occup"];

// 当用户名为空，即没有输入用户名时，则输出一个提示信息，并中断程序的执行
if($user_name == "")
{
	echo "请输入用户名！";
	exit; // exit语句将使程序立即中断，不再向下执行
}

if($gender == "")
{
	echo "请选择性别！";
	exit;
	
}

if($hobby == "")
{
	echo "请选择兴趣与爱好！";
	exit;
}
echo "用户名：".$user_name."<br/>";
echo "性别：".$gender."<br/>";
echo "爱好：".$hobby."<br/>";
echo "职业：".$prof."<br/>";

// 1.首先获取表单传过来的数据 2.然后通过if语句来判断数据是否为空，若为空，通过echo给出提示，并调用exit退出程序。
// 实际上数据的验证情况要复杂很多，这只是一个简单的验证数据是否为空的例子。