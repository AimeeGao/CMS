<?php
// 在PHP程序中使用__toString()方法
class Student
{
	private $id,$name;  // 成员变量
	public function __construct($s_id,$s_name)  // 构造函数
	{
		$this->id = $s_id;
		$this->name = $s_name;
	}
	public  function __toString() // __toString方法
	{ 
		return "$this->id:$this->name";  
	} 
}
$stu = new Student(1,'George Wesley');
echo '<b> 以下输出对象时，实际调用了方法__toString()</b><br/><br/>';
echo $stu;