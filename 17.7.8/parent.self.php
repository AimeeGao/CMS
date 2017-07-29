<?php
// parent 和 self的用法
class Animal   // 定义动物类(基类)
{
	public $blood;  // 成员属性未被封装 动物的热血和冷血属性
	public $name;
	
	public function __construct($blood,$name)  // 构造函数
	{
		$this->blood = $blood;
		if($name)
		{
			$this->name = $name;
		}
	}
}

class Mammal extends Animal  // 哺乳动物，由Animal类派生
{
	public $fur_color;  // 哺乳动物皮毛颜色属性
	public $legs;
	function __construct($fur_color, $legs,$name = NULL) // 构造函数
	{
		parent::__construct("warm", $name);
		$this->fur_color = $fur_color;
		$this->legs = $legs;
	}
}

class Cat extends Mammal // Cat类，由Mammal派生
{
	function __construct($fur_color, $name)  // 构造函数
	{
		parent::__construct($fur_color, 4,$name);
		self::bark();	// 调用该类的另一个方法bark()
	}
	
	function bark()
	{
		print ("$this->name says, 'mew~ mew~'");
	}
}

$cat_xiaobai = new Cat("white", "XiaoBai");
