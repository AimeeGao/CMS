<?php
class Dog{
	var $eye_colors = "blue";
	var $nose = 1;
	var $fur_color = "yellow";
	
	function ShowAll(){ // 在一个类的内部创建一个方法的时候，使用$this来设置类的属性而非直接书写类名
		echo $this->eye_colors;
		echo $this->nose;
		echo $this->fur_color;
	}
}

$pitbull = new Dog();
$pitbull->ShowAll();