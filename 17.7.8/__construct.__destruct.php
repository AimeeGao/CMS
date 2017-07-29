<?php
// 使用构造函数和析构函数
class Cat
{
	private $name;     // 私有成员变量$name
	function __construct()  // 构造函数
	{
		echo "<b>构造函数被调用....</b><br/><br/>";
	}
	function __destruct()  //  析构函数
	{
		echo"<b>析构函数被调用....</b><br/><br/>";
	}
	function set_name($name)  // 成员函数set_name()
	{
		$this->name = $name;
	}
	function get_name($name)
	{
		echo "这只猫的名字叫：".$this->name."<br/><br/>";
	}
}

$mypet = new Cat;
echo "__construct()调用之后<br/><br/>";
$mypet->set_name("小白");
$mypet->get_name();
echo "类方法get_name()调用之后<br/><br/>";