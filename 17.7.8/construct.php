<?php
class Student // 定义类
{
	private $id,$name;          // 私有成员变量$name
	public function __construct($s_id,$s_name) // 构造函数
	{
		$this->id = $s_id;
		$this->name = $s_name;
	}
}

$str = new Student(1, 'George Wesley');  // 实例化类的同时会调用构造函数