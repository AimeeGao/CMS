<?php
class Car{
	static $wheels = 4;
	var $hood = 1;
	
	function MoveWheels(){
		Car::$wheels = 10;  // 使用static时，不需要对象，而需要类的名字和：：符号 
							// 与在类的内部创建方法不同，静态属性与类有关而与对象无关，所以赋值或设置属性时需要书写类的名字并加上：：符号
	}
}

$bmw = new Car();
Car::MoveWheels(); // 调用方法时也是类似的 类名加上：：
echo Car::$wheels;