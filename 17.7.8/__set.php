<?php
class Test
{
	public function __get($prop_name) // get()方法
	{
		echo "获取属性：$prop_name<br/>";
	} 
	public function __set($prop_name,$value)  // set()方法
	{
		echo "设置属性 $prop_name 的值为 '$value'";
	}

}
$test = new Test;
$test->Name;  // 对象$test访问一个不存在的属性Name，此时调用方法__get()
$test->Name = "测试设置";  // 对象$test为一个不存在的属性Name设置值，此时会调用__set()方法