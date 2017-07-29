<?php
class doClone
{
	private  $id,$name,$address;
	
	public function __construct($id=0,$name='',$address='')
	{
		$this->id = $id;
		$this->name = $name;
		$this->address = $address;
	}
	
	public function get_id()  // 成员函数get_id()
	{
		return $this->id;
	}
	
	public function get_name()
	{
		return $this->name;
	}
	
	public function get_address()
	{
		return $this->address;
	}
	
	public function __clone() //clone 方法
	{
		$this->id = $this->id+1;
		$this->name = 'Kong';
		$this->address = "America";
	}
}

$cle = new doClone(99,'king','Island');
echo '<b>clone之前，对象$cle的属性：</b>';
echo '<br/>';
echo 'id='.$cle->get_id().'<br/>';
echo 'name='.$cle->get_name().'<br/>';
echo 'address='.$cle->get_address().'<br/>';
echo '<br/>';


$cle_cloned = clone $cle;
echo '<b>clone之后，对象$cle的属性：</b>';
echo '<br/>';
echo 'id='.$cle->get_id()."<br/>";
echo 'name='.$cle->get_name()."<br/>";
echo 'adress='.$cle->get_address().'<br/>';
echo '<br/>';
echo '<br/>';

echo '<b>clone之后，对象$cle_cloned的属性：</b>';
echo '<br/>';
echo 'id='.$cle_cloned->get_id().'<br/>';
echo 'name='.$cle_cloned->get_name().'<br/>';
echo 'address='.$cle_cloned->get_address();

