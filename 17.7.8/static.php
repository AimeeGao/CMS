<?php
// PHP程序中类的静态成员
class Counter
{
	private static $count = 0;  // 静态成员变量
	
	function __construct()  // 构造函数
	{
		echo  "<b>计数开始！</b><br/><br/>";
	}
	
	function __destruct()  // 析构函数
	{
		echo "<b>计数结束</b><br/><br/>";
	}
	static function get_count()  // 静态成员函数
	{
		return self::$count;
	}
	
	static function counts()
	{
		self::$count++;
	}
}

$c = new Counter;
$i=0;

while($i<5)
{
	Counter::counts(); // 通过限定Count：：直接调用静态函数counts(),并没有使用对象$c来调用
	
	$i = Counter::get_count();
	echo Counter::get_count()."<br/><br/>";
}