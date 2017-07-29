<?php
class Car{
	public $wheels = 4;
	protected $hood = 1;
	private $engine = 1;
	var $doors = 4;
	
	
	function showProperty(){
		echo $this->wheels."Public Wheels Inside Car Class <br>";
		echo $this->hood."Protected Hood Inside Car Class <br>";
		echo $this->engine."Private Engine Inside Car Class <br>";
	}
}

$bmw = new Car();
$semi = new Semi();

class Semi extends Car{
	function  showProperty(){
		echo $this->wheels."Public Wheels inside the Semi Class <br/>";
		echo $this->hood."Protected Hood inside the Semi Clas <br/>";
		
	}
}

echo $bmw->showProperty(); // 在Car内部都可以访问到
echo $semi->showProperty();
echo $bmw->wheels."Public Wheels outside all the classes";